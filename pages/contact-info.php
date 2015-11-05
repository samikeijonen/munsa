<?php
/**
 * Template Name: Contact Info
 *
 * This is the page template for Contact Info which you can set in the Customizer.
 *
 * @package Munsa
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
	
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
			</header><!-- .entry-header -->
	
			<?php 
				if ( ! get_theme_mod( 'hide_from_contact_page' ) ) :
					munsa_contact_info(); // Show contact info if it's not hidden. This function is in inc/template-tags.php file.
				endif;
			?>
			
			<div class="entry-inner">

				<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
					<?php the_content(); ?>
				</div><!-- .entry-content -->
		
			</div><!-- .entry-inner -->
	
		</article><!-- #post-## -->

		<?php get_template_part( 'misc/content', 'child-pages' ); // Load misc/content-child-pages.php template. ?>

	<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
