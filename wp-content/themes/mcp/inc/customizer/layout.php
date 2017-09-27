<?php 
    $wp_customize->add_section( 'layout_options' , array(
    'title'      => __( 'Layout', 'mcp' ),
    'priority'   => 90,
    'panel' => 'general_options'
    ) );
    $wp_customize->add_setting( 'container_width_customizer' , array(
        'default'   => '960',
        'sanitize_callback' => 'text_sanitize',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'container_customizer', array(
        'label'    => __( 'Set Container Width', 'mcp' ),
        'description'    => __( 'Enter your content with without unit (px, em, %,vw)', 'mcp' ),
        'section'  => 'layout_options',
        'settings' => 'container_width_customizer',
    ) ) );



    
?>