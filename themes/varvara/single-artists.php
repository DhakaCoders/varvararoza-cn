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
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  $query = new WP_Query(array( 
    'post_type'=> 'product',
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'desc',
    'meta_query' => array(array(
            'key'     => 'artist',
            'value'   => get_the_ID(),
            'compare' => '=',
        )
      ),
    ) 
  );  
  if( $query->have_posts() ):
  ?>

<section class="related-products clearfix">
  <div class="wide-title"><div class="line"></div>
    <div class="title">Related Products</div>
    <div class="line"></div>
  </div>
  <ul class="product-lists clearfix">
    <?php 
    $product_thumb = '';
    while($query->have_posts()): $query->the_post(); 
    global $product, $woocommerce, $post;
    $thumb_id = get_post_thumbnail_id($product->get_id());
    if(!empty($thumb_id)){
        $product_thumb = cbv_get_image_tag($thumb_id, 'prodgrid');
    }
    ?>
    <li class="product-list gallery-col">

    <div class="product-grid-inr">
    <div class="fl-product-grd-img"><a href="<?php echo get_permalink( $product->get_id() ); ?>" class="overlay-link"></a>
    <?php echo $product_thumb; ?>
    </div>
    <div class="fl-product-grd-des">
        <h5 class="fl-product-grd-title"><a href="<?php echo get_permalink( $product->get_id() ); ?>"><?php echo get_the_title(); ?></a></h5>
        <div class="fl-taxo">
          <span class="fl-taxo1">Oil on Canvas</span>
          <span class="fl-taxo2">Artist name</span>
        </div>
    </div>
    <div class="wc-enquire">
      <?php
       if ($product->get_price() <= 0){
      ?>
      <a href="#">Enquire</a>
      <?php }else{ ?>
        <div class="loop-price">
              <strong class="price-label">Price:</strong><?php echo $product->get_price_html(); ?>
            </div>
      <?php } ?>
    </div>
     
    </div>
    </li>
    <?php endwhile; 
    $shopID = get_option( 'woocommerce_shop_page_id' );
    ?>
  </ul>
  <div class="allproducts">
    <a href="<?php echo get_permalink($shopID); ?>">All Products</a>
  </div>
</section> 
<?php endif; wp_reset_postdata(); ?> 
<?php endwhile; ?>
<?php get_footer(); ?>