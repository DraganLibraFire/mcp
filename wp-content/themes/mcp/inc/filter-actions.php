<?php

function get_category_list_lf( $taxonomy, $item, $type ){

    $terms = get_terms( array( 'taxonomy' => $taxonomy, 'hide_empty' => false ) );

    foreach( $terms as $term ){

        ?>

        <li class="<?php echo $type; ?>">
            <label for="<?php echo $term->slug; ?>">
                <input data-link="<?php echo get_term_link($term); ?>?app" <?php echo $item->slug == $term->slug ? "checked = 'checked'" : ""; ?> class="" id="<?php echo $term->slug; ?>" name="<?php echo $taxonomy; ?>" type="<?php echo $type; ?>" value="<?php echo $term->slug; ?>">
                <span class="radio-button-after"></span>
                <span class="category-name"><?php echo $term->name; ?></span>
            </label>
        </li>

        <?php
    }

}
function list_related_repeater_colors( $name, $taxonomy, $ID = 0 ){
    $default_lang_id = icl_object_id( $ID, 'product-profile', true, 'nl' );
    // check if the repeater field has rows of data
    if( have_rows($name, $taxonomy . "_" . $default_lang_id) ):

     	// loop through the rows of data
        while ( have_rows($name, $taxonomy . "_" . $default_lang_id) ) : the_row();

            // display a sub field value

           ?>
            <li class="single-color"  style="background: <?php the_sub_field('color');; ?>;">
                <div class="single-color-inner">&nbsp;</div>
            </li>
            <?php
        endwhile;

    else :

        // no rows found

    endif;
}
function list_related_colors( $colors ){

    if( is_array($colors) ){
        foreach( $colors as $color ){

            ?>

            <li class="single-color"  style="background: <?php echo $color->name; ?>;">
                <div class="single-color-inner">&nbsp;</div>
            </li>

            <?php
        }
    }
}

function the_brand_image( $tax_query = null, $post_id = null, $taxonomy_name = 'product-brands' ){
    ;
    $brand = [];

    if( is_array($tax_query) ){

        foreach ( $tax_query  as $item) {
            if( isset($item['taxonomy']) ){

                if( $item['taxonomy'] == $taxonomy_name ){
                    $brand = end($item['terms']);
                    break;
                }

            }
        }

    }
    if( count($brand) > 0 ){
        ?>

        <img src="<?php echo get_field('logo', get_term_by( 'slug', $brand, $taxonomy_name ) ); ?>" alt="">

        <?php
    } elseif( $post_id != null ){
        $terms = wp_get_post_terms( $post_id, $taxonomy_name ); ?>
        <img src="<?php echo get_field('logo', $terms[0] ); ?>" alt="">

    <?php
    }
}
function the_brand_name( $tax_query = null, $post_id = null, $wrap = "'", $taxonomy_name = 'product-brands' ){

    $brand = [];

    if( is_array($tax_query) ){

        foreach ( $tax_query  as $item) {
            if( isset($item['taxonomy']) ){

                if( $item['taxonomy'] == $taxonomy_name ){
                    $brand = $item['terms'][0];
                }

            }
        }

    }
    if( count($brand) > 0 ){
        ?>

        <span class="single-product-brand-name"><?php echo $brand->name; ?></span>

        <?php
    } elseif( $post_id != null ){
        $terms = wp_get_post_terms( $post_id, $taxonomy_name );?>
        <span class="single-product-brand-name"><?php echo $wrap . @$terms[0]->name . $wrap; ?></span>

        <?php
    }
}
?>