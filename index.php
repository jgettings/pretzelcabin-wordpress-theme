<?php get_header();?>

<div class="container-fluid">
    <div class="row">

        <div class="col-lg archive-col">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>

                    <div class="card">

                        <?php
                        if (has_post_thumbnail()) :
                            the_post_thumbnail('', array('class' => 'card-img-top', 'alt' => 'Image for ' . get_the_title()));
                        endif;
                        ?>

                        <div class="card-body">

                            <h3 class="card-title">
                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>">
                                    <?php the_title(); ?>    
                                </a>
                            </h3>

                            <small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>

                            <p class="card-text">
                                <?php the_excerpt(); ?>
                            </p>

                        </div>
                    </div>

                <?php
                endwhile;					
            else :
                echo _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pretzel-cabin'); 
            endif;
            
            include('pagination.php');
            ?>
        </div>

        <div class="col-lg-4 sidebar">
            <?php dynamic_sidebar('SideBar'); ?>
        </div>
    </div>  
</div>


<?php get_footer(); ?>
