
<!DOCTYPE HTML>					
<html>
<head>
<title>@yield('title')</title>
<link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href=	"{{asset('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800')}}" rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<!--<script src="js/jquery.easydropdown.js"></script>-->
<!--start slider -->
<link rel="stylesheet" href="{{asset('css/fwslider.css')}}" media="all">
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/fwslider.js')}}"></script>
<!--end slider -->
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
</head>
<body>
<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">		
					 <div class="logo">
						<a href="/index"><img src="{{asset('images/18.png')}}" style="height: 80px;" alt=""/></a>
					 </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="{{asset('images/logo.png')}}" alt="" /></a>
						    <ul class="nav" id="nav">
						    	<li><a href="{{url('/shop')}}">Shop</a></li>
								<li><a href="{{url('/Myorders')}}">My Orders</a></li>
								<li><a href="{{url('/contact')}}">Contact</a></li>
								<li><a href="{{url('/wishlist')}}">Wishlist</a></li>	
								<li><a href="{{url('/cartlist')}}">Cartlist</a></li>	
								<li><a href="{{url('/Reset_passwordUrl')}}" value="reset_password">Change Password</a></li>	
								<li><a href="{{url('/AddPr')}}"type="submit" name="Submit" class="button" value="addproduct">addproduct</a></li>
								
        <div class="mx-auto pull-right">
            <div class="">
                <form action="/Search" method="post" role="search">
					@csrf
                    <div class="input-group">
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term">
                       
                            <span class="input-group-btn">
                                <button class="btn btn-danger"title="Refresh page">
                                    <span class="fas fa-sync-alt">Search</span>
                                </button>
                            </span>
                    </div>
                </form>
            </div>
        </div>
  
									<!-- <a href="{{url('/AddPr')}}"><input type="submit" name="Submit" class="button" value="addproduct" id="sirun"></a>							 -->
								<div class="clear"></div>
							</ul>
							<script type="text/javascript" src="{{asset('js/responsive-nav.js')}}"></script>
				    </div>							
	    		    <div class="clear"></div>
	    	    </div>
	            <div class="header_right">
	    		  <!-- start search-->
				      <div class="search-box">
							<div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
						<!----search-scripts---->
						<script src="{{asset('js/classie.js')}}"></script> 	
						<script src="{{asset('js/uisearch.js')}}"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
						<!----//search-scripts---->
				  
		           <div class="clear"></div>
	       </div>
	      </div>
		 </div>
	    </div>
    </div>
    


    @yield('content')




    <div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<ul class="footer_box">
							<h4>Products</h4>
							<li><a href="https://www.velostrana.ru/gornye-velosipedy/tag-mtb/">MTB</a></li>
							<li><a href="https://www.trekbikes.com/us/en_US/">TRECK</a></li>
							<li><a href="https://www.made-in-china.com/products-search/hot-china-products/Electric_Bicycle.html?gclid=EAIaIQobChMIw7GQtcD-9AIVx9myCh0UzAQZEAAYASAAEgJhgfD_BwE">ELECTRO BYKE</a></li>
						</ul>
					</div>
					<div class="col-md-3">
					
					</div>
					<div class="col-md-3">
						<ul class="footer_box">
							<h4>Customer Support</h4>
							<li><a href="{{url('/contact')}}">Contact Us</a></li>
							<li><a href="{{url('/shop')}}">Shoping and Order Tracking</a></li>
							
							<li><a href="https://www.facebook.com/mtbclubarmenia/">Warranty text us on facebook</a></li>
							<li style="color: #fff;">инвестировать в этот веб-сайт (077)-889-664</li>
						</ul>
					</div>
					<div class="col-md-3">
						<ul class="footer_box">
							
							<ul class="social">	
							  <li class="facebook"><a href="https://www.facebook.com/mtbclubarmenia/"><span> </span></a></li><br>
							  <li class="youtube"><a href="https://www.youtube.com/watch?v=VxcyLBDlVLg"><span> </span></a></li>										  				
						    </ul>
		   					
						</ul>
					</div>
				</div>
				<div class="row footer_bottom">
				    <div class="copy">
			           <p>© 2021 Template Hamlet Hakobjanyan</p>
		            </div>
					  
   				</div>
			</div>
		</div>
</body>
<script src="{{asset('js/ajax_js.js')}}"></script>
</html>