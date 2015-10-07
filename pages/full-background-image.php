<?php
/**
 * Template Name: Full Background Image
 *
 * This is the page template for Full Background Image Page.
 *
 * @package Munsa
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'full-bg' ); ?>

	<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
