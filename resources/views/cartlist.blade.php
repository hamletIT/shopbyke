@extends('layout.head_foot')
@section('title', 'EditPage')
@section('content')

 <div class="main">
	
 <ul class="icon1 sub-icon1 profile_img">
					 <li><a class="active-icon c1" href="#"> </a>
						<ul class="sub-icon1 list">
						
						  	<span class="actual">Total
								  <h3 class="hover_price">{{$sum}}$</h3>
							</span>			
						  </li>
						  <div class="login_buttons">
							 <div class="check_button"><a href="{{url('/stripe')}}">Check out</a></div>
							
							 
						  </div>
						 
						</ul>
					 </li>
				   </ul>
      <div class="shop_top">		  		
		<div class="container">			
			<div class="row shop_box-top"> 		
			@foreach($project as $projects)
				<div class="col-md-3 shop_box">
					<a href="Cart">
					<img src="{{asset('files/'.$projects->Cart->photos[0]->name)}}" class="img-responsive" alt=""/>
						<span class="new-box">
							<span class="new-label">New</span>
						</span>
						<span class="sale-box">
							<span class="sale-label">Sale!</span>
						</span>
							<div class="shop_desc">
								
										<h3><a style="color: #fff;" href="/wishlist/{{$projects->cart->id}}">{{ $projects->Cart->name }}</a></h3>
										
										<h3 style="color: #fff;" class="total_price{{$projects->shops_id}}">{{ $projects->Cart->price * $projects->count}} $</h3>
										<h3 style="color: #fff;" class="reducedfrom{{$projects->shops_id}}">{{ $projects->count }}</h3>
										<button class="count1" value="{{$projects->shops_id}}">+</button>
										<button class="count2" value="{{$projects->shops_id}}">-</button>
									
										<h3 style="color: #fff;" class="actual">{{ $projects->Cart->description }}</h3><br>

										<ul class="buttons">

										<li class="cart">
											<input type="hidden" class="inp" value="{{$projects->id}}">
											<a href="#" class="wish">wishlist</a>
										</li><br>

										
										
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