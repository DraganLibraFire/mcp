<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package mcp
 */

?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="main-widgets-wrapper background__green clearfix">
			<div class="widget-wrapper">
				<div class="container-big">
					<div class="footer-widgets-wrapper">
						<?php get_template_part('template-parts/footer', 'widgets');?>
					</div>
				</div>
			</div>
		</div>
		<div class="single-widget-wrapper background__orange clearfix">
			<div class="single-widget-wrapper-inner text-center">
				<div class="container">
					<?php dynamic_sidebar('footer-5'); ?>
				</div>
			</div>
		</div>
		<?php if(get_theme_mod('footer_customizer_text') !=''):?>
		<div class="site-info">
			<div class="container">
				<div class="footer-copyright col-md-12 align-center"><?php echo get_theme_mod('footer_customizer_text');?></div>
			</div>
		</div><!-- .site-info -->
		<?php endif;?>
	</footer><!-- #colophon -->

</div><!-- #page -->
<?php echo get_theme_mod('google_analytics_code');?>
<script src="https://wchat.freshchat.com/js/widget.js" async>

</script>
<script>
	window.fcSettings = {
		token: "e0961ac4-c754-40c0-a7d2-87041b1a5717",
		host: "https://wchat.freshchat.com",
	};
</script>
<?php wp_footer(); ?>

</body>
</html>
