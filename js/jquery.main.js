jQuery(document).ready(function($) {



//  
// Работа с попап
//  
  $('.overlay, .popup-close').on('click', function(){
    $('.popup').fadeOut(); 
    $('.overlay').fadeOut();
  });
  $('.action').on('click', function(){
    var event = $(this).data('event'),
    eventTitle = $(this).data('name');
    $('input[name="input_type"]').val(eventTitle);
    $('.overlay').fadeIn();
    $('.popup-' + event).centered_popup(); 
    $('.popup-' + event).fadeIn(); 
    return false;
  });

    
// Обработка форм на AJAX
  $.validator.addMethod("minlenghtage", function (value, element) {
      return (value.val() > 18 && value.val() < 100 );
  },
  "Введите нормальный возраст");
  
  $(".c_form").each(function(){
      $(this).validate({
          rules: {
              name: {
                required: true,
                  minlength: 3,
                  maxlength: 15
              },
              age: {
                required: true,
                  range: [18, 100]
                //minlenghtage: true
              }
          },
          submitHandler: function(form, event){
              event = event || window.event;
              $('.overlay').fadeOut(300);
              $('.popup').fadeOut();

              $(form).ajaxSubmit({
                  error: function(){
                    // После ошибки
                  },
                  success: function(responseText, statusText, xhr){

                        $('input').val('');

                        // Появление "спасибо"
                        $('.popup').fadeOut();
                        $('.popup-thy').centered_popup();
                        $('.overlay').fadeIn();
                        $('.popup-thy').fadeIn();

                        // Через 5 сек скрываем "спасибо"
                        setTimeout(function(){
                            $('.popup-thy').fadeOut(500);
                            $('.overlay').fadeOut(500);
                        }, 5 * 1000)
                  }
              });
              return false;
         }
      });
  });
  //
});

// Центрируем эелемент
$.fn.centered_popup = function(top) {
    this.css('position', 'absolute');
    this.css('left', ($(window).outerWidth() - this.outerWidth()) / 2 + $(window).scrollLeft() + 'px');
    if( top == 1 )
        this.css('top', $(window).scrollTop() + 'px');
    else
        this.css('top', ($(window).outerHeight() - this.outerHeight()) / 2 + $(window).scrollTop() + 'px');
}