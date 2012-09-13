$(function(){
    
  $("#email-form").submit(function(event) {    
    // cancel event
    event.preventDefault();
    
    // empty the log and show the spinning indicator.
  	var $log = $('#log').hide().empty();

	  var $form = $(this),
      name      = $form.find('input[name="name"]').val(),
      email     = $form.find('input[name="email"]').val(),
      phone     = $form.find('input[name="phone"]').val(),
      comments  = $form.find('textarea[name="comments"]').val(),
      referral  = $form.find('select[name="referral"] option:selected').val(),
      url       = $form.attr('action');
	  
	  var $submit = $form.find('input[type="submit"]');
	  var originalSubmitLabel = $submit.val();
    
    // Change the label on the submit button and disable it
	  $submit.val('Submitting request...').attr('disabled', true);
    
    $.post( url, { name: name, email: email, phone: phone, comments: comments, referral: referral },
      function(data) {
        // set log to PHP form response
        $log.html(data).animate({
          opacity: ['toggle', 'swing'],
          height: ['toggle', 'swing']
        }, 'fast');  
        
        // in case we successfully submitted the form
        // disallow further submissions        
        if ($log.find('div').hasClass('success')){
          $submit.css('visibility', 'hidden');
        } else {
          $submit.val(originalSubmitLabel).removeAttr('disabled');
        }
      }
    );
  });

});