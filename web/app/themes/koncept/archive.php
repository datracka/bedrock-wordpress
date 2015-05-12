<?php
/**
 * The template for displaying archives.
 */
get_header(); ?>

	<div id="posts-container" class="clearfix">

		<?php while ( have_posts() ) : the_post();

			get_template_part( 'content' );
				
		endwhile; ?>

	</div>

	<div class="infinite-barrier"><span class="preloader"></span><p class="end"><?php _e( 'No More Posts', 'krown' ); ?></p><a id="infinite-link" href="<?php echo next_posts( 0, false ); ?>"><?php _e( 'Load More Posts', 'krown' ); ?></a></div>

<?php get_footer(); ?>