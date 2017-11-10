(function($){
  $(function(){

    $('.button-collapse').sideNav();

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
  
  // Toggle search

    $('a#toggle-search').click(function()
    {
        var search = $('div#search');

        search.is(":visible") ? search.slideUp() : search.slideDown(function()
        {
            search.find('input').focus();
        });

        return false;
    });

  	
})(jQuery); // end of jQuery name space