<?php
/**
 * The template used for displaying page content in homepage-teamplte.php
 *
 * @package mcp
 */

?>

<section id="" class="clearfix section-community clearfix">
	<div class="section-community-inner">
		<p class="section-heading">
			<?php the_field('community_title', 'option');?>
		</p>
		<p class="section-subheading">
			<a target="_blank" href="<?php the_field('community_subtitle_link', 'option');?>"><?php the_field('community_subtitle', 'option');?></a>
		</p>

		<div class="community-wrapper">
			<?php echo apply_filters( 'the_content', get_field('instagram_feed_shortcode', 'option') );?>
		</div>
	</div>
</section><!-- #post-## -->

