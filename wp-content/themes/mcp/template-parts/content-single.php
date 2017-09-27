<?php
/**
 * Template part for displaying single posts.
 *
 * @package mcp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header clearfix">
		<div class="row head-wrap-single-post">
			<div class="clearfix col-xs-12 section-single-post-header-inner-title-subtitle">
				<p class="section-heading">
					<?php the_title();?>
					<a class="pull-right back-btn" href="<?php echo get_permalink( get_option('page_for_posts', true) ); ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i><?php _e('Terug naar het blogoverzicht', 'mcp'); ?></a>
				</p>
				<p class="col-md-8 section-subheading">
					<?php the_field('subtitle');?>
				</p>

			</div>

		</div>

	</header><!-- .entry-header -->
	<div class="clearfix featured-image-sidebar-wrapper">
		<div class="row">
			<div class="single-post-featured-image-wrapper col-md-8">
				<?php the_post_thumbnail('full', array('class'	=> 'fullwidth')); ?>
			</div>
			<div class="single-post-sidebar-wrapper col-md-4">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
				<div class="share-buttons ">
					<div class="share-label"><?php _e('Delen met vrienden', 'mcp'); ?></div>
					<div class="share-links-wrapper">
						<!-- Facebook -->
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Share on Facebook" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook transition-all-05"></i> </a>
						<!-- Twitter -->
						<a href="http://twitter.com/home?status=<?php the_permalink(); ?>" title="Share on Twitter" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter transition-all-05"></i> </a>
						<!-- Google+ -->
						<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Share on Google+" target="_blank" class="btn btn-googleplus"><i class="fa fa-google-plus transition-all-05"></i></a>
						<!-- LinkedIn -->
						<a href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=<?php the_permalink(); ?>" title="Share on LinkedIn" target="_blank" class="btn btn-linkedin"><i class="fa fa-linkedin transition-all-05"></i> </a>
						<!-- Pinterest -->
						<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>]&description=<?php the_title(); ?>" class="btn btn-pinterest" target="_blank" title="Share on Pinterest"><i class="fa fa-pinterest transition-all-05"></i></a>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix entry-content">
		<?php
		if( get_post_format() == 'quote' ){
			?>
			<div class="article-desc col-md-8 clearfix">
				<div class="col-md-2 quote-span">
					<i class="fa fa-quote-right" aria-hidden="true"></i>
				</div>
				<div class="col-md-10 article-desc">
					<?php the_content(); ?>

					<?php if( get_field('quote_author') ) : ?>
						<div class="quote-author article-desc">
							- <?php the_field('quote_author');?>
						</div>
					<?php endif; ?>
				</div>

			</div>
			<?php
		} else{
			the_content();
		}
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

