<?php


function pretzelcabin_comments($comment, $args, $depth) {
	?>
  <div class="card comment-card" id="comment-<?php comment_ID() ?>">

	  <div class="card-body">
	    <div class="card-title">
	    	<div class="comment-meta commentmetadata">
		      <?php edit_comment_link('<i class="fas fa-edit"></i><span class="sr-only">(Edit)</span><br/>'); ?>

	    		<small class="text-muted">
			      <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()); ?>
			    </small>
		    </div>

	    	<h5 class="comment-author vcard"><?php 
		      echo get_avatar( $comment, $args['avatar_size'] ); 
		      
		      printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()); ?>
		    </h5>
	    </div>

	    <hr />

	    <?php if ($comment->comment_approved == '0') : ?>
	      <h6 class="comment-awaiting-moderation card-subtitle mb-2 text-muted">
	      	<?php _e('Your comment is awaiting moderation.'); ?>
	      </h6>
	      <hr/>
	    <?php endif; ?>

	    <p class="card-text">
	    	<?php comment_text(); ?>
	    </p>
	  </div>

	</div>
  <?php
}
