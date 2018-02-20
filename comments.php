<?php
/* The template for displaying Comments. */
if (post_password_required()) {
	return;
}

$currentCommentsPage = get_query_var('cpage');
?>


<div id="comments" class="comments">
	<?php if (comments_open()): ?>
  <div class="card">
    <div class="card-header" id="headingReply">
      <h3>
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseReply" aria-expanded="false" aria-controls="collapseReply">
          <i class="fas fa-caret-right"></i>
          <i class="fas fa-caret-down"></i>
          Leave a Reply
        </button>
      </h3>
    </div>

    <div id="collapseReply" class="collapse" aria-labelledby="headingReply" data-parent="#comments">
      <div class="card-body comment-form">
        <?php
				$commenter = wp_get_current_commenter();
				$req = get_option('require_name_email');
				$aria_req = $req ? " aria-required='true'" : '';

				$fields =  array(
				  'author' =>
				    '<div class="comment-form-author form-group row">'.
				    '<label for="author" class="col-sm-2 col-form-label">Name *</label>' .
				    '<div class="col-sm-10">'.
				    '<input class="form-control" id="author" name="author" value="' . esc_attr($commenter['comment_author']).'" aria-required="true" />'.
				    '</div></div>',

				  'email' =>
				  	'<div class="comment-form-email form-group row">'.
				    '<label for="email" class="col-sm-2 col-form-label">Email *</label>' .
				    '<div class="col-sm-10">'.
				    '<input class="form-control" id="email" name="email" value="' . esc_attr($commenter['comment_author_email']).'" aria-required="true" />'.
				    '<small id="emailHelp" class="form-text text-muted">Your email address will not be published.</small>'.
				    '</div></div>',

				  'url' =>
				  	'<div class="comment-form-url form-group row">'.
				    '<label for="url" class="col-sm-2 col-form-label">Website</label>' .
				    '<div class="col-sm-10">'.
				    '<input class="form-control" id="url" name="url" value="' . esc_attr($commenter['comment_author_url']).'" />'.
				    '</div></div>',
				);

        comment_form(array(
        	'title_reply' => '',
        	'class_submit' => 'btn btn-primary',
        	'comment_field' =>  '<p class="comment-form-comment"><label for="comment" class="sr-only">' . _x( 'Comment', 'noun' ) .
				    '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
				    '</textarea></p>',
				  //'comment_notes_before' => '',
				  'fields' => $fields
        ));
        ?>
      </div>
    </div>
  </div>
	<?php
	endif;

  if (have_comments()):
  	$expanded = $currentCommentsPage > 1;
  ?>
  <div class="card">
    <div class="card-header" id="headingComments">
      <h3>
        <button class="btn btn-link <?php echo $expanded ? '' : 'collapsed'; ?>" data-toggle="collapse" 
        		data-target="#collapseComments" aria-expanded="<?php echo $expanded ? 'true' : 'false'; ?>"
        		aria-controls="collapseComments">
          <i class="fas fa-caret-right"></i>
          <i class="fas fa-caret-down"></i>
          <?php
						printf(_nx('One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;',
								get_comments_number(), 'comments title', 'pretzel-cabin'),
								number_format_i18n( get_comments_number() ), get_the_title());
					?>
        </button>
      </h3>
    </div>
    <div id="collapseComments" class="<?php echo $expanded ? '' : 'collapse'; ?>" aria-labelledby="headingComments" data-parent="#comments">
      <div class="card-body card-body-no-padding">

				<?php
				wp_list_comments(array('style' => 'ul', 'short_ping' => true, 'avatar_size' => 50, 'callback' => pretzelcabin_comments));

				if (get_comment_pages_count() > 1 && get_option('page_comments')){
          pretzelcabin_displayPagination($currentCommentsPage, get_comment_pages_count(), pretzelcabin_comments_pagenum_link);
				}
				?>

      </div>
    </div>
  </div>
	<?php endif; ?>
</div>


