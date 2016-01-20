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
			'title'           => esc_html__( 'Front Page', 'munsa' ),
			'description'     => esc_html__( 'In this section you can modify Front Page Template: Set content background and color, select featured pages, and enter link and text to your blog.', 'munsa' ),
			'priority'        => 20,
			'panel'           => 'theme',
			'active_callback' => 'munsa_is_front_page_template',
		)
	);
	
	// Add front page content background color setting.
	$wp_customize->add_setting(
		'content_background_color',
		array(
			'default'           => apply_filters( 'munsa_content_bg_color', '#000000' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Add front page content background color control.
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'content_background_color',
		array(
			'label'       => esc_html__( 'Content Background Color', 'munsa' ),
			'description' => esc_html__( 'Set Content Background Color for Front Page Template.', 'munsa' ),
			'section'     => 'front-page',
			'priority'    => 10,
		)
	) );
	
	// Add front page content background color opacity setting.
	$wp_customize->add_setting(
		'content_background_color_opacity',
		array(
			'default'           => absint( apply_filters( 'munsa_content_bg_opacity', 80 ) ),
			'sanitize_callback' => 'absint',
		)
	);
	
	// Add front page content background color opacity control.
	$wp_customize->add_control(
		'content_background_color_opacity',
			array(
				'type'        => 'range',
				'priority'    => 15,
				'section'     => 'front-page',
				'label'       => esc_html__( 'Content Color Opacity', 'munsa' ),
				'description' => esc_html__( 'Set Content Background Opacity for Front Page Template.', 'munsa' ),
				'input_attrs' =>
					array(
						'min'   => 0,
						'max'   => 100,
						'step'  => 1
					),
			)
		);
		
	// Add front page content color setting.
	$wp_customize->add_setting(
		'content_color',
		array(
			'default'           => apply_filters( 'munsa_content_color', '#ffffff' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Add front page content color control.
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'content_color',
		array(
			'label'       => esc_html__( 'Content Color', 'munsa' ),
			'description' => esc_html__( 'Set Content Color for Front Page Template.', 'munsa' ),
			'section'     => 'front-page',
			'priority'    => 20,
		)
	) );
	
	/**
	 * Fetured Page settings.
	 *
	 */
	 
	// Loop same setting couple of times.
	$k = 1;
	
	while( $k < absint( apply_filters( 'munsa_how_many_pages', 7 ) ) ) {
	
		// Add the 'featured_page_*' setting.
		$wp_customize->add_setting(
			'featured_page_' . $k,
			array(
				'default'           => 0,
				'sanitize_callback' => 'absint'
			)
		);
	
		// Add the 'featured_page_*' control.
		$wp_customize->add_control(
			'featured_page_' . $k,
				array(
					/* Translators: %s stands for number. For example Select page 1. */
					'label'    => sprintf( esc_html__( 'Select page %s', 'munsa' ), $k ),
					'section'  => 'front-page',
					'type'     => 'dropdown-pages',
					'priority' => $k+20
				) 
			);
		
		$k++; // Add one before loop ends.
		
	} // End while loop.
	
	/**
	 * Blog area settings.
	 *
	 */
		
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
			'priority' => 30,
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
			'priority' => 40,
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
			'priority' => 50,
			'type'     => 'text'
		)
	);
