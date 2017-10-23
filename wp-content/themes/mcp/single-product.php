<?php
/**
 * The template for displaying all single posts.
 *
 * @package mcp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="container">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'product' ); ?>

				<?php endwhile; // End of the loop. ?>
			</main><!-- #main -->

		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>
