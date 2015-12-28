<?php
// Template Name: Contact Page
/**
 *
 * @package progression
 * @since progression 1.0
 */

get_header(); ?>
<?php
//If the form is submitted
if(isset($_POST['submit'])) {
	
	$comments = $_POST['message'];

	//Check to make sure that the name field is not empty
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}


	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = get_post_meta($post->ID, 'contactpage_emailaddress', true); //Put your own email address here
		$body = "Name: $name \n\nEmail: $email \n\nComments:\n $comments";
		$headers = 'From: '.get_bloginfo('name').' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, get_bloginfo('name'), $body, $headers);
		$emailSent = true;
	}
}
?>

<?php while ( have_posts() ) : the_post(); ?>
	<div id="main" class="site-main">
		<div class="common-header row-fluid clearfix">
			<div class="col-md-1"></div>
			<div class="lf-header pull-left col-md-2">
				<img src="http://localhost/morere/wp-content/uploads/2015/12/logomorerecomvn.png">
			</div>
			<div class="rg-header pull-left col-md-9">
				<img src="http://localhost/morere/wp-content/uploads/2015/12/contact-banner.png" alt="Contact banner" class="alignnone size-full wp-image-134" />
			</div>
		</div>
		<div class="col-md-11 col-md-offset-1 wrap-contact">
			
			<div class="grid2column">
				<h1>Contact Us</h1>
					<?php if(get_post_meta($post->ID, 'contactpage_mapaddress', true)): ?>
						
						<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
						<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.gomap-1.3.2.min.js"></script>
						<div id="map-contact"></div>
						<script type="text/javascript"> 
						jQuery(document).ready(function($) {
						    $("#map-contact").goMap({ 
						        markers: [{  
						            address: '<?php echo get_post_meta($post->ID, 'contactpage_mapaddress', true); ?>', 
						            // title: 'marker title 1' ,
									// icon: '<?php echo get_template_directory_uri(); ?>/images/pin.png'
						        }],
								disableDoubleClickZoom: true,
								zoom: 12,
								maptype: 'ROADMAP'
						    }); 
						});
						</script>
					<?php endif; ?>

				<?php the_content(); ?>
			</div>
	<div class="grid2column lastcolumn">
		<h1>Message Us</h1>
		<?php echo do_shortcode("[contact-form-7 id='223' title='Contact form']"); ?>
		
	</div>
			
	<div class="clearfix"></div>	
	<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'progression' ), 'after' => '</div>' ) ); ?>
			

	<?php endwhile; // end of the loop. ?>
			

<?php if(of_get_option('page_comments_default', '0')): ?><?php comments_template( '', true ); ?><?php endif; ?>


<?php get_footer(); ?>