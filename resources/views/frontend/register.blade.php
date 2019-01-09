<!DOCTYPE HTML>
<html>
<head>
<title>Single content page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<!-- Custom Theme files -->
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('css/subscribe.css') }}" rel="stylesheet" type="text/css" media="all" />


<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> 

</head>

<body>
<!-- banner -->
          <!--page linking to the navbar-->
          <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">GoshenTax</a>
                    </div>
    
                <!-- Collect the nav links, forms, and other content for toggling -->
                </div><!-- /.container-fluid -->
            </nav>
 
<div id="contact">
    <div class="container text-center">        
        <div id="login" class="col-md-4 col-md-offset-4">
            <h2 class="text-center text-primary">Register</h2>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                     <ul class="alert alert-danger">
                        <li>
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;
                                <strong><span class="glyphicon glyphicon-error"> </span>  {{ $error }} </strong>
                            </a>    
                        </li>
                     </ul>        
                @endforeach
            @endif

        <form method="post" action="{{ route('subscription.plan') }}" class="row">
            <div class="col-md-12 form-group">
            <input type="text" class="form-control clear-input" placeholder="Firstname" name="firstname" required="">
            </div>

            <div class="col-md-12 form-group">
                <input type="text" class="form-control clear-input" placeholder="Lastname" name="lastname" required="">
            </div>

            <div class="col-md-12 form-group">
                    <input type="email" class="form-control clear-input" placeholder="Email" name="email" required="">
            </div>
            <div class="col-md-12 form-group">
                    <input type="text" class="form-control clear-input" placeholder="Phone" name="phone" required="">
            </div>

            {{ csrf_field() }}
            
            <div class="col-md-12 form-group test">
                    <input type="submit" class="btn btn-danger" value="continue"> <br>
           </div>
        </form>
    </div>
</div>  
</div>  

<footer class="text-primary footer text-center"> &copy; 2018 GoshenTax. All Rights Reserved | Design by <a href="#" target="_blank">SITE Systems</a> </footer>
<!-- js -->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
<!-- //js -->
<!-- for bootstrap working -->
	<script src="{{ asset('js/bootstrap.js') }}"></script>
<!-- //for bootstrap working -->
</body>
</html>