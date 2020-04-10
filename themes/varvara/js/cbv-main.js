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
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 575,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}

if( $('.ex-upcoming-slider').length ){
    $('.ex-upcoming-slider').slick({
      dots: true,
      infinite: false,
      arrows: false,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
    });
}

//banner animation
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  $('.page-banner-bg').css({
    '-webkit-transform' : 'scale(' + (1 + scroll/2000) + ')',
    '-moz-transform'    : 'scale(' + (1 + scroll/2000) + ')',
    '-ms-transform'     : 'scale(' + (1 + scroll/2000) + ')',
    '-o-transform'      : 'scale(' + (1 + scroll/2000) + ')',
    'transform'         : 'scale(' + (1 + scroll/2000) + ')'
  });
});

/*
----------------------
 Tabs Js
----------------------
*/

$('.al-post-grid-tabs:first').show();
$('.al-post-grid-tabs-menu ul li:first').addClass('active');

$('.al-post-grid-tabs-menu ul li').on('click',function(){
  index = $(this).index();
  $('.al-post-grid-tabs-menu ul li').removeClass('active');
  $(this).addClass('active');
  $('.al-post-grid-tabs').hide();
  $('.al-post-grid-tabs').eq(index).show();
});



});