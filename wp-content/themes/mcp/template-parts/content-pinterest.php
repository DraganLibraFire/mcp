<?php
/**
 * The template used for displaying page content in homepage-teamplte.php
 *
 * @package mcp
 */

?>

<section id="" class="section-pinterest clearfix">
	<div class="section-pinterest-inner">
		<div class="row">
			<div class="col-md-6 more-inspiration-text">
				<?php the_field('section_text', 'option');?>
			</div>
			<div class="col-md-6 pinterest-link background__orange">
				<a href="<?php the_field('pinterest_link', 'option');?>">
					<i class="fa fa-pinterest-p"></i>
				</a>
			</div>
		</div>
	</div>
</section><!-- #post-## -->

