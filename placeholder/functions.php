<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if ( ! isset( $content_width ) ) $content_width = 700;


function pretzelcabin_scripts()
{
    wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/css/index.css');

    wp_enqueue_script('font-awesome', get_stylesheet_directory_uri() . '/js/fontawesome.js', array(), '5.0.6');
}
add_action( 'wp_enqueue_scripts', 'pretzelcabin_scripts' );

register_nav_menus( array(
	'social' => __('Social Menu', 'pretzel-cabin')
) );

require_once('util/wp-bootstrap-navwalker.php');
