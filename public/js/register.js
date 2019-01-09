$('document').ready(function(){

    //registration
    $('.register').on('click' , function(){

        //check for registration cookies
        let email = Cookies.get("goshentaxappemail");
        let appId = Cookies.get("goshentaxappid");

        //read cookies
        if(typeof email === 'undefined' && typeof appId === 'undefined')
        {
            //add header
            $('.modal-header').find('h4').html("Subscribe");

            //add modal message
            $('.notification').html("Already subscribed!, click continue, otherwise click subscribe.");
            $('.notification').css("color" , "black");

            //add buttons
            $('.buttons').find('button').eq(0).html("subscribe");
            $('.buttons').find('button').eq(1).html("continue");

            //show subscribe form
            $('#subscribeModal').modal('show')
        }
        
    });

    //check radio button for group
    $('#group').click(
        function(){
            if($('#group').is(':checked')){
                $('#company').removeClass('hidden');
                $('#company').addClass('block');
            }
        }
    );

    $('#single').click(
        function(){
            if($('#single').is(':checked')){
                $('#company').removeClass('block');
                $('#company').addClass('hidden');
            }
        }
    );



});