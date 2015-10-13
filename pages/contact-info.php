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

		<?php get_template_part( 'misc/content', 'contact-info' ); ?>

	<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
