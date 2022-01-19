<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@extends('layout.head_foot')
@section('title', 'EditPage')
@section('content')
	
<form class="container" style="padding: 200px;" action="/Edit" method = 'post'>
@csrf
<p id="login-form-username">

							  <label for="modlgn_username" style="color: #255784;">New name</label>
							  				@error('name')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											<input id="modlgn_username" type="text" name="name" class="inputbox" size="18" autocomplete="off" value='{{$product->name}}'>
						      <input  type="hidden" name="pr_id" value='{{$product->id}}'>
						    </p>
						    <p id="login-form-password">
							  <label for="modlgn_passwd" style="color: #255784;">New count</label>
							  				@error('count')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
						      <input id="modlgn_passwd" type="count" name="count" class="inputbox" size="18" autocomplete="off" value='{{$product->count}}'>
							</p>
							<p id="login-form-password">
							  <label for="modlgn_passwd" style="color: #255784;">New price</label>
							  				@error('price')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
						      <input id="modlgn_passwd" type="price" name="price" class="inputbox" size="18" autocomplete="off" value='{{$product->price}}'>
							</p>
							<p id="login-form-password">
							  <label for="modlgn_passwd" style="color: #255784;">New description</label><br>
							  				@error('description')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
						      <textarea id="modlgn_passwd" type="textarea" name="description" class="inputbox" size="18" autocomplete="off" style = "height:200px;resize:none">{{$product->description}}</textarea>
							</p>
							
							<input type="submit" name="Submit" class="button" value="save" >
</form>


@endsection