<?php
/**
 * Primary menu.
 *
 * @package Munsa
 */
?>
	
<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<button id="main-navigation-toggle" class="main-navigation-toggle menu-sidebar-toggle" aria-controls="menu-primary"><span id="main-navigation-button" class="main-navigation-button menu-sidebar-button genericon genericon-menu"><span class="screen-reader-text"><?php esc_html_e( 'Menu', 'munsa' ); ?></span></span></button>		
	
	<nav id="menu-primary" class="menu main-navigation menu-primary" role="navigation" aria-label="<?php esc_html_e( 'Primary Menu', 'munsa' ); ?>" <?php hybrid_attr( 'menu', 'primary' ); ?>>
		
			<div class="wrap">
			
				<?php

					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'menu_id'         => 'primary-menu',
							'container_class' => 'primary-menu-container',
							'depth'           => 2,
							'fallback_cb'     => ''
						)
					);
			
				?>
		
			</div><!-- .wrap -->

	</nav><!-- #menu-primary -->

<?php endif; // End check for main menu. ?>