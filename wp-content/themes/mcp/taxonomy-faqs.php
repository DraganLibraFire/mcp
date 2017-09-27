<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package mcp
 */
get_header(); ?>

<?php

$term = get_queried_object();
?>

<div class="container">
	<main id="main" class="site-main" role="main">


			<section id="" class="clearfix section-faq">
				<div class="clearfix section-faq-inner">
					<div class="col-md-8">
						<p class="section-heading">
							<?php echo single_term_title( '', false ); ?>
						</p>
						<p class="section-subheading">
							<?php the_field('subtitle', 17);?>
						</p>
					</div>
					<div class="col-md-4 select-faq-content-wrapper">
						<select class="dropdown-menu" name="terms-faq-select" id="terms-faq-seclect">
							<option value="<?php echo the_permalink( icl_object_id(17) ); ?>"><?php _e('All Categories'); ?></option>

							<?php
							$terms = get_terms('faqs', array( 'hide_empty' => false ));

							foreach ($terms as $term_select) {
								?>
								<option <?php echo $term_select->term_id == $term->term_id ? "selected": ''; ?> value="<?php echo get_term_link( $term_select ); ?>"><?php echo $term_select->name; ?></option>
								<?php
							}

							?>
						</select>

					</div>

				</div>

				<div class="main-content-wrapper">

					<div class="faq-wrapper">
						<div class="wifaqki-title-list-wrapper">
							<div class="term-main-title">
								<?php echo $term->name; ?>
							</div>
							<div class="term-list accordion-wrapper">
								<?php
								$args = array(
										'post_type' => 'faq',
										'posts_per_page' => -1,
										'tax_query' => array(
												array(
														'taxonomy' => 'faqs',
														'field' => 'slug',
														'terms' => $term->slug,
												),
										),
								);
								$query = new WP_Query($args);

								while ($query->have_posts()) {
									$query->the_post();
									?>
									<div class="single-accordion-wrapper">
										<div itemtype="http://schema.org/ScholarlyArticle" class="accordion-opener">
											<div class="opener-link-wrapper">
												<a href="<?php the_permalink(); ?>" itemprop="name"><?php the_title(); ?></a>
											</div>
											<div class="opener-image">
												<i class="fa fa-chevron-down"></i>
											</div>
										</div>
										<div class="accordion-content"  style="display: none;">
											<div class="accordion-content-inner">
												<?php the_content(); ?>
											</div>
										</div>
									</div>
									<?php
								}
								?>
							</div>
						</div> <!-- /.wiki-title-list-wrapper -->

					</div>

				</div>

			</section><!-- #post-## -->


	</main><!-- #main -->

	<?php get_template_part( 'template-parts/content', 'discover' ); ?>
</div>
<?php get_footer(); ?>

