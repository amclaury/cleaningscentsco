(function($){
  $(function(){

    $('.button-collapse').sideNav();

    $(".dropdown-button").dropdown();

    $('ul.tabs').tabs();

    $('.slider').slider({
    	indicators: false,
    	height: 500
    });

    /*$('.carousel.carousel-slider').carousel
    	({
    	fullWidth: true,
    	indicators: true

    	});

    setInterval(function() {
    $('.carousel.carousel-slider').carousel('next');
  }, 5000);*/
  }); 

  	
})(jQuery); // end of jQuery name space