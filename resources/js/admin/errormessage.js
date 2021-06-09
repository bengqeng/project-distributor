if ($("status-message")){
    setTimeout(function(e){
        $("#status-message").animate({ height: 0, opacity: 0 }, 'slow');
    },3000);
}
