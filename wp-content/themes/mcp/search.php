<?php
/**
 * The template for displaying search results pages.
 *
 * @package mcp
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div class="container">
			<div class="col-sm-8 col-xs-12">

				<main id="main" class="site-main" role="main">

					<?php if ( have_posts() ) : ?>
						<div class="not-found-icon-wrap align-center">
							<i class="fa fa-smile-o" aria-hidden="true"></i>
						</div>
						<header class="page-header">
							<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'mcp' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .page-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );
							?>

						<?php endwhile; ?>

						<?php the_posts_navigation(); ?>

					<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>

				</main><!-- #main -->
			</div>
			<?php get_sidebar(); ?>
		</div>
	</section><!-- #primary -->

<?php get_footer(); ?>
