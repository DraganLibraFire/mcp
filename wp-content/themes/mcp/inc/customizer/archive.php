<?php 

	$wp_customize->add_section( 'arhive_options' , array(
	    'title'      => __( 'Archive', 'mcp' ),
	    'priority'   => 100,
	    'panel' => 'blog_options'
    ) );

	$wp_customize->add_setting('sidebar_layout',
	    array(
	        'default' => 'right-sidebar',
	        'sanitize_callback' => 'sidebar_sanitize_layout'
	    )
	);
	 
	$wp_customize->add_control('sidebar_layout',
	    array(
	        'type' => 'select',
	        'label' => 'Sidebar Layout:',
	        'section' => 'arhive_options',
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
	$wp_customize->add_setting('sidebar_choose',
	    array(
	        'default' => 'sidebar-1',
	        'sanitize_callback' => 'sidebar_choose_sanitize'
	    )
	);
	 
	$wp_customize->add_control('sidebar_choose',
	    array(
	        'type' => 'select',
	        'label' => 'Choose Sidebar:',
	        'section' => 'arhive_options',
	        'choices' => $registered_sidebars
	    )
	);

	$wp_customize->add_setting( 'archive_author' , array(
    	'default' => 'yes',
        'sanitize_callback' => 'sanitize_choices',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'archive_author', array(
        'label'    => __( 'Enable Author On Archive Page', 'mcp' ),
        'section'  => 'arhive_options',
        'settings' => 'archive_author',
        'type' => 'radio',
        'choices' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
    ) ) );


	$wp_customize->add_setting('blog_layout',
		array(
			'default' => 'default',
			'sanitize_callback' => 'blog_sanitize_layout'
		)
	);

	$wp_customize->add_control('blog_layout',
		array(
			'type' => 'select',
			'label' => 'Blog Layout:',
			'section' => 'arhive_options',
			'choices' => array(
				'default' => 'Default',
				'2-column' => '2 Column',
				'3-column' => '3 Column',
				'masonary' => 'Masonary',
			),
		)
	);

	$wp_customize->add_setting( 'archive_header_image' , array(
			'sanitize_callback' => 'sanitize_image'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'archive_header_image', array(
			'label'    => __( 'Archive Header Image', 'mcp' ),
			'section'  => 'arhive_options',
			'settings' => 'archive_header_image',
	) ) );

	$wp_customize->add_setting('archive_header_image_text_aligment',
			array(
					'default' => 'center',
					'sanitize_callback' => 'blog_sanitize_aligment'
			)
	);

	$wp_customize->add_control('archive_header_image_text_aligment',
			array(
					'type' => 'select',
					'label' => 'Archive Title Aligment:',
					'section' => 'arhive_options',
					'choices' => array(
							'center' => 'Center',
							'left' => 'Left',
							'right' => 'Right',
					),
			)
	);

	$wp_customize->add_setting( 'archive_description' , array(
			'default'   => '',
			'sanitize_callback' => 'text_sanitize'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'archive_description', array(
			'label'    => __( 'Archive Description', 'mcp' ),
			'section'  => 'arhive_options',
			'settings' => 'archive_description',
	) ) );

	$wp_customize->add_setting( 'show_read_more' , array(
			'default' => 'yes',
			'sanitize_callback' => 'sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'show_read_more', array(
			'label'    => __( 'Show Read More Button', 'mcp' ),
			'section'  => 'arhive_options',
			'settings' => 'show_read_more',
			'type' => 'radio',
			'choices' => array(
					'yes' => 'Yes',
					'no' => 'No',
			),
	) ) );

 ?>