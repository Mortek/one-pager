<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package AWE
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php if(zels_get_option('favicon_upload') ): ?>
    <link rel="shortcut icon" href="<?php echo zels_get_option('favicon_upload'); ?>" type="image/x-icon" />
<?php endif; ?>

<?php if(zels_get_option('iphone_icon') ): ?>
    <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo zels_get_option('iphone_icon'); ?>">
<?php endif; ?>

<?php if(zels_get_option('iphone_icon_retina') ): ?>
    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo zels_get_option('iphone_icon_retina'); ?>">
<?php endif; ?>

<?php if(zels_get_option('ipad_icon') ): ?>
    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo zels_get_option('ipad_icon'); ?>">
<?php endif; ?>

<?php if(zels_get_option('ipad_icon_retina') ): ?>
    <!-- For iPad Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo zels_get_option('ipad_icon_retina'); ?>">
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<?php if(is_front_page()) { ?>
	<?php get_template_part('template-parts/content', 'top' ); ?>
	<?php } ?>

	<!-- Main Menu -->
	<div class="main-menu-continer">
		<div id="main-menu" class="navbar navbar-default <?php echo (!is_front_page()) ? 'navbar-fixed-top' : '' ?>" role="navigation">
			<div class="container">

				<div class="navbar-header">
					<!-- responsive navigation -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-bars"></i>
					</button> <!-- /.navbar-toggle -->
					<!-- Logo -->
					<a href="<?php echo home_url(); ?>" class="navbar-brand">
						<?php if(zels_get_option('logo_in_menu_upload')) { ?>
						<img src="<?php echo esc_attr(zels_get_option('logo_in_menu_upload')); ?>" class="normal-logo" alt="<?php echo bloginfo('name' ); ?>">
						<?php }else {
							echo zels_get_option('logo_text');
						}
						?>
					</a><!-- /.navbar-brand -->
				</div> <!-- /.navbar-header -->

				<nav class="collapse navbar-collapse">

				<?php if(is_front_page()) { ?>
					<!-- Main navigation -->
					<ul id="headernavigation" class="nav navbar-nav pull-right">
					<li class="active"><a href="#top-section">Home</a></li>
					<?php 
					// Get Enabled Sections
					$sections_settings = zels_get_option('section_sorter');

					// Create Menu List By Using Section Name
					if (array_key_exists( 'enabled', $sections_settings) ) {

						$sections  = $sections_settings['enabled'];

						while ( current( $sections ) ) {


							$section_data = zels_get_option( key( $sections ) );
							//print_r($section_data );
							$section_name = $section_data['name'];

							if ( ! empty( $section_name ) ) {

								echo '<li><a href="#' . sanitize_title_with_dashes( $section_name ) .'">' . $section_name . '</a></li>';

							}

							next( $sections );

						}

					}

					 ?>
					</ul> <!-- /.nav .navbar-nav -->
					<?php }else {

						   /**
							* Displays a navigation menu
							* @param array $args Arguments
							*/
							$args = array(
								'theme_location' => 'primary',
								'menu' => '',
								'menu_class' => 'menu',
								'menu_id' => '',
								'echo' => true,
								'fallback_cb' => 'wp_page_menu',
								'before' => '',
								'after' => '',
								'link_before' => '',
								'link_after' => '',
								'items_wrap' => '<ul id = "%1$s" class = "nav navbar-nav pull-right %2$s">%3$s</ul>',
								'depth' => 0,
								'walker' => ''
							);
						
							wp_nav_menu( $args );
						} ?>
				</nav> <!-- /.navbar-collapse  -->
			</div> <!-- /.container -->
		</div><!-- /#main-menu -->
	</div><!-- /.main-menu-continer -->
	<!-- Main Menu End -->
