<?php 
$wp_customize->add_panel( 'blog_options', array(
	 'priority'       => 51,
	  'capability'     => 'edit_theme_options',
	  'theme_supports' => '',
	  'title'          => __('Blog', 'mcp'),
	) );

	 /*
    * Theme Archive Page Options
    */
    require get_template_directory() . '/inc/customizer/archive.php';
     /*
    * Theme Single Post Page Options
    */
    require get_template_directory() . '/inc/customizer/single-blog.php';
 ?>