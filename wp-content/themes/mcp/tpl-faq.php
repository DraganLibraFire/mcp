<?php
/**
 * Template name: FAQ
 */

get_header(); ?>

	<div class="container">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<section id="" class="clearfix section-faq">
					<div class="clearfix section-faq-inner">
						<div class="col-md-8">
							<p class="section-heading">
								<?php the_title();?>
							</p>
							<p class="section-subheading">
								<?php the_field('subtitle');?>
							</p>
						</div>
						<div class="col-md-4 select-faq-content-wrapper">
							<select class="dropdown-menu" name="terms-faq-select" id="terms-faq-seclect">
								<option value="<?php echo the_permalink( icl_object_id(17) ); ?>"><?php _e('All Categories'); ?></option>
								<?php
								$terms = get_terms('faqs', array( 'hide_empty' => false ));

								foreach ($terms as $term) {
									?>
									<option value="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></option>
									<?php
								}

								?>
							</select>

						</div>

					</div>
					
					<div class="main-content-wrapper">

						<?php get_template_part( 'template-parts/content', 'faq'); ?>

					</div>

				</section><!-- #post-## -->


			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->

		<?php get_template_part( 'template-parts/content', 'discover' ); ?>
	</div>
<?php get_footer(); ?>
