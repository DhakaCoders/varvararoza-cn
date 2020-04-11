(function($) {



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

/*$('.al-post-grid-tabs:first').show();
$('.al-post-grid-tabs-menu ul li:first').addClass('active');

$('.al-post-grid-tabs-menu ul li').on('click',function(){
  index = $(this).index();
  $('.al-post-grid-tabs-menu ul li').removeClass('active');
  $(this).addClass('active');
  $('.al-post-grid-tabs').hide();
  $('.al-post-grid-tabs').eq(index).show();
});*/


if($("#catID").length){
  var catID = $("#catID").data('termid');
}

function catId(){
  if(catID != '')
    return catID;
  else
    return false;
}


$("#loadMore").on('click', function(e) {
    e.preventDefault();
    var catID = '';
    if(catId() != '') catID = catId();
    //init
    var that = $(this);
    var page = $(this).data('page');
    var newPage = page + 1;
    var ajaxurl = that.data('url');
    //ajax call
    $.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
            page: page,
            cat_id: catID,
            el_li: 'not',
            action: 'ajax_products_script_load_more'
        },
        beforeSend: function ( xhr ) {
            $('#ajxaloader').show();
             
        },
        
        success: function(response ) {
            //check
            console.log(response);
            if (response  == 0) {
                $('.fl-load-more-btn').prepend('<div class="clearfix"></div><div class="text-center"><p>Geen producten meer om te laden.</p></div>');
                $('.fl-load-more-btn').hide();
                $('#ajxaloader').hide();
            } else {
                $('#ajxaloader').hide();
                that.data('page', newPage);
                $('#ajax-content').append(response.substr(response.length-1, 1) === '0'? response.substr(0, response.length-1) : response);
            }
        },
        error: function(response ) {
            console.log('asdfsd');
        },
    });
});

$("#artloadMore").on('click', function(e) {
    e.preventDefault();
    //init
    var that = $(this);
    var page = $(this).data('page');
    var newPage = page + 1;
    var ajaxurl = that.data('url');
    //ajax call
    $.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
            page: page,
            el_li: 'not',
            action: 'ajax_art_script_load_more'
        },
        beforeSend: function ( xhr ) {
            $('#ajxaloader').show();
             
        },
        
        success: function(response ) {
            //check
            console.log(response);
            if (response  == 0) {
                //$('.art-load-more-btn').prepend('<div class="clearfix"></div><div class="text-center"><p>Geen producten meer om te laden.</p></div>');
                $('.art-load-more-btn').hide();
                $('#ajxaloader').hide();
            } else {
                $('#ajxaloader').hide();
                that.data('page', newPage);
                $('#art-content').append(response.substr(response.length-1, 1) === '0'? response.substr(0, response.length-1) : response);
            }
        },
        error: function(response ) {
            console.log('asdfsd');
        },
    });
});

if( $("#shopUrl").length ){
  var SURL = $("#shopUrl").data('url');
}

$('#artist_name').on('change', function(){               
  var artist = $(this).val();
  window.location.href = SURL+'?artist-id='+artist;
});

$('#methods').on('change', function(){               
  var methods = $(this).val();
  window.location.href = SURL+'?method='+methods;
});

$('#art-type').on('change', function(){               
  var arttype = $(this).val();
  window.location.href = SURL+'?arttype='+arttype;
});

$('#sortproduct').on('change', function(){               
  var campSort = $(this).val();
  setCookie('sorting', campSort, 1);
  window.location.href = SURL;
});

})(jQuery);

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}