<?php
/**
 * Template name: MyShop
 */

get_header(); ?>

	<div class="container">
		<main id="main" class="site-main" role="main">


			<div class="clearfix filter-header-section">
				<div class="col-md-4 title-subtitle-headings-wrapper">
					<div class="title-subtitle-wrapper">
						<p class="section-heading">
							<?php the_field('title');?>
						</p>
						<p class="section-subheading">
							<?php the_field('subtitle');?>
						</p>
					</div>
				</div>
				<div class="pull-right sort-wrapper">
					<?php echo do_shortcode( '[searchandfilter id="192"]' ); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3 filters-main-content-wrapper">
					<div class="filters-main-wrapper">
						<div class="show-filters">
							<span class="show-filters-button"><?php _e("Show filters", "mcp") ?></span>
						</div>
						<div class="hidden-filters">
							<nav id="menu-mobile">
								<?php echo do_shortcode( '[searchandfilter id="192"]' ); ?>
							</nav>
						</div>
					</div>
				</div>

				<div class="col-md-9 filters-resault-content-wrapper">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						the_content();

						?>


					<?php endwhile; // End of the loop. ?>
				</div>
			</div>

		</main><!-- #main -->
	</div>

<?php get_footer(); ?>
