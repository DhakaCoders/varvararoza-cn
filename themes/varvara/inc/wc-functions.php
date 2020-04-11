<?php 
defined( 'ABSPATH' ) || exit;

/*Remove Archive Woocommerce Hooks & Filters are below*/

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
function woo_hide_page_title() {
	
	return false;
	
}

/*Loop Hooks*/


/**
 * Add loop inner details are below
 */
 
 remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 4; // 3 products per row
    }
}

// change a number of the breadcrumb defaults.
add_filter( 'woocommerce_breadcrumb_defaults', 'cbv_woocommerce_breadcrumbs' );
if( !function_exists('cbv_woocommerce_breadcrumbs')):
function cbv_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<div class="breadcrumbs clearfix"><ul class="ulc clearfix">',
            'wrap_after'  => '</ul></div>',
            'before'      => '<li class="wclist">',
            'after'       => '</li>',
            'home'        => _x( 'home', 'breadcrumb', 'woocommerce' ),
        );
}
endif;

add_action('woocommerce_shop_loop_item_title', 'add_shorttext_below_title_loop', 5);
if (!function_exists('add_shorttext_below_title_loop')) {
	function add_shorttext_below_title_loop() {
		global $product, $woocommerce, $post;
        $product_thumb = '';
        $thumb_id = get_post_thumbnail_id($product->get_id());
        if(!empty($thumb_id)){
            $product_thumb = cbv_get_image_tag($thumb_id, 'prodgrid');
        }
		echo '<div class="product-grid-inr">
        <div class="product-grid-img"><a href="'.get_permalink( $product->get_id() ).'" class="overlay-link"></a>';
        echo $product_thumb;
        echo '</div>
        <div class="product-grid-title">
        <h5><a href="'.get_permalink( $product->get_id() ).'">'.get_the_title().'</a></h5>
        </div>';
        echo '<div class="taxo">
        	<span class="taxo1">Oil on Canvas</span>
        	<span class="taxo2">Artist name</span>
        </div>';
         echo '<div class="loop-price"><strong class="price-label">Price:</strong>'.$product->get_price_html().'</div>';
        echo '</div>';
	}
}

/* Single product*/

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


add_action('woocommerce_single_product_summary', 'add_custom_box_product_summary', 5);
if (!function_exists('add_custom_box_product_summary')) {
    function add_custom_box_product_summary() {
        global $product, $woocommerce, $post;
        $sh_desc = '';
        if( !empty($sh_desc) ) $sh_desc = $sh_desc;
        $sh_desc = $product->get_description();

        $proinfo = get_field('productsec', get_the_ID());
        $artistID = get_field('artist', get_the_ID());
        $spacifics = $proinfo['size'];

        echo '<div class="pro-details-pro-title">';
        echo '<strong>'.$product->get_title().'</strong>';
        echo '<div class="taxo">';
            if( !empty($proinfo['material']) ) printf('<span class="taxo1">%s</span>', $proinfo['material']);
            if( !empty($artistID) ):
                $artist = get_post( $artistID );
                if( $artist ):
                    printf('<span class="taxo2">%s</span>', $artist->post_title);
                endif;
            endif;
        echo '</div>';
        echo '</div>';
        echo '<div class="description">';
        echo '<h2>Description</h2>';
        echo wpautop( $sh_desc, true );
        echo '</div>';
        if( !empty($proinfo) ):
        echo'<div class="wc-attributes clearfix">';
        if( !empty($proinfo['material']) ) printf('<span><strong>Matarial:</strong> %s</span>', $proinfo['material']);
            if( !empty($proinfo) ):
                echo '<span><strong>Size:</strong>';
                if( !empty($spacifics['width']) ) printf(' %s%s', $spacifics['width'], $spacifics['sizename']);
                if( !empty($spacifics['height']) ) printf(' x %s%s', $spacifics['height'], $spacifics['sizename']);
                echo '</span>';
            endif;
        if( !empty($proinfo['created']) ) printf('<span><strong>Created:</strong> %s</span>', $proinfo['created']);
        echo '</div>';
        endif;
        echo'<div class="price-purchase clearfix">';
        if ($product->get_price() <= 0){
            echo '<button type="button" class="btn" data-toggle="modal" data-target="#enquire_modal">enquire</button>';
        }else{
            echo '<div class="pricehtml"><strong class="price">Price:</strong> '.$product->get_price_html().'</div>';
            echo '<a href="'.esc_url(home_url( '/' )).'checkout/?add-to-cart='.get_the_ID().'" class="btn btn-primary">'.__('Purchase!', 'your-domain').'</a>';
        }
    echo '<div class="fl-social-icons">
        <strong>Share this Article</strong>
        <ul class="clearfix ulc">
            <li><a href="#"><img src="'.THEME_URI.'/img/facebook.png"></a></li>
            <li><a href="#"><img src="'.THEME_URI.'/img/instagram.png"></a></li>
            <li><a href="#"><img src="'.THEME_URI.'/img/twitter.png"></a></li>
            <li><a href="#"><img src="'.THEME_URI.'/img/envelope.png"></a></li>
        </ul>
    </div>';
        echo'</div>';
    }
}
