<?php 
/**  section menu control by id.
--------------------------------------------------------------------------------------------------- */

$section_menu = zels_get_option('pricingtable');
$id = strtolower(str_replace(' ', '-', $section_menu['name']));
if(!empty($section_menu)) {
$id = strtolower(str_replace(' ', '-', $section_menu['name']));
} else {
	$id = 'pricing';
}
 ?>

<!-- pricing table Section -->
<section id="<?php echo esc_attr($id ); ?>">
		<div class="pricing-section gray-bg section-padding">
			<div class="container">
				<h2 class="section-title sub"><?php echo esc_html(zels_get_option('pricing_section_title') ); ?></h2>
				<div class="row">
				<div id="pricing-slider" class="owl-carousel owl-theme">
					
					<?php $items = zels_get_option('pricing_table_section_group');

					if(!empty($items)) {
						foreach ($items as $key => $value) { ?>
						<div class="item col-md-12">
							<div class="price-plan-box">
								<h4 class="plan-title"><?php echo esc_html($value['pricing_table_title'] ); ?></h4>
								<div class="plan-price-box">
									<div class="price-plan">
										<span class="price-currency"><?php echo esc_html($value['pricing_table_sign'] ); ?></span>
										<span class="price-count"><?php echo esc_html($value['pricing_table_percentage'] ); ?></span>
										<span class="price-per">/<?php echo esc_html($value['pricing_table_mo_y'] ); ?></span>
									</div><!-- /.price-plan --> 
								</div><!-- /.plan-price-box -->
								<div class="plan-description">
									<?php echo wp_kses_post($value['pricing_table_list'] ); ?>	
								</div><!-- /.plan-description -->
								<div class="plan-btn-container">
									<a href="<?php echo esc_html($value['pricing_table_payment_link'] ); ?>" class="btn plan-btn"><?php echo esc_html($value['pricing_table_sign_id'] ); ?></a>
								</div><!-- /.plan-btn-container -->
							</div><!-- /.price-plan-box --> 
						</div><!-- /.item col-md-12 -->

						<?php }

					} ?>
					</div><!-- /#pricing-slider -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.pricing-section -->
	</section><!-- /#pricing -->
	<!-- Pricing Section End -->
