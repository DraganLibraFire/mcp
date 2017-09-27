<?php
function featherlight_stuff(){
    wp_enqueue_style( 'featherlight-css', get_stylesheet_directory_uri() . '/inc/featherlight/featherlight.min.css' );
    wp_enqueue_script( 'featherlight-js', get_stylesheet_directory_uri() . '/inc/featherlight/featherlight.min.js', array('jquery'),true );
}
add_action( 'wp_enqueue_scripts', 'featherlight_stuff' );