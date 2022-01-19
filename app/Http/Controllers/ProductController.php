<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\shop;
use App\Models\Hamo;
use App\Models\wishlist;
use App\Models\orders;
use App\Models\order_details;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\category;
use App\Models\photo;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Stripe;
use Mail;

class ProductController extends Controller
{
    public function AddPr(){
        
       $category =category::get();
        return view('addProduct',["categorie"=>$category]);
    }

    public function AddProduct(Request $request){
        // dd($request);
        
        $validator = Validator::make($request->all(), [
            'name'          => 'required|max:255',
            'count'         => 'required|max:255',
            'price'         => 'required',
            'description'   => 'required',
            'category'      => 'required',
            'photo' => 'required',
            
           
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $product = new shop;
                 $product->name = $request->input('name');
                 $product->count = $request->input('count');
                 $product->price = $request->input('price');
                 $product->description = $request->input('description');
                 $product->user_id =session()->get('user');
                 $product->category_id = $request->input('category');
                //  'plain-text');
                 $product->save();
                

            if($request->hasfile('photo'))
            {
            foreach($request->file('photo') as $file)
            {
                $name = time().'.'.$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name); 

                $file= new photo();
                $file->name=$name;
                $file->shops_id = $product->id;
                $file->save();
       
            }
         }
       
        return redirect()->back();
        }
       

    }
    public function ShopPr()
    { 
        $Prod =shop::with('photos', 'category')->get();
         return view('shop',["Prod"=>$Prod]);
     }
    public function single($id)
    {
        $single =shop::where("id",$id)->with('photos', 'category')->first();
        return view('single',["singl"=>$single]);
    }
    public function indexprod()
    {
        $Prod =shop::with('photos', 'category')->get();
         return view('index',["Prod"=>$Prod]);
    }
    public function Reset_passwordUrl()
    {
        return view('ChangePassword');
      
    }
    public function Reset_password(Request $request)
     {
        $validator = Validator::make($request->all(), [
          'current_password' => 'required',
          'Password' => 'min:6|required_with:Confirm_Password|same:Confirm_Password',
          'password_confirmation' => 'required',
        ]);
        $user = Hamo::where('id',session()->get('user'))->first();
        $validator->after(function ($validator) use ($user,$request) {
            if (!Hash::check($request->input('current_password'),$user->password,)) {
                $validator->errors()->add('current_password', 'ayspisi password chka stexcvac');
            }
        });
        if ($validator->fails()) {
            return redirect('/Reset_passwordUrl')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $user = Hamo::where('id',session()->get('user'))->update( array( 'password' => Hash::make($request->input('password'))));
            echo 'Password successfully changed!';
            return redirect('/index');
        }
    }
    public function search_bar()
    {
            $project = shop::where('name', 'Like', '%' . request('term') . '%')->get();
            return view('single_search_pr', ['project' => $project]);
    }
    public function Contact()
    {
        
        return view('contact');
    }
    public function delete($id)
    { 
      
      
        shop::where("id", $id)->delete();
        return redirect('/shop');

      
    }
    public function edit_page($id){
        $product = shop::where("id",$id)->with('photos', 'category')->first();
        //  dd($product);
        return view("editpage",["product"=>$product]);
       
    }
    public function edit(Request $request) {

        $validator = Validator::make($request->all(), [
            'name'          => 'required|max:255',
            'count'         => 'required|max:255',
            'price'         => 'required',
            'description'   => 'required',
           
            
            
           
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $pr_id = $request->input("pr_id");
            shop::where('id',$pr_id)->update( 
                
                array('name'=>$request->input('name'),
                'count'=>$request->input('count'),
                'price'=>$request->input('price'),
                'description'=>$request->input('description'),
                     
                     )
            );
        }
        return redirect()->back();
    }
    public function addWish(Request $request){
        $data =wishlist::where("user_id",session()->get('user'))->where('shops_id',$request->input('prod'))->first();
        if (!$data) {
            $product = new wishlist;

            $product->user_id =session()->get('user');
            $product->shops_id = $request->input('prod');
           
            $product->save();
        }
    }
    public function addCart(Request $request){
        $countequal= shop::where('id',$request->input('prod'))->first();
        $data =Cart::where("user_id",session()->get('user'))->where('shops_id',$request->input('prod'))->first();
        if (!$data) {
            $product = new Cart;

            $product->user_id =session()->get('user');
            $product->shops_id = $request->input('prod');
            $product->count=1;
          
            $product->save();
        }else if($data){
            
            if($countequal->count == $data->count){
              return;
          }else{
              $prod_count=$data->count+1;
              Cart::where('shops_id', $request->input('prod'))->update(array( 'count' => $prod_count));
          }
        }
    }
     public function WishList(){
        $project =wishlist::where("user_id",session()->get('user'))->with('wishlist')->get();
        // dd($project);
        return view('wishlist',["project"=>$project]);

    }
    public function CartList(){
        $project =Cart::where("user_id",session()->get('user'))->with('Cart')->get();
        //  dd($project[0]->Cart->price);
        $sum = 0;
        for($i=0;$i<count($project);$i++){
            // $i+= $project->price ;
            $sum+=$project[$i]->count * $project[$i]->Cart->price;
        }
        // dd($sum);
        return view('cartlist',["project"=>$project,"sum"=>$sum]);
        // return view('cartlist',);
        

    }
    public function removeprod($request){ 
        wishlist::where("shops_id",$request->input('prod'))->where("user_id",session()->get('user'))->delete();
        return redirect('/wishlist');
    }
    public function deleteprod($id){ 
        Cart::where("id", $id)->delete();
        return redirect('/cartlist');
    }
    public function Prodcountup(Request $request){
        $countequal= shop::where('id',$request->input('prod'))->first();
        $data =Cart::where("user_id",session()->get('user'))->where('shops_id',$request->input('prod'))->first();
        if($countequal->count == $data->count){
            return;
        }else{
            $data->count++;
            Cart::where('shops_id', $request->input('prod'))->update(array( 'count' => $data->count));
            $cartData = ['count'=>$data->count, 'total'=>$data->count * $countequal->price];
            print json_encode($cartData);
        }
    }
    public function Prodcountdown(Request $request){
        $countequal= shop::where('id',$request->input('prod'))->first();
        $data =Cart::where("user_id",session()->get('user'))->where('shops_id',$request->input('prod'))->with('Cart')->first();
        $data->count--;
        // dd($data->count);
            if($countequal->count == $data->count){
                return;
            }else if($data->count==0){
                Cart::where("shops_id",$request->input('prod'))->where("user_id",session()->get('user'))->delete();
                print(0);
            }else{
                
        // dd($data->count * $countequal->price);

                Cart::where('shops_id', $request->input('prod'))->update(array( 'count' => $data->count));
                $cartDataup = ['count'=>$data->count, 'total'=>$data->count * $countequal->price];
                print json_encode($cartDataup);
            }

    }
    public function Totalhover(Request $request)
    { 
        $countequal= shop::where('id',$request->input('prod'))->first();
        $data =Cart::where("user_id",session()->get('user'))->where('shops_id',$request->input('prod'))->with('Cart')->first();

        $cartDataup = ['total'=>$data->count * $countequal->price];
        print json_encode($cartDataup);
    
    }
    public function myorders(Request $request)
    { 
        
        $data =Cart::where("user_id",session()->get('user'))->get();
        $sum = 0;
        $prods=[];
        for($i=0;$i<count($data);$i++){
           
            $sum+=$data[$i]->count * $data[$i]->Cart->price;
            array_push($prods,shop::where('id',$data[$i]['shops_id'])->first());
        }
            $product = new orders;
            $product->user_id =session()->get('user');
            $product->total= $sum;
        //    dd($prods);
         $product->save();

            for($i=0;$i<count($data);$i++){
                for($j=0;$j<count($prods);$j++)
                if($data[$i]['shops_id']==$prods[$j]['id']){
                shop::where('id',$prods[$j]['id'])
                ->where('count',$prods[$j]['count'])
                ->update(['count'=>$prods[$j]['count']-$data[$i]['count']]);
                

                }
               
            }

            for($i=0;$i<count($data);$i++){
                $orders = new order_details;
                $orders->order_id=$product->id;
                $orders->shops_id=$data[$i]['shops_id'];
                $orders->count=$data[$i]['count'];
                $orders->feedback='';
                $orders->save();
               
            }
            Cart::where("user_id",session()->get('user'))->delete();

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                    "amount" => 100 * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Test payment from itsolutionstuff.com." 
            ]);
      
            Session::flash('success', 'Payment successful!');

           
            return back();
    }
    public function single_orders()
    { 
        // $single =orders::where(session()->get('user'))->first();
        // return view('single_orders',["singl"=>$single]);

        $project =order_details::where("user_id",session()->get('user'))->get();
        // dd($project);
        return view('Single_orders',["singl"=>$project]);
    
    }
    public function stripe(){
        return view('stripe'); 
    }
   
    public function basic_email() {
       $data = array('name'=>"Virat Gandhi");
    
       Mail::send(['text'=>'mail'], $data, function($message) {
          $message->to('abc@gmail.com', 'Tutorials Point')->subject
             ('Laravel Basic Testing Mail');
          $message->from('xyz@gmail.com','Virat Gandhi');
       });
       echo "Basic Email Sent. Check your inbox.";
    }
        // public function html_email() {
        //    $data = array('name'=>"Virat Gandhi");
        //    Mail::send('mail', $data, function($message) {
        //       $message->to('abc@gmail.com', 'Tutorials Point')->subject
        //          ('Laravel HTML Testing Mail');
        //       $message->from('xyz@gmail.com','Virat Gandhi');
        //    });
        //    echo "HTML Email Sent. Check your inbox.";
        // }
        // public function attachment_email() {
        //    $data = array('name'=>"Virat Gandhi");
        //    Mail::send('mail', $data, function($message) {
        //       $message->to('abc@gmail.com', 'Tutorials Point')->subject
        //          ('Laravel Testing Mail with Attachment');
        //       $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
        //       $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
        //       $message->from('xyz@gmail.com','Virat Gandhi');
        //    });
        //    echo "Email Sent with attachment. Check your inbox.";
        // }
     
    
    
    
   

 
}
