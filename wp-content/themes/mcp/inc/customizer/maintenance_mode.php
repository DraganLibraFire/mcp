<?php 
    $wp_customize->add_section( 'maintenance_mode' , array(
        'title'      => __( 'Maintenance Mode', 'mcp' ),
        'priority'   => 260,
    ) );

        $wp_customize->add_setting( 'maintenance_page' , array(
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
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'maintenance_page', array(
        'label'    => __( 'Choose Maintenance Page:', 'mcp' ),
        'section'  => 'maintenance_mode',
        'settings' => 'maintenance_page',
        'type' => 'select',
        'choices' => $all_pages
    ) ) );

    $wp_customize->add_setting( 'maitenance_mode_enable' , array(
        'default' => 'no',
        'sanitize_callback' => 'sanitize_choices',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'maitenance_mode_enable', array(
        'section'  => 'maintenance_mode',
        'settings' => 'maitenance_mode_enable',
        'label' => __( 'Turn On Maintenace Mode', 'mcp' ),
        'type' => 'radio',
        'choices' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
    ) ) );
 ?>