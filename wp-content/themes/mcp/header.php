<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package mcp
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" type="image/png" href="<?php echo get_theme_mod('favicon_image'); ?>"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script>
		var mcp = {
			theme_url: "<?php echo get_stylesheet_directory_uri(); ?>",
			ajax_url: "<?php echo admin_url('admin-ajax.php'); ?>"
		}
	</script>
	<?php if( isset($_GET['app']) ): ?>
		<style>

			.site-footer,
			.site-header{
				display: none;
			}

		</style>

	<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mcp' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-header-inner clearfix">
			<div class="login-language-switcher-wrapper clearfix">
				<div class="login-language-switcher-wrapper-inner pull-right">
					<?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'menu_class' => 'clearfix' ) ); ?>
					<?php languages_list_dropdown(); ?>
				</div>
			</div>
		</div> <!-- /.site-header-inner -->
		<div class="container">
			<div class="logo-menu-wrapper">
				<div class="row display-table">
					<div class="site-branding-main-logo col-md-3 site-branding display-table-cell alignbottom">
						<div class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
							</a>
						</div>
					</div><!-- .site-branding -->
					<nav id="site-navigation" class="display-table-cell alignbottom col-md-6 main-navigation clearfix" role="navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
						<div class="mobile-menu-wrapper">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'clearfix' ) ); ?>
							<div class=" socials-wrapper-header social-mobile-menu">
								<div class="socials-wrapper-header-inner">
									<?php the_social_links( true ); ?>
								</div>
							</div>
						</div>

					</nav><!-- #site-navigation -->
					<div class="col-md-3 socials-wrapper-header display-table-cell alignbottom">
						<div class="socials-wrapper-header-inner">
							<?php the_social_links( true ); ?>
						</div>
					</div>
				</div>
			</div> <!-- /.container logo-menu-wrapper clearfix -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
