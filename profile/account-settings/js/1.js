$('#edit').click(function(){
    $('#form').toggleClass('view');
    $('input').each(function(){
      var inp = $(this);
      if (inp.attr('readonly')) {
       inp.removeAttr('readonly');
      }
      else {
        inp.attr('readonly', 'readonly');
      }
    });
  });