<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Soup
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
<div class="single-box">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<hr>
		<div class="post-comments post-module">
			<h4><i class="ti ti-comments mr-3 text-primary"></i><?php esc_html_e('Comments','soup'); ?></h4> 

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?> 
				<div class="nav-links"> 
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'soup' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'soup' ) ); ?></div> 
				</div><!-- .nav-links --> 
			<?php endif; // Check for comment navigation. ?>
			<div class="content">
				<ul class="comments">
					<?php
						wp_list_comments( array(
							'style'      => 'ul',
							'callback' => 'soup_comments_list' 
						) );
					?>
				</ul><!-- .comment-list -->
			</div>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?> 
				<div class="nav-links"> 
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'soup' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'soup' ) ); ?></div> 
				</div><!-- .nav-links --> 
			<?php
			endif; // Check for comment navigation.
			?>
		</div><!-- #comments -->
	<?php
	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'soup' ); ?></p>
	<?php
	endif; 
	?>

<hr>
<div class="post-add-comment post-module">
	<?php comment_form(); ?>
</div>
</div>