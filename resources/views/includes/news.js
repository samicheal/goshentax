$(document).ready(function() {

    $('#summernote').summernote({
        height: 300
    });

    $("#newscreate").on('submit' , function(e){

        e.preventDefault(); //prevent default propagation

        console.log('yellow');

        $.ajax({
            url: "{{ route('news.store') }}",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
                    {
                        console.log(data);
                    }
        });
    })
    
});