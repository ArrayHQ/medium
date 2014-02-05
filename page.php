<?php get_header(); ?>
		
		<div id="content">
			<div class="posts">
				
				<!-- grab the posts -->
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<article <?php post_class('post'); ?>>
				
					<!-- grab the video -->
					<?php if ( get_post_meta($post->ID, 'video', true) ) { ?>
						<div class="fitvid">
							<?php echo get_post_meta($post->ID, 'video', true) ?>
						</div>
					<?php } ?>
					
					<!-- grab the featured image -->
					<?php if ( has_post_thumbnail() ) { ?>
						<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'large-image' ); ?></a>
					<?php } ?>
					
					<div class="box-wrap">
						<div class="box clearfix">
							<!-- post content -->
							<div class="post-content">
								<div class="title-meta">
									<div class="title-meta-left">
										<?php if ( get_post_meta($post->ID, 'pagetitle', true) ) { ?>
											<?php echo get_post_meta($post->ID, 'pagetitle', true) ?>
										<?php } else { ?>
											<?php _e('Last modified','medium'); ?> <?php the_modified_date(); ?> <?php _e('by','medium'); ?> <?php the_author_posts_link(); ?>
										<?php } ?>
									</div>
								</div>
								
								<header>
									<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
								</header>
							
								<div class="entry-text">
									<?php the_content(); ?>
								</div>
							</div><!-- post content -->
						</div><!-- box -->
					</div><!-- box wrap -->
				</article><!-- post-->	
				
				<?php endwhile; ?>
				<?php endif; ?>
			</div><!-- posts -->
		</div><!-- content -->
	
		<!-- footer -->
		<?php get_footer(); ?>