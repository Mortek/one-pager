<?php
/**  section menu control by id.
--------------------------------------------------------------------------------------------------- */

$section_menu = zels_get_option('skill');
if(!empty($section_menu)) {
$id = strtolower(str_replace(' ', '-', $section_menu['name']));
} else {
	$id = 'skill';
}
 ?>
	<!-- Skills Section -->
	<section id="<?php echo esc_attr($id);  ?>" class="gray-bg section-padding">
		<div class="container">
			<h2 class="section-title sub"><?php echo esc_html(zels_get_option('skill_title') ); ?></h2>

			<div class="skill-items">
				<div class="row">

					<?php $items = zels_get_option('skill_section_group');
					foreach ($items as $key => $value) { ?>
					<div class="col-md-3 col-sm-6">
						<div class="row">
							<div id="<?php echo esc_attr($value['skill_title']) ?>-skill-circle" class="skill-item" data-dimension="260" data-text="<?php echo esc_attr($value['skill_percentage']) ?>%" data-info="<?php echo esc_attr($value['skill_title']) ?>" data-width="30" data-fontsize="55" data-percent="<?php echo esc_attr($value['skill_percentage']) ?>" data-fgcolor="<?php echo esc_attr($value['skill_bar_color']) ?>" data-bgcolor="#e6e6e6">
								<div class="circliful-midbg"></div>
							</div><!-- /.skill-item -->
						</div><!-- /.row -->
					</div><!-- /.col-md-3 -->
					<?php } ?>

				</div><!-- /.row -->
			</div><!-- /.skill-items -->
		</div><!-- /.container -->
	</section><!-- /#skills -->
	<!-- Skills Section End -->

