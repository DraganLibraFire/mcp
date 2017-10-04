<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package mcp
 */

$article = $template_args['article'];
$image = get_the_post_thumbnail_url($article, 'recent-blog-post');
?>

<li class="single-article relative">
    <div class="single-article-inner">
        <div class="single-article-image-wrapper">
            <a href="<?php echo get_the_permalink($article); ?>">
                <img src="<?php echo $image; ?>" alt="recent blog article">
            </a>
        </div>
        <div data-equal="recent-article-content" class="single-article-content-wrapper">
            <div class="single-article-content-wrapper-inner">
                <h4 class="display-table article-name" data-equal="recent-article-title">
                    <a class="display-table-cell alignvertical" href="<?php echo get_the_permalink($article); ?>">
                        <?php echo $article->post_title; ?>
                    </a>
                </h4>

                <div class="article-publish-date">
                    <?php _e('Published'); ?> | <?php echo get_the_time(get_option('date_format'), $article); ?>
                </div>
                <div class="article-desc" data-equal="article-desc">
                    <?php limit_text_lf('object_content', 150, true, $article->post_content); ?>
                </div>

                <div class="article-link">
                    <a href="<?php echo get_the_permalink($article); ?>">
                        <span><?php _e('Meer'); ?></span> <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</li>
