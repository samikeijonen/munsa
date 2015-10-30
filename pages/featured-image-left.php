<?php
/**
 * Template Name: Featured Image on the Left
 *
 * This page template displays content on the right and featured image on the left.
 *
 * @package Munsa
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

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
							'before'    => '<div class="page-links">' . esc_html__( 'Pages:', 'munsa' ),
							'after'     => '</div>',
							'pagelink'  => '<span class="screen-reader-text">' . esc_html__( 'Page', 'munsa' ) . ' </span>%',
							'separator' => '<span class="screen-reader-text">,</span> ',
						) );
					?>
			
				</div><!-- .entry-content -->
		
			</div><!-- .entry-inner -->
	
		</article><!-- #post-## -->

	<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
