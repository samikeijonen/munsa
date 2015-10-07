<?php
/**
 * Template Name: Featured Image on the Left
 *
 * This page template displays content on the right and featured image on the left.
 *
 * @package Munsa
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'image-right' ); ?>

	<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
