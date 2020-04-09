$(document).ready(function() {



	/*
--------------------
 About Slider
--------------------
*/
if( $('.AboutInterviewSlider').length ){
    $('.AboutInterviewSlider').slick({
      dots: true,
      infinite: false,
      arrows: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
    });
}



});