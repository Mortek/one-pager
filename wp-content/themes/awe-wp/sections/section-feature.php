
	<!-- service Section -->
	<section id="over-mij" class="gray-bg section-padding">
		<div class="container">
			<h2 class="section-title sub"><?php echo esc_html(zels_get_option('section_title') ); ?></h2>
			<div class="row">
				<div class="item-container">
					<div id="feature-slider"  class="owl-carousel owl-theme">

						<?php $items = zels_get_option('feature_section_group');
						foreach ($items as $key => $value) { ?>
							<div class="item">
							<div class="service-item col-md-12">
								<div class="hex content-icon-hex">
									<span class="icon">
										<i class="<?php echo esc_attr($value['feature_icon']) ?>"></i>
									</span>
								</div><!-- /.hex -->
								<h3 class="service-title"><?php echo esc_attr($value['feature_title']) ?></h3>
								<p class="service-content text-center">
									<?php echo esc_attr($value['feature_description']) ?>
								</p>
							</div><!-- /.service-item -->
						</div><!-- /.col-md-4 -->
						<?php }
						 ?>
						

					</div><!-- /#service-slider -->
				</div><!-- /.item-container -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /#service -->
	<!-- service Section End -->

