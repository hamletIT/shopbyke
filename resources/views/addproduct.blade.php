@extends('layout.head_foot')
@section('title', 'AddProduct Page')
@section('content')
     <div class="main">
      <div class="shop_top">
	     <div class="container">  
		 <form action="/AddProduct" method="POST" name="AddProduct" id="login-form" enctype="multipart/form-data">
						@csrf  
						  <fieldset class="input">
						    <p id="login-form-username">
							  <label for="modlgn_username" style="color: #255784;">name</label>
							  				@error('name')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
						      <input id="modlgn_username" type="text" name="name" class="inputbox" size="18" autocomplete="off" value="{{ old('name') }}">
						    </p>
						    <p id="login-form-password">
							  <label for="modlgn_passwd" style="color: #255784;">count</label>
							  				@error('count')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
						      <input id="modlgn_passwd" type="count" name="count" class="inputbox" size="18" autocomplete="off" value="{{ old('count') }}">
							</p>
							<p id="login-form-password">
							  <label for="modlgn_passwd" style="color: #255784;">price</label>
							  				@error('price')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
						      <input id="modlgn_passwd" type="price" name="price" class="inputbox" size="18" autocomplete="off" value="{{ old('price') }}">
							</p>
							<p id="login-form-password">
							  <label for="modlgn_passwd" style="color: #255784;">description</label>
							  				@error('description')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
						      <textarea id="modlgn_passwd" type="textarea" name="description" class="inputbox" size="18" autocomplete="off" value="{{ old('description') }}"></textarea>
							</p>
							<p id="login-form-password">
									@error('category')
    								<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									<select name="category" >
									<option disabled selected> Select</option>
										@foreach($categorie as $c)
									  		<option  value="{{$c->id }}"> {{$c->name}}</option>
										 @endforeach
									</select>
						    </p>
							<p id="login-form-password">
							  <label for="modlgn_passwd" style="color: #255784;">image</label>
							  				@error('photo')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											<input type="file" name="photo[]" id=" " multiple>
							</p>
							<a href="/index"><input type="submit" name="Submit" class="button" value="save" id="sirun"></a>
						    <div class="remember">
							   
							
								
							 </div>
						  </fieldset>
						 </form>
					</div>
		   </div>
	  </div>
	  @endsection