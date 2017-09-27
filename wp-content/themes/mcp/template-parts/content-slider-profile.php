<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package mcp
 */

$profile = $template_args['profile'];
$default_lang_id = icl_object_id( $profile->term_id, 'product-profile', true, 'nl' );

?>

<li class="single-profile">
    <div class="single-profile-inner-wrap relative">
        <div class="single-profile-image-wrapper">
            <img src="<?php echo get_field('featured_image', $profile->taxonomy . "_" . $default_lang_id)['sizes']['identity-slider-image']; ?>"
                 alt="profile cover image">
        </div>
        <a href="<?php echo get_term_link($profile); ?>" class="single-profile-content-wrapper absolute">
            <div class="single-profile-content-wrapper-inner">
                <div class="single-profile-content-wrapper-inner-inner-inner-inner-inner-itd">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-siluete.png" alt="">
                    <span><?php echo $profile->name; ?></span>
                </div>
            </div>
        </a>
    </div>
</li>
