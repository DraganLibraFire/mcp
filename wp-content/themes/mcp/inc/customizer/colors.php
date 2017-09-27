<?php 
    $wp_customize->add_setting( 'theme_main_color', array(
        'default'   => '#d0ad67',
        'sanitize_callback' => 'sanitize_color'   ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_main_color', array(
        'label'    => __( 'Main Color', 'mcp' ),
        'section'  => 'colors',
        'settings' => 'theme_main_color',
        'priority'   => 1
    ) ) );
    $wp_customize->add_setting( 'theme_secondary_color', array(
        'default'   => '#e3cea4',
        'sanitize_callback' => 'sanitize_color'   ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_secondary_color', array(
        'label'    => __( 'Secondary Color', 'mcp' ),
        'section'  => 'colors',
        'settings' => 'theme_secondary_color',
        'priority'   => 2
    ) ) );




?>