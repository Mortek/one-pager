<?php 
/**  section menu control by id.
--------------------------------------------------------------------------------------------------- */

$section_menu = zels_get_option('service');
$id = strtolower(str_replace(' ', '-', $section_menu['name']));
 ?>

<!-- Service Section -->
<section id="<?php echo esc_attr($id ); ?>" class="section-padding">
	<div class="container">
		<h2 class="section-title "><?php echo esc_html(zels_get_option('service_section_title')); ?></h2>
		<div class="section-details text-center">
			<?php echo wp_kses_post(zels_get_option('service_section_des')); ?>
		</div> 
		<div class="row">
			<div class="item-container">

				<?php $items = zels_get_option('service_section_group');

				if(!empty($items)) {
					foreach ($items as $key => $value) { ?>
					<div class="col-md-4 col-sm-6">
						<div class="service-item text-center">
							<span class="icon">
								<i class="<?php echo esc_attr($value['service_icon']) ?>"></i>
							</span>
							<h3 class="service-title"><?php echo esc_html($value['service_title'] ); ?></h3>
							<div class="service-content">
							<?php echo esc_html($value['service_description'] ); ?>
							</div>
						</div><!-- /.service-item -->
					</div><!-- /.col-md-4 -->
					<?php } 
				}
				?>

			</div><!-- /.item-container -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /#service -->
<!-- Service section End -->



<!-- Features Section -->
<section id="features"> 
	<div class="features-section parallax-style">
		<div class="parallax-overlay  section-padding">
			<div class="container">
				<h2 class="section-title sub"><?php echo esc_html(zels_get_option('core_feature_section_title') ); ?></h2>
				<div class="features-container">
					<div class="col-md-5">

						<?php $items = zels_get_option('core_service_section_group');

						if(!empty($items)) {
							foreach ($items as $key => $value) { ?>
							<div class="features-item">
								<div class="features-icon">
										<i class="<?php echo esc_attr($value['core_service_icon']) ?>"></i>
								</div><!-- /.features-icon -->
								<div class="features-content">
									<h3 class="title">
										<?php echo esc_html($value['core_service_title'] ); ?>
									</h3>
									<p class="feature-description"><?php echo esc_html($value['core_service_description'] ); ?></p>
								</div><!-- /.features-content -->  
							</div><!-- /.features-item -->
							<?php 
						} 
					} 
					?>
						


					</div><!-- /.col-md-5 -->
					<div class="col-md-7">
					<?php 
					$service_bg = zels_get_option('core_feature_bg_image_right');
					if(!empty($service_bg)) { ?>
						<img src="<?php echo esc_url(zels_get_option('core_feature_bg_image_right') ); ?>" alt="Featured Image">
					<?php } ?>
					</div><!-- /.col-md-7 -->
				</div><!-- /.features-container -->
			</div><!-- /.container -->
		</div><!-- /.section-padding -->
	</div><!-- /.features-section -->
</section><!-- /#features -->
<!-- Features Section End -->

