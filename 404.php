<?php get_header(); ?>
		
		<div id="content">
			<div class="posts">
				
				<!-- grab the posts -->
				<article class="post">
					<div class="box-wrap">
						<div class="box">
							<div class="title-meta">
								<div class="title-meta-left">
									<?php _e('404 - Page Not Found','okay'); ?>
								</div>
							</div>
							
							<header>
								<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('404 - Page Not Found','okay'); ?></a></h1>
							</header>
							
							<!-- post content -->
							<div class="post-content">
								<p><?php _e('Sorry, but the page you are looking for has moved or no longer exists. Please use the search or the archives below to try and locate the page you were looking for.','okay'); ?></p>
								
								<?php get_search_form();?>
								
								<div id="archive">
									<div class="archive-col">
										<div class="archive-box">
											<h4><?php _e('Archive By Day','okay'); ?></h4>
											<ul>
												<?php wp_get_archives('type=daily&limit=15'); ?>
											</ul>
										</div>
										
										<div class="archive-box">
											<h4><?php _e('Archive By Month','okay'); ?></h4>
											<ul>
												<?php wp_get_archives('type=monthly&limit=12'); ?>
											</ul>
										</div>
										
										<div class="archive-box">
											<h4><?php _e('Archive By Year','okay'); ?></h4>
											<ul>
												<?php wp_get_archives('type=yearly&limit=12'); ?>
											</ul>
										</div>
									</div><!-- column -->
									
									<div class="archive-col">
										<div class="archive-box">
											<h4><?php _e('Latest Posts','okay'); ?></h4>
											<ul>
												<?php wp_get_archives('type=postbypost&limit=20'); ?>
											</ul>
										</div>
									</div><!-- column -->
									
									<div class="archive-col">
										<div class="archive-box">
											<h4><?php _e('Pages','okay'); ?></h4>
											<ul>
												<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
											</ul>
										</div>
										
										<div class="archive-box">
											<h4><?php _e('Categories','okay'); ?></h4>
											<ul>
												<?php wp_list_categories('orderby=name&title_li='); ?> 
											</ul>
										</div>
										
										<div class="archive-box">
											<h4><?php _e('Contributors','okay'); ?></h4>
											<ul>
												<?php wp_list_authors('show_fullname=1&optioncount=1&orderby=post_count&order=DESC'); ?>
											</ul>
										</div>
									</div><!-- column -->
								</div><!-- archive -->
							</div><!-- post content -->
						</div><!-- box -->
					</div><!-- box wrap -->
				</article><!-- post-->	
			</div><!-- posts -->
		</div><!-- content -->
	
		<!-- footer -->
		<?php get_footer(); ?>