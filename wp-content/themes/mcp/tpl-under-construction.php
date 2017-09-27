<?php
/**
 * Template name: Under Construction
 */

get_header(); ?>

	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="container">
				<?php the_content(); ?>
				<?php //get_template_part( 'template-parts/content', 'discover' ); ?>
			</div>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

<?php get_footer(); ?>