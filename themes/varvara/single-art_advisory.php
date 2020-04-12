<?php 
get_header();
while( have_posts() ): the_post();
?>


<section class="page-banner art-page-banner">
  <div class="page-banner-controller" style="overflow: hidden;">
    <div class="page-banner-bg" style="background-image:url(<?php echo THEME_URI; ?>/img/page-bnr.jpg);">
    </div>
    <div class="page-banner-des">
        <div>
          <a href="javascript:history.back()">BACK</a>
          <h1 class="page-banner-title"><?php the_title(); ?></h1>
          <p><?php echo get_the_date('d M Y');?></p>
        </div>
    </div>
  </div>
</section><!-- end of page-banner -->

<section class="art-article-content-sec-wrp">
	<div class="container-fluid">
	  <div class="row">
	  	<div class="col-sm-12">
	  	  <div class="art-article-content-block">
	  	  	<div class="art-article-dsc-wrp clearfix">
	  	  	<?php 
			while ( have_rows('flcontent') ) : the_row(); 
          		if( get_row_layout() == 'flimage' ){
          			$fcimage = get_sub_field('fcimage');
	          		if( !empty($fcimage) ){
	                  echo '<div class="art-article-fl-img" style="background:url('.cbv_get_image_src($fcimage, 'plategrid').');"></div>';
	                }
          		} elseif( get_row_layout() == 'flcontent' ) {
					$fccontent = get_sub_field('fccontent');
		            echo '<div class="art-article-dsc">';
		               if( !empty( $fccontent ) ) echo wpautop($fccontent);
		            echo '</div>';  
          		} elseif( get_row_layout() == 'flgallery' ) {
          		  $gallery_cn = get_sub_field('fcgallery');
	              if( $gallery_cn ):
	              echo '<div class="art-article-gallery-wrp clearfix">';
	              	$imgsrc = '';
	                foreach( $gallery_cn as $image ):
	                $imgsrc = cbv_get_image_src($image, 'gallerygrid');  
	                echo '<div class="art-article-gallery-grid">';
	                echo '<div class="art-article-gallery-img" style="background:url('.$imgsrc.');"></div>';
	                echo "</div>";
	                endforeach;
	              echo "</div>";
	          		endif;

          		}
          	endwhile;
	  	  	?>
	  	  	  <div class="art-article-share">
	  	  	  	<strong>Share this Article</strong>
	  	  	  	<a href="#"><img src="<?php echo THEME_URI;?>/img/facebook.png"></a>
	  	  	  	<a href="#"><img src="<?php echo THEME_URI;?>/img/instagram.png"></a>
	  	  	  	<a href="#"><img src="<?php echo THEME_URI;?>/img/twiter.png"></a>
	  	  	  	<a href="#"><img src="<?php echo THEME_URI;?>/img/email.png"></a>
	  	  	  </div>
	  	  	</div>
	  	  </div>
	  	</div>
	  </div>
	</div>
</section>
<?php 
    $query = new WP_Query(array( 
        'post_type'=> 'art_advisory',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order'=> 'desc',
        'post__not_in' => array(get_the_ID())
      ) 
    );
    if($query->have_posts()):
?>
<section class="read-also-post-grid-sec-wrp">
	<div class="container-fluid">
	  <div class="row">
	  	<div class="col-sm-12">
	  	  <div class="art-post-grid-wrp clearfix">
	  	  	 <div class="wide-title" data-aos="fade"><div class="line"></div><div class="title">Read also</div><div class="line"></div></div>
	  	  	<ul class="clearfix">
	  	  		<?php 
				    $art_thumb = '';
				    while($query->have_posts()): $query->the_post();
				      $thumb_id = get_post_thumbnail_id(get_the_ID());
				      if(!empty($thumb_id)){
				        $art_thumb = cbv_get_image_src($thumb_id, 'artgrid');
				      }
				      $excerpt = get_field('overview', get_the_ID());
	  	  		?>
	  	  	  <li>
	  	  	  	<div class="art-post-grid-inr">
			        <div class="art-post-grid-img" style="background:url(<?php echo $art_thumb;?>);">
			          <a href="<?php echo get_permalink(); ?>" class="overlay-link"></a>
			        </div>
			        <div class="art-post-grid-dsc">
			          <span><?php echo get_the_date('d M Y');?></span>
			          <h5 class="art-post-grid-tilte">
			            <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
			          </h5>
			          <?php if( !empty($excerpt['excerpt']) ) echo wpautop( $excerpt['excerpt'] ); ?>
			        </div>
		      	</div>
	  	  	  </li>
	  	  	<?php endwhile; ?>
	  	  	</ul>
	  	  	<div class="art-load-more-btn">
	  	  	  <a href="<?php echo home_url('art-advisory'); ?>">Back to all news</a>
	  	  	</div>
	  	  </div>
	  	</div>
	  </div>
	</div>
</section>
<?php endif; wp_reset_postdata();?>
<?php endwhile; ?>
<?php get_footer();?>