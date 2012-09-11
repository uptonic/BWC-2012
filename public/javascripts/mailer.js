$(function(){
  
  $("#email-form").submit(function(event) {
  
    // cancel event bubbling
    event.preventDefault();
  
    // empty the log and show the spinning indicator.
  	var $log = $('#log').empty();
	  
	  var $form = $(this),
      name      = $form.find('input[name="name"]').val(),
      email     = $form.find('input[name="email"]').val(),
      phone     = $form.find('input[name="phone"]').val(),
      comments  = $form.find('textarea[name="comments"]').val(),
      referral  = $form.find('select[name="referral"] option:selected').val(),
      url       = $form.attr( 'action' );
	  
    $.post( url, { name: name, email: email, phone: phone, comments: comments, referral: referral },
      function(data) {
        // set log to PHP form response
        $log.html(data).fadeIn();
        
        // in case we successfully submitted the form
        // disallow further submissions
        if ($log.find('div').hasClass('success')){
          $('#email-form').bind('submit', function() { return false; });
        }
      }
    );
  });

});