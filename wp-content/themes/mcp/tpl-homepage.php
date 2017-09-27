<?php
/**
 * Template name: Homepage
 */

get_header(); ?>

	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'header' ); ?>
			<?php get_template_part( 'template-parts/content', 'discover' ); ?>
			<?php get_template_part( 'template-parts/content', 'identity' ); ?>
			<?php get_template_part( 'template-parts/content', 'look-of-the-day' ); ?>
			<?php get_template_part( 'template-parts/content', 'community' ); ?>
			<?php get_template_part( 'template-parts/content', 'my-color-my-id' ); ?>
			<?php get_template_part( 'template-parts/content', 'bloggers-choice' ); ?>
			<?php get_template_part( 'template-parts/content', 'recent-articles' ); ?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

<?php get_footer(); ?>
