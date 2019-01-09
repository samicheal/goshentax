
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE HTML>
<html>
<head>

<title>@yield('title')</title>

<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />

<!-- Custom Theme files -->
<link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> 
<script src="{{ asset('js/jquery.min.js') }}"> </script>

<!-- Mainly scripts -->
<script src="{{ asset('js/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>

<!-- Custom and plugin javascript -->
<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/screenfull.js') }}"></script>

@yield('styles')

<script>
	$(function () {
		$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

		if (!screenfull.enabled) {
			return false;
		}

		$('#toggle').click(function () {
			screenfull.toggle($('#container')[0]);
		});	
	});
</script>
<!----->

<!--pie-chart--->
<script src="{{ asset('js/pie-chart.js') }}" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

	</script>
	
<!--skycons-icons-->
<script src="{{ asset('js/skycons.js') }}"></script>
<!--//skycons-icons-->

</head>
<body>

<!--wrapper-->	
<div id="wrapper">

	   <!-- navbar -->
	   @include('includes.menu')
	   <!-- /navbar -->
		
		<!--content-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
       		<div class="content-main">
				
				@yield('content')		
		
		<!---->
		<div class="copy">
			<p> &copy; 2018 GoshenTax. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">SITE Systems</a> </p>
		</div>
			</div>
		<div class="clearfix"> </div>
	   </div>
	   <!--//content-->

     </div>
	 <!--//wrapper-->

	<!--scrolling js-->
	<script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
	<script src="{{ asset('js/scripts.js') }}"></script>
	<!--//scrolling js-->

	<!-- js-->
	<script src="{{ asset('js/toastr.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"> </script>
	<!--//js-->

	<!--script -->
	<script>
		@if(Session::has('success'))
			toastr.success("{{ Session::get('success') }}");
		@endif
		@if(Session::has('notification'))
			toastr.warning("{{ Session::get('notification') }}");
		@endif
	</script>	
	
	@yield('scripts')

</body>
</html>

