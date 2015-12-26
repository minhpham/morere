<?php
/**
 * The Template for displaying all single posts.
 *
 * @package progression
 * @since progression 1.0
 */

get_header(); ?>
	
<div id="main" class="site-main">
	<div class="full-container">
	<?php while ( have_posts() ) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="blog-post-detail">
			<!-- <h2 class="post-title"><?php the_title(); ?></h2>
			<div class="post-details-meta"><?php progression_posted_on(); ?></div> -->
			<div class="blog-post-excerpt">
				<?php the_content(); ?>
			</div>
			
		</div><!-- close .blog-post-background -->
	</div><!-- #post-<?php the_ID(); ?> -->


	<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() )
			comments_template( '', true );
	?>

	<?php endwhile; // end of the loop. ?>


	<div class="clearfix"></div>

<?php get_footer(); ?>