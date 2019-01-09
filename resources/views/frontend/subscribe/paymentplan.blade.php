<!DOCTYPE HTML>
<html>
<head>
<title>Subscribe/Subcription_Plan_Menu</title>
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
            <h2 class="text-center text-primary">Choose Subscription plan</h2>

            @if($errors->any())
                @foreach ($errors->all() as $error)
                 <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> {{ $error }} </strong>
                 </div>     
                @endforeach
            @endif

        <form method="post" action="{{ route('subscription.subscriptionchoices') }}" class="row">
            
            <div class="col-md-12 form-group">
                <div class="radio">
                    <label><input type="radio" name="plantype" id="single" checked > Single </label>
                </div>
            </div>

            <div class="col-md-12 form-group">
                <div class="radio">
                    <label><input type="radio" name="plantype"id="group" > Group</label>
                </div>
            </div>

            <div id="company" class="hidden">
                <div class="col-md-12 form-group">
                    <label> Company Name </label>
                    <input type="text" class="form-control clear-input" placeholder="company name" name="coyname" required="">
                </div>

                <div class="col-md-12 form-group">
                    <label> Subscription Quantity </label>
                    <input type="number" class="form-control clear-input" placeholder="quantity" name="number"  required="">
                </div>
            </div> 

            <div class="col-md-12 form-group">cp
                <div class="radio">
                    <label for="subtype" >Subscrition Type</label>
            <select class="form-control" id="subtype">
                <option value="100">6 months</option>
                <option value="120">12 months</option>
            </select>
                </div>
            </div>
            
            <div class="col-md-12 form-group">
                <input type="hidden" class="form-control clear-input"  name="email" value="{{ $email }}">
            </div>

            <div class="col-md-12 form-group">
                <input type="hidden" class="form-control clear-input" name="id" value="{{ $id }}">
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
    <script src="{{ asset('js/register.js') }}"></script>
<!-- //for bootstrap working -->
</body>
</html>