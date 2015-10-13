<?php
/**
 * Template part for displaying page content in Full Background Image Template.
 *
 * @package Munsa
 */

?>
	
	<div class="entry-outer">
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
				<?php the_content(); ?>
			</div><!-- .entry-content -->

		</article><!-- #post-## -->
	
		<?php get_template_part( 'menus/menu', 'social' ); // Loads the menus/menu-social.php template. ?>
	
	</div><!-- .entry-outer -->
	
</div><!-- .featured-content -->

