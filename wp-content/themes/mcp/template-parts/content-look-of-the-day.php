<?php
/**
 * The template used for displaying page content in homepage-teamplate.php
 *
 * @package mcp
 */
$default_lang_id = icl_object_id( get_the_ID(), 'page', true, 'nl' );

?>

<section id="" class="section-identity clearfix">
	<div class="section-identity-inner">
		<p class="section-heading">
			<?php the_field('look_of_the_day_title');?>
		</p>
		<p class="section-subheading">
			<?php the_field('look_of_the_day_subtitle');?>
		</p>

		<div class="look-of-the-day-wrapper clearfix">

			<div class="image-content-left">
				<div class="image-content-left__image">
					<img src="<?php echo @get_field('look_of_the_day_image_left', $default_lang_id)['sizes']['collection-image']; ?>" alt="">
				</div>
				<div class="image-content-left__content">
					<p><?php the_field('look_of_the_day_image_left_text'); ?></p>
				</div>
			</div>

			<div class="products-slider-right">
				<ul class="next-only products-home-slider">
					<?php

					$products = get_field('look_of_the_day_products');
					if( is_array($products) ){
						foreach ( $products as $product ) {
							lf_get_template_part( 'template-parts/content-slider-product', [ 'product' => $product ] );
						}
					}
					?>
				</ul>
			</div>

		</div>
	</div>
</section><!-- #post-## -->

