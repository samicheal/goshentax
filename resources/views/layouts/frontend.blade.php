
<!DOCTYPE HTML>
<html>
<head>
<title>Welcome to GoshenTax</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />

<!-- Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
</head>

<body>
<!-- banner -->
	<div class="banner">
		<div class="banner-info">
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
							<a class="navbar-brand" href="index.html"><span>G</span> oshen Tax</a>
						</div>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav " id="">
							<li class=""><a href="index.html" class="">Home</a></li>
							<li role="presentation" class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								 Litigation <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								  <li><a href="sub.html">Personal Income Tax</a></li>
								  <li><a href="sub.html">Company Income Law</a></li>
								 
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
				
					<div  id="top" class="callbacks_container">
						<ul class="rslides" id="slider3">
							<li>
									<div class="banner-info-slider">
										<ul>
										<!--	<li><a href="single.html">Blogger</a></li>
											<li>30 Aug 2016</li>-->
										</ul>
										<h3>IFRS trainig at Goshen Affiliates</h3>
										<p>saturday 14th, September 2018.
											<span>Make reservation</span></p>
										<div class="more">
											<a href="single.html" class="type-1">
												<span> Read More </span>
												<span> Read More </span>
											</a>
										</div>
									</div>
								</li>
						</ul>
					</div>
			</div>
		</div>
	</div>
<!-- banner -->
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">

		<!-- //news-and-events -->
			<!-- video-grids -->
			<div class="video-grids">
				<div class = "col-md-12">
				<div class="col-md-2">

				</div>
					<div class="col-md-8 video-grids-left">

							<div class="course_demo1">
								<ul id="flexiselDemo1">	
									@foreach($adverts as $advert)
										<li>
											<div class="item">
												<img src="{{ asset($advert->banner) }}" alt=" " class="img-responsive" />
											</div>
										</li>
									@endforeach
								</ul>
							</div>
										
						</div>
					</div>
					<div class="col-md-2">

					</div>
					</div>	
				</div>
			<!-- //video-grids -->
		</div>
	</div>
	
		
			
			
			<!-- news-and-events -->
				<div class="news">
					<div class="news-grids">
						<div class="col-md-8 news-grid-left">
							<h3>Business News</h3>
							<ul>
								@foreach($posts as $post)
									<li>
										<div class="news-grid-left1">
										<img src="{{ asset($post->featured) }}" alt=" " width="450" height="450" class="img-responsive" />
										</div>
										<div class="news-grid-right1">
											<h4><a href="{{ route('post.single' , ['slug' => $post->slug] ) }}">{{ $post->title }}</a></h4>
											<h5>By <a href="#">goshen news</a> <label>|</label> <i>{{ $post->created_at->toDateString() }}</i></h5>
											<p> {{$snips[$loop->index] }} <span><a href="{{ route('post.single' , ['slug' => $post->slug] ) }}" class="label label-danger">read more </a></span></p>
										</div>
										<div class="clearfix"> </div>
									</li>
								@endforeach
							</ul>
						</div>
						<div class="col-md-4 news-grid-right">
							<div class="news-grid-rght1">

							  <div class="col-md-12 upcoming-events-right">
								<h3>Archives</h3>
								<div class="banner-bottom-video-grid-left">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										  <div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingOne">
											  <h4 class="panel-title">
												<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>May to June 2018
												</a>
											  </h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="height: 0px;">
											  <div class="panel-body">
												Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
											  </div>
											</div>
										  </div>
									
										   
										  <div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingNine">
											  <h4 class="panel-title">
												<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
												  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>March to April 2018
												</a>
											  </h4>
											</div>
											<div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
											   <div class="panel-body">
												Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
											  </div>
											</div>
										  </div>
										
										</div>
								</div>
							</div>
							<div class="clearfix"> 

							</div>
							</div>
						
							<div class="news-grid-rght3">
								<img src="images/18.jpg" alt=" " class="img-responsive" />
								<div class="story">
									<p>News of the week</p>
									<h3><a href="single.html">Nigerian Tax force forces Taxi to texas</a></h3>
								</div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>

				<!--<div class="move-text">
					<div class="breaking_news">
						<h2>Breaking News</h2>
					</div>
					<div class="marquee">
						<div class="marquee1"><a class="breaking" href="single.html">We love taxing people at Goshen Tax lol.</a></div>
						<div class="marquee2"><a class="breaking" href="single.html">Tax is good, pay up! hahah.</a></div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				
				</div>-->

<!-- //banner-bottom -->



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
<script src="js/jquery-1.11.1.min.js"></script>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!--banner-Slider-->
<script src="js/responsiveslides.min.js"></script>
<script>
	// You can also use "$(window).load(function() {"
	$(function () {
	  // Slideshow 4
	  $("#slider3").responsiveSlides({
	auto: true,
	pager: true,
	nav:true,
	speed: 500,
	namespace: "callbacks",
	before: function () {
	  $('.events').append("<li>before event fired.</li>");
	},
	after: function () {
	  $('.events').append("<li>after event fired.</li>");
	}
	  });

	});	
</script>
	<script type="text/javascript" src="js/jquery.marquee.js"></script>
	<script>
	  $('.marquee').marquee({ pauseOnHover: true });
	  //@ sourceURL=pen.js
	</script>
<!-- pop-up-box -->
<script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
							
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<!--//pop-up-box -->
								<script>
									$(document).ready(function() {
									$('.popup-with-zoom-anim').magnificPopup({
										type: 'inline',
										fixedContentPos: false,
										fixedBgPos: true,
										overflowY: 'auto',
										closeBtnInside: true,
										preloader: false,
										midClick: true,
										removalDelay: 300,
										mainClass: 'my-mfp-zoom-in'
									});
																									
									});
								</script>
<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
	<!-- pop-up-box -->
	<script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
											
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<!--//pop-up-box -->
<script>
	$(document).ready(function() {
	$('.popup-with-zoom-anim').magnificPopup({
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});
																	
	});
</script>
<!-- requried-jsfiles-for owl -->
<script type="text/javascript">
$(window).load(function() {
$("#flexiselDemo1").flexisel({
visibleItems: 3,
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
<script type="text/javascript" src="js/jquery.flexisel.js"></script>

</body>
</html>