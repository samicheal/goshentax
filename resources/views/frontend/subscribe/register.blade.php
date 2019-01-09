<!DOCTYPE HTML>
<html>
<head>
<title>Subscribe/Register</title>
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
                        <a class="navbar-brand" href="#"> <img src="{{ asset('images/galogo.png') }}" width="250"></a>
                    </div>
    
                <!-- Collect the nav links, forms, and other content for toggling -->
                </div><!-- /.container-fluid -->
            </nav>
 
<div id="contact">
    <div class="container text-center">        
        <div id="login" class="col-md-4 col-md-offset-4">
            <h2 class="text-center text-primary">Register</h2>

            @if($errors->any())
                @foreach ($errors->all() as $error)
                 <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> {{ $error }} </strong>
                 </div>     
                @endforeach
            @endif

        <form method="post" action="{{ route('subscription.plan') }}" class="row">
            <div class="col-md-12 form-group">
                <input type="text" class="form-control clear-input" placeholder="Firstname" name="firstname" value="{{ old('firstname') }}" required="">
            </div>

            <div class="col-md-12 form-group">
                <input type="text" class="form-control clear-input" placeholder="Lastname" name="lastname" value="{{ old('lastname') }}" required="">
            </div>

            <div class="col-md-12 form-group">
                    <input type="email" class="form-control clear-input" placeholder="Email" name="email" value="{{ old('email') }}" required="">
            </div>
            <div class="col-md-12 form-group">
                    <input type="text" class="form-control clear-input" placeholder="Phone" name="phone" value="{{ old('phone') }}" required="">
            </div>

            {{-- add csrf field --}}
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
<!-- //js -->
<!-- for bootstrap working -->
    <script src="{{ asset('js/jquery.min.js') }}"> </script> 
	<script src="{{ asset('js/bootstrap.js') }}"></script>
<!-- //for bootstrap working -->
</body>
</html>