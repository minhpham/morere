<?php
// Template Name: HomePage
/**
 *
 * @package progression
 * @since progression 1.0
 */

get_header(); ?>
	
	<!-- The featured slider is called from the header.php located in the slider-progression.php file -->
	
	<div id="main" class="site-main">
	<div id="heroSlider" class="clearfix">
		<?php echo do_shortcode("[nemus_slider id='90']"); ?>
		<div class="logo-content">
			<div class="text-center">
				<img src="<?php bloginfo('template_directory');?>/images/main-logo.png">
			</div>
			<p>Domaine Morère invites you to the heart of the mountains of Viet Nam to discover the delights of exceptional specialty coffee, highlands herbal tea and jungle honey.</p>
		</div>
	</div>
		<div class="width-container">

		<?php if(of_get_option('homepage_sidebar', '0')): ?><div id="container-sidebar"><!-- sidebar content container --><?php endif; ?>
				
		<div class="row">
			<div class="col-lg-4 col-sm-6">
			<!-- show post -->
			<?php query_posts('category_name=coffee&showposts=1');
			while (have_posts()) : the_post();
			  // do whatever you want
			?>
			<div class="common-post text-center italic">
				<h1 class="title-post"><a href="<?php the_permalink() ?>">Specialty Coffee</a></h1>
				<?php the_post_thumbnail('large') ?>
				<div class="brd"></div>
				<a class="read-more" href="<?php the_permalink() ?>">Read More</a>
			<?php
			endwhile;
			?>
			</div>
			<!-- close post -->
			</div>
			<div class="col-lg-4 col-sm-6">
				<!-- this code pull in the homepage content -->
				<?php while(have_posts()): the_post(); ?>
					<?php $cc = get_the_content(); if($cc != '') { ?>
						<div class="content-container">
							<div class="container-spacing">		
							<?php the_content(); ?>	
							</div><!-- close .content-container-spacing -->
						</div><!-- close .content-container -->
					<?php } ?>
				<?php endwhile; ?>
			</div>
						<div class="col-lg-4 col-sm-6">
			<!-- show post -->
			<?php query_posts('category_name=honey&showposts=1');
			while (have_posts()) : the_post();
			  // do whatever you want
			?>
			<div class="common-post text-center italic">
				<h1 class="title-post"><a href="<?php the_permalink() ?>">Jungle Honey</a></h1>
				<?php the_post_thumbnail('large') ?>
				<div class="brd"></div>
				<a class="read-more" href="<?php the_permalink() ?>">Read More</a>
			<?php
			endwhile;
			?>
			</div>
			<!-- close post -->
			</div>
		</div>
		<div class="row" style="margin: 40px 0;">
			<div class="col-lg-4 col-sm-6">
			<!-- show post -->
			<?php query_posts('category_name=tea&showposts=1');
			while (have_posts()) : the_post();
			  // do whatever you want
			?>
			<div class="common-post text-center italic">
				<h1 class="title-post"><a href="<?php the_permalink() ?>">Highlands Tea</a></h1>
				<?php the_post_thumbnail('large') ?>
				<div class="brd"></div>
				<a class="read-more" href="<?php the_permalink() ?>">Read More</a>
			<?php
			endwhile;
			?>
			</div>
			<!-- close post -->
			</div>
			<div class="col-lg-4 col-sm-6">
				<!-- show post -->
			<?php query_posts('category_name=harvest&showposts=1');
			while (have_posts()) : the_post();
			  // do whatever you want
			?>
			<div class="common-post text-center italic">
				<h1 class="title-post"><a href="<?php the_permalink() ?>">Sustainable Harvest</a></h1>
				<?php the_post_thumbnail('large') ?>
				<div class="brd"></div>
				<a class="read-more" href="<?php the_permalink() ?>">Read More</a>
			<?php
			endwhile;
			?>
			</div>
			<!-- close post -->
			</div>
			<div class="col-lg-4 col-sm-6">
			<!-- show post -->
			<?php query_posts('category_name=about-us&showposts=1');
			while (have_posts()) : the_post();
			  // do whatever you want
			?>
			<div class="common-post text-center italic">
				<h1 class="title-post"><a href="<?php the_permalink() ?>">About Us</a></h1>
				<?php the_post_thumbnail('large') ?>
				<div class="brd"></div>
				<a class="read-more" href="<?php the_permalink() ?>">Read More</a>
			<?php
			endwhile;
			?>
			</div>
			<!-- close post -->
			</div>
		</div>	
		<!-- Homepage Child Pages Start -->
		<?php
		$args = array(
			'post_type' => 'page',
			'numberposts' => -1,
			'post' => null,
			'post_parent' => $post->ID,
		    'order' => 'ASC',
		    'orderby' => 'menu_order'
		);
		$features = get_posts($args);
		$features_count = count($features);
		if($features):
			$count = 1;
			foreach($features as $post): setup_postdata($post);
				$image_id = get_post_thumbnail_id();
				$image_url = wp_get_attachment_image_src($image_id, 'large');
				if($count >= of_get_option('child_pages_column', '3')+1) { $count = 1; }
		?>
			
			<div class="grid<?php echo of_get_option('child_pages_column', '3'); ?>column <?php if($count == of_get_option('child_pages_column', '3')): ?>lastcolumn<?php endif; ?>">
				<h3><?php the_title(); ?></h3>
				<?php if($image_url[0]): ?><img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" class="aligncenter">
				<?php endif; ?>
				<?php the_content(); ?>
			</div>
		<?php if($count == of_get_option('child_pages_column', '3')): ?><div class="homepage-feature-box"></div><div class="clearfix"></div><?php endif; ?>
		<?php $count ++; endforeach; ?>
		<?php endif; ?>
		<!-- Homepage Child Pages End -->
	
<div class="clearfix"></div>
<?php if(of_get_option('homepage_sidebar', '0')): ?></div><!-- close #container-sidebar -->
<?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>