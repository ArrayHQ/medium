<?php
/**
 * Ampersand functions
 *
 * @package Medium
 * @since Medium 1.0
 */


/* Set the content width */
if ( ! isset( $content_width ) )
	$content_width = 670; /* pixels */


if ( ! function_exists( 'medium_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 * @since Medium 1.0
 */
function medium_setup() {

	// Admin functionality
	if ( is_admin() ) {

		// Customizer settings
		require_once( get_template_directory() . '/customizer.php' );

		// Load Getting Started page and initialize EDD update class
		require_once( get_template_directory() . '/includes/admin/getting-started/getting-started.php' );

		// Meta boxes
		require_once( get_template_directory() . '/includes/admin/metabox/metabox.php' );

		/* Add custom post styles */
		require( get_template_directory() . '/includes/editor/add-styles.php' );
		add_editor_style();
	}

	// Add posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );


	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // Default Thumb
	add_image_size( 'large-image', 9999, 9999, false ); // Large Post Image

	// Custom Background Support
	add_theme_support( 'custom-background' );

	// Register Menu
	register_nav_menus( array(
		'main'   => __( 'Main Menu', 'medium' ),
		'custom' => __( 'Custom Menu', 'medium' )
	) );

	// Make theme available for translation
	load_theme_textdomain( 'medium', get_template_directory() . '/languages' );

	// Gallery Post Format
	add_theme_support( 'post-formats', array( 'gallery') );

}
endif; // medium_setup
add_action( 'after_setup_theme', 'medium_setup' );


/* Enqueue Scripts and Styles */
function medium_scripts_styles() {

	//Enqueue Styles

	//Main Stylesheet
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	//Font Awesome CSS
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . "/includes/fonts/fontawesome/font-awesome.css", array(), '0.1', 'screen' );

	//NanoScroller
	wp_enqueue_style( 'nanoscroller-css', get_template_directory_uri() . "/includes/js/nanoscroller/nanoscroller.css", array(), '0.1', 'screen' );

	//Media Queries CSS
	wp_enqueue_style( 'media-queries-css', get_template_directory_uri() . "/media-queries.css", array(), '0.1', 'screen' );

	//Flexslider
	wp_enqueue_style( 'flexslider-css', get_template_directory_uri() . "/includes/styles/flexslider.css", array(), '0.1', 'screen' );

	//Enqueue Scripts

	//Register jQuery
	wp_enqueue_script( 'jquery' );

	//Custom JS
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/includes/js/custom/custom.js', array(), '20130731', true );
	wp_localize_script( 'custom-js', 'custom_js_vars', array(
			'infinite_scroll' 		=> get_option( 'medium_customizer_infinite' ),
			'infinite_scroll_image' => get_template_directory_uri()
		)
	);

	//FidVid
	wp_enqueue_script('fitvid-js', get_template_directory_uri() . '/includes/js/fitvid/jquery.fitvids.js', array(), '20130731', true );

	//Flexslider
	wp_enqueue_script('flexslider-js', get_template_directory_uri() . '/includes/js/flexslider/jquery.flexslider-min.js', array(), '20130731', true );

	//Enquire
	wp_enqueue_script('enquire-js', get_template_directory_uri() . '/includes/js/enquire/enquire.min.js', array(), '20130731', true );

	//NanoScroller
	wp_enqueue_script('nanoscroller-js', get_template_directory_uri() . '/includes/js/nanoscroller/jquery.nanoscroller.min.js', array(), '20130731', true );

	//Infinite Scroll
	if ( get_option( 'medium_customizer_infinite' ) == 'disabled' ) { } else {
		wp_enqueue_script( 'infinite-js', get_template_directory_uri() . '/includes/js/infinitescroll/jquery.infinitescroll.min.js', array(), '20130731', true );
	}

}
add_action( 'wp_enqueue_scripts', 'medium_scripts_styles' );


/* Register Widget Areas */
if ( function_exists( 'register_sidebars' ) )
register_sidebar( array(
	'name' => __( 'Left Sidebar', 'medium' ),
	'description' => __( 'Widgets in this area will be shown in the sidebar.', 'medium' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="widgettitle accordion-toggle">',
	'after_title' => '</h2>'
) );

register_sidebar( array(
	'name' => __( 'Right Sidebar', 'medium' ),
	'description' => __( 'Widgets in this area will be shown in the right sidebar.', 'medium' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>'
) );


/* Pagination Conditional */
function medium_page_has_nav() {
	global $wp_query;
	return ( $wp_query->max_num_pages > 1 );
}


/* Custom Gallery Support */
function medium_gallery_support() {
	add_theme_support( 'okay_themes_gallery_support' );
}
add_action( 'after_setup_theme', 'medium_gallery_support' );


/* Excerpt Read More Link */
function medium_new_excerpt_more( $more ) {
	global $post;
	return ' <a class="more-link" href="'. get_permalink( $post->ID ) . '">Read More</a>';
}
add_filter( 'excerpt_more', 'medium_new_excerpt_more' );


/* Remove Custom Menu Container */
function medium_nav_menu_args( $args = '' ) {
	$args['container'] = false;
	return $args;
}
add_filter( 'wp_nav_menu_args', 'medium_nav_menu_args' );

/* Add Customizer CSS To Header */
function medium_customizer_css() {
    ?>
	<style type="text/css">
		.entry-text a {
			color: <?php echo get_theme_mod( 'medium_customizer_link', '#999' ) ;?> !important;
		}

		nav h2 i, .header .widget_categories:before, .header .widget_recent_comments:before, .header .widget_recent_entries:before, .header .widget_meta:before, .header .widget_links:before, .header .widget_archive:before, .widget_pages:before, .widget_calendar:before, .widget_tag_cloud:before, .widget_text:before, .widget_nav_menu:before, .widget_search:before {
			color: <?php echo get_theme_mod( 'medium_customizer_accent', '#3ac1e8' ); ?> !important;
		}

		.tagcloud a {
			background: <?php echo get_theme_mod( 'medium_customizer_accent', '#3ac1e8' ); ?> !important;
		}

		<?php echo get_theme_mod( 'medium_customizer_css', '' ); ?>
	</style>
    <?php
}
add_action( 'wp_head', 'medium_customizer_css' );


/* Custom Comment Output */
function medium_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">

		<div class="comment-block" id="comment-<?php comment_ID(); ?>">
			<div class="comment-info">
				<div class="comment-author vcard clearfix">
					<?php echo get_avatar( $comment->comment_author_email, 75 ); ?>

					<div class="comment-meta commentmetadata">
						<?php printf(__('<cite class="fn">%s</cite>', 'medium'), get_comment_author_link()) ?>
						<div style="clear:both;"></div>
						<a class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s - %2$s', 'medium'), get_comment_date('m/d/Y'),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'medium'),'  ','') ?>
					</div>
				</div>
			<div class="clearfix"></div>
			</div>

			<div class="comment-text">
				<?php comment_text() ?>
				<p class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
				</p>
			</div>

			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'medium') ?></em>
			<?php endif; ?>
		</div>
<?php
}

function medium_cancel_comment_reply_button( $html, $link, $text ) {
    $style = isset($_GET['replytocom']) ? '' : ' style="display:none;"';
    $button = '<div id="cancel-comment-reply-link"' . $style . '>';
    return $button . '<i class="icon-remove-sign"></i> </div>';
}

add_action( 'cancel_comment_reply_link', 'medium_cancel_comment_reply_button', 10, 3 );


/* Check for Okay Toolkit Notice */
if ( !function_exists( 'okaysocial_init' ) ) {

	function okay_toolkit_notice() {
	    global $current_user ;
	    $user_id = $current_user->ID;

	    $adminurl = admin_url('plugin-install.php?tab=plugin-information&plugin=okay-toolkit&TB_iframe=true&width=640&height=589');

	    if ( ! get_user_meta( $user_id, 'okay_toolkit_ignore_notice' ) ) {
	        echo '<div class="updated"><p>';

	        echo 'This theme supports the Okay Toolkit! Install it to extend the features of your theme. ';

	        echo '<a class="thickbox onclick" href=" ' . $adminurl . ' ">Install Now</a> | ';

	        printf(__('<a href="%1$s">Hide Notice</a>'), '?okay_toolkit_nag_ignore=0');

	        echo "</p></div>";
	    }
	}
	add_action( 'admin_notices', 'okay_toolkit_notice' );

	function okay_toolkit_nag_ignore() {
	    global $current_user;
	        $user_id = $current_user->ID;
	        /* If user clicks to ignore the notice, add that to their user meta */
	        if ( isset($_GET['okay_toolkit_nag_ignore']) && '0' == $_GET['okay_toolkit_nag_ignore'] ) {
	             add_user_meta( $user_id, 'okay_toolkit_ignore_notice', 'true', true );
	    }
	}
	add_action( 'admin_init', 'okay_toolkit_nag_ignore' );

}