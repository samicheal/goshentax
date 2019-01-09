$(document).ready(function() {

        //wysiwig editor 
        $('#summernote').summernote({
            height: 300
        });

        $("#newscreate").on('submit' , function(e){

            e.preventDefault(); //prevent default propagation

            $.ajax({
                url: "{{route('news.store')}}",
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
                            
                            //check if validation errors exist 
                            if ((data.errors)) {
                             console.log(data.errors);
                            //display error
                            if (data.errors.title) 
                                toastr.info(data.errors.title, 'warning Alert', {timeOut: 7000});
                            
                            if (data.errors.content) 
                                toastr.info(data.errors.content, 'warning Alert', {timeOut: 7000});

                            if (data.errors.content) 
                                toastr.info(data.errors.featured, 'warning Alert', {timeOut: 7000});    
                            
                            } //end of if 

                            //check for duplicates
                            if(data.alert)
                                toastr.info(data.alert, 'warning Alert', {timeOut: 7000});

                            //check for success
                            if(data.success){
                                toastr.info(data.success, 'warning Alert', {timeOut: 7000}); 
                                //form reset
                                $("#newscreate")[0].reset();
                                $('#summernote').html('');
                            }    
                        }
            });
        })

    });     
    

