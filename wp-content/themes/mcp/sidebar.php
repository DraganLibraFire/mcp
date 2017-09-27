<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package mcp
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area col-sm-4 col-xs-12" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	
</div><!-- #secondary -->
