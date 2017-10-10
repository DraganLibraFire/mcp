<?php
/**
 * mcp functions and definitions
 *
 * @package mcp
 */
//show_admin_bar(false);
if ( ! function_exists( 'mcp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mcp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on mcp, use a find and replace
	 * to change 'mcp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'mcp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'top-menu' => esc_html__( 'Top Menu', 'mcp' )
	) );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'mcp' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mcp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // mcp_setup
add_action( 'after_setup_theme', 'mcp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mcp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mcp_content_width', 640 );
}
add_action( 'after_setup_theme', 'mcp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function mcp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mcp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'mcp' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'mcp' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'mcp' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
			'name'          => esc_html__( 'Footer 4', 'mcp' ),
			'id'            => 'footer-4',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
	) );
	register_sidebar( array(
			'name'          => esc_html__( 'Footer 5', 'mcp' ),
			'id'            => 'footer-5',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
	) );
	register_sidebar( array(
			'name'          => esc_html__( 'Footer 5', 'mcp' ),
			'id'            => 'footer-5',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'mcp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mcp_scripts() {
	wp_enqueue_style( 'mcp-style', get_stylesheet_uri() );
	wp_enqueue_style( 'mcp-grid', get_stylesheet_directory_uri().'/css/bootstrap.min.css' );
	wp_enqueue_style( 'reset-css', get_stylesheet_directory_uri().'/css/reset.css' );
	wp_enqueue_style( 'mcp-select2-css', get_template_directory_uri() . '/css/select2.min.css' );

	wp_enqueue_style( 'lf-css', get_stylesheet_directory_uri().'/css/lf.css' );
	wp_enqueue_style( 'lf-mmenu', get_stylesheet_directory_uri().'/css/jquery.mmenu.all.css' );

	wp_enqueue_script( 'mcp-select2-js', get_template_directory_uri() . '/js/select2.min.js', array('jquery'), '25', true );
	wp_enqueue_script( 'mcp-slimScroll-js', get_template_directory_uri() . '/js/jquery.slimscroll.min.js', array('jquery'), '2', true);
	wp_enqueue_script( 'mcp-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'mcp-mmenu', get_template_directory_uri() . '/js/jquery.mmenu.all.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'mcp-main', get_template_directory_uri() . '/js/main.js', array('mcp-mmenu'), '20120206', true );

	wp_enqueue_script( 'mcp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mcp_scripts' );

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});
function customizer_css() {
	get_template_part( '/inc/customizer_css' );
}
add_action( 'wp_head', 'customizer_css', '100' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Helper Functions
 */
require get_template_directory() . '/inc/theme_functions.php';

/**
* Include slick
*/
require get_template_directory() . '/inc/slick/slick.php';

/**
 * Include import script
 */
require get_template_directory() . '/inc/import-script.php';

/**
 * Load CTP Porduct init
 */
require get_template_directory() . '/inc/item-register.php';

/**
 * Load CTP FAQ init
 */
require get_template_directory() . '/inc/faq-register.php';

/**
 * Load Filter actions
 */
require get_template_directory() . '/inc/filter-actions.php';

/**
 * Load loadmore actions
 */
require get_template_directory() . '/inc/loadmore/functions.php';

/**
 * Load loadmore actions
 */
require get_template_directory() . '/inc/featherlight/featherlight.php';
/*
 * Wp-Login Logo Change
 * */
function my_login_logo() { ?>
	<style type="text/css">
		#login h1 a, .login h1 a {
			background-image: url(<?php echo( get_header_image() ); ?>);
			width: 100% !important;
			background-size: 55%;
			max-height: 150px;
			padding-bottom: 30px;
		}

	</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDjdvpK6m93WSU3PCfOS4KGMZZvGS4gW1A');
}

add_action('acf/init', 'my_acf_init');

add_filter('acf/settings/google_api_key', function () {
	return 'AIzaSyDjdvpK6m93WSU3PCfOS4KGMZZvGS4gW1A';
});
function languages_list_dropdown(){
	$languages = icl_get_languages('skip_missing=0&orderby=code');
	if(!empty($languages)){
		echo '<select id="lang_dropdown" class="menu dropdown-menu">';
		foreach($languages as $l){
			$opt_attr = $l['active'] ? 'class="icl_lang_sel_current" selected="selected"' : 'class="menu-item"';
			echo '<option value="'. $l['url'] .'" ' . $opt_attr .'>' . icl_disp_language($l['native_name']). '</option>';
		}
		echo '</select>';
	}
}
function lf_get_template_part( $file, $template_args = array(), $cache_args = array() ) {
	$template_args = wp_parse_args( $template_args );
	$cache_args = wp_parse_args( $cache_args );
	if ( $cache_args ) {
		foreach ( $template_args as $key => $value ) {
			if ( is_scalar( $value ) || is_array( $value ) ) {
				$cache_args[$key] = $value;
			} else if ( is_object( $value ) && method_exists( $value, 'get_id' ) ) {
				$cache_args[$key] = call_user_method( 'get_id', $value );
			}
		}
		if ( ( $cache = wp_cache_get( $file, serialize( $cache_args ) ) ) !== false ) {
			if ( ! empty( $template_args['return'] ) )
				return $cache;
			echo $cache;
			return;
		}
	}
	$file_handle = $file;
	do_action( 'start_operation', 'hm_template_part::' . $file_handle );
	if ( file_exists( get_stylesheet_directory() . '/' . $file . '.php' ) )
		$file = get_stylesheet_directory() . '/' . $file . '.php';
	elseif ( file_exists( get_template_directory() . '/' . $file . '.php' ) )
		$file = get_template_directory() . '/' . $file . '.php';
	ob_start();
	$return = require( $file );
	$data = ob_get_clean();
	do_action( 'end_operation', 'hm_template_part::' . $file_handle );
	if ( $cache_args ) {
		wp_cache_set( $file, $data, serialize( $cache_args ), 3600 );
	}
	if ( ! empty( $template_args['return'] ) )
		if ( $return === false )
			return false;
		else
			return $data;
	echo $data;
}
function limit_text_lf( $type, $limit, $echo = true, $contents = null ){

	if( $type == 'title' )
		$content_to_limit = get_the_title();
	elseif( $type == 'excerpt' )
		$content_to_limit = get_the_excerpt();
	elseif( $type == 'content' ){
		$content_to_limit = get_the_content();
	} else {
		$content_to_limit = $contents;
	}

	$content_to_limit = wp_strip_all_tags($content_to_limit);

	if( strlen( mb_substr( $content_to_limit, 0, $limit, 'UTF-8') ) > ( $limit - 3 ) ){
		$html = substr_replace(mb_substr($content_to_limit, 0, $limit, 'UTF-8'), '...', -3);
	}
	else {
		$html = $content_to_limit;
	}

	if( $echo )
		echo $html;
	else
		return $html;

}
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-lf-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

function load_custom_wp_admin_style() {
	wp_register_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/admin-style.css', false, '1.0.0' );
	wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

function get_recent_articles( $postnum, $posts_array = null ){
	?>
	<div class="recent-articles-wrapper-inner">
		<ul class="recent-articles-wrapper-inner-list">
			<div class="row">
				<?php
				$args = array(
						'post_type' => 'post',
						'numberposts' => $postnum,
						'suppress_filters' => 0
				);

				if( $posts_array != null ){
					$articles = $posts_array;
				} else{
					$articles = get_posts($args);
				}



				foreach ( $articles as $article ) {
					lf_get_template_part( 'template-parts/content-recent-article', [ 'article' => $article ] );
				}
				?>
			</div>
		</ul>
	</div>
	<?php
}

function get_wishlist_button( $product_id ){
	if( is_user_logged_in() ){
		global $current_user;

		$wishlisted = get_user_meta($current_user->ID, 'wishlist_list', true);

		if( is_array($wishlisted) ){
			if( in_array( $product_id, $wishlisted ) ){
				return '<div class="logged-in add-to-wishlist-wrapper">
							' . __("Verwijder uit wenslijst", "mcp") . '
							<span class="wishlist-response-wrapper">
								<i class="fa fa-heart" aria-hidden="true"></i>
							</span>
						</div>';
			} else{
				return '<div class="logged-in add-to-wishlist-wrapper">
							' . __("Voeg toe aan wenslijst", "mcp") . '
							<span class="wishlist-response-wrapper">
								<i class="fa fa-heart-o" aria-hidden="true"></i>
							</span>
						</div>';
			}
		} else{
			return '<div class="add-to-wishlist-wrapper">
						' . __("Verwijder uit wenslijst", "mcp") . '
						<span class="wishlist-response-wrapper">
							<i class="fa fa-heart-o" aria-hidden="true"></i>
						</span>
					</div>';
		}
	} else{
		return '<div class="add-to-wishlist-wrapper logged-out">
					' . sprintf(__("U moet <a href='%s'>ingelogd zijn</a> om dit product toe te voegen aan uw wenslijst", "mcp"), wp_login_url( get_permalink() ) ) . '
				</div>';
	}
}

add_action('wp_ajax_add_to_wishlist', 'add_to_wishlist');
add_action('wp_ajax_nopriv_add_to_wishlist', 'add_to_wishlist');

function add_to_wishlist(){
    $product_id = $_POST['product_id'];

	if( is_user_logged_in() ){
		global $current_user;

//		delete_user_meta($current_user->ID, 'wishlist_list');

		$wishlisted = get_user_meta($current_user->ID, 'wishlist_list', true);

		if( in_array( $product_id, $wishlisted ) ){
			if(($key = array_search($product_id, $wishlisted)) !== false) {
				unset($wishlisted[$key]);
			}

		}
		else{
			$wishlisted[] = $product_id;

		}

		update_user_meta( $current_user->ID, 'wishlist_list', $wishlisted);
	}

	$button = get_wishlist_button( $product_id );
	die( $button );
}

/* WK Admin logo */
function lf_remove_admin_wp_logo()
{
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
}

add_action( 'admin_bar_menu', function( \WP_Admin_Bar $bar )
{
	$bar->add_menu( array(
			'id'     => 'wpse',
			'parent' => null,
			'group'  => null,
			'title'  => __( '<img style="width: 130px" src="https://webkrunch-webdesign-webkrunch1.netdna-ssl.com/wp-content/uploads/2016/09/webkrunch-logo.png" />', 'some-textdomain' ),
			'href'   => 'https://www.webkrunch.be',
			'meta'   => array(
					'target'   => '_blank',
					'title'    => __( 'Webkrunch Support', 'wk' ),
					'html'     => '',
					'class'    => 'wpse--item',
					'rel'      => 'webkrunch',
					'tabindex' => PHP_INT_MAX,
			),
	) );
} );


/* Image sizes */
add_image_size( 'collection-image', 400, 420, true );
add_image_size( 'identity-slider-image', 390, 390, true );
add_image_size( 'bloggers-avatar', 60, 60, true );
add_image_size( 'recent-blog-post', 445, 390, true );
add_image_size( 'recent-blog-post-archive', 445, 250, true );
add_image_size( 'single-product-slider-small', 75, 110, true );


add_shortcode('discover', function(){
	ob_start();
	get_template_part( 'template-parts/content', 'discover' );
	$contents = ob_get_contents();
	ob_clean();
	return $contents;
});
add_action('template_redirect', function(){
	if( strpos($_SERVER['REQUEST_URI'], 'myinspo') ){
		header("Location: ". get_term_link(516, 'product-profile'));
	}
});
if( !is_user_logged_in() ){

	add_action('template_redirect', function(){

		if(isset($_GET['view'])){
			if(
					!strpos($_SERVER['REQUEST_URI'], 'myshop') &&
					!strpos($_SERVER['REQUEST_URI'], 'product') &&
					!strpos($_SERVER['REQUEST_URI'], 'myinspo')

			){
				header("Location: ". get_permalink(1999));
			}

		} else{

			/*if(!strpos($_SERVER['REQUEST_URI'], 'product')){*/
				if(!strpos($_SERVER['REQUEST_URI'], 'under-construction')){
					header("Location: ". get_permalink(1999));
				}
			/*}*/



		}

	});
}
//add_action('init', function(){
//	$args = array(
//		'post_type'			=> 'product',
//		'posts_per_page'	=> -1
//	);
//
//	$prod_q = new WP_Query($args);
//
//	if ( $prod_q->have_posts() ) :
//
//	    while( $prod_q->have_posts() ) :
//	        $prod_q->the_post();
//
//
//			update_field('xls_index', '0', get_the_ID());
//
//	    endwhile;
//
//	endif;
//});
