@extends('layouts.master')

@section('title' , 'goshentax/admin/edit-news')

@section('styles')
<link href="{{ asset('dist/summernote.css') }}" rel="stylesheet">
@endsection

@section('nav-list')
    <li>
        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Subscriber</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="newuser.html" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>New User</a></li>        
            <li><a href="manageusers.html" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Manage Users</a></li>
       </ul>
    </li>
    
    <li>
        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="#" class=" hvr-bounce-to-right"><i class="fa fa-file-text-o nav_icon"></i>Financial</a></li>
            <li><a href="advertsfinancial.html" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Adverts</a></li>
            <li><a href="usersfinancial.html" class=" hvr-bounce-to-right"><i class="fa fa-file-text-o nav_icon"></i>Users</a></li>
       </ul>
    </li>
@endsection    

@section('content')

<!--banner-->	
    <div class="banner">	   
            <h2>
            <a href="dashboard.html">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>News</span>
            </h2>
    </div>
<!--//banner-->

 	<!--grid-->
 	<div class="grid-form">
 	
        <!----->
        <div class="grid-form1">
        <h4 id="forms-horizontal">Edit Post</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-center">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-horizontal" method="post"  action="{{ route('news.update' , ['id' => $post->id]) }}" enctype="multipart/form-data">

            {{-- csrf token --}}
            {{ csrf_field() }}

          <div class="form-group">
            <label for="title" class="col-sm-2 control-label hor-form">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="title" value="{{ $post->title }}" name="title" required>
            </div>
          </div>
          
          <div class="form-group">
            <label for="fileinput" class="col-sm-2 control-label hor-form">feature image</label>
            <div class="col-sm-10">
                <input type="file" id="image" name="featured">
            </div>	
          </div>
          
          <div class="form-group">
            <label for="content" class="col-sm-2 control-hor-form">content</label>
            <div class="col-sm-10">
                <textarea name="content" id="summernote" class="form-control" placeholder='description' required>
                    {{ $post->content }}
                </textarea>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" id="update" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp update</button>
            </div>
          </div>
        </form>
        </div>
        <!--//--grid-->

@endsection

@section('scripts')
<script src="{{ asset('dist/summernote.js') }}"></script> 
<script>  
    $(document).ready(function(){

         //wysiwig editor 
         $('#summernote').summernote({
             height: 400
         });
 
     });     
 </script>  
@endsection