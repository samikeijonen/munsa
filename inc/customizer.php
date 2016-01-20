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

/**
 * Check if we're on Front Page template.
 *
 * @since  1.04
 *
 * @return boolean.
 */
function munsa_is_front_page_template() {
	return is_page_template( 'pages/front-page.php' );
}

/**
 * Enqueues front-end CSS from the Customizer.
 *
 * @since 1.0.4
 * @see   wp_add_inline_style()
 */
function munsa_customizer_css() {
	
	// Get content background color, opacity and color.
	$content_bg_color             = munsa_sanitize_hex_color( get_theme_mod( 'content_background_color', apply_filters( 'munsa_content_bg_color', '#000000' ) ) );
	$content_bg_color_opacity     = absint( get_theme_mod( 'content_background_color_opacity', absint( apply_filters( 'munsa_content_bg_opacity', 80 ) ) ) );
	$content_bg_color_opacity_dec = $content_bg_color_opacity / 100;
	$content_color                = munsa_sanitize_hex_color( get_theme_mod( 'content_color', apply_filters( 'munsa_content_color', '#ffffff' ) ) );
	
	// Convert hex color to rgba.
	$content_bg_color_rgb = munsa_hex2rgb( $content_bg_color );
	
	// Content bg styles.
	$bg_color_css = '';
	
	if ( '#000000' != $content_bg_color || 80 !== $content_bg_color_opacity || '#ffffff' != $content_color ) {
			
		$bg_color_css .= "
			.featured-content .entry-outer {
				background-color: rgba( {$content_bg_color_rgb['red'] }, {$content_bg_color_rgb['green']}, {$content_bg_color_rgb['blue']}, {$content_bg_color_opacity_dec});
			}";
			
		$bg_color_css .= "
			.featured-content .entry-title,
			.featured-content .entry-outer,
			.featured-content .entry-outer a,
			.featured-content .entry-outer a:visited {
				color: {$content_color};
			}";
				
	}
	
	// Add inline styles.
	if ( ! empty( $bg_color_css ) ) {
		wp_add_inline_style( 'munsa-style', $bg_color_css );
	}
	
}
add_action( 'wp_enqueue_scripts', 'munsa_customizer_css' );
