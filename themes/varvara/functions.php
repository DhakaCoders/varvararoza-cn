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

/**
Theme Setup->>
*/
if( !function_exists('cbv_theme_setup') ){
	
	function cbv_theme_setup(){
		add_theme_support( 'woocommerce' );
	}

}
add_action( 'after_setup_theme', 'cbv_theme_setup' );

/**
Enqueue Scripts->>
*/
function cbv_theme_scripts(){
    include_once( DIR . '/enq-scripts/theme.default.php' );
}

add_action( 'wp_enqueue_scripts', 'cbv_theme_scripts');
include_once( DIR . '/inc/wc-functions.php' );
/*
General Functions
- basic theme functions
*/
include_once( DIR . '/lib/functions/general.php' );

// Custom Post Types

include_once( DIR . '/lib/functions/cpt.php' );