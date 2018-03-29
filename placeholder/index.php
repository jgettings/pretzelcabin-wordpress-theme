<?php get_header();?>

<div class="container placeholder-page">
    
    <div class="row">
        <div class="col-lg main-col">

            <div class="card">
                <h1 class="card-title">
                    Down for Maintenance
                </h1>
                <div class="card-body">
                    We are making some improvements to the look of the blog. Please try again in a few minutes. In the meantime,
                    check us out on social media!

                    <?php 
                    if (has_nav_menu('social')) {
                        wp_nav_menu(array(
                            'container' => false,
                            'menu_class' => 'nav row no-gutters justify-content-center',
                            'theme_location' => 'social',
                            'menu' => 'social',
                            'depth' => 0,
                            'walker' => new wp_bootstrap_navwalker(),
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'collapse' => true
                        ));
                    }
                    ?>
                </div>
          </div>

        </div>
    </div>

</div>


<?php get_footer(); ?>
