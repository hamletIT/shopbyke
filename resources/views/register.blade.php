<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Snow Bootstrap Website Template | Register :: w3layouts</title>
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
	
     <div class="main">
      <div class="shop_top">
	     <div class="container">  
						<form method="POST" action="/user" >
						@csrf  
					<!--es verevin@ idividual valu e talis -->
								<div class="register-top-grid">
										<h3 style="color: #fff;">PERSONAL INFORMATION</h3>
										<div>
										
											<span style="color: #255784;">First Name<label>*</label></span>
											@error('first_name')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											<input class="inp" type="text" name="first_name" value="{{ old('first_name') }}">
											<span><br></span>
											<span style="color: #255784;">Last Name<label>*</label></span>
											@error('last_name')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											<input class="inp" type="text" name="last_name" value="{{ old('last_name') }}">
											<span><br></span>
											<span style="color: #255784;">Age<label>*</label></span>
											@error('age')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											<input class="inp" type="text" name="age" value="{{ old('age') }}"> 
											<span><br></span>
											<span style="color: #255784;">Email Address<label>*</label></span>
											@error('email')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											<input class="inp" type="text" name="email" value="{{ old('email') }}"> 
										</div>
										<div>
											<!--stex kareli e nkar dnel kam svg -->
										</div>
										<div>
										    <!--stex kareli e nkar dnel kam svg -->
										</div>
										
								</div>
								<div class="clear"> </div>
								<div class="register-bottom-grid">
										<h3>LOGIN INFORMATION</h3>
										<div>
											<span style="color: #255784;">Password<label>*</label></span>
											@error('Password')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											<input class="inp" type="text" name="Password" value="{{ old('Password') }}">
											<span><br></span>
											<span style="color: #255784;">Confirm Password<label>*</label></span>
											@error('Confirm_Password')
    										<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											<input class="inp" type="text" name="Confirm_Password" value="{{ old('Confirm_Password') }}">
										</div>
										
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<a href="/index"><input type="submit" value="register" id="sirun3"></a>
						</form>
					</div>
		   </div>
	  </div>
	 
</body>	
</html>