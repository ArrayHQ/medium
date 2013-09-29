<?php get_header(); ?>
		
		<div id="content">
			<div class="posts">
	
				<!-- titles -->
				<?php if(is_search()) { ?>
					<h2 class="archive-title">
						<?php
							global $wp_query;
							printf( __( '%d results for "%s"', 'okay' ), $wp_query->found_posts, get_search_query( true ) );
						?>
					</h2>
				<?php } else if(is_tag()) { ?>
					<h2 class="archive-title"><?php single_tag_title(); ?></h2>
				<?php } else if(is_day()) { ?>
					<h2 class="archive-title"><?php _e('Archive:','medium'); ?> <?php echo get_the_date(); ?></h2>
				<?php } else if(is_month()) { ?>
					<h2 class="archive-title"><?php echo get_the_date('F Y'); ?></h2>
				<?php } else if(is_year()) { ?>
					<h2 class="archive-title"><?php echo get_the_date('Y'); ?></h2>	
				<?php } else if(is_category()) { ?>
					<h2 class="archive-title"><?php single_cat_title(); ?></h2>
				<?php } else if(is_author()) { ?>
					<h2 class="archive-title">
						<?php
							the_post();
							printf( __( 'Author: %s', 'medium' ), '' . get_the_author() . '' );
							rewind_posts();
						?>
					</h2>
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
			<?php if( medium_page_has_nav() ) : ?>	
				<div class="post-nav <?php if ( get_option('medium_customizer_infinite') == 'enabled' ) { echo 'infinite'; } ?>">
					<div class="post-nav-inside">
						<div class="post-nav-left"><?php previous_posts_link(__('<i class="icon-arrow-left"></i> Newer Posts', 'medium')) ?></div>
						<div class="post-nav-right"><?php next_posts_link(__('Older Posts <i class="icon-arrow-right"></i>', 'medium')) ?></div>	
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