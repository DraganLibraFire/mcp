<?php
/**
 * The template used for displaying page content in homepage-teamplte.php
 *
 * @package mcp
 */

?>

<section id="" class="section-bloggers-choice clearfix">
    <div class="section-bloggers-choice-inner">
        <div class="bloger-choice-text-description-volgen-wrapper clearfix">
            <div class="row">
                <div class="col-md-8">
                    <p class="section-heading">
                        <?php the_field('bloggers_choice_title'); ?>
                    </p>

                    <p class="section-subheading">
                        <?php the_field('bloggers_choice_subtitle'); ?>
                    </p>

                    <p class="section-description">
                        <?php the_field('bloggers_choice_description'); ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="bloggers-data-wrapper">
                        <div class="bloggers-data-wrapper-inner display-table fullwidth">
                            <div class="bloggers-data-wrapper-inner__avatar display-table-cell alignvertical">
                                <img src="<?php echo @get_field('bloggers_avatar')['sizes']['bloggers-avatar']; ?>"
                                     alt="">
                            </div>
                            <div class="bloggers-data-wrapper-inner__name display-table-cell alignvertical">
                                <?php the_field('bloggers_name'); ?>
                            </div>
                            <div class="bloggers-data-wrapper-inner__follow display-table-cell alignvertical">
                                <a href="<?php the_field('bloggers_social_url'); ?>" alt="blogger social url">
                                    <?php _e('Volgen', 'mcp'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bloggers-choice-wrapper">

            <div class="bloggers-choice-wrapper-inner">
                <ul class="bloggers-products-home-slider">
                    <?php
                    $products = get_field('bloggers_products');

                    if( is_array($products) ){
                        foreach ($products as $product) {
                            lf_get_template_part('template-parts/content-slider-product', ['product' => $product]);
                        }
                    }
                    ?>
                </ul>
            </div>

            <a href="<?php the_permalink( icl_object_id(9) ); ?>" class="green-fancy-button">
                <?php _e('Discover more', 'mcp'); ?>
            </a>

        </div>
    </div>
</section><!-- #post-## -->

