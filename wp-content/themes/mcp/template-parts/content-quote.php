<?php
/**
 * Template part for displaying posts.
 *
 * @package mcp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">

		<a href="<?php the_permalink(); ?>">
			<div class="article-desc clearfix">
				<div class="col-md-2 quote-span">
					<i class="fa fa-quote-right" aria-hidden="true"></i>
				</div>
				<div class="col-md-10 article-desc">
					<?php limit_text_lf('content', 150, true); ?>

					<?php if( get_field('quote_author') ) : ?>
						<div class="quote-author article-desc">
							- <?php the_field('quote_author');?>
						</div>
					<?php endif; ?>
				</div>

			</div>

			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="comments-posted-on-wrapper">
				<span class="post-posted-on">
					<?php echo get_the_time( get_option( 'date_format' ), $article ); ?>
				</span><!-- .entry-meta -->
					/
				<span class="comments-wrapper">
					<?php echo comments_number(); ?>
				</span>
				</div>
			<?php endif; ?>
		</a>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
