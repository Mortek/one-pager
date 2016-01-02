<?php 
/**  section menu control by id.
--------------------------------------------------------------------------------------------------- */

$section_menu = zels_get_option('client');
$id = strtolower(str_replace(' ', '-', $section_menu['name']));
 ?>

<!-- Testimonial Section -->
<section id="<?php echo esc_attr($id ); ?>" class="clients">
		<div class="testimonial-section parallax-style">
			<div class="parallax-overlay section-padding">
				<div class="container"> 
					
					<h2 class="section-title "><?php echo esc_html(zels_get_option('client_section_title')); ?></h2>
					<div class="section-details text-center">
					<?php echo wp_kses_post(zels_get_option('client_section_des')); ?>
					</div> 

					<div class="testimonial">
						<div id="testimonial-slider" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<?php for ($i=0; $i < count(zels_get_option('client_section_group') ); $i++) { ?>
								<li data-target="#testimonial-slider" data-slide-to="<?php echo esc_attr($i); ?>" class="<?php echo esc_attr(!$i ?'active':'');?>"></li>
								<?php } ?>
							</ol>
							<div class="carousel-inner">

							<?php $items = zels_get_option('client_section_group');

							if(!empty($items)) {
								$i = 0;
								foreach ($items as $key => $value) { ?>
								<div class="item <?php echo !$i ? 'active' : ''; ?>">
									<div class="client-avatar">
										<img src="<?php echo esc_url($value['client_img'] ); ?>" alt="Client Avatar">
									</div><!-- /.client-avatar -->
									<div class="clients-comment">
										<p>
											<?php echo esc_html($value['client_description'] ); ?>
										</p>
										<p>
											<span class="clients-mane">
												<?php echo esc_html($value['client_name'] ); ?>
											</span> 
											<span class="clients-web"><?php echo esc_html($value['client_designation'] ); ?></span>
										</p>
									</div><!-- /.clients-comment --> 
								</div><!-- /.item -->
								<?php $i = 1;
							}

						}
							 ?>

							</div><!-- /.carousel-inner -->
							<a class="slide-nav left" href="#testimonial-slider" data-slide="prev"><span></span></a>
							<a class="slide-nav right" href="#testimonial-slider" data-slide="next"><span></span></a>
						</div><!-- /#testimonial-slider -->
					</div><!-- /.testimonial -->
				</div><!-- /.container -->
			</div><!-- /.parallax-overlay -->
		</div><!-- /.testimonial-section -->
	</section><!-- /#testimonial -->
	<!-- Testimonial Section End -->

	<!-- Clients Logo -->
	<div id="clients-logo" class="clients-logo text-center">
		<div class="container">
			<div class="row">
				<?php $items = zels_get_option('client_logo');
				if(!empty($items)) {
					foreach ($items as $key => $value) { ?>
					<div class="col-sm-6 col-md-3">
						<a href="<?php echo esc_url($value['client_logo_url'] ); ?>" class="clinet-logo">
						<img src="<?php echo esc_url($value['client_logo_img'] ); ?>" alt="Clients Logo">
						</a>
					</div><!-- /.col-sm-6 -->
					<?php	}	}	?>
			</div><!-- /.row --> 
		</div><!-- /.container -->
	</div><!-- /#clients-logo --> 
	<!-- Clients Logo End -->

