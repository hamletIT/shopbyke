<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@extends('layout.head_foot')
@section('title', 'Shop')
@section('content')
     <div class="main">
      <div class="shop_top">		
		<div class="container">
			<div class="row shop_box-top"> 
			@foreach($Prod as $pr)
				<div class="col-md-3 shop_box">
					<a href="/single/{{$pr->id}}">
						<img src="{{asset('files/'.$pr->photos[0]->name)}}" class="img-responsive" alt=""/>
						<span class="new-box">
							<span class="new-label">New</span>
						</span>
						<span class="sale-box">
							<span class="sale-label">Sale!</span>
						</span>
							<div class="shop_desc">
								
										<h3><a href="/single/{{$pr->id}}">{{ $pr->name }}</a></h3>
										<h3>{{ $pr->category->name }}</h3>
										<h3>{{ $pr->price}} $</h3>
										<h3 class="reducedfrom">{{ $pr->count }}</h3>
										<h3 class="actual">{{ $pr->description }}</h3><br>

										<ul class="buttons">
											<li class="cart"><a href="/single/{{$pr->id}}">More</a></li><br>
											<input type="hidden" class="inp1" value="{{$pr->id}}">
											<li class="cart"><a href="/cartlist/">Add To Cart</a></li><br>
											<li class="cart">
											<input type="hidden" class="inp" value="{{$pr->id}}">
											<a href="#" class="wish">wishlist</a><br>
												
												
											</li>
											
												
											<div class="clear"> 
												
											</div>
										</ul>
						    </div>
				   </a>
			    </div>
			@endforeach
		
			
				
				
			</div>
		 </div>
	   </div>
	  </div>
	  @endsection
	  