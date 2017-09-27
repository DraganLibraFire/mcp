<?php
$wp_customize->add_panel( 'header_options', array(
    'priority'       => 51,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Header', 'mcp'),
) );

$wp_customize->add_section( 'top_bar' , array(
    'title'      => __( 'Top Bar', 'mcp' ),
    'priority'   => 90,
    'panel' => 'header_options'
) );


$wp_customize->add_setting( 'phone_number' , array(
    'default'   => '',
    'sanitize_callback' => 'text_sanitize'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone_number', array(
    'label'    => __( 'Phone Number', 'mcp' ),
    'section'  => 'top_bar',
    'settings' => 'phone_number',
) ) );


$wp_customize->add_setting( 'your_email' , array(
    'default'   => '',
    'sanitize_callback' => 'text_sanitize'
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'your_email', array(
    'label'    => __( 'Email Address', 'mcp' ),
    'section'  => 'top_bar',
    'settings' => 'your_email',
) ) );
?>