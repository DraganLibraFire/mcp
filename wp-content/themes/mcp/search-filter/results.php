<?php
/**
 * Search & Filter Pro
 *
 * Sample Results Template
 *
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2014 Designs & Code
 *
 * Note: these templates are not full page templates, rather
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think
 * of it as a template part
 *
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs
 * and using template tags -
 *
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() )
{
    ?>
    <div class="brand-logo-image">
        <?php the_brand_image( $query->query['tax_query'] ); ?>
    </div>
    <ul class="filter-product-list-wrapper clearfix">
        <?php

        while ($query->have_posts())
        {
            $query->the_post();

            $lang = get_post_meta( get_the_ID(), 'lang_code', true );

            $lang = $lang == '' ? 'nl' : $lang;

//            if( $lang == ICL_LANGUAGE_CODE ){
                get_template_part('template-parts/content', 'single-product');
//            }
        }
        ?>
    </ul>

    <div class="clearfix">
        <div class="nav-links">
            <?php
            $big = 999999999; // need an unlikely integer

            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'current' => max( 1, $query->query['paged'] ),
                'total' => $query->max_num_pages,
                'prev_next' => false
            ) );
            ?>
        </div>
    </div>
    <?php
}
else
{
    ?>
    <ul class="filter-product-list-wrapper clearfix">
        <?php

        get_template_part('template-parts/content', 'no-results')
        ?>
    </ul>
    <?php
}
?>