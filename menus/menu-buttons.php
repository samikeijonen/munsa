<?php
/**
 * Display buttons for menu and sidebar.
 *
 * @package Munsa
 */
?>

<?php if ( has_nav_menu( 'primary' ) || is_active_sidebar( 'primary'  ) ) : ?>
	
	<div id="site-toggle-buttons" class="site-toggle-buttons"> 
		
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<button class="main-navigation-toggle menu-sidebar-toggle" aria-controls="menu-primary">
				<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'munsa' ); ?></span>
			</button>
		<?php endif; // End check for main menu. ?>

		<?php if ( is_active_sidebar( 'primary' ) ) : ?>
			<button class="sidebar-primary-toggle menu-sidebar-toggle" aria-controls="sidebar-primary">
				<span class="screen-reader-text"><?php esc_html_e( 'Info', 'munsa' ); ?></span>
			</button>
		<?php endif; // End check for sidebar. ?>
		
	</div><!-- .site-toggle-buttons -->
		
<?php endif; // End check for toggle buttons. ?>