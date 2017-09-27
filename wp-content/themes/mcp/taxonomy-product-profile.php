<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package mcp
 */
get_header(); ?>

<?php
$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;
$POST__ID = is_tax() ? $taxonomy . "_" . $term_id : $post->ID;
$default_lang_id = icl_object_id( $term_id, 'product-profile', true, 'nl' );

?>
	<div id="primary" class="content-area">
		<div class="container">
			<main id="main" class="site-main" role="main">
				<div class="clearfix">
					<div class="col-md-3 filters-main-wrapper">
						<div class="profiles-radio-wrapper my-color-profile">
							<h3><?php _e('Mijn #MyCP type', 'mcp'); ?></h3>
							<ul>
								<?php get_category_list_lf( 'product-profile', get_queried_object(), 'radio' ); ?>
							</ul>
						</div>
						<div class="filters-main-wrapper profiles-radio-wrapper">
							<div class="sf-field-taxonomy-product-color">
								<h3><?php _e('#MyCP kleuren'); ?></h3>
								<ul class="sf-field-taxonomy-product-color">

									<?php list_related_repeater_colors( 'color_relation', $taxonomy,  $term_id); ?>
<!--									--><?php //list_related_colors( get_field('color_relation', $POST__ID) ); ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-9 col-xs-12 profile-inspiration-content-section">
						<div class="main-image-wrapper" style="background-image: url(<?php the_field('header_photo', $taxonomy . "_" . $default_lang_id); ?>)">
							<div class="main-image-wrapper-inner">
								<div class="main-image-wrapper-content-wrapper">
									<div class="main-image-wrapper-content-wrapper__image">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-siluete.png" alt="">
									</div>
									<div class="main-image-wrapper-content-wrapper__quote">
										<?php the_field('header_title', $POST__ID); ?>
									</div>
									<div class="main-image-wrapper-content-wrapper__title">
										<?php single_term_title( '', true ) ?>
									</div>

								</div>
							</div>
						</div>
						<div class="profile-content-wrapper">
							<?php the_field('content', $POST__ID);?>
						</div>
					</div>

				</div>

				<?php if( have_rows('collections', $POST__ID) ) : ?>
					<div class="profile-content-section">
						<?php get_template_part( 'template-parts/content', 'collection' ); ?>
					</div>
				<?php endif; ?>

				<p class="section-heading">
					<?php //the_field('community_title', 'option'); ?>
					<?php _e('Deel je momenten', 'mcp'); echo " " . $queried_object->name; ?>
				</p>
				<p class="section-subheading">
					<a target="_blank" href="https://www.instagram.com/explore/tags/<?php echo str_replace([" ", "#"], ["", ""], $queried_object->name); ?>">
						<i class="fa fa-instagram" aria-hidden="true"></i> <?php echo $queried_object->name; ?>
					</a>
				</p>
				<br>
				<?php the_field('flowbox', $POST__ID); ?>
				<?php get_template_part( 'template-parts/content', 'pinterest' ); ?>
			</main><!-- #main -->
		</div>
	</div><!-- #primary -->
<script>
	jQuery(function(){
		jQuery(".profiles-radio-wrapper input").on('change', function(){
			window.location.href = this.attributes['data-link'].value;
		})
	})
</script>
<?php get_footer(); ?>

