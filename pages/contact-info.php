<?php
/**
 * Template Name: Contact Info
 *
 * This is the page template for Contact Info which you can set in the Customizer.
 *
 * @package Munsa
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
	
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
			</header><!-- .entry-header -->
	
			<?php munsa_contact_info(); // This function is in inc/template-tags.php file. ?>
	
			<div class="entry-inner">

				<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
					<?php the_content(); ?>
				</div><!-- .entry-content -->
		
			</div><!-- .entry-inner -->
	
		</article><!-- #post-## -->

		<?php // Child pages area
			$child_pages = new WP_Query( apply_filters( 'munsa_child_pages_template_arguments',array(
				'post_type'      => 'page',
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'post_parent'    => $post->ID,
				'posts_per_page' => 500,
				'no_found_rows'  => true,
			) ) );
		?>

		<?php if ( $child_pages->have_posts() ) : ?>

			<div id="child-pages-area" class="child-pages-area grid-area">			
				<div class="child-pages-wrapper grid-area-wrapper">

					<?php while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>
						
						<div class="contact-person">

							<?php munsa_post_thumbnail( $post_thumbnail = 'munsa-smaller'  ); ?>

							<div class="entry-person">
		
								<header class="entry-header">
									<?php the_title( sprintf( '<h3 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
								</header><!-- .entry-header -->
							
								<?php if ( has_excerpt() ) : ?>
									<div class="entry-summary">
										<?php the_excerpt(); ?>
									</div><!-- .entry-summary -->
								<?php else : ?>
									<div class="entry-content">
										<?php the_content(); ?>
									</div><!-- .entry-content -->
								<?php endif; ?>
	
							</div><!-- .entry-person -->

						</div><!-- .contact-person -->
				
					<?php endwhile; ?>

				</div><!-- .child-pages-wrapper -->
			</div><!-- #child-pages-area -->

		<?php
			endif; // End loop.
			wp_reset_postdata(); // Reset post data.
		?>

	<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
