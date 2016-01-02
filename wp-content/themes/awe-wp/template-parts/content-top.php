<!-- Top Section -->
	<section id="top-section">
		<div class="top-section parallax-style clearfix">
			<div class="parallax-overlay section-padding">
				<div class="container">
					<div class="logo-big text-center">
					<div id="logo">
                           <a href="<?php echo home_url(); ?>" class="standard-logo">
                           <?php if(zels_get_option('logo_on_off')) { ?>
                           <img src="<?php echo esc_attr(zels_get_option('logo_upload')); ?>" class="normal-logo" alt="<?php echo bloginfo('name' ); ?>">
                           <?php 
                           $pixels = 'px';
                           $radina_width = zels_get_option("retina_logo_width");
                           $radina_height = zels_get_option("retina_logo_height");
                           if(zels_get_option("ratinalogo_upload")) { ?>
                           <img src="<?php echo zels_get_option("ratinalogo_upload"); ?>" alt="<?php bloginfo('name'); ?>" style="width:<?php echo $radina_width.$pixels; ?>;max-height:<?php echo $radina_height.$pixels; ?>; height: auto !important" class="retina-logo" />
                            <?php } ?>
                           <?php }else {
                            echo zels_get_option('logo_text');
                            }

                            ?>
                           </a>
                    </div><!-- #logo end -->
					</div><!-- /.logo-big -->
					<div class="slide-container">
						<div id="top-slider" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">

							<?php $slider_items = zels_get_option("slider_settings"); 
							$i = 0;
							foreach ($slider_items as $key => $value) { 
	
								?>
									<div class="item <?php echo !$i ? 'active' : ''; ?>">
									<h2 class="section-title top-section-title make-fittext wow zoomInUp center animated" data-wow-duration="1s" data-wow-delay=".0s">
										<?php echo esc_html( $value['codex_slider_text'] ); ?>
									</h2>
									<div class="topic-container text-center wow bounceInUp center animated"  data-wow-duration="1.5s" data-wow-delay=".5s">
										<p class="topic make-fittext">
											<span><?php echo esc_html( $value['codex_slider_textarea'] ); ?></span>
										</p>
									</div><!-- /.topic-container -->
									<?php if(!empty($value['codex_slider_link_url']) && !empty($value['codex_slider_link_text'] )) { ?>
									<div class="btn-container text-center">
										<a href="<?php echo esc_html($value['codex_slider_link_url'] ); ?>" class="btn lg-btn glass-btn angle-effect wow bounceInUp center animated" data-wow-duration="1.5s"   data-wow-delay=".9s">
											<?php echo esc_html($value['codex_slider_link_text'] ); ?>
										</a>
									</div><!-- /.btn-container --> 
									<?php } ?>
								</div><!-- /.item -->

							<?php	$i ++; 
						}	
							
							?>
								


							</div><!-- /.carousel-inner -->
							<a class="slide-nav left" href="#top-slider" data-slide="prev"><span></span></a>
							<a class="slide-nav right" href="#top-slider" data-slide="next"><span></span></a>
						</div><!-- /#top-slider -->
					</div><!-- /.slide-container -->

					<div id="next-section" class="next-btn-container" data-next-sec-id="#feature">
						<span id="to-about-us" class="next-btn">
							<span></span>
						</span><!-- /.next-btn -->
					</div><!-- /.next-btn-container -->

				</div><!-- /.container -->
			</div><!-- /.parallax-overlay -->

		</div><!-- /.top-section -->
	</section><!-- /#top-section -->
	<!-- Top Section End -->