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
    <h3 id="forms-horizontal">Create Advert</h3>
        <form id="advertform" class="form-horizontal" method="POST" action="{{ route('advert.store') }}" enctype="multipart/form-data">

            {{-- csrf_field --}}
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label hor-form">Title</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" placeholder="title">
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
                <input type="text" class="form-control" name="company" id="company" placeholder="company">
                </div>
            </div>

            <div class="form-group cCode">
                <label for="company" class="col-sm-2 control-label hor-form">Company Code</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="companyId" id="companyId" placeholder="company code" readonly>
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
                <input type="number" class="form-control" name="amount" id="amount" placeholder="amount">
                </div>
            </div>

            <div class="form-group">
                <label for="amount" class="col-sm-2 control-label hor-form">Amount Paid</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="amount paid">
                </div>
            </div>
            
            <div class="form-group">
                <label for="date" class="col-sm-2 control-label hor-form">Expiration</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" name="expiration" id="expiration" placeholder="expiration">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus create"></span> &nbsp create</button>
                </div>
            </div>

        </form>
    </div>
    
    <!---->
</div>

@endsection

@section('scripts')

<script>

$(document).ready(function(){

    //event for advert from
    $('#advertform').on('submit' , function(e){

        e.preventDefault(); //prevent default propagation

        $.ajax({
             url: "{{ route('advert.store') }}",
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
                          
                            //display error
                            if (data.errors.title) 
                                toastr.info(data.errors.title, 'warning Alert', {timeOut: 7000});
                            
                            if (data.errors.banner) 
                                toastr.info(data.errors.banner, 'warning Alert', {timeOut: 7000});

                            if (data.errors.company) 
                                toastr.info(data.errors.company, 'warning Alert', {timeOut: 7000});
                            
                            if (data.errors.amount) 
                                toastr.info(data.errors.amount, 'warning Alert', {timeOut: 7000}); 

                            if (data.errors.amountPaid) 
                                toastr.info(data.errors.amountPaid, 'warning Alert', {timeOut: 7000});     

                            if (data.errors.expiration) 
                                toastr.info(data.errors.expiration, 'warning Alert', {timeOut: 7000});
                         
                         } //end of if for validation

                         //error for amount paid
                         if (data.amountError) 
                             toastr.info("Amount paid cannot be greater than amount", 'warning Alert', {timeOut: 7000});

                         //error for amount paid
                         if (data.confirm) 
                             toastr.info("You are attempting to create a new company, ensure company name is accurrate. Click submit to create new company record with this advert. Company created cannot be deleted!", 'warning Alert', {timeOut: 15000});    

                         // temp : error for amount paid
                         if (data.coyId) 
                             toastr.info( data.coyId, 'warning Alert', {timeOut: 7000});  

                         //temp : error for amount paid
                         if (data.coyError == 1) 
                             toastr.info("Error creating company", 'warning Alert', {timeOut: 7000});  

                        //temp : error for amount paid
                         if (data.coyError == 2) 
                             toastr.info("Error updating company", 'warning Alert', {timeOut: 7000});           

                          //temp : here
                         if (data.here) 
                             toastr.info(data.here, 'warning Alert', {timeOut: 7000});     

                         //check for duplicates
                         if(data.alert)
                             toastr.info(data.alert, 'warning Alert', {timeOut: 7000});

                         //check for success
                         if(data.success){
                             toastr.success(data.success, 'warning Alert', {timeOut: 7000}); 
                             //form reset
                             $("#advertform")[0].reset();
                         }    
                     }
         });

    })

    //event for code inclusion on form
    $("#company").on('blur' , function(e){

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

}) 

</script>

@endsection