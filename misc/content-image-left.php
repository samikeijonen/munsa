<?php
/**
 * Template part for displaying Featured image on the left and content on the right.
 *
 * @package Munsa
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
	
	<div class="entry-inner">
	
		<?php munsa_post_thumbnail(); ?>

		<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
		
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
			</header><!-- .entry-header -->
	
			<?php the_content(); ?>
			
			<?php
				wp_link_pages( array(
					'before'    => '<div class="page-links">' . __( 'Pages:', 'munsa' ),
					'after'     => '</div>',
					'pagelink'  => '<span class="screen-reader-text">' . __( 'Page', 'munsa' ) . ' </span>%',
					'separator' => '<span class="screen-reader-text">,</span> ',
				) );
			?>
			
		</div><!-- .entry-content -->
		
	</div><!-- .entry-inner -->
	
</article><!-- #post-## -->

