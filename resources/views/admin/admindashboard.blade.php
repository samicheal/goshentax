@extends('layouts.master')

@section('title' , 'goshentax/dashboard')

@section('content')

<!--banner-->	
<div class="banner">
		   
        <h2>
        <a href="dashboard.html">Home</a>
        <i class="fa fa-angle-right"></i>
        <span>Dashboard</span>
        </h2>
    </div>
<!--//banner-->

				<!--grid-->
                <div class="grid-form">
                    <div class="grid-form1">
                        <div class="row">
                            <div class="col-md-4"> 
                                    <div class="content-top-1">
                                            <div class="col-md-6 top-content">
                                                <h5>Total Posts</h5>
                                                <label> 3 </label>
                                            </div>
                                            <div class="col-md-6 top-content1">	   
                                                <div id="demo-pie-1" class="pie-title-center" data-percent="45"> <span class="pie-value"></span> </div>
                                            </div>
                                             <div class="clearfix"> </div>
                                    </div>
                            </div>
                            <div class="col-md-4"> 
                                    <div class="content-top-1">
                                            <div class="col-md-6 top-content">
                                                <h5>Approved Posts</h5>
                                                <label>2</label>
                                            </div>
                                            <div class="col-md-6 top-content1">	   
                                                <div id="demo-pie-2" class="pie-title-center" data-percent="50"> <span class="pie-value"></span> </div>
                                            </div>
                                             <div class="clearfix"> </div>
                                            </div>
                            </div>
                            <div class="col-md-4"> 
                                    <div class="content-top-1">
                                            <div class="col-md-6 top-content">
                                                <h5>Pending Posts </h5>
                                                <label>1</label>
                                            </div>
                                            <div class="col-md-6 top-content1">	   
                                                <div id="demo-pie-3" class="pie-title-center" data-percent="25"> <span class="pie-value"></span> </div>
                                            </div>
                                             <div class="clearfix"> </div>
                                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--//grid-->
                
                <!--grid-->
                <div class="grid-form">
                        <div class="grid-form1">
                            <div class="row">
                                <div class="col-md-4"> 
                                        <div class="content-top-1">
                                                <div class="col-md-6 top-content">
                                                    <h5>Total Adverts</h5>
                                                    <label> 5 </label>
                                                </div>
                                                <div class="col-md-6 top-content1">	   
                                                    <div id="demo-pie-1" class="pie-title-center" data-percent="45"> <span class="pie-value"></span> </div>
                                                </div>
                                                 <div class="clearfix"> </div>
                                        </div>
                                </div>
                                <div class="col-md-4"> 
                                        <div class="content-top-1">
                                                <div class="col-md-6 top-content">
                                                    <h5>Approved Adverts</h5>
                                                    <label>3</label>
                                                </div>
                                                <div class="col-md-6 top-content1">	   
                                                    <div id="demo-pie-2" class="pie-title-center" data-percent="50"> <span class="pie-value"></span> </div>
                                                </div>
                                                 <div class="clearfix"> </div>
                                                </div>
                                </div>
                                <div class="col-md-4"> 
                                        <div class="content-top-1">
                                                <div class="col-md-6 top-content">
                                                    <h5> Pending Ads </h5>
                                                    <label>2</label>
                                                </div>
                                                <div class="col-md-6 top-content1">	   
                                                    <div id="demo-pie-3" class="pie-title-center" data-percent="25"> <span class="pie-value"></span> </div>
                                                </div>
                                                 <div class="clearfix"> </div>
                                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//grid-->

@endsection