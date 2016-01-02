<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package AWE
 */

?>



<div class="clearfix"></div>
	<!-- Footer Section  -->
	<footer>
		<div id="social-buttons" class="clearfix"> 
			<div class="social-buttons parallax-style">
				<div class="parallax-overlay section-padding">
					<div class="container">
						<div class="footer-social-btn text-center">
							<?php $items = zels_get_option('social_section_group');
							if(is_array($items )) {
								foreach ($items as $key => $value) { 
									$social_name = $value['social_name'];

									$social_class = str_replace(' ', '-', $social_name);

									?>
								<a href="<?php echo esc_attr($value['social_url']); ?>" class="<?php echo esc_attr(strtolower( $social_class ) ); ?>-btn"><i class="<?php echo esc_attr($value['social_icon']) ?>"></i></a>
								<?php } 
							}
							?>

						</div><!-- /.footer-social-btn -->
					</div><!-- /.container -->
				</div><!-- /.parallax-overlay -->
			</div><!-- /.social-buttons -->
		</div><!-- /#social-buttons -->


		<div class="copyrights">
			<div class="container text-center">
				<?php print(zels_get_option('copyright_txt')) ?>
			</div><!-- /.container -->
		</div><!-- /.copyrights -->
	</footer>	
	<!-- Footer Section End -->


	<div id="scroll-to-top">
		<span>
			<i class="fa fa-chevron-up"></i>    
		</span>
	</div><!-- /#scroll-to-top -->

<?php wp_footer(); ?>

</body>
</html>
