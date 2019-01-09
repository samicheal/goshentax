

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

                             if (data.errors.expiration) 
                                 toastr.info(data.errors.expiration, 'warning Alert', {timeOut: 7000});
                             } //end of if 
 
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
        $("#company").on('blur' , function(){

           e.preventDefault(); //prevent default propagation

           //get company name
           let companyName = $(this).val();
        
           //ajax call to get company code
            $.ajax({

                 url: "{{ route('advert.codeGeneration') }}",
                 type: "POST",
                 data:  {name : companyName},
                 contentType: false,
                 cache: false,
                 processData:false,
                

                 success: function(data){
                    console.log(data.success);
                 }

            });



        });

    })
