					<?php if (function_exists('okay_gallery')) { okay_gallery(); } ?>
					
					<div class="box-wrap">
						<div class="box clearfix">
							<!-- post content -->
							<div class="post-content">
								<div class="title-meta">
									<div class="title-meta-left">
										<?php _e('Posted on','medium'); ?> <?php echo get_the_date(); ?> <?php _e('by','medium'); ?> <?php the_author_posts_link(); ?>
									</div>
									
									<div class="title-meta-right">
										<a href="<?php the_permalink(); ?>#comments-title" title="comments"><?php comments_number(__('No Comments','medium'),__('1 Comment','medium'),__( '% Comments','medium') );?></a>
									</div>
								</div>
								
								<header>
									<?php if( is_single() || is_page() ) { ?>
										<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
									<?php } else { ?>					
										<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
									<?php } ?>
								</header>
							
								<div class="entry-text">
									<?php if( is_search() || is_archive() ) { ?>
										<div class="excerpt-more">
											<?php the_excerpt(__( 'Read More','medium')); ?>
										</div>
									<?php } else { ?>
										<?php the_content(__( 'Read More','medium')); ?>
										
										<?php if( is_single() || is_page() ) { ?>
											<div class="pagelink">
												<?php wp_link_pages(); ?>
											</div>
										<?php } ?>
									<?php } ?>
								</div>
							</div><!-- post content -->
							
							<?php if( is_page() ) {} else { ?>
								<ul class="meta">
									<li><span><?php _e('Category: ','medium'); ?></span> <?php the_category(', '); ?></li>
									
									<?php $posttags = get_the_tags(); if ( $posttags ) { ?>									
										<li><span><?php _e('Tag: ','medium'); ?></span> <?php the_tags('', ', ', ''); ?></li>
									<?php } ?>
									
									<?php if( is_single() ) { ?>	
										<li>&nbsp;</li>
										<li><?php previous_post_link( '%link', __( '<strong>Previous Post: </strong>', 'medium' ) . '%title' ); ?></li>
										<li><?php next_post_link( '%link', __( '<strong>Next Post: </strong>', 'medium' ) . '%title' ); ?></li>
									<?php } ?>
								</ul>
							<?php } ?>
							
						</div><!-- box -->
					</div><!-- box wrap -->