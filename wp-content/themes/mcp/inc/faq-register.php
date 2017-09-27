<?php
add_action( 'init', 'FAQ_init' );
function FAQ_init(){
    $labels = array(
        'name' => _x('FAQ', 'post type general name', 'mcp'),
        'singular_name' => _x('FAQ', 'post type singular name', 'mcp'),
        'menu_name' => _x('FAQs', 'admin menu', 'mcp'),
        'name_admin_bar' => _x('FAQ', 'add new on admin bar', 'mcp'),
        'add_new' => _x('Add New', 'book', 'mcp'),
        'add_new_item' => __('Add New FAQ', 'mcp'),
        'new_item' => __('New FAQ', 'mcp'),
        'edit_item' => __('Edit FAQ', 'mcp'),
        'view_item' => __('View FAQ', 'mcp'),
        'all_items' => __('All FAQs', 'mcp'),
        'search_items' => __('Search FAQs', 'mcp'),
        'parent_item_colon' => __('Parent FAQs:', 'mcp'),
        'not_found' => __('No FAQs found.', 'mcp'),
        'not_found_in_trash' => __('No FAQs found in Trash.', 'mcp')
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'mcp'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'faq-item','with_front' => true),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail', 'editor')
    );

    register_post_type('faq', $args);


    $labels = array(
        'name' => _x('FAQ categorie', 'taxonomy general name'),
        'singular_name' => _x('FAQ categorie', 'taxonomy singular name'),
        'search_items' => __('Search FAQ Cat'),
        'all_items' => __('All FAQ Cat'),
        'parent_item' => __('Parent FAQ Cat'),
        'parent_item_colon' => __('Parent FAQ Cat:'),
        'edit_item' => __('Edit FAQ Cat'),
        'update_item' => __('Update FAQ Cat'),
        'add_new_item' => __('Add New FAQ Cat'),
        'new_item_name' => __('New FAQ Cat Name'),
        'menu_name' => __('FAQ Cat'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );

    register_taxonomy('faqs', 'faq', $args);

}