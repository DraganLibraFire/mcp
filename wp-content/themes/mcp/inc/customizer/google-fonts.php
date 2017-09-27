<?php
require('custom-controls/google-font-dropdown-custom-control.php');


/*$wp_customize->get_section( 'colors' )->panel = 'font_otpions' ;*/
$wp_customize->add_section( 'heading_fonts' , array(
    'title'      => __( 'Fonts', 'mcp' ),
    'priority'   => 50,
) );


$wp_customize->add_setting( 'google_font_setting', array(
    'default'           => 0,
    'sanitize_callback' => 'font_sanizite'
) );

$wp_customize->add_control( new Google_Font_Dropdown_Custom_Control( $wp_customize, 'google_font_setting', array(
    'label'   => 'Headings',
    'section' => 'heading_fonts',
    'settings'   => 'google_font_setting',
    'priority' => 12
) ) );


$wp_customize->add_setting( 'google_font_setting_text', array(
    'default'           => 0,
    'sanitize_callback' => 'font_sanizite'
) );

$wp_customize->add_control( new Google_Font_Dropdown_Custom_Control( $wp_customize, 'google_font_setting_text', array(
    'label'   => 'Text',
    'section' => 'heading_fonts',
    'settings'   => 'google_font_setting_text',
    'priority' => 12
) ) );


?>