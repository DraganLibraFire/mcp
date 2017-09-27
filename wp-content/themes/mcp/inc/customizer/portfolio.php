<?php
$wp_customize->add_panel( 'portfolio_options', array(
    'priority'       => 52,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Portfolio', 'mcp'),
) );

/*
* Theme Archive Page Options
*/
require get_template_directory() . '/inc/customizer/archive-portfolio.php';
/*
* Theme Single Post Page Options
*/
require get_template_directory() . '/inc/customizer/single-portfolio.php';
?>