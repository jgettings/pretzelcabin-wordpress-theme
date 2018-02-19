<?php
/**
 * The default template for displaying content
 * Used for both single and index/archive/search.
 */
?>

<div class="card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if (has_post_thumbnail()): ?>
  	<?php if (!is_single()): ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <?php endif; ?>

    <?php
    the_post_thumbnail('', array(
    	'class' => 'card-img-top',
    	'alt' => 'Image for ' . get_the_title()
    ));
    ?>

    <?php if(!is_single()): ?>
    	</a>
    <?php endif; ?>
  <?php endif ?>
  

  <div class="card-body">

  	<h1 class="card-title">
			<?php
      if (is_single()) :
      	the_title();
      else :
        the_title(sprintf('<a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a>');
      endif;
      ?>
    </h1>

    <small>
    	<b><?php the_time('F jS, Y'); ?></b>
    	by
    	<b><?php the_author_posts_link(); ?></b>
    </small>

    <div class="">
    	<?php
    	$categories = get_the_terms($id, 'category');
	    if (!$categories || is_wp_error($categories))
	        $categories = array();
	 	 
	    foreach ($categories as $category): ?>
	        <a href="<?php echo get_term_link($category) ?>" class="badge badge-primary" data-toggle="tooltip" title="<?php echo $category->description; ?>">
	        	<i class="far fa-folder-open"></i>
	        	<?php echo $category->name ?>
	        </a>

	    <?php
	  	endforeach;
	    
	    $tags = get_the_tags();
	    if (!$tags || is_wp_error($tags))
	        $tags = array();
	 	 
	    foreach ($tags as $tag): ?>
	        <a href="<?php echo get_term_link($tag) ?>" class="badge badge-secondary" data-toggle="tooltip" title="<?php echo $tag->description; ?>">
	        	<i class="fas fa-tag"></i>
	        	<?php echo $tag->name ?>
	        </a>

	    <?php endforeach; ?>
		</div>

		<?php if (is_search()): ?>
      <p class="card-text">
          <?php the_excerpt(); ?>
      </p>

		<?php else: ?> 
      <div class="card-text">       
      	<?php the_content();?> 
      </div> 
  	
  	<?php endif; ?>

	</div>

</div>

<?php
if (is_singular() && (comments_open() || get_comments_number())):
    comments_template('', true);
endif;
?>
