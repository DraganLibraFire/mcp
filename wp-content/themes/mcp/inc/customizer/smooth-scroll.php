<?php 
    $wp_customize->add_section( 'smooth_scroll_options' , array(
    'title'      => __( 'Smooth scroll', 'mcp' ),
    'priority'   => 100,
    'panel' => 'general_options'
    ) );
    $wp_customize->add_setting( 'smooth_scroll_enable' , array(
    	'default' => 'no',
        'sanitize_callback' => 'sanitize_choices',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'smooth_scroll_options', array(
        'label'    => __( 'Set cointainer width', 'mcp' ),
        'section'  => 'smooth_scroll_options',
        'settings' => 'smooth_scroll_enable',
        'label' => __( 'Enable Smooth Scroll', 'mcp' ),
        'type' => 'radio',
        'choices' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
    ) ) );
?>