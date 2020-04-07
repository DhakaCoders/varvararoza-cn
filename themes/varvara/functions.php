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

/*
General Functions
- basic theme functions
*/
include_once( DIR . '/lib/functions/general.php' );

// Custom Post Types

include_once( DIR . '/lib/functions/cpt.php' );