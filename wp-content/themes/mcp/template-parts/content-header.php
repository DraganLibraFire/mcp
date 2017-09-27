<?php
/**
 * The template used for displaying page content in homepage-teamplte.php
 *
 * @package mcp
 */

?>

<article id="" class="hero-section-main-wrapper relative" style="background-image: url(<?php the_field('section_background'); ?>);">
	<img class="not-visible" src="<?php the_field('section_background'); ?>" alt="hero image">
	<div class="hero-section-absolute-position">
		<div class="display-table">
			<div class="display-table-cell alignvertical">
				<div class="container-big">
					<div class="header-hero-section-inner">
						<?php the_field('section_text'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>


</article><!-- #post-## -->

<div class="container">
	<div class="row">
