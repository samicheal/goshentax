
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>GoshenTax cPanel</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> 
<script src="{{ asset('js/jquery.min.js') }}"> </script>
<script src="{{ asset('js/bootstrap.min.js') }}"> </script>
</head>
<body>
	<div class="login">
		<h1><a href="dashboard.html">Goshentax -cPanel</a></h1>
		<div class="login-bottom">
			<h2>Login</h2>
		<form action='{{ route('admin.login') }}' method="post">

			{{-- display error message --}}
			<div> 
				@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
				@endif

				@if($status == 1)
						<div class="alert alert-danger">
							<ul>
								<li>Invalid username and password credentials</li>
							</ul>
						</div>
				@endif
			</div>

			{{-- csrf_field --}}
			{{ csrf_field() }}

			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" name="username" placeholder="Email" required="">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" name="password" placeholder="Password" required="">
					<i class="fa fa-lock"></i>
				</div>
			
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" value="login">
				</label>
					<p>    </p>
				<a href="signup.html" class="hvr-shutter-in-horizontal">forgot Password </a>
			</div>
			
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>
		<!---->
<div class="copy-right">
            <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">SITE Systems</a> </p>	    </div>  
<!---->
<!--scrolling js-->
<script src="{{  asset('js/jquery.nicescroll.js') }} "></script>
	<script src="{{  asset('js/scripts.js') }}"></script>
	<!--//scrolling js-->
</body>
</html>

