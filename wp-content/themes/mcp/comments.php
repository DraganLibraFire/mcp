<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package mcp
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

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				_e('Comments');
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 0
				) );
			?>
		</ol><!-- .comment-list -->


	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'mcp' ); ?></p>
	<?php endif; ?>

	<?php $comment_args = array( 'title_reply'=>'Reply',

			'fields' => apply_filters( 'comment_form_default_fields', array(

					'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .

							'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',

					'email'  => '<p class="comment-form-email">' .

							'<label for="email">' . __( 'Email' ) . '</label> ' .

							( $req ? '<span>*</span>' : '' ) .

							'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'.'</p>',

					'url'    => '' ) ),

			'comment_field' => '<p>' .

					'<label for="comment">' . __( 'Comments' ) . '</label>' .

					'<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' .

					'</p>',

			'comment_notes_after' => '',

	);

	comment_form($comment_args); ?>


</div><!-- #comments -->
