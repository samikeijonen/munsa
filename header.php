<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="main">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Munsa
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head <?php hybrid_attr( 'head' ); ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php hybrid_attr( 'body' ); ?>>

<!-- Preloader -->
<div id="preloader" class="preloader">
    <div id="status" class="status">
		<span class="screen-reader-text"><?php esc_html_e( 'Site is loading', 'munsa' ); ?></span>
	</div>
</div>

<div id="site-wrapper" class="site-wrapper">
	<div id="page" class="site">
		
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'munsa' ); ?></a>
		
		<?php get_template_part( 'menus/menu', 'buttons' ); // Loads the menus/menu-buttons.php template. ?>
		
		<?php get_template_part( 'menus/menu', 'primary' ); // Loads the menus/menu-primary.php template. ?>
		
		<?php get_template_part( 'misc/content', 'header' ); // Loads the template-parts/content-header.php template. ?>

		<div id="content" class="site-content">
		
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
