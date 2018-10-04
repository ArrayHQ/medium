<?php
/**
 * Template for standard posts.
 *
 * @package Medium
 * @since 1.0
 */
					// Video
					if ( get_post_meta($post->ID, 'video', true) ) { ?>
						<div class="fitvid">
							<?php echo get_post_meta($post->ID, 'video', true) ?>
						</div>
					<?php }

					// Featured image
					if ( has_post_thumbnail() ) { ?>
						<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'large-image' ); ?></a>
					<?php } ?>

					<div class="box-wrap">
						<div class="box clearfix">
							<!-- post content -->
							<div class="post-content">
								<div class="title-meta">
									<div class="title-meta-left">
										<p class="entry-byline">
											<!-- Create an author post link -->
											<span class="entry-byline-posted"><?php esc_html_e( 'Posted on', 'medium' ); ?></span>
											<span class="entry-byline-date"><?php echo get_the_date(); ?></span>
											<span class="entry-byline-by"><?php esc_html_e( 'by', 'medium' ); ?></span>
											<a class="entry-byline-author" href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>">
												<?php echo esc_html( get_the_author_meta( 'display_name', $author_id ) ); ?>
											</a>
										</p>
									</div>

									<div class="title-meta-right">
										<?php comments_popup_link( __( 'No Comments', 'medium' ), __( '1 Comment', 'medium' ), __( '% Comments', 'medium' ) ); ?>
									</div>
								</div>

								<header>
									<?php if( is_single() || is_page() ) { ?>
										<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<?php } else { ?>
										<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
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
									<li><span><?php _e( 'Category: ', 'medium' ); ?></span> <?php the_category( ', ' ); ?></li>

									<?php $posttags = get_the_tags(); if ( $posttags ) { ?>
										<li><span><?php _e( 'Tag: ', 'medium' ); ?></span> <?php the_tags( '', ', ', '' ); ?></li>
									<?php } ?>

									<?php if( is_single() ) { ?>
										<li><?php previous_post_link( '%link', __( '<strong>Previous Post: </strong>', 'medium' ) . '%title' ); ?></li>
										<li><?php next_post_link( '%link', __( '<strong>Next Post: </strong>', 'medium' ) . '%title' ); ?></li>
									<?php } ?>
								</ul>
							<?php } ?>

						</div><!-- box -->
					</div><!-- box wrap -->
