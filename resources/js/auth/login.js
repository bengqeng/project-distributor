
$('#phone_number').mask('+62 Z00 0000 0000 00', {
    translation: {
        'Z': {
            pattern: /[2-9]/,
        }
    }
});

$(function (){
    $('#LoginWithHP').on('click', function(e){
        $('.form-login-email').css('display', 'none');
        $('.form-login-hp').css('display', 'inline');
        e.preventDefault();
    });
});

$(function (){
    $('#LoginWithEmail').on('click', function(e){
        $('.form-login-hp').css('display', 'none');
        $('.form-login-email').css('display', 'inline');
        e.preventDefault();
    });
});
