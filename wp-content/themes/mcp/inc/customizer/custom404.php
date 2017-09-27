<?php 

	$wp_customize->add_section( 'custom_404' , array(
    	'title'      => __( 'Custom 404 Page', 'mcp' ),
    	'priority'   => 260,
	) );

		$wp_customize->add_setting( 'page_dropdown' , array(
        'sanitize_callback' => 'sanitize_page_choose'
    ) );
    
    $args = array('post_type' =>'page');
	$page_dropdown_query = new WP_Query($args);
	$all_pages = array();
	if($page_dropdown_query->have_posts()):
		while ( $page_dropdown_query->have_posts() ) : $page_dropdown_query->the_post();
			$all_pages[get_the_ID()] = get_the_title();
		endwhile;
	endif;
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_dropdown', array(
        'label'    => __( 'Choose Custom 404 Page:', 'mcp' ),
        'section'  => 'custom_404',
        'settings' => 'page_dropdown',
       	'type' => 'select',
       	'choices' => $all_pages
    ) ) );

    $wp_customize->add_setting( 'custom404_enable' , array(
        'default' => 'no',
        'sanitize_callback' => 'sanitize_choices',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom404_enable', array(
        'label'    => __( 'Enable Custom 404 Page', 'mcp' ),
        'section'  => 'custom_404',
        'settings' => 'custom404_enable',
        'type' => 'radio',
        'choices' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
    ) ) );






    
 ?>