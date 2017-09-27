<?php

$wp_customize->add_section( 'portfolio_arhive_options' , array(
    'title'      => __( 'Portfolio Archive', 'mcp' ),
    'priority'   => 100,
    'panel' => 'portfolio_options'
) );

$wp_customize->add_setting('portfolio_sidebar_layout',
    array(
        'default' => 'right-sidebar',
        'sanitize_callback' => 'sidebar_sanitize_layout'
    )
);

$wp_customize->add_control('portfolio_sidebar_layout',
    array(
        'type' => 'select',
        'label' => 'Sidebar Layout:',
        'section' => 'portfolio_arhive_options',
        'choices' => array(
            'left-sidebar' => 'Left Sidebar',
            'right-sidebar' => 'Right Sidebar',
            'no-sidebar' => 'No Sidebar',
        ),
    )
);
$registered_sidebars  = array();
foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
    $registered_sidebars[$sidebar['id']] = $sidebar['name'] ;
    /*print_r($sidebar);*/
}
$wp_customize->add_setting('portfolio_sidebar_choose',
    array(
        'default' => 'sidebar-1',
        'sanitize_callback' => 'sidebar_choose_sanitize'
    )
);

$wp_customize->add_control('portfolio_sidebar_choose',
    array(
        'type' => 'select',
        'label' => 'Choose Sidebar:',
        'section' => 'portfolio_arhive_options',
        'choices' => $registered_sidebars
    )
);



$wp_customize->add_setting('portfolio_blog_layout',
    array(
        'default' => 'default',
        'sanitize_callback' => 'blog_sanitize_layout'
    )
);

$wp_customize->add_control('portfolio_blog_layout',
    array(
        'type' => 'select',
        'label' => 'Portfolio Layout:',
        'section' => 'portfolio_arhive_options',
        'choices' => array(
            'default' => 'Default',
            '2-column' => '2 Column',
            '3-column' => '3 Column',
            'masonary' => 'Masonary',
        ),
    )
);