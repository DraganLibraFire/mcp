<?php
/**
 * Template name: About us
 */

get_header(); ?>

	<div class="container">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<section id="" class="clearfix section-about-us">
					<div class="clearfix section-about-us-inner">
						<div class="row">
							<div class="col-xs-12">
								<p class="section-heading">
									<?php the_title();?>
								</p>
								<p class="section-subheading">
									<?php the_field('subtitle');?>
								</p>
							</div>

						</div>
					</div>

					<div class="main-content-wrapper">

						<div class="about-us-content-wrapper">
							<?php the_content(); ?>
						</div>

						<div class="about-us-inner-pages-section">
							<?php get_recent_articles( 2, get_field('articles')) ?>
						</div>

						<div class="about-us-discover-section">
							<?php get_template_part( 'template-parts/content', 'discover' ); ?>
						</div>



					</div>
				</section><!-- #post-## -->


			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div>

<?php get_footer(); ?>
