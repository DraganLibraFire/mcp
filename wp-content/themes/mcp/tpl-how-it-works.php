<?php
/**
 * Template name: How it works
 */

get_header(); ?>

	<div class="container">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<section id="" class="clearfix section-how-it-works">
					<div class="clearfix section-how-it-works-inner">
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
						<div class="how-it-works-intro-wrapper">
							<?php the_field('intro_video');?>
						</div>

						<div class="how-it-works-discover-section">
							<?php get_template_part( 'template-parts/content', 'discover' ); ?>
						</div>

						<div class="how-it-works-content-wrapper">
							<?php the_content(); ?>
						</div>

						<div class="how-it-works-inner-pages-section">
							<?php get_template_part( 'template-parts/content', 'how-it-works-inner-pages' ); ?>
						</div>

					</div>
				</section><!-- #post-## -->


			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div>

<?php get_footer(); ?>
