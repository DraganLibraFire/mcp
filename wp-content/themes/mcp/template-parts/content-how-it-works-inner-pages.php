<?php
/**
 * The template used for displaying page content in homepage-teamplte.php
 *
 * @package mcp
 */

?>

<section id="" class="section-how-it-works-inner-pages-wrapper clearfix">
	<div class="section-how-it-works-inner-pages-wrapper-inner">
		<?php
		$child_pages = new WP_Query([
			'posts_per_page'		=> -1,
			'post_type'				=> 'page',
			'post_status'			=> 'published',
			'post_parent'			=> $post->ID
		]);

		if ( $child_pages->have_posts() ) :
			?><div class="inner-pages-wrapper clearfix"><?php
		    while( $child_pages->have_posts() ) :
		        $child_pages->the_post();

				?>
					
					<div class="single-inner-page" style="background-color: <?php the_field('page_color');?>">
						<a href="<?php the_permalink(); ?>" class="single-inner-page-inner">
							<div class="single-inner-page-content-wrapper">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-siluete.png" alt="">
								<div class="single-inner-page-title-inner">
									<?php the_title(); ?>
								</div>
							</div>
						</a>
					</div>
					
				<?php

		    endwhile;
			?></div><?php
		endif;
		?>
	</div>
</section><!-- #post-## -->

