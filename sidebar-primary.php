<?php
/**
 * Primary Sidebar.
 *
 * @package Munsa
 */
?>

<?php if ( is_active_sidebar( 'primary' ) ) : // If the sidebar has widgets. ?>

	<button class="sidebar-primary-toggle menu-sidebar-toggle" aria-controls="sidebar-primary" data-toggle="modal" data-backdrop="false" data-target="#sidebar-primary">
		<span class="screen-reader-text"><?php esc_html_e( 'Info', 'munsa' ); ?></span>
	</button>

	<aside id="sidebar-primary" class="sidebar-primary sidebar animated" role="complementary" tabindex="0" <?php hybrid_attr( 'sidebar', 'primary' ); ?>>
		<h2 class="screen-reader-text" id="sidebar-primary-header"><?php echo esc_html_x( 'Primary Sidebar', 'Sidebar aria label', 'munsa' ); ?></h2>
		
		<button class="sidebar-primary-toggle sidebar-primary-close menu-sidebar-close menu-sidebar-toggle" data-dismiss="modal" aria-controls="sidebar-primary">
			<span class="screen-reader-text"><?php esc_html_e( 'Close Sidebar', 'munsa' ); ?></span>
		</button>
		
		<div class="wrap animated">
		
			<?php dynamic_sidebar( 'primary' ); ?>
	
		</div><!-- .wrap -->

	</aside><!-- #sidebar-primary .sidebar -->

<?php endif; // End layout check.