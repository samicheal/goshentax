@extends('layouts.master')


@section('title' , 'goshentax/admin/manage-news')


@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assests/plugins/datatables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection   


@section('content')

<!--banner-->	
<div class="banner">
	<h2>
        <a href="{{ route('dashboard') }}">Home</a>
        <i class="fa fa-angle-right"></i>
        <span>Adverts</span>
    </h2>	         
</div>
<!--//banner-->

<div class="grid-form">
 	
    <div class="grid-form1">
    <h4 id="forms-horizontal">Edit Advert</h4>

        @if($errors->any())
            @foreach ($errors->all() as $error)
                 <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> {{ $error }} </strong>
                 </div>     
            @endforeach
        @endif

        <form id="advertform" class="form-horizontal" method="POST" action="{{ route('advert.update' , ['id' => $advert->id]) }}" enctype="multipart/form-data">

            {{-- csrf_field --}}
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label hor-form">Title</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="title" value="{{ $advert->title }}" id="title" placeholder="title">
                </div>
            </div>
            
            <div class="form-group">
                <label for="fileinput" class="col-sm-2 control-label hor-form">Banner</label>
                <div class="col-sm-10">
                    <input type="file" name="banner" id="banner">
                </div>	
            </div>
            
            <div class="form-group">
                <label for="company" class="col-sm-2 control-label hor-form">Company</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="company" value="{{ $advert->company->name }}" id="company" placeholder="company">
                </div>
            </div>

            <div class="form-group cCode">
                <label for="company" class="col-sm-2 control-label hor-form">Company Code</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="companyId" value="{{ $advert->company->code }}" id="companyId" placeholder="company code" readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="amount" class="col-sm-2 control-label hor-form"></label>
                <div class="col-sm-10">
                    <span class="invisibility">
                    </span>
                </div>    
            </div>    
            
            <div class="form-group">
                <label for="amount" class="col-sm-2 control-label hor-form">Amount</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="amount" value="{{ $advert->amount }}"  id="amount" placeholder="amount">
                </div>
            </div>

            <div class="form-group">
                <label for="amount" class="col-sm-2 control-label hor-form">Amount Paid</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="amountPaid" value="{{ $advert->paid }}" id="amountPaid" placeholder="amount paid">
                </div>
            </div>
            
            <div class="form-group">
                <label for="date" class="col-sm-2 control-label hor-form">Expiration</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" name="expiration" value="" id="expiration" placeholder="expiration">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus create"></span> &nbsp update</button>
                </div>
            </div>

        </form>
    </div>
    
    <!---->
</div>

@endsection

@section('scripts')

<script>

//event for code inclusion on form
$("#company").on('keyup' , function(e){

    e.preventDefault(); //prevent default propagation

    //get company name
    let company = $(this).val();

    //ajax call to get company code
    $.ajax({

        url: "{{ route('advert.codeGeneration') }}",
        type: 'POST',
        data:  {'id' : company , '_token' : '{{ csrf_token() }}' },
        beforeSend:function()
                {
                    $(".cCode").addClass("hidden"); 
                    $(".invisibility").removeClass("hidden");
                    $(".invisibility").addClass("fa fa-refresh fa-spin");
                },
    
        complete:function()
                {
                    $(".cCode").removeClass("hidden"); 
                    $(".invisibility").addClass("hidden");
                    $(".invisibility").removeClass("fa fa-refresh fa-spin"); 
                },
        success: function(data){

            if(data.success.length != 0){
                $('#companyId').val(data.success);
                $('#companyId').attr('readonly' , 'readonly');
            }
            console.log(data);  
        }

 }); //end of ajax call

});
 
//check amount payment
$('#amountPaid').on('blur' , function(){

    //get amount
    let amount = $('#amount').val();
    
    if( amount - $(this).val() < 0){
            $(this).focus();
    }
             
});

//check amount payment
$('#amount').on('blur' , function(){

//get amount
let amountPaid = $('#amountPaid').val();

if( $(this).val() - amountPaid < 0){
        $(this).focus();
}
         
});
 

</script>

@endsection