<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package mcp
 */

$product = $template_args['product'];
$classes = $template_args['classes'];
$default_lang_id = icl_object_id( $product->ID, 'product', true, 'nl' );

$image = get_field( 'images', $default_lang_id ) ? @get_field( 'images', $default_lang_id )[0]['sizes']['identity-slider-image'] : get_stylesheet_directory_uri() . '/images/default.jpg';

?>

<li class="single-product relative slider-product-grid <?php echo $classes; ?>">
	<div class="single-product-image-wrapper">
		<a href="<?php echo get_the_permalink($product); ?><?php if( isset($_GET['view']) && $_GET['view'] == 'app' ): echo '?view=app'; endif;?>">
			<img src="<?php echo $image; ?>" alt="product image">
		</a>
	</div>
	<div class="single-product-content-wrapper ">
		<div class="single-product-content-wrapper-inner clearfix">
			<div data-equal="slider-product-name" class="brand-name col-md-8">
				<a href="<?php echo get_the_permalink($product); ?>">
					<?php the_brand_name( null, $product->ID, "" ); ?>
				</a>
			</div>
			<div class="brand-link col-md-4">
				<a href="<?php echo get_the_permalink($product); ?>">
					<?php _e('Buy', 'mcp'); ?> <i class="fa fa-angle-right"></i>
				</a>
			</div>
			<div class="brand-price col-xs-12">
				€<?php echo number_format_i18n( get_field('price', $default_lang_id), 2 );?>
			</div>
			<div data-equal="slider-product-description" class="brand-desc col-xs-12">
				<?php echo $product->post_title; ?>
			</div>
		</div>
	</div>
</li>
