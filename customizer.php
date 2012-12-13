<?php

// ------------- Theme Customizer  ------------- //
 
add_action( 'customize_register', 'okay_theme_customizer_register' );

function okay_theme_customizer_register($wp_customize) {
	
	//Style Options

	$wp_customize->add_section( 'okay_theme_customizer_basic', array(
		'title' => __( 'Medium Styling', 'okay' ),
		'priority' => 100
	) );
	
	//Logo Image
	$wp_customize->add_setting( 'okay_theme_customizer_logo', array(
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'okay_theme_customizer_logo', array(
		'label' => __( 'Logo Upload', 'okay' ),
		'section' => 'okay_theme_customizer_basic',
		'settings' => 'okay_theme_customizer_logo'
	) ) );
	
	//Retina
	$wp_customize->add_setting('okay_theme_customizer_retina', array(
        'default'        => 'disabled',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
    
    $wp_customize->add_control( 'retina_select_box', array(
        'settings' => 'okay_theme_customizer_retina',
        'label'   => 'Retina Logo',
        'section' => 'okay_theme_customizer_basic',
        'type'    => 'select',
        'choices'    => array(
            'enabled' => 'Enabled',
            'disabled' => 'Disabled',
        ),
    ));
    
    //Responsive
	$wp_customize->add_setting('okay_theme_customizer_responsive', array(
        'default'        => 'enabled',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
    
    $wp_customize->add_control( 'responsive_select_box', array(
        'settings' => 'okay_theme_customizer_responsive',
        'label'   => 'Responsive Stylesheet',
        'section' => 'okay_theme_customizer_basic',
        'type'    => 'select',
        'choices'    => array(
            'enabled' => 'Enabled',
            'disabled' => 'Disabled',
        ),
    ));
	
	//Accent Color
	$wp_customize->add_setting( 'okay_theme_customizer_accent', array(
		'default' => $options['of_colorpicker']['std']
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'okay_theme_customizer_accent', array(
		'label'   => __( 'Accent Color', 'okay' ),
		'section' => 'okay_theme_customizer_basic',
		'settings'   => 'okay_theme_customizer_accent'
	) ) );
	
	//Link Color
	$wp_customize->add_setting( 'okay_theme_customizer_link', array(
		'default' => $options['of_colorpicker_link']['std']
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'okay_theme_customizer_link', array(
		'label'   => __( 'Link Color', 'okay' ),
		'section' => 'okay_theme_customizer_basic',
		'settings'   => 'okay_theme_customizer_link'
	) ) );
	
	//Infinite Scroll
	$wp_customize->add_setting('okay_theme_customizer_infinite', array(
        'default'        => 'disabled',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
    
    $wp_customize->add_control( 'infinite_select_box', array(
        'settings' => 'okay_theme_customizer_infinite',
        'label'   => 'Infinite Scrolling',
        'section' => 'okay_theme_customizer_basic',
        'type'    => 'select',
        'choices'    => array(
            'enabled' => 'Enabled',
            'disabled' => 'Disabled',
        ),
    ));
	
	
	//Real Time Settings Preview
	
	$wp_customize->get_setting('blogname')->transport='postMessage';
	
	if ( $wp_customize->is_preview() && ! is_admin() )
	add_action( 'wp_footer', 'okay_customizer_preview', 21);
	
	function okay_customizer_preview() {
		?>
		<script type="text/javascript">
		( function( $ ){
		
		wp.customize('blogname',function( value ) {
			value.bind(function(to) {
				$('.logo-text a').html(to);
			});
		});
		
		wp.customize('blogdescription',function( value ) {
			value.bind(function(to) {
				$('h2.logo-subtitle').html(to);
			});
		});
		
		} )( jQuery )
		</script>
		<?php 
	}
	
}