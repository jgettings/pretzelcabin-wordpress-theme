<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
  <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
  
  <link rel="profile" href="https://gmpg.org/xfn/11" />
  <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
  <meta name="p:domain_verify" content="32c8b916853cfc1c8199870049dfa8ae"/>

	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>	

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

	<?php
	if (is_singular()) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_head();
	?>   
</head>

<body <?php body_class(); ?>>
  <div style="display: none">
      <p>
      	<a href="#content">
      		<?php _e( 'Skip to content', 'pretzel-cabin' ); ?>		
      	</a>
      </p>
  </div>

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="navbar-background"></div>
	  <a class="navbar-brand h2" href="<?php echo esc_url( home_url()); ?>">
	  	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pretzelcabin_logo.png"
	  		width="50" height="50"
	  		class="d-inline-block align-top" alt="Pretzel Cabin Logo">
	  	<?php bloginfo( 'name' ); ?>
	  </a>
		<div class="nav-height-spacer"></div>

	  <?php if (has_nav_menu('primary') || has_nav_menu('social')): ?>
		  <button class="navbar-toggler" type="button" data-toggle="collapse"
		  	data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
		  	aria-expanded="false" aria-label="Toggle navigation"
		  >
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <?php
	    if (has_nav_menu('social')) {
        wp_nav_menu(array(
        	'container' => false,
        	'menu_class' => 'nav row no-gutters justify-content-center',
        	'theme_location' => 'social',
        	'menu' => 'social',
				  'depth' => 0,
				  'walker' => new wp_bootstrap_navwalker(),
				  'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
				  'collapse' => true
				));
      }

	    if (has_nav_menu('primary')){
        wp_nav_menu(array(
        	'container' => false,
        	'menu_class' => 'navbar-nav main-menu ml-auto',
        	'theme_location' => 'primary',
        	'menu' => 'top_menu',
				  'depth' => 2,
				  'walker' => new wp_bootstrap_navwalker(),
				  'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback'
				));
      }
      ?>
 	    </div>
    <?php endif; ?>
	</nav>
