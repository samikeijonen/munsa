<?php
/**
 * Theme Customizer for Front Page Template.
 *
 * @package Munsa
 */
	
	// Add the front-page section.
	$wp_customize->add_section(
		'front-page',
		array(
			'title'       => esc_html__( 'Front Page Settings', 'munsa' ),
			'priority'    => 20,
			'panel'       => 'theme'
		)
	);
	
	
	// Add the blog area title setting.
	$wp_customize->add_setting(
		'blog_area_title',
		array(
			'default'           => esc_html__( 'Articles', 'munsa' ),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
 	
	// Add the blog area url text control.
	$wp_customize->add_control(
		'blog_area_title',
		array(
			'label'    => esc_html__( 'Blog title', 'munsa' ),
			'section'  => 'front-page',
			'priority' => 10,
			'type'     => 'text'
		)
	);
	
	// Add the blog area link setting.
	$wp_customize->add_setting(
		'blog_area_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
 	
	// Add the blog area link control.
	$wp_customize->add_control(
		'blog_area_url',
		array(
			'label'    => esc_html__( 'Blog URL', 'munsa' ),
			'section'  => 'front-page',
			'priority' => 20,
			'type'     => 'url'
		)
	);
 	
	// Add the blog area url text setting.
	$wp_customize->add_setting(
		'blog_area_url_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
 	
	// Add the blog area url text control.
	$wp_customize->add_control(
		'blog_area_url_text',
		array(
			'label'    => esc_html__( 'Blog URL text', 'munsa' ),
			'section'  => 'front-page',
			'priority' => 30,
			'type'     => 'text'
		)
	);
	
	/* Add the setting for Callout image. */
	$wp_customize->add_setting(
		'callout_image',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw'
		) );
	
	/* Add the Callout image link control. */
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
		$wp_customize,
			'callout_image',
				array(
					'label'       => esc_html__( 'Callout Image', 'munsa' ),
					'description' => esc_html__( 'Add Callout Image which can be map or product image for example. Recommended width is 1920px.', 'munsa' ),
					'section'     => 'front-page',
					'priority'    => 170,
				)
		)
	);
	
	/* Add the callout image alt setting. */
	$wp_customize->add_setting(
		'callout_image_alt',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	/* Add the callout image alt control. */
	$wp_customize->add_control(
		'callout_image_alt',
		array(
			'label'    => esc_html__( 'Callout image alt text', 'munsa' ),
			'section'  => 'front-page',
			'priority' => 180,
			'type'     => 'text'
		)
	);
	
	/* Add the Callout image link setting. */
	$wp_customize->add_setting(
		'callout_image_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
 	
	/* Add the Callout image link control. */
	$wp_customize->add_control(
		'callout_image_url',
		array(
			'label'    => esc_html__( 'Callout image URL', 'munsa' ),
			'section'  => 'front-page',
			'priority' => 190,
			'type'     => 'url'
		)
	);