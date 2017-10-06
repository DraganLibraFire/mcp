<?php
/**
 * The template used for displaying page content in homepage-teamplte.php
 *
 * @package mcp
 */
$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;
$POST__ID = is_tax() ? $taxonomy . "_" . $term_id : $post->ID;
?>

<section id="" class="section-collection clearfix">
	<div class="section-collection-inner">
		<div class="row">
			<div class="tabs-main-wrapper">
				<div class="tabs-wrapper clearfix">
					<?php
					$index = 0;
					// check if the repeater field has rows of data
					if( have_rows('collections', $POST__ID) ):
						echo '<ul class="nav nav-tabs">';


						// loop through the rows of data
						while ( have_rows('collections', $POST__ID) ) : the_row();

							$active = $index == 0 ? 'active' : '';

							echo '<li class="col-md-3 '. $active .'"><div class="list-tab-relative"><div class="list-tab-table"><a data-toggle="tab" href="#content-'. $index .'"><img src="'. get_sub_field('collection_image')['sizes']['collection-image'] .'"></a></div></div></li>';

							$index++;

						endwhile;

						echo '</ul>';

					endif;

					?>
				</div>

				<div class="tabs-content-wrapper clearfix">

					<?php
					$index = 0;
					// check if the repeater field has rows of data
					if( have_rows('collections', $POST__ID) ):
						echo '<ul class="nav tabs-content-wrapper-inner tab-controll">';

						// loop through the rows of data
						while ( have_rows('collections', $POST__ID) ) : the_row();

							$active = $index == 0 ? 'active' : '';

							echo "<li class='$active'>";
							?>
							<ul class="nav pull-left">
								<?php

								$products = get_sub_field('collection_products', $POST__ID);
								foreach ( $products as $product ) {
									lf_get_template_part( 'template-parts/content-slider-product', [ 'product' => $product, 'classes' => 'col-md-3 col-xs-6 ' ] );
								}

								?>
							</ul>
							<?php
							echo "</li>";

							$index++;

						endwhile;

						echo '</ul>';

					endif;

					?>
				</div>
			</div>
		</div>
	</div>
</section><!-- #post-## -->

