
<!DOCTYPE HTML>
<html>
<head>
<title>{{ $post->title }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<!-- Custom Theme files -->
<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/style2.css" rel="stylesheet" type="text/css" media="all" />
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
								<ul class="dropdown-menu">
										@foreach($legislations as $legislation)	
										<li><a href="{{ route('legislation.single' , ['slug' => $legislation->slug] ) }}">{{ $legislation->title }}</a></li>
									  @endforeach
								</ul>
							</li>
							<li><a href="empty.html">Archives</a></li>
							
							<li role="presentation" class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								 Resources <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								  <li><a href="sub.html">Company Law Interpretation</a></li>
								  <li><a href="sub.html">Interpretation of PIB</a></li>
								 
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
			<div class="single-grid">
				<div class="col-md-8 blog-left">
					<div class="blog-left-grid">
						<div class="blog-leftl">
							<h4> {{ $post->created_at->format('M') }} <span>{{ $post->created_at->format('d')}}</span></h4>
						
						</div>
						<div class="blog-leftr">
                            <h3>{{ $post->title }}</h3>
                            <br>
							<img src="{{ asset($post->featured) }}" alt=" " class="img-responsive" />
							<p>{!! $post->content !!}</p>
							<h5>By <a href="#">GOSHEN NEWS</a></i></h5>
						</div>
						<div class="clearfix"> </div>
						
						
						
					</div>
				</div>
				<div class="col-md-4 blog-right">
					
					<div class="recent">
                        <h3>Latest Business News</h3> 
                        @foreach($latest as $later)
                            <div class="recent-grids">
                                <div class="recent-grid">
                                    <div class="wom">
                                        <a href="{{ route('post.single' , ['slug' => $later->slug] ) }}"><img src="{{ asset($later->featured) }}" alt=" " class="img-responsive" /></a>
                                    </div>
                                    <div class="wom-right">
                                        <h4><a href="{{ route('post.single' , ['slug' => $later->slug] ) }}">{{ $later->title }}</a></h4>
                                        <p></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        @endforeach
					</div>
					<div class="footer-top-grid1">
						<h3>Latest archives</h3>
						<ul class="tag2">
							<li><a href="#">June</a></li>
							<li><a href="#">July</a></li>
							<li><a href="#">August</a></li>
						</ul>
					</div>
				
				</div>
				<div class="clearfix"> </div>
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
<!-- js -->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<script src="/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- for bootstrap working -->
	<script src="/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>