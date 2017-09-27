<?php get_header(); ?>

<div id="primary" class="content-area ">
	<div class="container">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>
				<p class="section-heading">
					<?php _e('RECENTE STORIES', 'mcp'); ?>
				</p>
				<div class="section-subheading blog-page-list-hashtags">
					<?php
					wp_list_categories(array(
							'depth'               => 1,
							'echo'                => 1,
							'hide_empty'          => 0,
							'hide_title_if_empty' => false,
							'hierarchical'        => true,
							'order'               => 'ASC',
							'orderby'             => 'date',
							'separator'           => '',
							'show_count'          => 0,
							'show_option_all'     => '',
							'show_option_none'    => __( 'No categories' ),
							'style'               => 'list',
							'taxonomy'            => 'category',
							'title_li'            => false,
							'use_desc_for_title'  => 0,
					));
					?>
				</div>
				<?php /* Start the Loop */ ?>
				<div class="row blog-page-posts-results-wrapper">
					<div class="results">
						<?php while ( have_posts() ) : the_post(); ?>

							<div class="col-md-4 single-blog-item">
								<div class="single-blog-item-inner">
									<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
								</div>
							</div>

						<?php endwhile; ?>
					</div>
				</div>

				<div class="clearfix">
					<div class="nav-links">
						<?php
						global $wp_query;

						$big = 999999999; // need an unlikely integer

						echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages,
								'prev_text'          => __('<i class="fa fa-angle-left" aria-hidden="true"></i>'),
								'next_text'          => __('<i class="fa fa-angle-right" aria-hidden="true"></i>')
						) );
						?>
					</div>
				</div>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div>
</div><!-- #primary -->

<?php get_footer(); ?>