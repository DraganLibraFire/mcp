<?php
/**
 * The template used for displaying page content in homepage-teamplte.php
 *
 * @package mcp
 */

?>

<section id="" class="section-my-color-my-id">
	<div class="section-my-color-my-id-inner clearfix">
		<div class="image-holder col-sm-6" data-get-height-of=".section-my-color-my-id-content-wrapper"  style="background-image: url(<?php the_field('color_id_background_image');?>);"></div>
		<div class="section-my-color-my-id-content-wrapper col-sm-6">
			<?php echo apply_filters( 'the_content', get_field('color_id_content') );?>
		</div>
	</div>

</section><!-- #post-## -->

