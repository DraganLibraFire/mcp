<?php
/**
 * The template used for displaying page content in homepage-teamplte.php
 *
 * @package mcp
 */

?>

<section id="" class="section-identity clearfix">
	<div class="section-identity-inner">
		<p class="section-heading">
			<?php the_field('identity_title');?>
		</p>
		<p class="section-subheading">
			<?php the_field('identity_subtitle');?>
		</p>

		<div class="profiles-slider-wrapper">

			<ul class="profiles-slider">
				<?php
				$default_lang_id = icl_object_id( get_the_ID(), 'page', true, 'nl' );

				$profiles = get_field('profiles', $default_lang_id);

				if( is_array($profiles) ){
					foreach ( $profiles as $profile ) {
						lf_get_template_part( 'template-parts/content-slider-profile', [ 'profile' => $profile ] );
					}
				}

				?>
			</ul>

		</div>
	</div>
</section><!-- #post-## -->

