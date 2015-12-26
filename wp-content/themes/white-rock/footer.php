<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package progression
 * @since progression 1.0
 */
?>

<div class="clearfix"></div>
</div><!-- close .width-container -->


<?php if(of_get_option('footer_widgets', '1')): ?>

<div class="width-container">
	<div id="footer-widgets">
		
		<div class="footer-<?php echo of_get_option('footer_widgets_column', '4'); ?>-column">
			
			<?php if ( ! dynamic_sidebar( 'Footer Widgets' ) ) : ?>
			<?php endif; // end sidebar widget area ?>

			<div class="clearfix"></div>
		</div><!-- close footer-count -->
		
	</div><!-- close #footer-widgets -->
<div class="clearfix"></div>
</div><!-- close .width-container -->
</div><!-- close .widget-area-highlight -->

<?php endif; ?>


<div class="clearfix"></div>
</div><!-- close #main -->


<footer id="footer">
	<div class="width-container">
		<div class="row">
			<div class="col-md-5 col-xs-12">
				<span class="copy-right">Copyright@domainemorere.com.vn - All rights reserved</span>
			</div>
			<div id="copyright" class="col-md-7 col-xs-12">
				<?php wp_nav_menu( array('theme_location' => 'footer', 'depth' => 1, 'menu_class' => 'footer-menu') ); ?>
			</div><!-- close #copyright -->
		</div>
	</div><!-- close .width-container -->
</footer>
<?php wp_footer(); ?>

<?php if(of_get_option('custom_js')): ?>
	<?php echo '<script type="text/javascript">'; ?>
	<?php echo of_get_option('custom_js'); ?>
	<?php echo '</script>'; ?>
<?php endif; ?>
<?php if(of_get_option('tracking_code')): ?>
	<?php echo '<script type="text/javascript">'; ?>
	<?php echo of_get_option('tracking_code'); ?>
	<?php echo '</script>'; ?>
<?php endif; ?>
</body>
</html>