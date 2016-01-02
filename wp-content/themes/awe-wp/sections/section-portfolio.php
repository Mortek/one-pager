<?php
/**  section menu control by id.
--------------------------------------------------------------------------------------------------- */

$section_menu = zels_get_option('portfolio');
$id = strtolower(str_replace(' ', '-', $section_menu['name']));
 ?>

<!-- portfolio Section -->
<section id="<?php echo esc_attr($id ); ?>" class="section-padding"> 
		<h2 class="section-title "><?php echo esc_html(zels_get_option('portfolio_section_title')); ?></h2>
		<div class="section-details text-center">
			<?php echo wp_kses_post(zels_get_option('portfolio_section_des')); ?>
		</div> 
		<div id="portfolio-container" class="portfolio-container">
			<div class="portfolioFilter">
				<button data-filter="" class="current">All</button>
				<?php
					$filters = get_terms( 'portfolio-category');
					foreach ($filters as $filter) {
						echo "<button data-filter=\".$filter->slug\">$filter->name</button>";
					} ?>
			</div> <!-- /.portfolioFilter -->

			<div id="portfolio-item" class="portfolio-item">
				<?php query_posts('post_type=portfolio' ); if(have_posts()) : while(have_posts()) : the_post(); 

				$terms = wp_get_post_terms(get_the_ID(), 'portfolio-category', true );
				$t = $trm_name = array();       
				foreach($terms as $term) 
					$t[] = $term->slug;
					$trm_name[] = $term->name;

				$galleries = get_post_meta( get_the_ID(), '_portfolio_settings', true );
				$images = $galleries['upload_gallery'];
				$ids = explode( ',', $images );
				
				foreach ( $ids as $id ) {
					$attachment = wp_get_attachment_image_src( $id, 'full' );
					$item_meta = wp_prepare_attachment_for_js($id);

					$img_caption = '';
					if ( ! empty( $item_meta['caption'] ) ) {
						$img_caption .= $item_meta['caption'];
					} else {
						$img_caption .= $item_meta['title'];
					}

				?>
				<div class="item <?php echo implode(' ', $t); ?>">
						<figure>
							<img src="<?php echo $attachment[0] ; ?>" alt="Item 3">
							<div class="item-link">
								<a href="#"></a>
							</div><!-- /.item-link -->
							<figcaption class="item-description">
								<h4 class="item-title">
									<?php echo esc_html($img_caption ); ?>
								</h4><!-- /.item-title -->
								<span class="item-category">
									<?php echo implode(', ', $trm_name); ?>
								</span><!-- /.item-category -->
								<span class="item-like-icon">
									<i class="fa fa-heart-o"></i> 26
								</span>
							</figcaption>
						</figure>
					</div><!-- /.item -->
				<?php 
				}
				endwhile; endif; wp_reset_postdata(); ?>
				
			</div><!-- /.portfolio-item -->
		</div><!-- /portfolio-container -->
	</section><!-- /#portfolio --> 
	<!-- Portfolio section End -->

