<?php
/**
 * Template part for displaying posts.
 *
 * @package mcp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="single-blog-image-wrapper">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('recent-blog-post-archive');?>
			</a>
		</div>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<div class="single-blog-title-wrapper">
			<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
		</div>
		<div class="article-desc">
			<?php limit_text_lf('content', 150, true); ?>
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
	</div><!-- .entry-content -->

</article><!-- #post-## -->
