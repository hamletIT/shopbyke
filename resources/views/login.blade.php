
<!DOCTYPE HTML>			
<html>
<head>
<!-- <title>Free Snow Bootstrap Website Template | Checkout :: w3layouts</title> -->
<link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href=	"{{asset('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800')}}" rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{asset('js/jquery.min.js')}}"></script>
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

     <div class="main" >
		 <h1 class="newCost">New Customers</h1>
		
			
      <div class="shop_top">
		<div class="container">
			<div class="col-md-6">
				 <div class="login-page">
					<h4 class="title">New Customers</h4>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis</p>
					<div class="button1">
					  
					   <a href="/register"><input type="submit" name="Submit" id="sirun" value="Create an Account"></a>
					 </div>
					 <div class="clear"></div>
				  </div>
				</div>
				<div class="col-md-6">
				 <div class="login-title">
	           		<h4 class="title">Registered Customers</h4>
					<div id="loginbox" class="loginbox">
						<form action="/logUser" method="POST" name="login" id="login-form">
						@csrf  
						  <fieldset class="input">
						    <p id="login-form-username">
							  <label for="modlgn_username" style="color: #255784;">Email</label>
							  				@error('email')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
						      <input id="modlgn_username" type="text" name="email" class="inputbox" size="18" autocomplete="off" value="{{ old('email') }}">
						    </p>
						    <p id="login-form-password">
							  <label for="modlgn_passwd" style="color: #255784;">Password</label>
							  				@error('password')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
						      <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" autocomplete="off" value="{{ old('password') }}">
						    </p>
						    <div class="remember">
							   
							<a href="/index"><input type="submit" name="Submit" class="button" value="Login" id="sirun"></a>
							
							 </div>
							 
						  </fieldset>
						 </form>
						 <a href="/sendbasicemail">forgote Password</a>
						 <!-- <a href="{{url('/AddPr')}}"><input type="submit" name="Submit" class="button" value="addproduct" id="sirun"></a> -->
						 
					</div>
			      </div>
				 <div class="clear"></div>
			  </div>
			</div>
		  </div>
	  </div>
	  