<?php
/**  section menu control by id.
--------------------------------------------------------------------------------------------------- */

$section_menu = zels_get_option('team');
$id = strtolower(str_replace(' ', '-', $section_menu['name']));
 ?>

	<!-- Team Section -->
	<section id="<?php echo esc_attr($id);  ?>" class="team">
		<div class="team-section parallax-style clearfix">
			<div class="parallax-overlay section-padding">
				<div class="container"> 


					<h2 class="section-title "><?php echo esc_html(zels_get_option('team_section_title')); ?></h2>
					<div class="section-details text-center">
					<?php echo wp_kses_post(zels_get_option('team_section_des')); ?>
					</div> 


					<div class="row"> 
						<div id="team-slider"  class="owl-carousel owl-theme">
							<?php $items = zels_get_option('team_group');

							if(!empty($items)) {
							foreach ($items as $key => $value) { ?>
							<div class="item">
								<div class="team-member-box">
									<div class="team-member-top">
										<figure class="member-img">
											<img src="<?php echo esc_url($value['image'] ); ?>" alt="tema-member">
										</figure>
										<div class="social-buttons team-social">
											<?php if(!empty($value['twt'])) { ?>
											<a href="<?php echo esc_url($value['twt']); ?>" class="twitter-btn"><i class="fa fa-twitter"></i></a>
											<?php } ?>
											<?php if(!empty($value['fb'])) { ?>
											<a href="<?php echo esc_url($value['fb']); ?>" class="facebook-btn"><i class="fa fa-facebook"></i></a>
											<?php } ?>
											<?php if(!empty($value['dri'])) { ?>
											<a href="<?php echo esc_url($value['dri']); ?>" class="dribbble-btn"><i class="fa fa-dribbble"></i></a>
											<?php } ?>
											<?php if(!empty($value['ln'])) { ?>
											<a href="<?php echo esc_url($value['ln']); ?>" class="linkedin-btn"><i class="fa fa-linkedin"></i></a>
											<?php } ?>
										</div><!-- /.social-buttons -->
									</div><!-- /.team-member-top --> 

									<div class="memeber-details">
										<h3 class="member-name"><a href="<?php echo esc_url($value['detail'] ); ?>" title=""><?php echo esc_html($value['about_name'] ); ?></a></h3>
										<h4 class="member-designation"><?php echo esc_html($value['designation'] ); ?></h4>
										<p class="member-description">
											<?php echo esc_html($value['bio'] ); ?>
										</p><!-- /.member-description -->
									</div><!-- /.memeber-details --> 
								</div><!-- /.team-member-box -->
							</div><!-- /.item -->
							<?php } 
						}
							 ?>
						</div><!-- /#team-slider -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.parallax-overlay -->

		</div><!-- /.team-section -->
	</section><!-- /#team -->
	<!-- Team Section End -->



	<!-- Award Section -->
	<div id="award-section" class="award-section">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="award">
						<span class="award-icon"><i class="fa fa-coffee"></i></span>
						<span class="award-no"><span class="counter"><?php echo esc_html(zels_get_option('numb') ); ?></span>+</span>
						<span class="award-details"><?php echo esc_html(zels_get_option('cup') ); ?></span>
					</div><!-- /.award -->
				</div><!-- /.col-md-3 -->
				<div class="col-md-3">
					<div class="award">
						<span class="award-icon"><i class="fa fa-check-square-o"></i></span>
						<span class="award-no"><span class="counter"><?php echo esc_html(zels_get_option('proj_numb') ); ?></span></span>
						<span class="award-details"><?php echo esc_html(zels_get_option('project') ); ?></span>
					</div><!-- /.award --> 
				</div><!-- /.col-md-3 -->
				<div class="col-md-3">
					<div class="award">
						<span class="award-icon"><i class="fa fa-user"></i></span>
						<span class="award-no"><span class="counter"><?php echo esc_html(zels_get_option('client_numb') ); ?></span></span>
						<span class="award-details"><?php echo esc_html(zels_get_option('client_text') ); ?></span>
					</div><!-- /.award -->
				</div><!-- /.col-md-3 -->
				<div class="col-md-3">
					<div class="award">
						<span class="award-icon"><i class="fa fa-trophy"></i></span>
						<span class="award-no"><span class="counter"><?php echo esc_html(zels_get_option('won_numb') ); ?></span></span>
						<span class="award-details"><?php echo esc_html(zels_get_option('won') ); ?></span>
					</div><!-- /.award -->
				</div><!-- /.col-md-3 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /#award-section -->
	<!-- Award Section End -->



