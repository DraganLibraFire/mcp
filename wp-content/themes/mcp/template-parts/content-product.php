<?php
/**
 * Template part for displaying single posts.
 *
 * @package mcp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header clearfix">
		<div class="row">
			<div class="clearfix col-md-8 section-single-post-header-inner-title-subtitle">
				<p class="section-heading">
					<?php _e('My color ID shop', 'mcp'); ?>
				</p>
				<p class="section-subheading">
					<?php the_field('subtitle');?>
				</p>
			</div>
			<div class="col-md-4 text-right section-single-post-header-inner-back-to-archive">
				<a class="back-btn" href="<?php echo get_permalink( 9 ); ?><?php if( isset($_GET['view']) && $_GET['view'] == 'app' ): echo '?view=app'; endif;?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i><?php _e('Terug naar winkeloverzicht', 'mcp'); ?></a>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="single-product-main-content-wrapper">
		<?php $images = get_field( 'images' ); ?>

		<div class="clearfix single-product-top-conten-wrapper">
			<div class="single-product-images-wrapper col-md-7">
				<ul class="single-product-slider-small">
					<?php

					if( is_array($images) ){
						foreach ($images as $image) {
							?>
							<li>
								<img src='<?php echo $image['sizes']['single-product-slider-small']; ?>' />
							</li>
							<?php
						}
					}

					?>
				</ul>
				<ul class="single-product-slider-big">
					<?php

					if( is_array($images) ){
						foreach ($images as $image) {
							?>
							<li>
								<a class="thumbnail gallery" href="<?php echo $image['url']; ?>"><img src='<?php echo $image['url']; ?>' /></a>
							</li>
							<?php
						}
					}

					?>
				</ul>
			</div>
			<div class="single-product-content-right-wrapper col-md-5">
				<div class="product-image-wrapper">
					<?php the_brand_image( null, get_the_ID() ); ?>
				</div>
				<div class="product-title-wrapper">
					<?php the_title();?>
				</div>
				<div class="product-price-wrapper">
					<span class="currency-wrapper">€</span><?php the_field('price');?>
				</div>
				<div class="wishlist-button-wrapper">
					<input type="hidden" value="<?php the_ID(); ?>" id="product_id">
					<?php echo get_wishlist_button( get_the_ID() ); ?>
				</div>

				<div class="product-content-wrapper">
					<?php echo apply_filters('the_content', str_replace("â¢", "<br />•", get_the_content())); ?>
				</div>

				<div class="product-go-to-btn">
					<div class="product-go-to-btn-inner-wrapper">
						<a target="_blank" href="<?php the_field('product_link'); ?>">
							<?php _e('ga naar', 'mcp');?> <?php the_brand_name( null, get_the_ID() );?> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
						</a>
					</div>
				</div>

				<div class="product-single-share-wrapper">
					<div class="share-buttons ">
						<div class="share-label"><?php _e('Share', 'mcp'); ?></div>
						<div class="share-links-wrapper">
							<!-- Facebook -->
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Share on Facebook" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook transition-all-05"></i> </a>
							<!-- Twitter -->
							<a href="http://twitter.com/home?status=<?php the_permalink(); ?>" title="Share on Twitter" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter transition-all-05"></i> </a>
							<!-- Google+ -->
							<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Share on Google+" target="_blank" class="btn btn-googleplus"><i class="fa fa-google-plus transition-all-05"></i></a>
							<!-- LinkedIn -->
							<a href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=<?php the_permalink(); ?>" title="Share on LinkedIn" target="_blank" class="btn btn-linkedin"><i class="fa fa-linkedin transition-all-05"></i> </a>
							<!-- Pinterest -->
							<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>]&description=<?php the_title(); ?>" class="btn btn-pinterest" target="_blank" title="Share on Pinterest"><i class="fa fa-pinterest transition-all-05"></i></a>

						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		$custom_taxterms = wp_get_object_terms( $post->ID, 'product-profile', array('fields' => 'ids') );

		if( !empty($custom_taxterms) ) :
		?>
		<div class="related-items-wrapper clearfix">
			<p class="section-heading">
				<?php _e('Welke items voltooien deze look en passen bij mijn kleurenprofiel?', 'mcp'); ?>
				<div class="related-items-inner">
					<ul class="related-items-slider bloggers-products-home-slider">
						<?php

						// arguments
						$args = array(
								'post_type' => 'product',
								'post_status' => 'publish',
								'posts_per_page' => 20, // you may edit this number
								'orderby' => 'rand',
								'tax_query' => array(
										array(
												'taxonomy' => 'product-profile',
												'field' => 'id',
												'terms' => $custom_taxterms
										)
								),
								'post__not_in' => array ($post->ID),
						);
						$related_items = new WP_Query( $args );
						// loop over query
						if ($related_items->have_posts()) :
							while ( $related_items->have_posts() ) : $related_items->the_post();
								get_template_part('template-parts/content', 'single-product');
							endwhile;
						endif;
						// Reset Post Data
						wp_reset_postdata();
						?>

					</ul>
				</div>
			</p>
		</div>

		<?php endif; ?>
	</div>


</article><!-- #post-## -->

