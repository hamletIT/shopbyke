@extends('layout.head_foot')
@section('title', 'EditPage')
@section('content')
     <div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="col-md-6">
				 <div class="login-page">
					<h4 class="title">New Customers</h4>
					
					<div class="button1">
					  
					   <a href="/register"><input type="submit" name="Submit" id="sirun" value="Create an Account"></a>
					 </div>
					 <div class="clear"></div>
				  </div>
				</div>
				<div class="col-md-6">
				 <div class="login-title">
	           		<h4 class="title">Registered Customers</h4>
					<div id="loginbox" class="loginbox">
						<form action="/ChangePassword" method="POST" name="login" id="login-form">
						@csrf  
						  <fieldset class="input">
						    <p id="login-form-username">
							  <label for="modlgn_username" style="color: #255784;">current_password</label>
							  				@error('current_password')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
						      <input id="modlgn_username" type="text" name="current_password" class="inputbox" size="18" autocomplete="off" value="{{ old('current_password') }}">
						    </p>
						    <p id="login-form-password">
							  <label for="modlgn_passwd" style="color: #255784;">Password</label>
							  				@error('password')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
						      <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" autocomplete="off" value="{{ old('password') }}">
                            </p>
                            <p id="login-form-password">
							  <label for="modlgn_passwd" style="color: #255784;">Confirm Password</label>
							  				@error('password_confirmation')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
						      <input id="modlgn_passwd" type="password" name="password_confirmation" class="inputbox" size="18" autocomplete="off" value="{{ old('password_confirmation') }}">
						    </p>
						    <div class="remember">
							   
							<a href="/index"><input type="submit" name="Submit" class="button" value="SAVE" id="sirun"></a>
							 </div>
							 
						  </fieldset>
						 </form>
						 <!-- <a href="{{url('/AddPr')}}"><input type="submit" name="Submit" class="button" value="addproduct" id="sirun"></a> -->
						 
					</div>
			      </div>
				 <div class="clear"></div>
			  </div>
			</div>
		  </div>
	  </div>
	  @endsection
	 