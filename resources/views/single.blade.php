<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@extends('layout.head_foot')
@section('title', 'SinglePage')
@section('content')
<body>
	
     <div class="main">
		 
      <div class="shop_top">
		<div class="container">
			<div class="row">
				<div class="col-md-9 single_left">
				   <div class="single_image">
						
						
					        <ul id="etalage">							
									@foreach($singl->photos as $img)							
									<li>			
										
										<img src="{{asset('files/'.$img->name)}}" style="width: 500px;" alt=""/>
										
									</li>
									@endforeach
						   </ul>
					    </div><br>
				        <!-- end product_slider -->
				        
					
				        <div class="clear"> </div>
				</div>
				<div class="col-md-3">
				  <div class="box-info-product">
					<p class="price2">$130.25</p>
					       <ul class="prosuct-qty">
								<span>Quantity:</span>
								<select>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
								</select>
							</ul>
							<button type="submit" name="Submit" class="exclusive">
							   <span>Add to cart</span>
							</button>
				   </div>
			   </div>
			</div>	

			<div class="desc">
			<h1 style="color:#fff" >{{ $singl->name }}</h1>
							<h3 style="color:#fff">{{ $singl->category->name }}</h3>
								<h3 style="color:#fff">{{ $singl->price}} $</h3>
							<div class="btn_form">
								 <input type="submit" value="BUY NOW" title="">
								<a href="/Delete/{{$singl->id}}">
								 <input type="submit" value="DELETE" title="">
								</a>
								<a href="{{url('/editpage/'.$singl->id)}}">
								<input type="submit" value="EDIT" title="">
								</a>
							</div>
			   	<h4>Description</h4>
			   	<p style="color:#fff" class="m_10">{{ $singl->description}}</p>
			</div>
			
	     </div>
	   </div>
	 

	  </div>
	
	    @endsection