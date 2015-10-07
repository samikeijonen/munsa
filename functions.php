<?php
/**
 * Munsa functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Munsa
 */

if ( ! function_exists( 'munsa_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function munsa_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Munsa, use a find and replace
	 * to change 'munsa' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'munsa', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1420, 9999, false );

	// This theme uses wp_nav_menu() in two location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'munsa' ),
		'social'  => esc_html__( 'Social Links Menu', 'munsa' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'munsa_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Add editor styles.
	add_editor_style( array( 'css/editor-style.css', munsa_fonts_url() ) );
	
}
endif; // munsa_setup
add_action( 'after_setup_theme', 'munsa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function munsa_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'munsa_content_width', 1200 );
}
add_action( 'after_setup_theme', 'munsa_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function munsa_widgets_init() {

	$sidebar_primary_args = array(
		'id'            => 'primary',
		'name'          => _x( 'Primary', 'sidebar', 'munsa' ),
		'description'   => __( 'The main sidebar. It is displayed on the right side of the page as off canvas sidebar.', 'munsa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	);
	
	$sidebar_subsidiary_args = array(
		'id'            => 'subsidiary',
		'name'          => _x( 'Subsidiary', 'sidebar', 'munsa' ),
		'description'   => __( 'A sidebar located in the footer of the site.', 'munsa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	);
	
	// Register sidebars.
	register_sidebar( $sidebar_primary_args );
	register_sidebar( $sidebar_subsidiary_args );

}
add_action( 'widgets_init', 'munsa_widgets_init' );

if ( ! function_exists( 'munsa_fonts_url' ) ) :
/**
 * Register Google fonts for the theme.
 *
 * @since 1.0.0
 *
 * @return string Google fonts URL for the theme.
 */
function munsa_fonts_url() {
	
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'munsa' ) ) {
		$fonts[] = 'Merriweather:300,400,700,900,300italic,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'munsa' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since 1.0.0
 */
function munsa_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'munsa_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function munsa_scripts() {
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'munsa-fonts', munsa_fonts_url(), array(), null );
	
	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons/genericons.css', array(), '3.4' );
	
	// Enqueue parent theme styles if using child theme.
	if ( is_child_theme() ) {
		wp_enqueue_style( 'munsa-parent-style', trailingslashit( get_template_directory_uri() ) . 'style.css', array(), null );
	}
	
	// Enqueue active theme styles.
	wp_enqueue_style( 'munsa-style', get_stylesheet_uri() );
	
	// Enqueue velocity.js.
	wp_enqueue_script( 'velocity', get_template_directory_uri() . '/js/velocity.js', array(), '20150906', true );
	
	// Enqueue theme scripts.
	wp_enqueue_script( 'munsa-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery', 'velocity' ), '20150906', true );
	
	// Enqueue skip link focus fix.
	wp_enqueue_script( 'munsa-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20150906', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'munsa_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Schema.org file.
 */
require get_template_directory() . '/inc/schema.php';
