<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@extends('layout.head_foot')
@section('title', 'EditPage')
@section('content')
	
     <div class="main">
      <div class="shop_top">		
		<div class="container">
			<div class="row shop_box-top"> 
			@foreach($project as $projects)
				<div class="col-md-3 shop_box">
					<a href="single">
					<a href="/single/{{$projects->id}}"><img src="{{asset('files/'.$projects->photos[0]->name)}}" class="img-responsive" alt=""/></a>
						<span class="new-box">
							<span class="new-label">New</span>
						</span>
						<span class="sale-box">
							<span class="sale-label">Sale!</span>
						</span>
							<div class="shop_desc">
								
										<h3><a href="/single/{{$projects->id}}">{{ $projects->name }}</a></h3>
										<h3>{{ $projects->category->name }}</h3>
										<h3>{{ $projects->price}} $</h3>
										<h3 class="reducedfrom">{{ $projects->count }}</h3>
										<h3 class="actual">{{ $projects->description }}</h3><br>

										<ul class="buttons">

											<li class="cart"><a href="#">Add To Cart</a></li>
											<li class="shop_btn"><a href="/single/{{$projects->id}}">Read More</a></li><br>
												
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
	  