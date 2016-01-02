<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package AWE
 */
get_header(); ?>
<!-- Blog head -->
	<section id="blog-head" class="blog-head">
		<div class="blog-head-section parallax-style clearfix">
			<div class="parallax-overlay">
				<div class="container">
					<div class="fluid-section section-padding">
						<h2 class="section-title"><?php echo esc_html(zels_get_option('page_section_title')) ?></h2>
						<div class="section-details text-center">
							<?php echo esc_html(zels_get_option('page_section_des')) ?>
						</div><!-- /.section-details -->	
					</div><!-- /.fluid-section section-padding -->
				</div><!-- /.container -->
			</div><!-- /.parallax-overlay -->
		</div><!-- /.blog-head-section -->
	</section><!-- /#blog-head -->
	<!-- Blog head End -->
<div class="content-area">

	<div class="container">
		<div class="row">
			<!-- Main Container  -->
			<div id="main-content" class="main-content col-md-8">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php the_post_navigation(); ?>

					<?php
				// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // End of the loop. ?>
			</div>


			<?php get_sidebar(); ?>
		</div>

	</div><!-- #container -->
</div><!-- #content-area -->


<?php get_footer(); ?>
