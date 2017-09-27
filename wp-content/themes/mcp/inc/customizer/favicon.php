<?php 
/*$wp_customize->add_section( 'favicon' , array(
    'title'      => __( 'Favicon', 'mcp' ),
    'priority'   => 260,
    'panel' => 'general_options'
    ) );*/
    /*Favicon  section */
    $wp_customize->add_setting( 'favicon_image' , array(
        'sanitize_callback' => 'sanitize_image'
    ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'favicon', array(
	        'label'    => __( 'Upload Favicon', 'mcp' ),
	        'section'  => 'title_tagline',
	        'settings' => 'favicon_image',
	    ) ) );
 ?>