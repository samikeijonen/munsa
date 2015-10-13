<?php
/**
 * Blog Posts in Front Page Template. This file is called in footer.php.
 *
 * @package Munsa
 */

?>
		
		<?php
			// Blog Posts Query. 
			$blog_content = new WP_Query( apply_filters( 'munsa_blog_posts_arguments', array(
			'post_type'       => 'post',
			'posts_per_page'  => 3,
			'no_found_rows'   => true,
			) ) );
		?>

		<?php if ( $blog_content->have_posts() ) : ?>

			<div id="blog-content-area" class="blog-content-area front-page-area">

				<div class="blog-wrapper">
					
		 			<?php // Blog area title and link.
						if( get_theme_mod( 'blog_area_title', esc_html__( 'Articles', 'munsa' ) ) || ( get_theme_mod( 'blog_area_url' ) && get_theme_mod( 'blog_area_url_text' ) ) ) :
								
							echo '<div class="blog-title-wrapper">';
							
								// Featured are title.
								if( get_theme_mod( 'blog_area_title', esc_html__( 'Articles', 'munsa' ) ) ) :
									echo '<h2 class="blog-title entry-title">' . get_theme_mod( 'blog_area_title', esc_html__( 'Articles', 'munsa' ) ) . '</h2>';
								endif;
							
								// Featured are link
								if( get_theme_mod( 'blog_area_url' ) && get_theme_mod( 'blog_area_url_text' ) ) :
									echo '<a class="munsa-button blog-link" href="' . esc_url( get_theme_mod( 'blog_area_url' ) ) . '">' . esc_html( get_theme_mod( 'blog_area_url_text' ) ) . '</a>';
								endif;
							
							echo '</div><!-- .blog-title-wrapper -->';
							
						endif; // End featured are title and link
					?>
						
					<div class="blog-posts-wrapper">
						<?php while ( $blog_content->have_posts() ) : $blog_content->the_post(); ?>
						
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
							
								<?php if ( has_post_thumbnail() ) : ?>
								
										<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
											<?php the_post_thumbnail( 'munsa-smaller', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
										</a>
										
								<?php endif;  ?>
								
								<header class="entry-header">
									<?php the_title( sprintf( '<h3 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
									<?php get_template_part( 'entry', 'meta' ); // Loads the entry-meta.php template. ?>
								</header><!-- .entry-header -->
								
							</article><!-- #post-## -->
			
						<?php endwhile; ?>
					</div><!-- .blog-posts-wrapper -->

				</div><!-- .blog-wrapper -->
			</div><!-- .blog-content-area -->

		<?php
			endif; // End loop.
			wp_reset_postdata(); // Reset post data.
		?>