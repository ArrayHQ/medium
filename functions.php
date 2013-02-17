<?php

//-----------------------------------  // Load Scripts //-----------------------------------//

function okay_scripts_styles() {
	
	//Enqueue Styles
	
	//Main Stylesheet
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	//Font Awesome CSS
	wp_enqueue_style( 'font_awesome_css', get_template_directory_uri() . "/includes/fonts/fontawesome/font-awesome.css", array(), '0.1', 'screen' );
	
	//NanoScroller
	wp_enqueue_style( 'nanoscroller_css', get_template_directory_uri() . "/includes/js/nanoscroller/nanoscroller.css", array(), '0.1', 'screen' );
	
	//Media Queries CSS
	wp_enqueue_style( 'media_queries_css', get_template_directory_uri() . "/media-queries.css", array(), '0.1', 'screen' );
	
	//Flexslider
	wp_enqueue_style( 'flexslider_css', get_template_directory_uri() . "/includes/styles/flexslider.css", array(), '0.1', 'screen' );
	
	//Enqueue Scripts
	
	//Register jQuery
	wp_enqueue_script('jquery');
	
	//Custom JS
	wp_enqueue_script('custom_js', get_template_directory_uri() . '/includes/js/custom/custom.js', false, false , true);
	wp_localize_script('custom_js', 'custom_js_vars', array(
			'infinite_scroll' => get_option('okay_theme_customizer_infinite'),
			'infinite_scroll_image' => get_template_directory_uri()
		)
	);
	
	//FidVid
	wp_enqueue_script('fitvid_js', get_template_directory_uri() . '/includes/js/fitvid/jquery.fitvids.js', false, false , true);
	
	//Flexslider
	wp_enqueue_script('flexslider_js', get_template_directory_uri() . '/includes/js/flexslider/jquery.flexslider-min.js', false, false , true);
	
	//Enquire
	wp_enqueue_script('enquire_js', get_template_directory_uri() . '/includes/js/enquire/enquire.min.js', false, false , true);
	
	//NanoScroller
	wp_enqueue_script('nanoscroller_js', get_template_directory_uri() . '/includes/js/nanoscroller/jquery.nanoscroller.min.js', false, false , true);
	
	//Infinite Scroll
	if ( get_option('okay_theme_customizer_infinite') == 'disabled' ) { } else {
		wp_enqueue_script('infinite_js', get_template_directory_uri() . '/includes/js/infinitescroll/jquery.infinitescroll.min.js', false, false , true);
	}

}
add_action( 'wp_enqueue_scripts', 'okay_scripts_styles' );




//-----------------------------------  // Add Customizer CSS To Header //-----------------------------------//

function customizer_css() {
    ?>
	<style type="text/css">
		.entry-text a {
			color: <?php echo '' .get_theme_mod( 'okay_theme_customizer_link', '#999' )."\n";?> !important;
		}
		
		nav h2 i, .header .widget_categories:before, .header .widget_recent_comments:before, .header .widget_recent_entries:before, .header .widget_meta:before, .header .widget_links:before, .header .widget_archive:before, .widget_pages:before, .widget_calendar:before, .widget_tag_cloud:before, .widget_text:before, .widget_nav_menu:before, .widget_search:before {
			color: <?php echo '' .get_theme_mod( 'okay_theme_customizer_accent', '#3ac1e8' )."\n";?> !important;
		}
		
		.tagcloud a {
			background: <?php echo '' .get_theme_mod( 'okay_theme_customizer_accent', '#3ac1e8' )."\n";?> !important;
		}
		
		<?php echo '' .get_theme_mod( 'okay_theme_customizer_css', '' )."\n";?>
	</style>
    <?php
}
add_action('wp_head', 'customizer_css');



//-----------------------------------  // Add Localization //-----------------------------------//

load_theme_textdomain( 'okay', get_template_directory_uri() . '/includes/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory_uri() . "/includes/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );




//-----------------------------------  // Pagination //-----------------------------------//

function okay_page_has_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}




//-----------------------------------  // Customizer & Background Support //-----------------------------------//

require_once(dirname(__FILE__) . "/customizer.php");
add_theme_support( 'custom-background' );




//-----------------------------------  // Gallery Support //-----------------------------------//

function okay_theme_setup(){
	add_theme_support('okay_themes_gallery_support');
}
add_action('after_setup_theme', 'okay_theme_setup');




//-----------------------------------  // Add Customizer To Menu //-----------------------------------//

function okay_customizer_admin() {
	add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' ); 
}
add_action ('admin_menu', 'okay_customizer_admin');



//-----------------------------------  // Add Quote Post Format //-----------------------------------//

add_theme_support('post-formats', array( 'gallery'));




//-----------------------------------  // Excerpt Read More Link //-----------------------------------//

function okay_new_excerpt_more($more) {
       global $post;
	return ' <a class="more-link" href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'okay_new_excerpt_more');




//-----------------------------------  // Editor Styles //-----------------------------------//

require_once(dirname(__FILE__) . "/includes/editor/add-styles.php");




//-----------------------------------  // Auto Feed Links //-----------------------------------//

add_theme_support( 'automatic-feed-links' );




//-----------------------------------  // Add Menus //-----------------------------------//

add_theme_support( 'menus' );
register_nav_menu('main', 'Main Menu');
register_nav_menu('custom', 'Custom Menu');



//-----------------------------------  // Thumbnail Sizes //-----------------------------------//

add_theme_support('post-thumbnails');
add_image_size( 'large-image', 9999, 9999, false ); // Large Post Image

if ( ! isset( $content_width ) ) $content_width = 690;




//-----------------------------------  // Register Widget Areas //-----------------------------------//

if ( function_exists('register_sidebars') )

register_sidebar(array(
	'name' => 'Left Sidebar',
	'description' => 'Widgets in this area will be shown in the sidebar.',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="widgettitle accordion-toggle">',
	'after_title' => '</h2>'
));

register_sidebar(array(
	'name' => 'Right Sidebar',
	'description' => 'Widgets in this area will be shown in the right sidebar.',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>'
));




//-----------------------------------  // Validates WordPress Rel Tag //-----------------------------------//

add_filter( 'the_category', 'add_nofollow_cat' );
 
function add_nofollow_cat( $text) {
    $strings = array('rel="category"', 'rel="category tag"', 'rel="whatever may need"');
    $text = str_replace('rel="category tag"', "", $text);
    return $text;
}




//-----------------------------------  // Remove Custom Menu Container //-----------------------------------//
function custom_nav_menu_args( $args = '' )
{
	$args['container'] = false;
	return $args;
} // function

add_filter( 'wp_nav_menu_args', 'custom_nav_menu_args' );




//-----------------------------------  // Custom Comment Output //-----------------------------------//

function okay_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">
		
		<div class="comment-block" id="comment-<?php comment_ID(); ?>">
			<div class="comment-info">	
				<div class="comment-author vcard clearfix">
					<?php echo get_avatar( $comment->comment_author_email, 75 ); ?>
					
					<div class="comment-meta commentmetadata">
						<?php printf(__('<cite class="fn">%s</cite>', 'okay'), get_comment_author_link()) ?>
						<div style="clear:both;"></div>
						<a class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s - %2$s', 'okay'), get_comment_date('m/d/Y'),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'okay'),'  ','') ?>
					</div>
				</div>
			<div class="clearfix"></div>
			</div>
			
			<div class="comment-text">
				<?php comment_text() ?>
				<p class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</p>
			</div>
		
			<?php if ($comment->comment_approved == '0') : ?>
				<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'okay') ?></em>
			<?php endif; ?>    
		</div>
<?php
}

function okay_cancel_comment_reply_button($html, $link, $text) {
    $style = isset($_GET['replytocom']) ? '' : ' style="display:none;"';
    $button = '<div id="cancel-comment-reply-link"' . $style . '>';
    return $button . '<i class="icon-remove-sign"></i> </div>';
}
 
add_action('cancel_comment_reply_link', 'okay_cancel_comment_reply_button', 10, 3);




//-----------------------------------  // Check for Okay Toolkit Notice //-----------------------------------//

if ( !function_exists('okaysocial_init') ) {
	
	add_action('admin_notices', 'okay_toolkit_notice');
	function okay_toolkit_notice() {
	    global $current_user ;
	    $user_id = $current_user->ID;
	    
	    $adminurl = admin_url('plugin-install.php?tab=plugin-information&plugin=okay-toolkit&TB_iframe=true&width=640&height=589');
	    
	    if ( ! get_user_meta($user_id, 'okay_toolkit_ignore_notice') ) { 
	        echo '<div class="updated"><p>';

	        echo 'This theme supports the Okay Toolkit! Install it to extend the features of your theme. ';
	        
	        echo '<a class="thickbox onclick" href=" ' . $adminurl . ' ">Install Now</a> | ';
	        
	        printf(__('<a href="%1$s">Hide Notice</a>'), '?okay_toolkit_nag_ignore=0');
	        
	        echo "</p></div>";
	    }
	}
	
	add_action('admin_init', 'okay_toolkit_nag_ignore');
	function okay_toolkit_nag_ignore() {
	    global $current_user;
	        $user_id = $current_user->ID;
	        /* If user clicks to ignore the notice, add that to their user meta */
	        if ( isset($_GET['okay_toolkit_nag_ignore']) && '0' == $_GET['okay_toolkit_nag_ignore'] ) {
	             add_user_meta($user_id, 'okay_toolkit_ignore_notice', 'true', true);
	    }
	}
}