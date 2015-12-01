<?php
/**
 * Theme Customizer for Footer section.
 *
 * @package Munsa
 */
	
	// Add the footer section.
	$wp_customize->add_section(
		'footer',
		array(
			'title'       => esc_html__( 'Footer', 'munsa' ),
			'priority'    => 60,
			'panel'       => 'theme'
		)
	);
	
	// Add the footer text setting.
	$wp_customize->add_setting(
		'footer_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'munsa_sanitize_textarea'
		)
	);
	
	// Add the footer text control.
	$wp_customize->add_control(
		'footer_text',
		array(
			'label'       => esc_html__( 'Footer text', 'munsa' ),
			'description' => esc_html__( 'Replace default Footer text entering your own text.', 'munsa' ),
			'section'     => 'footer',
			'priority'    => 10,
			'type'        => 'textarea'
		)
	);
	
	// Hide from footer text setting.
	$wp_customize->add_setting(
		'hide_footer_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'munsa_sanitize_checkbox'
		)
	);
	
	// Hide footer text control.
	$wp_customize->add_control(
		'hide_footer_text',
		array(
			'label'       => esc_html__( 'Hide Footer Text', 'munsa' ),
			'description' => esc_html__( 'Check this if you want to hide Footer text.', 'munsa' ),
			'section'     => 'footer',
			'priority'    => 20,
			'type'        => 'checkbox'
		)
	);
	