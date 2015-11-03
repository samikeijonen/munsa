<?php
/**
 * Theme Customizer settings for Social Menu.
 *
 * @package Munsa
 */
	
	// Add the social menu section.
	$wp_customize->add_section(
		'social-menu',
		array(
			'title'       => esc_html__( 'Social Menu', 'munsa' ),
			'priority'    => 60,
			'panel'       => 'theme'
		)
	);
	
	// Hide from front page setting.
	$wp_customize->add_setting(
		'hide_sm_from_front_page',
		array(
			'default'           => '',
			'sanitize_callback' => 'munsa_sanitize_checkbox'
		)
	);
	
	// Hide from front page control.
	$wp_customize->add_control(
		'hide_sm_from_front_page',
		array(
			'label'       => esc_html__( 'Hide from Front Page Template', 'munsa' ),
			'description' => esc_html__( 'Check this if you want to hide Social Menu from Front Page Template.', 'munsa' ),
			'section'     => 'social-menu',
			'priority'    => 40,
			'type'        => 'checkbox'
		)
	);
	
	// Hide from contact page setting.
	$wp_customize->add_setting(
		'hide_sm_from_full_bg_page',
		array(
			'default'           => '',
			'sanitize_callback' => 'munsa_sanitize_checkbox'
		)
	);
	
	// Hide from contact page control.
	$wp_customize->add_control(
		'hide_sm_from_full_bg_page',
		array(
			'label'       => esc_html__( 'Hide from Full Background Image Template', 'munsa' ),
			'description' => esc_html__( 'Check this if you want to hide Social Menu info from Full Background Image Template.', 'munsa' ),
			'section'     => 'social-menu',
			'priority'    => 50,
			'type'        => 'checkbox'
		)
	);