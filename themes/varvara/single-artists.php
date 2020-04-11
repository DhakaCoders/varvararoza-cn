<?php
/**
Template Name: Artists List
 */

get_header(); 
while( have_posts() ): the_post();
$category = get_the_terms( get_the_ID(), 'artist' );
$term_name = '';
if($category && ! is_wp_error( $category )):
  foreach($category as $cat){
    $term_name = $cat->name;
  }
endif;
?>

<section class="page-banner">
  <div class="page-banner-controller" style="overflow: hidden;">
    <div class="page-banner-bg" style="background-image:url(<?php echo THEME_URI; ?>/img/page-bnr.jpg);">
    </div>
    <div class="page-banner-des">
        <div>
          <a href="javascript:history.back()">BACK</a>
          <h1 class="page-banner-title" style="font-size: 42px;"><?php the_title(); ?></h1>
          <?php if( !empty($term_name) ) printf('<p>%s</p>', $term_name); ?>
        </div>
    </div>
  </div>
</section><!-- end of page-banner -->

<section class="artist-single-sec-wrp">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="artist-single-dsc-wrp">
          <?php 
            $attach_id = get_post_thumbnail_id(get_the_ID());
            if( !empty($attach_id) ):
              $artist_src = cbv_get_image_src($attach_id);
          ?>
          <div class="artist-single-img" style="background-image:url(<?php echo $artist_src;?>);">
            
          </div>
          <?php endif; ?>
          <div class="artist-single-dsc">
            <h5 class="artist-single-title">Artist Bio</h5>
            <div class="gap-30"></div>
            <?php the_content(); ?>
            <a href="#">Read more</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>