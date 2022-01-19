<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@extends('layout.head_foot')
@section('title', 'MainPage')
@section('content')
	<div class="banner">
	<!-- start slider -->
       <div id="fwslider">
         <div class="slider_container">
            <div class="slide"> 
                <!-- Slide image -->
               <img src="images/slider1.jpg" class="img-responsive" alt=""/>
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <!-- Text title -->
                        <h1 class="title">Run Over<br>Everything</h1>
                        <!-- /Text title -->
                        
                    </div>
                </div>
               <!-- /Texts container -->
            </div>
            <!-- /Duplicate to create more slides -->		
            <div class="slide">
               <img src="{{asset('images/slider2.jpg')}}" class="img-responsive" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h1 class="title">Run Over<br>Everything</h1>
                       
                    </div>
                </div>
            </div>
            <!--/slide -->
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
       </div>
       <!--/slider -->
      </div>
	  <div class="main">
		<div class="content-top">
			<h2 style="color: #fff;">What is MTB </h2>
			<p style="color: #fff;">To ride a trail with particular fervour, passion, speed, skill and/or style.</p>
			<div class="close_but"><i class="close1"> </i></div>
				<ul id="flexiselDemo3">
				<li><img src="{{asset('images/board1.jpg')}}" /></li>		
				<li><img src="{{asset('images/board2.jpg')}}" /></li>
				<li><img src="{{asset('images/board3.jpg')}}" /></li>
				<li><img src="{{asset('images/board4.jpg')}}" /></li>
				<li><img src="{{asset('images/board5.jpg')}}" /></li>
			</ul>
		<h3 style="color: #fff;" >MTB Extreme Series</h3>
			<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});			
		</script>
		<script type="text/javascript" src="{{asset('js/jquery.flexisel.js')}}"></script>
		</div>
	</div>
	<div class="content-bottom">
		<div class="container">
			<div class="row content_bottom-text">
			  <div class="col-md-7">
				<h3>What is MTB</h3>
				<p class="m_1">A mountain bike (abbreviated as MTB) is a bicycle designed for riding off-road
					 (although it does not exclude the opposite), and as a result, it has a special design that differs from road,
					  track and road (city) bicycles.
					 Also "mountain bike" is the collective name for sports disciplines associated with the use of mountain biking.</p>
				<p class="m_2">It is believed that the first mountain bike, which featured a tiered frame and front 
					suspension, as well as wide tires, appeared in the 1930s. It was invented by Ignaz Schwinn, an engineer from Germany.
					 In 1990, mountain bikes were recognized by the 
					International Cycling Union (UCI) and were made a separate sport discipline.</p>
					
			  </div>
			</div>
		</div>
	</div>
	<div class="features">
		<div class="container">
			
			<div class="close_but"><i class="close1"> </i></div>
			  @foreach($Prod as $inpr)
			  <div class="column">
				
				<div class="col-md-3 top_box">
				  <div class="view view-ninth"><a href="{{url('/single')}}">
				  <img src="{{asset('files/'.$inpr->photos[0]->name)}}" class="img-responsive" alt=""/>
                    <div class="mask mask-1"> </div>
                    <div class="mask mask-2"> </div>
                      <div class="content">
					  <h3><a href="/single/{{$inpr->id}}" style="text-decoration: none;">{{ $inpr->name }}</a></h3>
                        <p>{{ $inpr->description }}</p>
                      </div>
				   </a>
				 </div>
                  </div>
				</div>
				@endforeach
              
			
			</div>
			
		
		 </div>
		</div>
		@endsection
		