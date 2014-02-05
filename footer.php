			</div><!-- main -->
		</div><!-- wrapper -->
		
		<footer>
			<div class="overthrow navigation-content">
				<div class="navigation-inner">
					<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar') ) : else : ?>		
					<?php endif; ?>
					
					<div class="copyright">
						<div class="copyright-date">&copy; <?php echo date("Y"); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></div>
						<div class="copyright-desc"><?php bloginfo('description'); ?></div>
					</div>
				</div>
			</div>
		</footer>
		
	</div><!-- body wrap -->
	
	<?php wp_footer(); ?>
</body>
</html>