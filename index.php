<?php get_header();?>

<div class="container">
    <div class="row">

        <div class="col-lg main-col">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post(); 
                    get_template_part( 'content', get_post_format() );
                endwhile;

            else :
                echo _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pretzel-cabin'); 
            
            endif;
            
            if (is_singular()) {
                pretzelcabin_displayPagination($page, $numpages, "pretzelcabin_pagelink_singular");

            } else {
                $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
                $pages = $wp_query->max_num_pages;

                pretzelcabin_displayPagination($paged, $pages, "get_pagenum_link");
            }
            ?>
        </div>

        <div class="col-lg-4 sidebar">
            <?php dynamic_sidebar('SideBar'); ?>
        </div>
    </div>  
</div>


<?php get_footer(); ?>
