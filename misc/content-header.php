<?php
/**
 * Template part for displaying header section.
 *
 * @package Munsa
 */
 
// Get Featured image.
$munsa_bg = munsa_get_post_thumbnail( $post_thumbnail = 'full' );

?>

<?php if ( is_page_template( 'pages/front-page.php' ) || is_page_template( 'pages/full-background-image.php' ) ) : ?>
	
	<div class="featured-content"<?php if ( has_post_thumbnail() ) echo ' style="background-image:url(' . esc_url( $munsa_bg ) . ');"' ?>>

<?php endif; ?>
		
		<header id="masthead" class="site-header" role="banner" <?php hybrid_attr( 'header' ); ?>>
		
			<div class="site-branding">
			
				<?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
			
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title" <?php hybrid_attr( 'site-title' ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title" <?php hybrid_attr( 'site-title' ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>
				
				<p class="site-description" <?php hybrid_attr( 'site-description' ); ?>><?php bloginfo( 'description' ); ?></p>
				
			</div><!-- .site-branding -->
			
		</header><!-- #masthead -->
		