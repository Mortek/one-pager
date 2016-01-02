<?php
/**
 * The template for displaying home page content.
 * Template Name: Front Page
 * @package AWE
 */

get_header(); ?>

<?php 

// Get Enabled Sections
$sections_settings = zels_get_option('section_sorter');

// Create Menu List By Using Section Name
if (array_key_exists( 'enabled', $sections_settings) ) {

	$sections  = $sections_settings['enabled'];

	while ( current( $sections ) ) {

		echo get_template_part( 'sections/section', key( $sections ) );

		next( $sections );

	}

}


?>

	<!-- Google Map Section -->
	<div id="google-map">
		<div class="map-container">
			<div id="googleMaps" class="google-map-container"></div>
		</div><!-- /.map-container -->
	</div><!-- /#google-map-->
	<!-- Google Map Section End -->	



<?php get_footer(); ?>