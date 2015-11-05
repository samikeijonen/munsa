<?php
/**
 * Child pages area in Contact Info and Child Pages Templates.
 *
 * @package Munsa
 */

?>
		
		<?php // Child pages area
			$child_pages = new WP_Query( apply_filters( 'munsa_child_pages_arguments',array(
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
						
						<div class="contact-person child-page">

							<?php munsa_post_thumbnail( $post_thumbnail = 'munsa-smaller'  ); ?>

							<div class="entry-person entry-child">
		
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
	
							</div><!-- .entry-child -->

						</div><!-- .child-page -->
				
					<?php endwhile; ?>

				</div><!-- .child-pages-wrapper -->
			</div><!-- #child-pages-area -->

		<?php
			endif; // End loop.
			wp_reset_postdata(); // Reset post data.
		?>