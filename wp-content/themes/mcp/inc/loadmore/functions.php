<?php
function loadmore_scripts() {
    global $wp_query;
    wp_enqueue_script('loadmore-lib', get_stylesheet_directory_uri() . '/inc/loadmore/combined.js', array('jquery'), '1', true);
    wp_enqueue_script('isotope-config-js', get_stylesheet_directory_uri() . '/inc/loadmore/isotope-config.js', array('loadmore-lib'), '20120206', true);

    wp_localize_script('isotope-config-js', 'masonaryconfig', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
add_action( 'wp_enqueue_scripts', 'loadmore_scripts' );

function prefix_load_more_items() {

    $previous_vars = $_POST['wp_query_vars'];
    $offset = $_POST['post_offset'];

    $previous_vars['offset'] = $offset;
    $load_more_query = new WP_Query($previous_vars);
    if($load_more_query->have_posts()):


        while ( $load_more_query->have_posts() ) : $load_more_query->the_post(); ?>
            <?php get_template_part( 'template-parts/content', 'single-archive-prodotto' ); ?>
        <?php endwhile;
    endif;
}
add_action( 'wp_ajax_load_more_items', 'prefix_load_more_items' );
add_action( 'wp_ajax_nopriv_load_more_items', 'prefix_load_more_items' );

