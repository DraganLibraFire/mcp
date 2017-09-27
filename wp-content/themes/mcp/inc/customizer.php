<?php
/**
 * mcp Theme Customizer
 *
 * @package mcp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mcp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->remove_control('header_textcolor');
    $wp_customize->remove_control('site_icon');


    /*
    * Theme color option panel
    */
    require get_template_directory() . '/inc/customizer/general.php';

    /*
    * Theme Social options
    */
    require get_template_directory() . '/inc/customizer/social.php';
    
    /*
    * Theme Footer options
    */
    require get_template_directory() . '/inc/customizer/footer.php';

    /*
    * Theme Google analytics options
    */
    require get_template_directory() . '/inc/customizer/google-analytics.php';
    
    /*
    * Topbar  options
    */
    require get_template_directory() . '/inc/customizer/topbar.php';

    /*
    * Option sanitize functions
    */
   require get_template_directory() . '/inc/customizer/sanitize.php';

    
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
add_action( 'customize_register', 'mcp_customize_register' );
function mcp_customize_preview_js() {
	wp_enqueue_script( 'mcp_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'mcp_customize_preview_js' );
