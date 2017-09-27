<?php 
	$wp_customize->add_panel( 'general_options', array(
	 'priority'       => 50,
	  'capability'     => 'edit_theme_options',
	  'theme_supports' => '',
	  'title'          => __('General', 'mcp'),
	) );
	/*echo $wp_customize->get_section('colors');*/


    /*
    * Theme Background options
    */
    require get_template_directory() . '/inc/customizer/background.php';
    /*
    * Theme Layout options
    */
    require get_template_directory() . '/inc/customizer/layout.php';
    /*
    * Theme Favicon options
    */
    require get_template_directory() . '/inc/customizer/favicon.php';

 ?>