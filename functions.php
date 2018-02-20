<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

include('functions_pagination.php');
include('functions_comments.php');

function pretzelcabin_scripts()
{
    wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/css/index.css');

    //TODO stop using cdn.
		wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
		wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'));
		wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/releases/v5.0.6/js/all.js');
		wp_enqueue_script('pretzel-cabin', get_stylesheet_directory_uri() . '/pretzel-cabin.js', array('jquery'));
}
add_action( 'wp_enqueue_scripts', 'pretzelcabin_scripts' );


register_nav_menus( array(
	'primary' => __('Primary Menu', 'pretzel-cabin'),
	'social' => __('Social Menu', 'pretzel-cabin')
) );

register_sidebar(array(
		'name' => __('SideBar', 'pretzel-cabin'),
		'id' => 'side-widgets',
		'before_widget' => '<div id="%1$s" class="widget card"><div class="card-body">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
    'description' => __( 'These widgets will display on the right side of the screen.', 'pretzel-cabin')
  ));

register_sidebar(array(
		'name' => __('Footer', 'pretzel-cabin'),
		'id' => 'footer-widgets',
    'before_widget' => '<div id="%1$s" class="widget col-sm">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
    'description' => __( 'These widgets will display in the footer.', 'pretzel-cabin')
  ));

function pretzelcabin_new_nav_menu_items($items, $args) {
	  if ($args->theme_location == 'social') {
	  	$rss = '<li class="menu-item col-auto nav-item">'
	  		.'<a title="RSS" href="' . get_bloginfo('rss2_url') . '" class="nav-link">'
	  		.'<i class="fas fa-rss"></i>'
	  		.'<span class="sr-only">RSS</span>'
	  		.'</a>'
	  		.'</li>';

	    return $rss . $items;
	  }
	  return $items;
}
add_filter('wp_nav_menu_items', 'pretzelcabin_new_nav_menu_items', 10, 2);


function pretzelcabin_excerpt_more($more) {
    return sprintf('... <a class="read-more" href="%1$s">%2$s</a>',
        get_permalink(get_the_ID()),
        __('Read More', 'pretzel-cabin')
    );
}
add_filter('excerpt_more', 'pretzelcabin_excerpt_more');


require_once('util/wp-bootstrap-navwalker.php');

add_theme_support('title-tag');

// remove this for prod
define('WP_SCSS_ALWAYS_RECOMPILE', true);
