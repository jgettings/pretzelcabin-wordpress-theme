<?php get_header();?>

<?php get_sidebar(); ?>


<?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            get_template_part( 'content', get_post_format() );
        endwhile;					
    else :
        get_template_part( 'content', 'none' );
    endif;


the_posts_pagination( array(
    'prev_text'          => __( '&lt;&lt;', 'pretzel-cabin'),
    'next_text'          => __( '&gt;&gt;', 'pretzel-cabin'),
    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'pretzel-cabin' ) . ' </span>',
) ); 

?>        



<?php get_footer(); ?>
