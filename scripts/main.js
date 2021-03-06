if(window.history.replaceState){
    window.history.replaceState(null, null, window.location.href);
}

$('.client').owlCarousel({
    loop:true,
    margin:30,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})

//functions for submit email

function sendEmail(){
    var name = $("#name");
    var email = $("#email");
    var subject = $("#message");

    if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(message)){
        $.ajax({
            url: 'sendEmail.php',
            method: 'POST',
            dataType: 'json',
            data:{
                name: name.val(),
                email: email.val(),
                message: message.val(),
            }, success: function(response){
                $('#contactForm')[0].reset();
                $('.sent-notification').text("Message sent seccessfully.");
            }
        })
    }
} 
function isNotEmpty(caller){
    if(caller.val() == ""){
        caller.css('border','1px solid red');
        return false;
    }
    else{
        caller.css('border', '');
        return true;
    }
}
