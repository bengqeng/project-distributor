
$('#phone_number').mask('+62 Z00 0000 0000 00', {
    translation: {
        'Z': {
            pattern: /[2-9]/,
        }
    }
});
