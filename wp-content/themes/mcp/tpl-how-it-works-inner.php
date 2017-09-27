<?php
/**
 * Template name: How it works child
 */

get_header(); ?>

	<div class="container">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<section id="" class="clearfix section-about-my-cp clearfix">
					<div class="clearfix section-about-my-cp-inner">
						<div class="col-md-8">
							<p class="section-heading">
								<?php the_title();?>
							</p>
							<p class="section-subheading">
								<?php the_field('subtitle');?>
							</p>
						</div>
						<div class="col-md-4">
							<a class="back-btn" href="<?php echo get_permalink( $post->post_parent ); ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i><?php _e('Terug naar instructies overzicht', 'mcp'); ?></a>
						</div>

					</div>
					<div class="clearfix tabs-main-wrapper">

						<div class="col-md-9 tabs-content-wrapper clearfix">

							<?php
							the_field('intro_content');

							?>
						</div>
						<div class="col-md-3 tabs-wrapper clearfix">
							<?php
								wp_list_pages([
									'child_of'	=> $post->post_parent,
									'title_li'	=> ''
								]);

							?>
						</div>

					</div>

					<div class="main-content-wrapper clearfix">
						<div class="col-xs-12">
							<?php the_content(); ?>
						</div>
					</div>
				</section><!-- #post-## -->


			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div>

<?php get_footer(); ?>
