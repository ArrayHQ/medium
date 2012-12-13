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
										<?php _e('Posted on','okay'); ?> <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?>
									</div>
									
									<div class="title-meta-right">
										<a href="<?php the_permalink(); ?>#comments-title" title="comments"><?php comments_number(__('No Comments','okay'),__('1 Comment','okay'),__( '% Comments','okay') );?></a>
									</div>
								</div>
								
								<header>
									<?php if(is_single() || is_page()) { ?>
										<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
									<?php } else { ?>					
										<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
									<?php } ?>
								</header>
							
								<div class="entry-text">
									<?php if(is_search() || is_archive()) { ?>
										<div class="excerpt-more">
											<?php the_excerpt(__( 'Read More','okay')); ?>
										</div>
									<?php } else { ?>
										<?php the_content(__( 'Read More','okay')); ?>
										
										<?php if(is_single() || is_page()) { ?>
											<div class="pagelink">
												<?php wp_link_pages(); ?>
											</div>
										<?php } ?>
									<?php } ?>
								</div>
							</div><!-- post content -->
							
							<?php if(is_page()) {} else { ?>
								<ul class="meta">
									<li><span><?php _e('Category: ','okay'); ?></span> <?php the_category(', '); ?></li>
									
									<?php $posttags = get_the_tags(); if ($posttags) { ?>									
										<li><span><?php _e('Tag: ','okay'); ?></span> <?php the_tags('', ', ', ''); ?></li>
									<?php } ?>
									
									<?php if(is_single()) { ?>	
										<li>&nbsp;</li>
										<li><?php previous_post_link('%link', '<strong>Previous Post:</strong> %title'); ?></li>
										<li><?php next_post_link('%link', '<strong>Next Post:</strong> %title'); ?></li>
									<?php } ?>
								</ul>
							<?php } ?>
							
						</div><!-- box -->
					</div><!-- box wrap -->