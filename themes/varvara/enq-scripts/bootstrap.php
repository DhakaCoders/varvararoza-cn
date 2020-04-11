<?php
/**
Documentation
http://getbootstrap.com/
*/
wp_enqueue_style('bootstrap-select', get_template_directory_uri() . '/css/bootstrap-select.min.css', array(), '4.0.0');
wp_enqueue_script('bootstrap.select', get_template_directory_uri() . '/js/bootstrap-select.min.js', array('jquery'), '1.13.1', true);
?>