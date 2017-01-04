$(document).ready(function() {

/*/====================================//
           NAVIGATION FADE IN
//===================================/*/

  $('#cta').delay(400).slideDown('slow'); //i dont know why this doesnt work sos

	$('nav').delay(600).slideDown('slow').fadeIn('slow');
    

/*/====================================//
           SMOOTH WINDOW SCROLL
//===================================/*/
    $(window).scroll( function(){

       if ($(this).scrollTop() > 650) {
            $('nav').addClass('fixed').fadeIn('slow');
        }
        else {
            $('nav').removeClass('fixed').fadeIn('slow');
        }

        /* Check the location of each desired element */
        $('.hideme').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},500);
                    
            }
            
        }); 
    
    });

    $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top-100
        }, 1000);
        return false;
      }
    }
  });
});
