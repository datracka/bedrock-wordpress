<?php
/**
 * The template for displaying search results.
 */
get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<div id="posts-container" class="clearfix">

			<?php while ( have_posts() ) : the_post();

				get_template_part( 'content' );

			endwhile; ?>

		</div>

		<div class="infinite-barrier"><span class="preloader"></span><p class="end"><?php _e( 'No More Posts', 'krown' ); ?></p><a id="infinite-link" href="<?php echo next_posts( 0, false ); ?>"><?php _e( 'Load More Posts', 'krown' ); ?></a></div>

	<?php else : ?>

		<p class="post-excerpt" style="margin-top:60px"><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'krown' ); ?></p>

	<?php endif; ?>
	
<?php get_footer(); ?>