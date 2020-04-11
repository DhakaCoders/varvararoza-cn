<?php 
/*
Template Name:Art Advisory
*/
get_header();
$thisID = 341;
if( !empty($thisID) ): 
$page = get_post( $thisID ); 
?>
<section class="page-banner">
  <div class="page-banner-controller" style="overflow: hidden;">
    <div class="page-banner-bg" style="background-image:url(<?php echo THEME_URI; ?>/img/page-bnr.jpg);">
    </div>
    <div class="page-banner-des">
        <div>
          <h1 class="page-banner-title"><?php echo $page->post_title; ?></h1>
          <?php echo wpautop($page->post_content); ?>
        </div>
    </div>
  </div>
</section><!-- end of page-banner -->
<?php endif; ?>
<section class="art-post-grid-sec-wrp">
	<div class="container-fluid">
	  <div class="row">
	  	<div class="col-sm-12">
	  	  <div class="art-post-grid-wrp">
	  	  	<ul>
	  	  	  <li>
	  	  	  	<div class="art-post-grid-inr">
	  	  	  	  <div class="art-post-grid-img" style="background:url(<?php echo THEME_URI;?>/img/art-post-grid-img.png);">
	  	  	  	  	<a href="#" class="overlay-link"></a>
	  	  	  	  </div>
	  	  	  	  <div class="art-post-grid-dsc">
	  	  	  	  	<span>04 JAN 2019</span>
	  	  	  	  	<h5 class="art-post-grid-tilte"><a href="#">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit.</a></h5>
	  	  	  	  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Praesent fermentum erat et lacus fermentum pulvinar.</p>
	  	  	  	  </div>
	  	  	  	</div>
	  	  	  </li>
	  	  	  <li>
	  	  	  	<div class="art-post-grid-inr">
	  	  	  	  <div class="art-post-grid-img" style="background:url(<?php echo THEME_URI;?>/img/art-post-grid-img.png);">
	  	  	  	  	<a href="#" class="overlay-link"></a>
	  	  	  	  </div>
	  	  	  	  <div class="art-post-grid-dsc">
	  	  	  	  	<span>04 JAN 2019</span>
	  	  	  	  	<h5 class="art-post-grid-tilte"><a href="#">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit.</a></h5>
	  	  	  	  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Praesent fermentum erat et lacus fermentum pulvinar.</p>
	  	  	  	  </div>
	  	  	  	</div>
	  	  	  </li>
	  	  	  <li>
	  	  	  	<div class="art-post-grid-inr">
	  	  	  	  <div class="art-post-grid-img" style="background:url(<?php echo THEME_URI;?>/img/art-post-grid-img.png);">
	  	  	  	  	<a href="#" class="overlay-link"></a>
	  	  	  	  </div>
	  	  	  	  <div class="art-post-grid-dsc">
	  	  	  	  	<span>04 JAN 2019</span>
	  	  	  	  	<h5 class="art-post-grid-tilte"><a href="#">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit.</a></h5>
	  	  	  	  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Praesent fermentum erat et lacus fermentum pulvinar.</p>
	  	  	  	  </div>
	  	  	  	</div>
	  	  	  </li>
	  	  	  <li>
	  	  	  	<div class="art-post-grid-inr">
	  	  	  	  <div class="art-post-grid-img" style="background:url(<?php echo THEME_URI;?>/img/art-post-grid-img.png);">
	  	  	  	  	<a href="#" class="overlay-link"></a>
	  	  	  	  </div>
	  	  	  	  <div class="art-post-grid-dsc">
	  	  	  	  	<span>04 JAN 2019</span>
	  	  	  	  	<h5 class="art-post-grid-tilte"><a href="#">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit.</a></h5>
	  	  	  	  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Praesent fermentum erat et lacus fermentum pulvinar.</p>
	  	  	  	  </div>
	  	  	  	</div>
	  	  	  </li>
	  	  	  <li>
	  	  	  	<div class="art-post-grid-inr">
	  	  	  	  <div class="art-post-grid-img" style="background:url(<?php echo THEME_URI;?>/img/art-post-grid-img.png);">
	  	  	  	  	<a href="#" class="overlay-link"></a>
	  	  	  	  </div>
	  	  	  	  <div class="art-post-grid-dsc">
	  	  	  	  	<span>04 JAN 2019</span>
	  	  	  	  	<h5 class="art-post-grid-tilte"><a href="#">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit.</a></h5>
	  	  	  	  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Praesent fermentum erat et lacus fermentum pulvinar.</p>
	  	  	  	  </div>
	  	  	  	</div>
	  	  	  </li>
	  	  	  <li>
	  	  	  	<div class="art-post-grid-inr">
	  	  	  	  <div class="art-post-grid-img" style="background:url(<?php echo THEME_URI;?>/img/art-post-grid-img.png);">
	  	  	  	  	<a href="#" class="overlay-link"></a>
	  	  	  	  </div>
	  	  	  	  <div class="art-post-grid-dsc">
	  	  	  	  	<span>04 JAN 2019</span>
	  	  	  	  	<h5 class="art-post-grid-tilte"><a href="#">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit.</a></h5>
	  	  	  	  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Praesent fermentum erat et lacus fermentum pulvinar.</p>
	  	  	  	  </div>
	  	  	  	</div>
	  	  	  </li>
	  	  	  <li>
	  	  	  	<div class="art-post-grid-inr">
	  	  	  	  <div class="art-post-grid-img" style="background:url(<?php echo THEME_URI;?>/img/art-post-grid-img.png);">
	  	  	  	  	<a href="#" class="overlay-link"></a>
	  	  	  	  </div>
	  	  	  	  <div class="art-post-grid-dsc">
	  	  	  	  	<span>04 JAN 2019</span>
	  	  	  	  	<h5 class="art-post-grid-tilte"><a href="#">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit.</a></h5>
	  	  	  	  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Praesent fermentum erat et lacus fermentum pulvinar.</p>
	  	  	  	  </div>
	  	  	  	</div>
	  	  	  </li>
	  	  	  <li>
	  	  	  	<div class="art-post-grid-inr">
	  	  	  	  <div class="art-post-grid-img" style="background:url(<?php echo THEME_URI;?>/img/art-post-grid-img.png);">
	  	  	  	  	<a href="#" class="overlay-link"></a>
	  	  	  	  </div>
	  	  	  	  <div class="art-post-grid-dsc">
	  	  	  	  	<span>04 JAN 2019</span>
	  	  	  	  	<h5 class="art-post-grid-tilte"><a href="#">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit.</a></h5>
	  	  	  	  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Praesent fermentum erat et lacus fermentum pulvinar.</p>
	  	  	  	  </div>
	  	  	  	</div>
	  	  	  </li>
	  	  	  <li>
	  	  	  	<div class="art-post-grid-inr">
	  	  	  	  <div class="art-post-grid-img" style="background:url(<?php echo THEME_URI;?>/img/art-post-grid-img.png);">
	  	  	  	  	<a href="#" class="overlay-link"></a>
	  	  	  	  </div>
	  	  	  	  <div class="art-post-grid-dsc">
	  	  	  	  	<span>04 JAN 2019</span>
	  	  	  	  	<h5 class="art-post-grid-tilte"><a href="#">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit.</a></h5>
	  	  	  	  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Praesent fermentum erat et lacus fermentum pulvinar.</p>
	  	  	  	  </div>
	  	  	  	</div>
	  	  	  </li>
	  	  	  <li>
	  	  	  	<div class="art-post-grid-inr">
	  	  	  	  <div class="art-post-grid-img" style="background:url(<?php echo THEME_URI;?>/img/art-post-grid-img.png);">
	  	  	  	  	<a href="#" class="overlay-link"></a>
	  	  	  	  </div>
	  	  	  	  <div class="art-post-grid-dsc">
	  	  	  	  	<span>04 JAN 2019</span>
	  	  	  	  	<h5 class="art-post-grid-tilte"><a href="#">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit.</a></h5>
	  	  	  	  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Praesent fermentum erat et lacus fermentum pulvinar.</p>
	  	  	  	  </div>
	  	  	  	</div>
	  	  	  </li>
	  	  	  <li>
	  	  	  	<div class="art-post-grid-inr">
	  	  	  	  <div class="art-post-grid-img" style="background:url(<?php echo THEME_URI;?>/img/art-post-grid-img.png);">
	  	  	  	  	<a href="#" class="overlay-link"></a>
	  	  	  	  </div>
	  	  	  	  <div class="art-post-grid-dsc">
	  	  	  	  	<span>04 JAN 2019</span>
	  	  	  	  	<h5 class="art-post-grid-tilte"><a href="#">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit.</a></h5>
	  	  	  	  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Praesent fermentum erat et lacus fermentum pulvinar.</p>
	  	  	  	  </div>
	  	  	  	</div>
	  	  	  </li>
	  	  	  <li>
	  	  	  	<div class="art-post-grid-inr">
	  	  	  	  <div class="art-post-grid-img" style="background:url(<?php echo THEME_URI;?>/img/art-post-grid-img.png);">
	  	  	  	  	<a href="#" class="overlay-link"></a>
	  	  	  	  </div>
	  	  	  	  <div class="art-post-grid-dsc">
	  	  	  	  	<span>04 JAN 2019</span>
	  	  	  	  	<h5 class="art-post-grid-tilte"><a href="#">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit.</a></h5>
	  	  	  	  	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Praesent fermentum erat et lacus fermentum pulvinar.</p>
	  	  	  	  </div>
	  	  	  	</div>
	  	  	  </li>
	  	  	</ul>
	  	  	<div class="art-load-more-btn">
	  	  	  <a href="#">LOAD MORE</a>
	  	  	</div>
	  	  </div>
	  	</div>
	  </div>
	</div>
</section>

<?php get_footer();?>