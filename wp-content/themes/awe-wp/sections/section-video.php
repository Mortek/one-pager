<?php 

$video_url = zels_get_option('videos_url');
						//store the URL into a variable
$url = $video_url;

						//extract the ID
if(preg_match('/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/', $url, $matches )) {

	$id = $matches[2];	

	$video_link = '<a href="http://player.vimeo.com/video/'.$id.'" class="play-btn boxer">
	<img src="'. get_template_directory_uri().'/assets/images/play.png" alt="Play Video">
	
	</a>';

}elseif(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches)) {

							//the ID of the YouTube URL: x6qe_kVaBpg
	$id = $matches[1];

$video_link = '<a href="//www.youtube.com/embed/'.$id.'" class="play-btn boxer">
	<img src="'. get_template_directory_uri().'/assets/images/play.png" alt="Play Video">
	
	</a>';

}
?>


	<!-- Video Watch  -->
	<section id="watch-video" data-type="background" data-speed="30">
		<div class="watch-video parallax-style">
			<div class="parallax-overlay section-padding">
				<div class="container">

					<h2 class="section-title"><?php echo esc_html(zels_get_option('video_section_title') ); ?></h2>
					<p class="section-details text-center">
						<?php echo wp_kses_post(zels_get_option('video_section_dsc')); ?>
					</p><!-- /.section-details -->	
					<div class="play-btn-container text-center wow rollIn animated">
						<?php print($video_link); ?>
					</div><!-- /.play-btn-container -->

				</div><!-- /.container -->
			</div><!-- /.parallax-overlay -->
		</div><!-- /.watch-video -->
	</section><!-- /#watch-video -->
	<!-- Video Watch End -->
