<?php 

/**  section menu control by id.
--------------------------------------------------------------------------------------------------- */

$section_menu = zels_get_option('about');
$id = strtolower(str_replace(' ', '-', $section_menu['name']));
 ?>
<!-- About Us Section -->
<section id="<?php echo esc_attr($id);  ?>" class="section-padding about-section">
	<div class="container">

		<h2 class="section-title "><?php echo esc_html(zels_get_option('about_section_title')); ?></h2>
		<div class="section-details text-center">
			<?php echo wp_kses_post(zels_get_option('about_section_des')); ?>
		</div> 


		<div class="row">
			<div class="we-are clearfix">
				<div class="col-md-5">
					<div class="image-container">
						<img src="<?php echo esc_url(zels_get_option('about_img') ); ?>" alt="History" class="img-responsive">
					</div><!-- /.tab-media -->
				</div><!-- /.col-md-5 -->

				<div class="col-md-7">
					<div class="about-details">
						<h3 class="about-title"><?php echo esc_html(zels_get_option('who_title') ); ?></h3>
						<?php echo wp_kses_post(zels_get_option('who_description') ); ?>
					</div><!-- /.about-details -->
				</div><!-- /.col-md-7 -->
			</div><!-- /.we-are-->  

			<div class="our-mission clearfix">

				<div class="col-md-7">
					<div class="about-details">
						<h3 class="about-title"><?php echo esc_html(zels_get_option('mission_title') ); ?></h3>
						<?php echo wp_kses_post(zels_get_option('mission_description') ); ?>
					</div><!-- /.about-details -->
				</div><!-- /.col-md-7 -->


				<div class="col-md-5">
					<div class="video-container" id="video-container">
						<?php 
						
						$video_url = zels_get_option('mission_video' );
						//store the URL into a variable
						$url = esc_url($video_url);

						//extract the ID
						if(preg_match('/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/', $url, $matches )) {

							//the ID of the Vimeo URL: 71673549 
							$id = $matches[2];	

							//set a custom width and height
								

							//echo the embed code and wrap it in a class
							echo '<div class="vimeo-article"><iframe width="500" height="281" src="http://player.vimeo.com/video/'.$id.'?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=ffffff"></iframe></div>';

						}elseif(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches)) {

							//the ID of the YouTube URL: x6qe_kVaBpg
							$id = $matches[1];

							//set a custom width and height
							
							//echo the embed code. You can even wrap it in a class
							echo '<div class="youtube-article"><iframe class="dt-youtube" src="//www.youtube.com/embed/'.$id.'" allowfullscreen></iframe></div>';	
						}else {
							echo '<video controls>
								<source src="'.$video_url.'" type="video/mp4">
									Your browser does not support HTML5 video.
								</video>';
						}
					?>
						<!-- <iframe src="//player.vimeo.com/video/74715441?title=0&amp;byline=0&amp;portrait=0&amp;badge=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					 -->

					</div><!-- /#video-container -->
				</div><!-- /.col-md-5 --> 
			</div><!-- /.our-mission -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /#about-us -->
<!-- About Us Section End -->

