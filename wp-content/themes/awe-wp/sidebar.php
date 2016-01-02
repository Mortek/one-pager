<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package AWE
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="col-md-4">
	<div id="blog-sidebar" class="blog-sidebar">
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	</div>
</div>