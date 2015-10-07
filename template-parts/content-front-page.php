<?php
/**
 * Template part for displaying page content in Front Page Template.
 *
 * @package Munsa
 */

?>

<?php

// Get Featured image.
$munsa_bg = munsa_get_post_thumbnail( $post_thumbnail = 'full' );

?>

<div class="featured-content"<?php if ( has_post_thumbnail() ) echo ' style="background-image:url(' . esc_url( $munsa_bg ) . ');"' ?>>

	<header id="masthead" class="site-header" role="banner">
		
		<div class="site-branding">
			
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
				
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				
		</div><!-- .site-branding -->
			
	</header><!-- #masthead -->
	
	<div class="entry-outer">
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->

		</article><!-- #post-## -->
	
		<?php get_template_part( 'menus/menu', 'social' ); // Loads the menus/menu-social.php template. ?>
	
	</div><!-- .entry-outer -->
	
</div><!-- .featured-content -->

