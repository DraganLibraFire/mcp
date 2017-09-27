<?php

function slick_stuff(){
    wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css' );
    wp_enqueue_script( 'slick-js', '//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js', array('jquery'), true );
    wp_enqueue_script( 'slick-init', get_stylesheet_directory_uri().'/inc/slick/slick.js', array('jquery') ,true );
}
add_action( 'wp_enqueue_scripts', 'slick_stuff' );