<?php get_header(); ?>
		
		<div id="content">
			<div class="posts">
	
				<!-- titles -->
				<?php if(is_search()) { ?>
					<h2 class="archive-title"><?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $count = $allsearch->post_count; _e('&nbsp;', 'okay'); echo $count . ' '; wp_reset_query(); ?><?php _e('Results for','okay'); ?> "<?php the_search_query() ?>" </h2>
				<?php } else if(is_tag()) { ?>
					<h2 class="archive-title"><?php single_tag_title(); ?></h2>
				<?php } else if(is_day()) { ?>
					<h2 class="archive-title"><?php _e('Archive:','okay'); ?> <?php echo get_the_date(); ?></h2>
				<?php } else if(is_month()) { ?>
					<h2 class="archive-title"><?php echo get_the_date('F Y'); ?></h2>
				<?php } else if(is_year()) { ?>
					<h2 class="archive-title"><?php echo get_the_date('Y'); ?></h2>	
				<?php } else if(is_category()) { ?>
					<h2 class="archive-title"><?php single_cat_title(); ?></h2>
				<?php } else if(is_author()) { ?>
					<h2 class="archive-title"><?php
					$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); echo $curauth->display_name; ?></h2>
				<?php } ?>
				
				<!-- grab the posts -->
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<article <?php post_class('post'); ?>>
					<!-- uses the post format -->
					<?php
						if(!get_post_format()) {
						   get_template_part('format', 'standard');
						} else {
						   get_template_part('format', get_post_format());
						};
					?>
				</article><!-- post-->	
				
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
			
			<!-- post navigation -->
			<?php if( okay_page_has_nav() ) : ?>	
				<div class="post-nav <?php if ( get_option('okay_theme_customizer_infinite') == 'enabled' ) { echo 'infinite'; } ?>">
					<div class="post-nav-inside">
						<div class="post-nav-left"><?php previous_posts_link(__('<i class="icon-arrow-left"></i> Newer Posts', 'okay')) ?></div>
						<div class="post-nav-right"><?php next_posts_link(__('Older Posts <i class="icon-arrow-right"></i>', 'okay')) ?></div>	
					</div>
				</div>
			<?php endif; ?>
			
			<!-- comments -->
			<?php if( is_single () ) { ?>
				<?php if ('open' == $post->comment_status) { ?>
					<div id="comment-jump" class="comments">
						<?php comments_template(); ?>
					</div>
				<?php } ?>
			<?php } ?>
		</div><!-- content -->
	
		<!-- footer -->
		<?php get_footer(); ?>