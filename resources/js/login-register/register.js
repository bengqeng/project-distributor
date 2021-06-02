require('./bootstrap_bundle');

if ($('div.success-message-registration')){
  setTimeout(function() {
    $("div.success-message-registration").delay(2000).fadeOut('slow');
  }, 5000);
}