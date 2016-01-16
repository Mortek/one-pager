<?php 
/**  section menu control by id.
--------------------------------------------------------------------------------------------------- */

$section_menu = zels_get_option('contact');
$id = strtolower(str_replace(' ', '-', $section_menu['name']));
?>

<!-- contact Section -->
<section id="<?php echo esc_attr($id ); ?>">
	<div class="container section-padding contact-form-container"> 
		<h2 class="section-title"><?php echo esc_html(zels_get_option('contact_section_title')) ?></h2>
		<div class="section-details text-center">
			<?php echo esc_html(zels_get_option('contact_section_des')) ?>
		</div><!-- /.section-details -->	

		<div class="content">
		<?php 
		$contact_page = zels_get_option('contact_form_7');
		if ( ! empty( $contact_page ) ) : ?>
				<div class="contact-form"> 
					<?php echo do_shortcode( '[contact-form-7 id="' . zels_get_option('contact_form_7') . ' " title="' . get_the_title( zels_get_option('contact_form_7') ) . '"]' ); ?>
				</div><!-- /.contact-form -->
			<?php endif; ?>
		</div><!-- /.content -->
	</div><!-- /.container -->
	<div class="gray-bg section-padding other-contact-details">
		<div class="container">
			<h2 class="section-title sub"><?php echo esc_html(zels_get_option('get_intouch_section_title') ); ?></h2>
			<div class="row">
				<div class="contact-info">

					<div class="col-md-3 col-sm-6 contact-info-box">

						<span class="icon map-marker">
							<i aria-hidden="true" class="li_location"> </i>
						</span>
						<p class="contact-details-title"> <span><?php _e('Adres', 'awe') ?> </span></p>
						<span class="texts">
							<?php print(zels_get_option('detail_address')) ?>
						</span>
					</div> <!-- /.contact-info-box -->

					<div class="col-md-3 col-sm-6 contact-info-box">
						<span class="icon envelope">
							<i aria-hidden="true" class="li_mail"></i>
						</span>
						<p class="contact-details-title"> <span><?php _e('E-mail', 'awe') ?> </span></p>
						<span class="texts">
							<?php print(zels_get_option('detail_mail')) ?>
						</span>
					</div><!--  /.contact-info-box -->

					<div class="col-md-3 col-sm-6 contact-info-box">
						<span class="icon phone">
							<i aria-hidden="true" class="li_phone"></i>
						</span>
						<p class="contact-details-title"> <span><?php _e('Telefoon', 'awe') ?></span> </p>
						<span class="texts">
							<?php print(zels_get_option('detail_phone')) ?>
						</span>
					</div><!-- /.contact-info-box -->

					<div class="col-md-3 col-sm-6 contact-info-box">
						<span class="icon skype"><i class="fa fa-linkedin-square"></i></span>
						<p class="contact-details-title"> <span><?php _e('LinkedIn', 'awe') ?> </span></p>
						<span class="texts">
							<a href="https://www.linkedin.com/in/maurice-moret-79557384" target="_blank"><?php print(zels_get_option('detail_skype')) ?></a>
						</span>
					</div><!-- /.contact-info-box -->
				</div><!-- /.contact-info -->
			</div>
		</div><!-- /.container --> 
	</div><!-- /.other-contact-details -->
</section><!-- /#contact -->
<!-- Contact Section  End -->



<!-- Subscribe Section -->
<!-- <div id="subscribe-box" class="subscribe-box gray-bg"> -->
	<!-- <div class="container"> -->
		<!-- <div class="subscribe-container"> -->
			<!-- <form action="<?php echo admin_url( 'admin-ajax.php'); ?>" method="post" class="aw-mc-ajax-form subscribe-form"> -->
				<!-- <input name="action" type="hidden" value="aw_chimp_subscribe"> -->
				<!-- <input type="email" id="subscribe_email" name="email" class="subscribe_email" placeholder="Enter your email address here to subscribe our newsletter  ..." required> -->
				<!-- <button type="submit" class="btn subscribe_btn"><span> Subscribe </span><i class="fa fa-paper-plane-o"></i> -->
					<!-- <span class="ajax-loader"> -->
						<!-- <i class="fa-li fa fa-spinner fa-spin"></i> -->
					<!-- </span> -->
				<!-- </button> -->

				<!-- <div class="aw-mc-response"></div>/#mailchimp-response -->
			<!-- </form>/.subscribe-form -->

		<!-- </div>/.subscribe-container -->
	<!-- </div>/.container -->
<!-- </div>/#subscribe-box	 -->
<!-- Subscribe Section End -->	


