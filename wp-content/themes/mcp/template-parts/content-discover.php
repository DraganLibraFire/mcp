<?php
/**
 * The template used for displaying page content in homepage-teamplte.php
 *
 * @package mcp
 */

?>

<section id="app" class="discover-section clearfix" style="">
	<div class="col-md-5 col-md-offset-1 discover-image-wrapper">
		<img src="<?php the_field('discover_image_left', 'option');?>" class="fullwidth-image" alt="">
	</div>
	<div class="col-md-5  discover-content-main-section-wrapper">
		<div class="discover-content-wrapper">
			<div class="discover-content-wrapper-inner">
				<?php the_field('discover_text', 'option');?>
			</div>
		</div>
	</div>
</section><!-- #post-## -->
