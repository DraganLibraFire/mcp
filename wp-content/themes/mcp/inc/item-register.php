<?php
add_action( 'init', 'codex_brand_init' );
function codex_brand_init() {
    $labels = array(
        'name'               => _x( 'Product', 'post type general name', 'mcp' ),
        'singular_name'      => _x( 'Product', 'post type singular name', 'mcp' ),
        'menu_name'          => _x( 'Product', 'admin menu', 'mcp' ),
        'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'mcp' ),
        'add_new'            => _x( 'Add New Product', 'Product', 'mcp' ),
        'add_new_item'       => __( 'Add New Product', 'mcp' ),
        'new_item'           => __( 'New Product', 'mcp' ),
        'edit_item'          => __( 'Edit Product', 'mcp' ),
        'view_item'          => __( 'View Product', 'mcp' ),
        'all_items'          => __( 'All Products', 'mcp' ),
        'search_items'       => __( 'Search Product', 'mcp' ),
        'parent_item_colon'  => __( 'Parent Product:', 'mcp' ),
        'not_found'          => __( 'No Products found.', 'mcp' ),
        'not_found_in_trash' => __( 'No Product sfound in Trash.', 'mcp' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'mcp' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_icon' 		 => 'dashicons-products',
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'product', $args );

    $labels = array(
        'name'                       => _x( 'Product Sex', 'taxonomy general name' ),
        'singular_name'              => _x( 'Product Sex', 'taxonomy singular name' ),
        'search_items'               => __( 'Search Product Sex' ),
        'popular_items'              => __( 'Popular Product Sex' ),
        'all_items'                  => __( 'All Product Sex' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Product Sex' ),
        'update_item'                => __( 'Update Product Sex' ),
        'add_new_item'               => __( 'Add New Product Sex' ),
        'new_item_name'              => __( 'New Product Sex Name' ),
        'add_or_remove_items'        => __( 'Add or remove Sex' ),
        'choose_from_most_used'      => __( 'Choose from the most used Sex' ),
        'not_found'                  => __( 'No Sex found.' ),
        'menu_name'                  => __( 'Product Sex' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
//        'rewrite'               => array( 'slug' => 'item_type' ),
    );

    register_taxonomy( 'product-sex', 'product', $args );

    $labels = array(
        'name'                       => _x( 'Product Profile', 'taxonomy general name' ),
        'singular_name'              => _x( 'Product Profile', 'taxonomy singular name' ),
        'search_items'               => __( 'Search Product Profiles' ),
        'popular_items'              => __( 'Popular Product Profiles' ),
        'all_items'                  => __( 'All Product Profiles' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Product Profile' ),
        'update_item'                => __( 'Update Product Profile' ),
        'add_new_item'               => __( 'Add New Product Profile' ),
        'new_item_name'              => __( 'New Product Profile Name' ),
        'add_or_remove_items'        => __( 'Add or remove Profiles' ),
        'choose_from_most_used'      => __( 'Choose from the most used Profiles' ),
        'not_found'                  => __( 'No Profile found.' ),
        'menu_name'                  => __( 'Product Profiles' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
//        'rewrite'               => array( 'slug' => 'item_location' ),
    );

    register_taxonomy( 'product-profile', 'product', $args );

    $labels = array(
        'name'                       => _x( 'Product Colors', 'taxonomy general name', 'mcp' ),
        'singular_name'              => _x( 'Product Colors', 'taxonomy singular name', 'mcp' ),
        'search_items'               => __( 'Search Colors', 'mcp' ),
        'popular_items'              => __( 'Popular Colors', 'mcp' ),
        'all_items'                  => __( 'All Colors', 'mcp' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Colors', 'mcp' ),
        'update_item'                => __( 'Update Colors', 'mcp' ),
        'add_new_item'               => __( 'Add New Colors', 'mcp' ),
        'new_item_name'              => __( 'New Colors', 'mcp' ),
        'add_or_remove_items'        => __( 'Add or Colors', 'mcp' ),
        'choose_from_most_used'      => __( 'Choose from the most Colors', 'mcp' ),
        'not_found'                  => __( 'No Colorss found.', 'mcp' ),
        'menu_name'                  => __( 'Product Colors', 'mcp' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
//        'rewrite'               => array( 'slug' => 'item_language' ),
    );

    register_taxonomy( 'product-color', 'product', $args );

    $labels = array(
        'name'                       => _x( 'Product Category', 'taxonomy general name' ),
        'singular_name'              => _x( 'Product Category', 'taxonomy singular name' ),
        'search_items'               => __( 'Search Product category' ),
        'popular_items'              => __( 'Popular Product category' ),
        'all_items'                  => __( 'All Product category' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Product category' ),
        'update_item'                => __( 'Update Product category' ),
        'add_new_item'               => __( 'Add New Product category' ),
        'new_item_name'              => __( 'New Product category' ),
        'add_or_remove_items'        => __( 'Add or Product category' ),
        'choose_from_most_used'      => __( 'Choose from the most Product category' ),
        'not_found'                  => __( 'No Product category found.' ),
        'menu_name'                  => __( 'Product Category' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
//        'rewrite'               => array( 'slug' => 'item_who_we_treat' ),
    );

    register_taxonomy( 'product-category', 'product', $args );

    $labels = array(
        'name'                       => _x( 'Product Brands', 'taxonomy general name' ),
        'singular_name'              => _x( 'Product Brands', 'taxonomy singular name' ),
        'search_items'               => __( 'Search Product Brands' ),
        'popular_items'              => __( 'Popular Product Brands' ),
        'all_items'                  => __( 'All Product Brands' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Product Brands' ),
        'update_item'                => __( 'Update Product Brands' ),
        'add_new_item'               => __( 'Add New Product Brands' ),
        'new_item_name'              => __( 'New Product Brands' ),
        'add_or_remove_items'        => __( 'Add or Product Brands' ),
        'choose_from_most_used'      => __( 'Choose from the most Product Brands' ),
        'not_found'                  => __( 'No Product Brands found.' ),
        'menu_name'                  => __( 'Product Brands' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
//        'rewrite'               => array( 'slug' => 'item_facilities' ),
    );

    register_taxonomy( 'product-brands', 'product', $args );

    $labels = array(
        'name'                       => _x( 'Product Occasions', 'taxonomy general name' ),
        'singular_name'              => _x( 'Product Occasions', 'taxonomy singular name' ),
        'search_items'               => __( 'Search Product Occasions' ),
        'popular_items'              => __( 'Popular Product Occasions' ),
        'all_items'                  => __( 'All Product Occasions' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Product Occasions' ),
        'update_item'                => __( 'Update Product Occasions' ),
        'add_new_item'               => __( 'Add New Product Occasions' ),
        'new_item_name'              => __( 'New Product Occasions' ),
        'add_or_remove_items'        => __( 'Add or Product Occasions' ),
        'choose_from_most_used'      => __( 'Choose from the most Product Occasions' ),
        'not_found'                  => __( 'No Product Occasions found.' ),
        'menu_name'                  => __( 'Product Occasions' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
//        'rewrite'               => array( 'slug' => 'item_facilities' ),
    );

    register_taxonomy( 'product-gelegenheden', 'product', $args );
}