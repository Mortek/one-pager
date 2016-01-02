
<?php 
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package AWE
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="comments-container comments-area">
<?php // You can start editing here -- including this comment! ?>

<?php if ( have_comments() ) : ?>


	<ol class="comment-list">

		<?php
		wp_list_comments( array(
			'style'       => 'li',
			'short_ping'  => true,
			'callback' => 'codexcoder_comment',
			'avatar_size' => 100
			) );
			?>
		</ol><!-- .comment-list -->

		<?php 

		// are there comments to navigate through 
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'AWE' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'AWE' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'AWE' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
	<?php endif; // check for comment navigation ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'AWE' ); ?></p>
<?php endif; ?>


<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
	<nav id="comment-nav-below" class="comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'AWE' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'AWE' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'AWE' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
<?php endif; // check for comment navigation ?>

<?php endif; // have_comments() ?>

<div class="comment-respond clearfix">

	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' => '<input class="form-control" name="author" type="text" placeholder="Your name" ' . $aria_req . '>',
		'email'  => '<input class="form-control" name="email" type="email" placeholder="Your Email" size="30"' . $aria_req . '/>',
		'url'  => '<input class="form-control" id="url" name="url" type="url" placeholder="Website" value="">',
		);

	$comments_args = array(
		'fields' =>  $fields,
		'id_form'          			=> 'commentform',
		'title_reply'       		=> __( '<h3 class="title-block">Leave Your Comment</h3>', 'AWE' ),
		//'title_reply_to'    		=> __( 'Leave a Comment to %s', 'AWE' ),
		'cancel_reply_link' 		=> __( 'Cancel Comment', 'AWE' ),
		'label_submit'      		=> __( 'SUBMIT COMMENT', 'AWE' ),
		'class_submit'				=> 'btn btn-lg top2bottom-effect full-width-btn btn-submit',
		'comment_notes_before'      => '',
		'comment_notes_after'       => '',
		'comment_field'             => '<textarea class="form-control" name="comment" placeholder="Message" rows="8" required></textarea>'
		);
	ob_start();
	
	comment_form($comments_args);

	?>

</div><!-- #comments -->

</div>