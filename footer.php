<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Munsa
 */

?>

				</main><!-- #main -->
			</div><!-- #primary -->
		
		</div><!-- #content -->
		
		<?php
			if ( is_page_template( 'pages/front-page.php' ) ) :
				get_template_part( 'misc/content', 'blog-posts' ); // Load blog posts for Front Page Template.
			endif;
		?>

		<footer id="colophon" class="site-footer" role="contentinfo" <?php hybrid_attr( 'footer' ); ?>>
			
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'munsa' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'munsa' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'munsa' ), 'Munsa', '<a href="https://foxland.fi/" rel="designer">Foxland</a>' ); ?>
			</div><!-- .site-info -->
				
			<a href="#site-wrapper" id="scroll-up" class="scroll-up"><?php esc_html_e( 'Up', 'munsa' ); ?></a>
		
		</footer><!-- #colophon -->
		
	</div><!-- #page -->
	
	<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>
	
</div><!-- #site-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
