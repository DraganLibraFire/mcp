<?php 
    $wp_customize->add_section( 'background_customizer' , array(
    'title'      => __( 'Background', 'mcp' ),
    'priority'   => 100,
    'panel' => 'general_options'
    ) );
    $wp_customize->get_control( 'background_color'  )->section   = 'background_customizer';   
    $wp_customize->remove_section('background_image');
    $wp_customize->get_control( 'background_image'  )->section   = 'background_customizer';
?>