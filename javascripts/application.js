$(function() {
  $('div.masthead nav').each(function() {
    var select = $(document.createElement('select')).appendTo($('div.mobile_nav'));
    var jumpto = $(document.createElement('option')).appendTo(select).val('').html('Jump to a section...');
    
    $('> ul li a', this).each(function() { 
      $(document.createElement('option')).appendTo(select).val(this.href).html($(this).html());
    });
    
    select.change(function(){
      window.location.href = this.value;
    });
  });
});