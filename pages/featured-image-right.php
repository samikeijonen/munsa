<?php
/**
 * Template Name: Featured Image on the Right
 *
 * This page template displays content on the left and featured image on the right.
 *
 * @package Munsa
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'misc/content', 'image-right' ); ?>

	<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
