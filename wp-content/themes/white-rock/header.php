<?php
/**
 * The Header for our theme.
 *
 * @package progression
 * @since progression 1.0
 */
?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>  <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">

	<?php if(is_front_page() && of_get_option('home_title')): ?>
	<title><?php echo of_get_option('home_title'); ?></title>
	<?php else: ?>
	<title><?php global $page, $paged;  wp_title( '|', true, 'right' ); bloginfo( 'name' );
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' ); if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'progression' ), max( $paged, $page ) ); ?></title>
	<?php endif; ?>

	<?php if(is_front_page() && of_get_option('home_meta')): ?>
	<meta name="description" content="<?php echo of_get_option('home_meta'); ?>" /> 
	<?php endif; ?>

	<?php if(of_get_option('favicon')): ?><link href="<?php echo of_get_option('favicon'); ?>" rel="shortcut icon" /><?php endif; ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<?php wp_head(); ?>

	<?php echo '<style type="text/css">'; ?>
		body #logo img {max-width:<?php echo of_get_option('logo_width', '288'); ?>px;}
		footer #footer-logo img {max-width:<?php echo of_get_option('footer_logo_width', '150'); ?>px;}
		.paged-title {height:<?php echo of_get_option('page_title_height', '250'); ?>px;}		
		
		<?php if(of_get_option('logo_background_switch', '0')): ?>
			h1#logo {background:<?php echo of_get_option('logo_background_color', '#000000' ); ?>;  padding:10px; -moz-box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2); -webkit-box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2); box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2); -webkit-border-bottom-right-radius: 5px; -webkit-border-bottom-left-radius: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; }
		<?php endif; ?>
		<?php if(of_get_option('custom_css')): ?>
			<?php echo of_get_option('custom_css'); ?>
		<?php endif; ?>
	<?php echo '</style>'; ?>

</head>

<body <?php body_class(); ?>>
<header id="header">
	<div class="full-container">
		
		<!-- <h1 id="logo"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php echo of_get_option('logo', get_template_directory_uri() . '/images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo of_get_option('logo_width'); ?>" />
		</a></h1> -->
		<ul class="pull-left wrap-language"><?php pll_the_languages(array('show_flags'=>1,'show_names'=>0));?></ul>
		<nav>
			<?php wp_nav_menu( array('theme_location' => 'primary', 'depth' => 4, 'menu_class' => 'sf-menu') ); ?>
		</nav>
		
		<div class="clearfix"></div>
	</div><!-- close .width-container -->
</header>

<!-- Page Title and Slider -->
<?php if( is_page_template('homepage.php') || is_page_template('page-blog-slider.php') ): ?>
	<?php get_template_part( 'slider', 'progression' ); ?>
<?php endif; ?>
<!-- End Page Title and Slider -->
