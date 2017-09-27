<?php
/**
 * The template used for displaying page content in homepage-teamplte.php
 *
 * @package mcp
 */

?>
	</div> <!-- /.row -->
</div> <!-- /.container -->
<section id="" class="section-recent-articles clearfix">
	<div class="section-recent-articles-inner">
		<p class="section-heading">
			<?php the_field('highlights_title');?>
		</p>
		<p class="section-subheading">
			<?php the_field('highlights_subtitle');?>
		</p>

		<div class="recent-articles-wrapper">

			<?php get_recent_articles( 4 ); ?>

		</div>
	</div>
</section><!-- #post-## -->
<div class="container">
	<div class="row">
