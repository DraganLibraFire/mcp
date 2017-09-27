<?php

$wp_customize->add_section( 'single_portfolio_options' , array(
    'title'      => __( 'Single Post', 'mcp' ),
    'priority'   => 100,
    'panel' => 'portfolio_options'
) );

$wp_customize->add_setting('single_portfolio_sidebar_layout',
    array(
        'default' => 'right-sidebar',
        'sanitize_callback' => 'sidebar_sanitize_layout'
    )
);

$wp_customize->add_control('single_portfolio_sidebar_layout',
    array(
        'type' => 'select',
        'label' => 'Sidebar Layout:',
        'section' => 'single_portfolio_options',
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
}
$wp_customize->add_setting('single_portfolio_sidebar_choose',
    array(
        'default' => 'sidebar-1',
        'sanitize_callback' => 'sidebar_choose_sanitize'
    )
);

$wp_customize->add_control('single_portfolio_sidebar_choose',
    array(
        'type' => 'select',
        'label' => 'Choose Sidebar:',
        'section' => 'single_portfolio_options',
        'choices' => $registered_sidebars
    )
);



?>