<?php
/*
 * initial posts dispaly
 */

function products_script_load_more($args = array()) {
  $sorting =$termid = $artist = $method = $arttype ='';
  $ccat = get_queried_object();
  if( $ccat ) $termid = @$ccat->term_id;
  if( isset($_COOKIE['sorting']) && !empty($_COOKIE['sorting'])) $sorting = $_COOKIE['sorting'];
  if( isset($_GET['artist-id']) && !empty($_GET['artist-id'])) $artist = $_GET['artist-id'];
  if( isset($_GET['method']) && !empty($_GET['method'])) $method = $_GET['method'];
  if( isset($_GET['arttype']) && !empty($_GET['arttype'])) $arttype = $_GET['arttype'];
  echo '<ul class="product-lists clearfix" id="ajax-content">';
      ajax_products_script_load_more($args, $termid, $artist, $method, $arttype, $sorting);
  echo '</ul>';
  echo '<div class="fl-load-more-btn">
  <div class="ajaxloading" id="ajxaloader" style="display:none"><img src="'.THEME_URI.'/img/loading.gif" alt="loader"></div>
   <a href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" >LOAD MORE</a>';
   echo '</div>';

}
/*
 * create short code.
 */
add_shortcode('ajax_products', 'products_script_load_more');


/*
 * load more script call back
 */
function ajax_products_script_load_more($args, $term_id = '', $artist= '', $method= '', $arttype= '', $sort = 'DESC') {
    //init ajax
    $ajax = false;
    //check ajax call or not
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $ajax = true;
    }
    //number of posts per page default
    $num = 4;
    //page number
    $paged = 1;
    if(isset($_POST['artist']) && !empty($_POST['artist'])){
      $artist = $_POST['artist'];
    }
    if(isset($_POST['method']) && !empty($_POST['method'])){
      $method = $_POST['method'];
    }
    if(isset($_POST['arttype']) && !empty($_POST['arttype'])){
      $arttype = $_POST['arttype'];
    }

    if(isset($_POST['page']) && !empty($_POST['page'])){
        $paged = $_POST['page'] + $paged;
    }
    $termQuery = $metaQuery = '';

    if( !empty($method) && !empty($arttype)){
      $termQuery = array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'methods',
          'field' => 'slug',
          'terms' => $method
        ),
        array(
          'taxonomy' => 'art_type',
          'field' => 'slug',
          'terms' => $arttype
        )
      );
    } elseif( !empty($method) && empty($arttype) ){
      $termQuery = array(
        array(
          'taxonomy' => 'methods',
          'field' => 'slug',
          'terms' => $method
        )
      );
    } elseif( empty($method) && !empty($arttype) ){
      $termQuery = array(
        array(
          'taxonomy' => 'art_type',
          'field' => 'slug',
          'terms' => $arttype
        )
      );
    }

    if( !empty($artist)){
      $metaQuery = array(array(
            'key'     => 'artist',
            'value'   => $artist,
            'compare' => '=',
        )
    );
    }
    $query = new WP_Query(array( 
        'post_type'=> 'product',
        'post_status' => 'publish',
        'posts_per_page' =>$num,
        'paged'=>$paged,
        'orderby' => 'date',
        'order'=> $sort,
        'tax_query' => $termQuery,
        'meta_query' => $metaQuery
      ) 
    );
    if($query->have_posts()){
    while($query->have_posts()): $query->the_post();
      global $product, $woocommerce, $post;
      $thumb_id = get_post_thumbnail_id($product->get_id());
      if(!empty($thumb_id)){
          $product_thumb = cbv_get_image_tag($thumb_id, 'prodgrid');
      }
      $proinfo = get_field('productsec', get_the_ID());
      $artistID = get_field('artist', get_the_ID());
      $spacifics = $proinfo['size'];
    ?>
    <li class="product-list gallery-col">
        <div class="product-grid-inr">
            <div class="fl-product-grd-img"><a href="<?php echo get_permalink( $product->get_id() ); ?>" class="overlay-link"></a>
            <?php echo $product_thumb; ?>
            </div>
            <div class="fl-product-grd-des">
              <h5 class="fl-product-grd-title"><a href="<?php echo get_permalink( $product->get_id() ); ?>"><?php echo get_the_title(); ?></a></h5>
              <div class="fl-taxo">
                <?php 
                  if( !empty($proinfo['material']) ) printf('<span class="fl-taxo1">%s</span>', $proinfo['material']);
                  if( !empty($artistID) ):
                      $artist = get_post( $artistID );
                      if( $artist ):
                          printf('<span class="fl-taxo2">%s</span>', $artist->post_title);
                      endif;
                  endif;
                ?>
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
    <?php
    endwhile;
    }else{
      //echo '<div class="postnot-found" style="text-align:center; padding:20px 0;">No results!</div>';
      echo '<style>.fl-load-more-btn{display:none;}</style>';
    }  
    
    wp_reset_postdata();
    
    //check ajax call
    if($ajax) wp_die();
}

/*
 * load more script ajax hooks
 */
add_action('wp_ajax_nopriv_ajax_products_script_load_more', 'ajax_products_script_load_more');
add_action('wp_ajax_ajax_products_script_load_more', 'ajax_products_script_load_more');