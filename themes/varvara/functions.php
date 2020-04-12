<?php
 /**
 * @author    Varvara Roza Galleries
 * @copyright 2019 The PHA Group
 * @version   1.0
 */

/*
Directory
- path to the current directory
*/

define( 'DIR', dirname( __FILE__ ) );
defined( 'THEME_URI' ) or define( 'THEME_URI', get_template_directory_uri() );
defined( 'HOMEID' ) or define( 'HOMEID', get_option('page_on_front') );
/**
Theme Setup->>
*/
if( !function_exists('cbv_theme_setup') ){
	
	function cbv_theme_setup(){
		add_theme_support( 'woocommerce' );
		add_image_size( 'artistgrid', 250, 255, true );
		add_image_size( 'exhgrid', 536, 370, true );
		add_image_size( 'artgrid', 388, 274, true );
	}

}
add_action( 'after_setup_theme', 'cbv_theme_setup' );

/**
Enqueue Scripts->>
*/
function cbv_theme_scripts(){
    //include_once( DIR . '/enq-scripts/popper.php' );
    //include_once( DIR . '/enq-scripts/selectric.php' );
}

add_action( 'wp_enqueue_scripts', 'cbv_theme_scripts');
include_once( DIR . '/inc/wc-functions.php' );
include_once( DIR . '/inc/product-loadmore.php' );
include_once( DIR . '/inc/art-advisory-loadmore.php' );
include_once( DIR . '/inc/cbv-functions.php' );
/*
General Functions
- basic theme functions
*/
include_once( DIR . '/lib/functions/general.php' );

// Custom Post Types

include_once( DIR . '/lib/functions/cpt.php' );