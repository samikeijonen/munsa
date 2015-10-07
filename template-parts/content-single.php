<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Munsa
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php munsa_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'munsa' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php munsa_post_terms( array( 'taxonomy' => 'category', 'text' => __( '#%s', 'munsa' ), 'before' => '<div class="entry-categories"><span>' . esc_html__( 'Categories:', 'munsa' ) . '</span>', 'after' => '</div>' ) ); ?>
		<?php munsa_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( '#%s', 'munsa' ), 'before' => '<div class="entry-tags"><span>' . esc_html__( 'Tags:', 'munsa' ) . '</span>', 'after' => '</div>' ) ); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->

