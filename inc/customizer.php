<?php
/**
 * Munsa Theme Customizer.
 *
 * @package Munsa
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function munsa_customize_register( $wp_customize ) {

	// Add the theme panel.
	$wp_customize->add_panel(
		'theme',
		array(
			'title'    => esc_html__( 'Theme Settings', 'munsa' ),
			'priority' => 10
		)
	);
	
	// Load different part of the Customizer.
	require_once( get_template_directory() . '/inc/customizer/contact.php' );
	require_once( get_template_directory() . '/inc/customizer/front-page.php' );
	
	// Use live preview on some fields.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
}
add_action( 'customize_register', 'munsa_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function munsa_customize_preview_js() {
	wp_enqueue_script( 'munsa_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'munsa_customize_preview_js' );

/**
 * Sanitize the checkbox value.
 *
 * @since 1.0.0
 *
 * @param  string $input checkbox.
 * @return string (1 or null).
 */
function munsa_sanitize_checkbox( $input ) {

	if ( 1 == $input ) {
		return 1;
	} else {
		return '';
	}

}
