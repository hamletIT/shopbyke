<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Hamo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class HamoController extends Controller


{
    public function index(){
        // print ('ok');
        //$data=Hamo::first();//esi voncor limit 1 tvac lini
        $data=Hamo::get();
        // dd($data);
        return view('hamo1', ['data' => $data]);
    }

    //esi gitbush um es em stexcel 
    public function AddUser(Request $request){
        // dd($request);
        
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'age' => 'required|before:-13 years',
            'email'  => 'required|unique:hamos|email',
            'Password' => 'min:6|required_with:Confirm_Password|same:Confirm_Password',
            'Confirm_Password' => 'required|min:6',
           
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $user = new Hamo;
                 $user->name = $request->input('first_name');
                 $user->surname = $request->input('last_name');
                 $user->email = $request->input('email');
                 $user->age = $request->input('age');
                 $user->password = Hash::make($request->input('Password'));
                //  'plain-text');
                 $user->save();
                return redirect('/index');
        }
       

    }
    public function login(Request $request)
    {
        $user = Hamo::where('email',$request->input('email'))->first();
        // dd($user);

        $validator = Validator::make($request->all(), [
            'email'  => 'required|email',
            'password' => 'min:6|required|',
        ]);
    
        $validator->after(function ($validator) use ($user,$request) {
            if (!$user) {
                $validator->errors()->add('email', 'ayspisi email chka grancvac');
               
            }else if (!Hash::check($request->input('password'),$user->password,)) {

                $validator->errors()->add('password', 'ayspisi password chka stexcvac');
            }
        });
        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $request->session()->put('user', $user->id);
            return redirect('/index');
        }
    }

       
}

