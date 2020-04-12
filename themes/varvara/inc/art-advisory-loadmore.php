<?php
/*
 * initial posts dispaly
 */

function art_script_load_more($args = array()) {
  $sorting ='';

  if( isset($_COOKIE['artsort']) && !empty($_COOKIE['artsort'])) $sorting = $_COOKIE['artsort'];

  echo '<ul class="clearfix" id="art-content">';
      ajax_art_script_load_more($args, $sorting);
  echo '</ul>';
  echo '<div class="art-load-more-btn">
  <div class="ajaxloading" id="ajxaloader" style="display:none"><img src="'.THEME_URI.'/img/loading.gif" alt="loader"></div>
   <a href="#" id="artloadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" >LOAD MORE</a>';
   echo '</div>';

}
/*
 * create short code.
 */
add_shortcode('ajax_art', 'art_script_load_more');


/*
 * load more script call back
 */
function ajax_art_script_load_more($args, $sort = 'DESC') {
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
    if(isset($_POST['sort']) && !empty($_POST['sort'])){
        $sort = $_POST['sort'];
    }
    if(isset($_POST['page']) && !empty($_POST['page'])){
        $paged = $_POST['page'] + $paged;
    }

    $query = new WP_Query(array( 
        'post_type'=> 'art_advisory',
        'post_status' => 'publish',
        'posts_per_page' =>$num,
        'paged'=>$paged,
        'orderby' => 'date',
        'order'=> $sort,
      ) 
    );
    if($query->have_posts()){
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
    <?php
    endwhile;
    }else{
      echo '0';
    }  
    
    wp_reset_postdata();
    
    //check ajax call
    if($ajax) wp_die();
}

/*
 * load more script ajax hooks
 */
add_action('wp_ajax_nopriv_ajax_art_script_load_more', 'ajax_art_script_load_more');
add_action('wp_ajax_ajax_art_script_load_more', 'ajax_art_script_load_more');