@extends('layout.head_foot')
@section('title', 'EditPage')
@section('content')

 <div class="main">
      <div class="shop_top">		
		<div class="container">
			<div class="row shop_box-top"> 
			@foreach($project as $projects)
				<div class="col-md-3 shop_box">
					<a href="wishlist">
					<img src="{{asset('files/'.$projects->wishlist->photos[0]->name)}}" class="img-responsive" alt=""/>
						<span class="new-box">
							<span class="new-label">New</span>
						</span>
						<span class="sale-box">
							<span class="sale-label">Sale!</span>
						</span>
							<div class="shop_desc">
								
										<h3><a href="/wishlist/{{$projects->wishlist->id}}">{{ $projects->wishlist->name }}</a></h3>
										<h3>{{ $projects->wishlist->name }}</h3>
										<h3>{{ $projects->wishlist->price}} $</h3>
										<h3 class="reducedfrom">{{ $projects->wishlist->count }}</h3>
										<h3 class="actual">{{ $projects->wishlist->description }}</h3><br>

										<ul class="buttons">

										<input type="hidden" class="inp1" value="{{$projects->id}}">
											<li class="cart"><a href="/cartlist/">Add To Cart</a></li><br>

											<li class="cart"><a href="/Deleteprod/{{$projects->id}}">Remove</a></li>
												
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