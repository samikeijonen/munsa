<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Munsa
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function munsa_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'main',
		'render'         => 'munsa_infinite_scroll_render',
		'footer'         => 'page',
		'footer_widgets' => 'footer',
	) );
} // end function munsa_jetpack_setup
add_action( 'after_setup_theme', 'munsa_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function munsa_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) );
	}
} // end function munsa_infinite_scroll_render
