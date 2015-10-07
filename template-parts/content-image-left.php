<?php
/**
 * Template part for displaying Featured image on the left and content on the right.
 *
 * @package Munsa
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-inner">
	
		<?php munsa_post_thumbnail(); ?>

		<div class="entry-content">
		
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
	
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'munsa' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		
	</div><!-- .entry-inner -->
	
</article><!-- #post-## -->

