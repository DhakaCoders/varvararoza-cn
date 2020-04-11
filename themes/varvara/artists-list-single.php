<?php
/**
Template Name: Artists Single
 */

get_header(); ?>


<section class="page-banner">
  <div class="page-banner-controller" style="overflow: hidden;">
    <div class="page-banner-bg" style="background-image:url(<?php echo THEME_URI; ?>/img/page-bnr.jpg);">
    </div>
    <div class="page-banner-des">
        <div>
          <a href="#">BACK</a>
          <h1 class="page-banner-title" style="font-size: 42px;">Christina Papaioannou</h1>
          <p>painter</p>
        </div>
    </div>
  </div>
</section><!-- end of page-banner -->

<section class="artist-single-sec-wrp">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="artist-single-dsc-wrp">
          <div class="artist-single-img" style="background-image:url(<?php echo THEME_URI;?>/img/artist-single-img.png);">
            
          </div>
          <div class="artist-single-dsc">
            <h5 class="artist-single-title">Artist Bio</h5>
            <div class="gap-30"></div>
            <p>Christina Papaioannou is a young upcoming painter from Thessaloniki, Greece.<br>
            She has an Integrated Master’s degree from Athens School of Fine Arts. <br>
            Her work is in many private collections and has been exhibited across Greece, Cyprus and in London (J/M Gallery, <br>
            Notting Hill, 2019).</p>
            <p>In 2019 she won the MATAROA prize for upcoming artists at 4th Art Thessaloniki <br> International Contemporary Art Fair. In<br>
            2017 her work was published in International ArtMaze Magazine, Late Summer Issue <br> #4. She collaborates with Ikastikos <br>
            Kiklos Sianti Gallery, Athens.</p>
            <a href="#">Read more</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>