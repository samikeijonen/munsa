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
	require_once( get_template_directory() . '/inc/customizer/social-menu.php' );
	require_once( get_template_directory() . '/inc/customizer/footer.php' );
	
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
	wp_enqueue_script( 'munsa_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151028', true );
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

/**
 * Sanitizes the footer content on the customize screen. Users with the 'unfiltered_html' cap can post 
 * anything. For other users, wp_filter_post_kses() is ran over the setting.
 *
 * @since 1.0.0
 */
function munsa_sanitize_textarea( $setting, $object ) {

	// Make sure we kill evil scripts from users without the 'unfiltered_html' cap.
	if ( 'footer_text' == $object->id && ! current_user_can( 'unfiltered_html' ) ) {
		$setting = stripslashes( wp_filter_post_kses( addslashes( $setting ) ) );
	}

	// Return the sanitized setting.
	return $setting;
	
}
