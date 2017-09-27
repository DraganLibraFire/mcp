<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package mcp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="container">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found text-center">
					<div class="not-found-icon-wrap align-center">
						<i class="fa fa-frown-o" aria-hidden="true"></i>
					</div>
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mcp' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'mcp' ); ?></p>

						<?php //get_search_form(); ?>

						<?php //the_widget( 'WP_Widget_Recent_Posts' ); ?>



						<?php
						/* translators: %1$s: smiley */
//						$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'mcp' ), convert_smilies( ':)' ) ) . '</p>';
//						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
						?>

						<?php //the_widget( 'WP_Widget_Tag_Cloud' ); ?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>
