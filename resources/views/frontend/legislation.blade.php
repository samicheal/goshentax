
<!DOCTYPE HTML>
<html>
<head>
<title>{{ $legal->slug }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<!-- Custom Theme files -->
<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/style2.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/living.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/font-awesome.css" rel="stylesheet"> 

</head>

<body>
<!-- banner -->
	<div class="banner1">
		<div class="banner-info1">
			<div class="container">
                    <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                                <div class="logo">
                                    <a class="navbar-brand" href="#"><img src="{{ asset('images/galogo.png') }}" width="250"></a>
                                </div>
                            </div>
        
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav " id="">
                                    <li class=""><a href="{{ route('index') }}" class="">Home</a></li>
                                    <li role="presentation" class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                         Legislation <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu list-group">
                                                @foreach($legislations as $legislation)	
                                                <li class="list-group-item"><a href="{{ route('legislation.single' , ['slug' => $legislation->slug] ) }}">{{ $legislation->title }}</a></li>
                                              @endforeach
                                        </ul>
                                    </li>
                                    
                                    <li role="presentation" class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                         Resources <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                          
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->	
                            
                        </nav>
			</div>
		</div>
	</div>
<!-- //banner -->
<!-- single -->
<div class="single">
<div class="container">
	<div class="row">
			<div class="col-md-3">

				<div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					@foreach($legislations as $legislation)	
					<ul class="list-group">
						<li class="list-group-item"><a href="{{ route('legislation.single' , ['slug' => $legislation->slug] ) }}">{{ $legislation->title }}</a></li>
					</ul>	
					@endforeach
				</div>
				  
				  <!-- Use any element to open the sidenav -->
				  <span onclick="openNav()" class="do">Click to view courses</span>
				  
				  <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page
				  <div id="main">
					...
				  </div>-->
				  <div class="living">
					  <ul class="list-group">
						@foreach($legislations as $legislation)	
							<li class="list-group-item"> <a href="{{ route('legislation.single' , ['slug' => $legislation->slug] ) }}">{{ $legislation->title }}</a><br/>
						@endforeach
					  </ul>
				  </div>
			</div>

		<div class = "col-md-7">
			<div class="blog-leftr">
				<img src="/images/legislation.jpg" alt=" " class="img-responsive" />
                <p>  {!! $legal->excerpt !!} </p>	
				<p> <a href="{{ route( 'download' , ['file' => $legal->content] ) }}" class="label label-danger"><span class="fa fa-plus"> </span>  download complete {{ $legal->title }}  </a></p>
				<p> <a href="#" class="label label-primary register"><span class="fa fa-plus"> </span>  download analysis for {{ $legal->title }} </a></p>
			</div>
        </div>

		<div class="col-md-2 blog-right">
			
        </div>
  
</div>
</div>
</div>

<!-- //single -->

<!-- footer -->

<div class="footer">
		<div class="container">
			<div class="footer-grids wthree-agile">
				<div class="col-md-6 footer-grid-left">
					<h3>contact form</h3>
					<form>
						<input type="text" value="enter your full name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'enter your full name';}" required="">
						<input type="email" value="enter your email address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'enter your email address';}" required="">
						<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
						<input type="submit" value="Submit" >
					</form>
				</div>
				<div class="col-md-6 footer-grid-left">
					<h3>about us</h3>
					<p>GOSHEN GROUP is a Nigerian group of companies with diverse business interests and specialties.
							The Group came into existence in 1995 with the establishment of Goshen Associates which 
							later gave birth to the other companies rendering cutting-edge professional services to
							a wide spectrum of clientele in the private as well as the public sectors of the Nigerian economy.
							The Group provides a broad range of personalized services to a wide base of clients after a proper appraisal and 
							understanding of the operational environment and requirements of each client. Our services are 
							without prejudice to internationally accepted standards of best practices for each assignment. 
							Our approach to the provision of services ensures a value-added-plus high quality delivery.</span>
						<i>- Goshen Team</i></p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="footer-bottom">
				<div class="footer-bottom-left-whtree-agileinfo">
					<p>&copy 2018 Goshen. All rights reserved<!-- | Template by <a href="http://w3layouts.com/">W3layouts.</a>--></p>
				</div>
				<div class="footer-bottom-right-whtree-agileinfo">

				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //footer -->

<!---register-modal-->
<div class="modal fade" tabindex="-1" role="dialog" id="subscribeModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> </h4>
        </div>
        <div class="modal-body content">
          <h4 class="text-center" id="notificationId"> </h4>  
		  <p class="text-center notification"> <span id="title"> <span></p>
		  <br/>	
		  <form method="get" action="{{ route('subscription.orContinue') }}">
                {{ csrf_field() }}
                <div class="text-center buttons">
                    <button type="submit" class="btn btn-danger" > <i class="glyphicon glyphicon-remove-sign"></i> </button>
                    <button type="button" class="btn btn-primary" > <i class="glyphicon glyphicon-ok-sign delete"></i> </button>
                </div> 
            </form>
         </div>
        <div class="modal-footer delteModalFooter">
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- js -->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script>
	/* Set the width of the side navigation to 250px */
	function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
	}
	
	/* Set the width of the side navigation to 0 */
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
	
</script>
<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('js/cookie.js') }}"></script>
<script src="{{ asset('js/register.js') }}"></script>
<!-- //js -->
<!-- for bootstrap working -->
	<script src="/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>