<?php
/**
 * Theme Customizer for Contact Page Template.
 *
 * @package Munsa
 */
	
	// Add the contact section.
	$wp_customize->add_section(
		'contact',
		array(
			'title'       => esc_html__( 'Contact Info', 'munsa' ),
			'description' => esc_html__( 'Contact Info will be displayed in Contact Info and Front Page Templates.', 'munsa' ),
			'priority'    => 50,
			'panel'       => 'theme'
		)
	);
	
	// Add the email setting.
	$wp_customize->add_setting(
		'email',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_email'
		)
	);
	
	// Add the email control.
	$wp_customize->add_control(
		'email',
		array(
			'label'    => esc_html__( 'Email', 'munsa' ),
			'section'  => 'contact',
			'priority' => 10,
			'type'     => 'text'
		)
	);
	
	// Add the phone setting.
	$wp_customize->add_setting(
		'phone',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	// Add the phone control.
	$wp_customize->add_control(
		'phone',
		array(
			'label'    => esc_html__( 'Phone Number', 'munsa' ),
			'section'  => 'contact',
			'priority' => 20,
			'type'     => 'text'
		)
	);
	
	// Add the address setting.
	$wp_customize->add_setting(
		'address',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	// Add the address control.
	$wp_customize->add_control(
		'address',
		array(
			'label'    => esc_html__( 'Address', 'munsa' ),
			'section'  => 'contact',
			'priority' => 30,
			'type'     => 'text'
		)
	);
	
	// Add hide from front page setting.
	$wp_customize->add_setting(
		'hide_from_front_page',
		array(
			'default'           => '',
			'sanitize_callback' => 'munsa_sanitize_checkbox'
		)
	);
	
	// Add hide from front page control.
	$wp_customize->add_control(
		'hide_from_front_page',
		array(
			'label'       => esc_html__( 'Hide from Front Page Template', 'munsa' ),
			'description' => esc_html__( 'Check this if you want to hide contact info from Front Page Template.', 'munsa' ),
			'section'     => 'contact',
			'priority'    => 40,
			'type'        => 'checkbox'
		)
	);