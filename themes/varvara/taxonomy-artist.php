<?php
get_header(); 
$ccat = get_queried_object();
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
<?php 
  $query = new Wp_Query(array(
    'post_type' => 'artists',
    'post_per_page' => -1,
    'orderby' => 'date',
    'order' => 'desc',
    'tax_query' => array(
      array(
          'taxonomy' => 'artist',
          'field'    => 'term_id',
          'terms'    => $ccat->term_id,
      ),
    ),
  ));
?>
<section class="al-post-grid-sec-wrp">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <?php if( $query->have_posts() ): ?>
        <div class="al-post-grid-block">
          <div class="al-post-grid-tabs-menu">
            <?php 
              $taxonomies = get_terms( array(
                  'taxonomy' => 'artist',
                  'hide_empty' => false
              ) );
            ?>
            <ul>
              <li><a href="<?php the_permalink( $thisID );?>">All</a></li>
              <?php if ( !empty($taxonomies) ) : ?>
              <?php 
              foreach( $taxonomies as $category ) {?>
                <li <?php echo ($category->slug == $ccat->slug)? 'class="active"': ''; ?>><a href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo $category->name; ?></a></li>
              <?php }?>
              <?php endif; ?>
            </ul>
            <div class="al-post-grid-wrp">
              <div class="al-post-grid-tabs">
                <div class="al-post-grid-inr">
                  <ul class="clearfix">
                    <?php 
                    while( $query->have_posts() ): $query->the_post(); 
                      $attach_id = get_post_thumbnail_id(get_the_ID());
                      if( !empty($attach_id) )
                        $artist_src = cbv_get_image_src($attach_id,'artistgrid');
                      else
                        $artist_src = '';
                    ?>
                    <li>
                      <div class="al-post-grid">
                        <div class="al-post-grid-img-overflow">
                          <div class="al-post-grid-img" style="background-image:url(<?php echo $artist_src; ?>);">
                            <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                          </div>
                        </div>
                        <div class="al-post-grid-dsc">
                          <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        </div>
                      </div>
                    </li>
                    <?php endwhile; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php else: ?>
          <div class="notfound">No results!</div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>