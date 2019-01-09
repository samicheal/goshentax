$(document).ready( function () {

    var notificationId;

    //load data table
    var table = $('#managePostTable').DataTable();

    //generate delete modal
    $(".deleteModal").on('click' , function(e , table){

        //generate message for span content
        let span = $(this).data('name');
        span += " ?";

        //insert title into span section
        $('#title').html(span);

        //generate message for notification segment
        notificationId = "Notification Id : #"; 
        notificationId += $(this).data('id');

        //insert notification id into span 
        $('#notificationId').html(notificationId);

        //append id to form
        $('#rowId').val($(this).data('id'));

        //add red color to notification id
        $('.content').find('h4').css("color" , "red");
       
        //show modal form
        $('#deleteModal').modal('show');

    })

    //delete post from table
    $('#deleteForm').on('submit' , function(e){
        
        e.preventDefault(); //prevent default propagation

        $.ajax({
             url: "{{ route('legislation.delete' , $legislation->id) }}",
             type: "POST",
             data: new FormData(this),
             contentType: false,
             cache: false,
             processData:false,
             beforeSend:function()
                 {
                     $(".delete").removeClass("glyphicon-ok-sign"); 
                     $(".delete").addClass("fa fa-refresh fa-spin");
                 },
     
             complete:function()
                 {
                     $(".delete").removeClass("fa fa-refresh fa-spin");
                     $(".delete").addClass("glyphicon-ok-sign"); 
                 },
             success: function(data)
                     {
                         console.log(data);
                         //check for success
                         if(data.success){
                            toastr.info('litigation successfully deleted', 'warning Alert', {timeOut: 7000}); 

                            //remove row and redraw
                             $('#managePostTable').DataTable().row('#'+data.id).remove().draw(); 

                            //delete modal
                            $('#deleteModal').modal('hide');  
                         }   

                         //check for failure
                         if(data.fail){
                            toastr.info('Could not delete litigation, contact administator', 'warning Alert', {timeOut: 7000}); 
                            $('#deleteModal').modal('hide');  
                         }  
                     }
         });

    });

});
</script> 