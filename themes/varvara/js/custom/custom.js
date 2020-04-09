$(document).ready(function() {


	// target ie
	function addIEClasses() {
		var isIE = /*@cc_on!@*/ false || !!document.documentMode;
		var isEdge = !isIE && !!window.StyleMedia;
		if (isIE || isEdge) {
			$('body').addClass('ie-styles');
		}
	}
	addIEClasses()

});


	var $grid = $('.grid').masonry({
		columnWidth: '.grid-sizer',
		gutter: '.gutter-sizer',
		itemSelector: '.grid-item',
		horizontalOrder: true,
		percentPosition: true
	});

$grid.imagesLoaded( function() {
  $grid.masonry();
});

$(window).on('load', function() {
setTimeout( function () {


  $grid.masonry();


	}, 100 );

	$('.masthead__close').on('click', function() {
		$(this).toggleClass('active');
		$('.menu-overlay').toggleClass('active');
		$('header').toggleClass('menu-active');
		console.log('test');
		if ($(this).hasClass('active')) {
			$('.masthead__close__text').html('Close');
		} else {
			$('.masthead__close__text').html('Menu');
		}
	});


	$('.homepage__home-slider').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		cssEase: 'linear',
		dots: true,
		arrows: false,
		autoplay: false
	});

	$('.homepage__home-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
		var attr = $("[data-slick-index='" + nextSlide + "']").attr('data-attr');

		if (attr == 'white') {
			$('header').addClass('white-header');
			$('footer').addClass('white-footer');
			$('.slick-dots').addClass('white-dots');
		}
		if (attr == 'black') {
			$('header').removeClass('white-header');
			$('footer').removeClass('white-footer');
			$('.slick-dots').removeClass('white-dots');
		}

	});

	if ($('.slidecount-1').hasClass('colour-white')) {
		$('header').addClass('white-header');
	}


	lottie.loadAnimation({
		container: document.getElementById('lottie'), // the dom element that will contain the animation
		renderer: 'svg',
		loop: false,
		autoplay: true,
		path: 'wp-content/themes/varvara/js/Loading.json' // the path to the animation json
	});

	if ($('body').hasClass('home')) {
		$('header').addClass('home-header');
		$('footer').addClass('white-footer');
		$('.slick-dots').addClass('white-dots');
		$('body').addClass("active");
		setTimeout(function() {
			$('.homepage').addClass("fadein");
		}, 100);
		setTimeout(function() {
			AOS.init();

			$('.homepage').addClass('ready');
		}, 3500);

	} else {
		$('body').addClass("active");
		setTimeout(function() {
		AOS.init();
	}, 200);
	}

	$('section.exhibition-content .container-fluid').each(function() {
		if ($(this).find('img.alignleft').length) {
			$(this).addClass('textleft');
		} else if ($(this).find('img.alignright').length) {
			$(this).addClass('textright');
		}
	})



	$('section.global-exhibitions h6').matchHeight();

	$('.wpcf7-textarea').focus(function() {
  		$(this).addClass('focused');
  	});

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