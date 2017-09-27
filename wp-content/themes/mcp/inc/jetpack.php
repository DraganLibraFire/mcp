<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package mcp
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function mcp_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'mcp_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function mcp_jetpack_setup
add_action( 'after_setup_theme', 'mcp_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function mcp_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function mcp_infinite_scroll_render
