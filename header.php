<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<title><?php wp_title( '|', true, 'right' ); ?><?php echo bloginfo( 'name' ); ?></title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<!-- media queries -->
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0" />
	
	<!--[if lte IE 9]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/includes/styles/ie.css" media="screen"/>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/js/IE/ie-html5.js"></script>
	<![endif]-->
	
	<!-- customizer css -->
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
	</style>
	
	<!-- load scripts -->
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div id="body-wrap">
		<header class="header">
			<div class="nano">
				<div class="navigation-inner">
					<div class="header-search">
						<?php get_search_form();?>
					</div>
					
					<!-- grab the logo and site title -->
					<?php if ( get_theme_mod('okay_theme_customizer_logo') ) { ?>
				    	<?php if ( get_option('okay_theme_customizer_retina') == 'enabled') {
							list($width, $height) = getimagesize(stripslashes(get_theme_mod('okay_theme_customizer_logo')));
							$width = ($width / 2);
							$height = ($height / 2);
							};
						?>
						
						<hgroup>
							<h1 class="logo-image">
								<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
									<img class="logo" src="<?php echo '' .get_theme_mod( 'okay_theme_customizer_logo', '' )."\n";?>" alt="<?php bloginfo('name'); ?>" <?php if ( get_option('okay_theme_customizer_retina') == 'enabled') { ?>width="<?php echo $width; ?>" height="<?php echo $height; ?>" <?php } ?>/>
								</a>
							</h1>
						</hgroup>
						
				    <?php } else { ?>
				    
					    <hgroup>	
					    	<h1 class="logo-text"><a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name') ?></a></h1>
					    	<h2 class="logo-subtitle"><?php bloginfo('description') ?></h2>
					    </hgroup>
				    
				    <?php } ?>
				    
				    <nav role="navigation" class="header-nav open-widget">
				    	<h2 class="accordion-toggle"><i class="icon-reorder"></i> <?php _e('Navigation','okay'); ?></h2>
				      	
				    	<!-- nav menu -->
				    	<?php wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'nav')); ?>
				    </nav>
				    
				    <div class="widgets">
				    	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Left Sidebar') ) : else : ?>
				    	<?php endif; ?>	
				    </div>
			    </div>
		    </div>
		</header>
		
		<div id="wrapper">
			<div id="main">
