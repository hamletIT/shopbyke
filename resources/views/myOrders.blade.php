@extends('layout.head_foot')
@section('title', 'Myorders')
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
							 <div class="check_button"><a href="#">Check out</a></div>
							
							 
						  </div>
						 
						</ul>
					 </li>
				   </ul>
      <div class="shop_top">		  		
		<div class="container">			
			
		 </div>
	   </div>
	  </div>

@endsection