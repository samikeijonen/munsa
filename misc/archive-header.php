<?php
/**
 * Template part for displaying archive headers.
 *
 * @package Munsa
 */

?>

<?php
// Add some extra text for archive description.
if ( is_home() && ! is_front_page() ) :
	$archive_title = get_post_field( 'post_title', get_queried_object_id() );
	$desc          = get_post_field( 'post_content', get_queried_object_id(), 'raw' );
elseif ( is_author() ) :
	$archive_title = get_the_archive_title();
	$desc          = get_the_author_meta( 'description', get_query_var( 'author' ) );
else :
	$archive_title = get_the_archive_title();
	$desc          = get_the_archive_description();
endif;
	
?>

<header class="archive-header" <?php hybrid_attr( 'archive-header' ); ?>>

	<h1 class="archive-title" <?php hybrid_attr( 'archive-title' ); ?>><?php echo $archive_title; ?></h1>

	<?php if ( ! is_paged() && $desc ) : // Check if we're on page/1. ?>

		<div class="archive-description" <?php hybrid_attr( 'archive-description' ); ?>>
			<?php echo $desc; ?>
		</div><!-- .archive-description -->

	<?php endif; // End paged check. ?>

</header><!-- .archive-header -->