<form action="<?php echo home_url( '/' ); ?>" class="search-form">
	<fieldset>
		<input type="text" class="search-form-input text" name="s" onfocus="if (this.value == '<?php _e('Search...','okay'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search...','okay'); ?>';}" value="<?php _e('Search...','okay'); ?>"/>
		<input type="submit" value="Search" class="submit search-button" />
	</fieldset>
</form>