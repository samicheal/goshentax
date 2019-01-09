@extends('layouts.master')

@section('title' , 'goshentax/notification/create')

@section('styles')
<link href="{{ asset('dist/summernote.css') }}" rel="stylesheet">
@endsection

@section('content')

<!--banner-->	
    <div class="banner">	   
            <h2>
            <a href="dashboard.html">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Notification</span>
            </h2>
    </div>
<!--//banner-->

 	<!--grid-->
 	<div class="grid-form">
 	
        <div class="grid-form1">
        <h4 id="forms-horizontal">Add Notification</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-horizontal" id="leg" action="{{ route('notification.store') }}" method="post" enctype="multipart/form-data">

            {{-- csrf token --}}
            {{ csrf_field() }}

          <div class="form-group">
            <label for="title" class="col-sm-2 control-label hor-form">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="title" placeholder="title" name="title" required>
            </div>
          </div>
          
          <div class="form-group">
            <label for="fileinput" class="col-sm-2 control-label hor-form">Line 1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder="line one" name="line_one" required>
            </div>	
          </div>
          
          <div class="form-group">
            <label for="fileinput" class="col-sm-2 control-label hor-form">Line 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" placeholder="line two" name="line_two" required>
            </div>	
          </div>

          <div class="form-group">
            <label for="fileinput" class="col-sm-2 control-label hor-form">Message</label>
                <div class="col-sm-10">
                    <textarea name="message" class="form-control" placeholder='description' required></textarea>
                </div>    
            </div>
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus create"></span> &nbsp create</button>
            </div>
          </div>
        </form>
        </div>
        <!--//--grid-->
@endsection

@section('scripts')
<script src="{{ asset('dist/summernote.js') }}"></script>    
<script>  
    $(document).ready(function() {

         //wysiwig editor 
         $('#summernote').summernote({
             height: 100
         });
 
         $("#legislate").on('submit' , function(e){
 
             //
             alert('hey there')

         })
 
     });     
 </script>
@endsection
