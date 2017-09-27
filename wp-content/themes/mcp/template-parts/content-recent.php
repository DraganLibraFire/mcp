<?php
/**
 * Template part for displaying recent posts.
 *
 * @package mcp
 */

?>
<div class="col-md-4 single-recent-wrapper">
	<a href="<?php the_permalink();?>">
		<div class="single-thumbnail-wrapper">
			<?php the_post_thumbnail();?>
		</div>
		<div class="excerpt-wrapper clearfix">
			<div class="col-md-12">
				<?php the_excerpt();?>
			</div>
		</div>
	</a>
</div>