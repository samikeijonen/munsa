<?php
/**
 * Template Name: Child Pages
 *
 * This is the page template for displaying Child Pages of this page.
 *
 * @package Munsa
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
	
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
				<?php the_content(); ?>
			</div><!-- .entry-content -->
	
		</article><!-- #post-## -->

		<?php get_template_part( 'misc/content', 'child-pages' ); // Load misc/content-child-pages.php template. ?>

	<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
