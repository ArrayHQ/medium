<?php
/**
* The template for displaying Comments.
*
* The area of the page that contains both current comments
* and the comment form. The actual display of comments is
* handled by a callback to medium_comment() which is
* located in the functions.php file.
*
* @package WordPress
* @subpackage Medium
* @since Medium 1.0
*/


if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'medium'); ?></p>
<?php
	return;
}
?>

<div id="comments">
	<div id="comments-title">
		<?php comments_number(__(' ','medium'),__('<h3>1 Comment</h3>','medium'),__( '<h3>% Comments</h3>','medium') );?>
	</div>

	<div class="comments-wrap">
		<ol class="commentlist">
			<?php wp_list_comments("callback=medium_comment"); ?>
		</ol>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-below" role="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'medium' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'medium' ) ); ?></div>
			</nav>
		<?php endif; // check for comment navigation ?>
	
		<?php comment_form(); ?>
	</div><!-- comments-wrap -->
</div><!-- comments -->