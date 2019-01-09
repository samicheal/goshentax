@extends('layouts.master')


@section('title' , 'goshentax/legislation/edit')


@section('styles')
<link href="{{ asset('dist/summernote.css') }}" rel="stylesheet">
@endsection


@section('content')

<!--banner-->	
    <div class="banner">	   
            <h2>
            <a href="dashboard.html">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Legislation</span>
            </h2>
    </div>
<!--//banner-->

 	<!--grid-->
 	<div class="grid-form">
 	
        <div class="grid-form1">
        <h4 id="forms-horizontal">Edit {{ $litigation->title }}</h4>

        @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> {{ $error }} </strong>
                    </div> 
                @endforeach
        @endif

        <form class="form-horizontal" action="{{ route('legislation.update' , ['id' => $litigation->id]) }}" method="post" enctype="multipart/form-data">

            {{-- csrf token --}}
            {{ csrf_field() }}

          <div class="form-group">
            <label for="title" class="col-sm-2 control-label hor-form">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" value="{{ $litigation->title }}" placeholder="title" name="title" required>
            </div>
          </div>
          
          <div class="form-group">
            <label for="fileinput" class="col-sm-2 control-label hor-form">Upload Policy</label>
            <div class="col-sm-10">
                <input type="file" id="image" name="policy" >
            </div>	
          </div>
          
          <div class="form-group">
            <label for="content" class="col-sm-2 control-hor-form">Preamble</label>
            <div class="col-sm-10">
            <textarea name="contents" id="summernote" class="form-control" placeholder='description' required>
                {{ $litigation->excerpt }}    
            </textarea></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus create"></span> &nbsp update</button>
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
             height: 200
         });
 
         $("#legislate").on('submit' , function(e){
 
             e.preventDefault(); //prevent default propagation
            
             $.ajax({
                 url: "{{ route('legislation.store') }}",
                 type: "POST",
                 data:  new FormData(this),
                 contentType: false,
                 cache: false,
                 processData:false,
                 beforeSend:function()
                     {
                         $(".create").removeClass("glyphicon glyphicon-plus"); 
                         $(".create").addClass("fa fa-refresh fa-spin");
                     },
         
                 complete:function()
                     {
                         $(".create").removeClass("fa fa-refresh fa-spin");
                         $(".create").addClass("glyphicon glyphicon-plus"); 
                     },
                 success: function(data)
                         {
                            console.log(data);
                             //check if validation errors exist 
                             if ((data.errors)) {
                                console.log(data.errors);
                             //display error
                             if (data.errors.title) 
                                 toastr.info(data.errors.title, 'warning Alert', {timeOut: 7000});
                             
                             if (data.errors.policy) 
                                 toastr.info(data.errors.policy, 'warning Alert', {timeOut: 7000});
 
                             if (data.errors.contents) 
                                 toastr.info(data.errors.contents, 'warning Alert', {timeOut: 7000});    
                             
                             } //end of if 
 
                             //check for duplicates
                             if(data.alert)
                                 toastr.info(data.alert, 'warning Alert', {timeOut: 7000});
 
                             //check for success
                             if(data.success){
                                 toastr.info(data.success, 'warning Alert', {timeOut: 7000}); 
                                 //form reset
                                 $("#legislate")[0].reset();
                                 $('#summernote').summernote('code' , '');
                             }   
                         }
             });

         })
 
     });     
 </script>
@endsection