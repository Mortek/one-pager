<?php
/**
 * AWE functions and definitions
 *
 * @package AWE
 */

if ( ! function_exists( 'awe_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function awe_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on AWE, use a find and replace
	 * to change 'awe' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'awe', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'awe' ),
		) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'awe_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );
}
endif; // awe_setup
add_action( 'after_setup_theme', 'awe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function awe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'awe_content_width', 640 );
}
add_action( 'after_setup_theme', 'awe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function awe_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'awe' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );
}
add_action( 'widgets_init', 'awe_widgets_init' );


/*------------------------------------------------------------------------------------------------------------------*/
/*	enqueue script and style 
/*------------------------------------------------------------------------------------------------------------------*/ 

/**
 * Enqueue scripts and styles.
 */
function awe_scripts() {

	// Mordernizr 
	wp_enqueue_script( 'modernizr.awe.js', get_template_directory_uri().'/assets/js/modernizr.awe.js', array('jquery'),'1.0',true);

	// css
	wp_enqueue_style( 'animate.css', get_template_directory_uri().'/assets/css/animate.css',null,'1.0');
	wp_enqueue_style( 'bootstrap.min.css', get_template_directory_uri().'/assets/css/bootstrap.min.css',null,'1.0');
	wp_enqueue_style( 'color-switcher.css', get_template_directory_uri().'/assets/css/color-switcher.css',null,'1.0');
	wp_enqueue_style( 'font-awesome.min.css', get_template_directory_uri().'/assets/css/font-awesome.min.css',null,'1.0');
	wp_enqueue_style( 'jquery.circliful.css', get_template_directory_uri().'/assets/css/jquery.circliful.css',null,'1.0');
	wp_enqueue_style( 'jquery.fs.boxer.css', get_template_directory_uri().'/assets/css/jquery.fs.boxer.css',null,'1.0');
	wp_enqueue_style( 'linecons-font-style.css', get_template_directory_uri().'/assets/css/linecons-font-style.css',null,'1.0');
	wp_enqueue_style( 'main.css', get_template_directory_uri().'/assets/css/main.css',null,'1.0');
	wp_enqueue_style( 'owl.carousel.css', get_template_directory_uri().'/assets/css/owl.carousel.css',null,'1.0');
	wp_enqueue_style( 'responsive.css', get_template_directory_uri().'/assets/css/responsive.css',null,'1.0');
	wp_enqueue_style( 'awe-style', get_stylesheet_uri() );

	// js
	wp_enqueue_script('jquery' );
		wp_enqueue_script( 'jquery-1.11.1.min.js', get_template_directory_uri().'/assets/js/jquery-1.11.1.min.js', array('jquery'),'1.0',true);
	wp_enqueue_script( 'jquery.circliful.js', get_template_directory_uri().'/assets/js/jquery.circliful.js', array('jquery'),'1.0',true);
	wp_enqueue_script( 'jquery.fitvids.js', get_template_directory_uri().'/assets/js/jquery.fitvids.js', array('jquery'),'1.0',true);
	wp_enqueue_script( 'jquery.fs.boxer.js', get_template_directory_uri().'/assets/js/jquery.fs.boxer.js', array('jquery'),'1.0',true);
	wp_enqueue_script( 'jquery.nicescroll.min.js', get_template_directory_uri().'/assets/js/jquery.nicescroll.min.js', array('jquery'),'1.0',true);
	wp_enqueue_script( 'jquery.parallax.js', get_template_directory_uri().'/assets/js/jquery.parallax.js', array('jquery'),'1.0',true);
	wp_enqueue_script( 'onePageNav.js', get_template_directory_uri().'/assets/js/onePageNav.js', array('jquery'),'1.0',true);
	wp_enqueue_script( 'plugins.js', get_template_directory_uri().'/assets/js/plugins.js', array('jquery'),'1.0',true);
	wp_enqueue_script( 'switcher.js', get_template_directory_uri().'/assets/js/switcher.js', array('jquery'),'1.0',true);
	wp_enqueue_script( 'wow.min.js', get_template_directory_uri().'/assets/js/wow.min.js', array('jquery'),'1.0',true);
	wp_enqueue_script( 'functions.js', get_template_directory_uri().'/assets/js/functions.js', array('jquery'),'1.0',true);
	wp_enqueue_script( 'map.js', 'http://maps.google.com/maps/api/js?sensor=true', array('jquery'),'1.0',true);
	wp_enqueue_script( 'gmap3.js', get_template_directory_uri().'/assets/js/gmap3.js', array('jquery'),'1.0',true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'awe_scripts' );


/*------------------------------------------------------------------------------------------------------------------*/
/*	include some required file 
/*------------------------------------------------------------------------------------------------------------------*/ 

/**  framework.
--------------------------------------------------------------------------------------------------- */
require_once get_template_directory() . '/zels-framework/zels-framework.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**  tgm for plugin control.
--------------------------------------------------------------------------------------------------- */

require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**  more theme.
--------------------------------------------------------------------------------------------------- */
require get_template_directory() . '/inc/more-theme-fullfree.php';

/*------------------------------------------------------------------------------------------------------------------*/
/*	custom post type 
/*------------------------------------------------------------------------------------------------------------------*/ 

add_action( 'init', 'create_portfolio_post_type' );
function create_portfolio_post_type() {
  register_post_type( 'portfolio',
    array(
      'labels' => array(
        'name' => __( 'Portfolio' ),
        'singular_name' => __( 'Portfolio' )
      ),
      'menu_icon' => 'dashicons-portfolio',
      'hierarchical' => 'true',
      'public' => true,
      'has_archive' => true,
    )
  );
}


/**  texonomy.
--------------------------------------------------------------------------------------------------- */

add_action( 'init', 'create_porfolio_texonomy' );

function create_porfolio_texonomy() {
	register_taxonomy(
		'portfolio-category',
		'portfolio',
		array(
			'label' => __( 'Categories' ),
			'rewrite' => array( 'slug' => 'category' ),
			'hierarchical' => true,
		)
	);
}

/*------------------------------------------------------------------------------------------------------------------*/
/*	load in header
/*------------------------------------------------------------------------------------------------------------------*/ 

add_action('wp_head', 'codex_coder_load_script_on_head' );


function codex_coder_load_script_on_head() {
	?>
	<style>
	<?php if(zels_get_option('ratinalogo_upload')) { ?>
			@media only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 13/10), only screen and (min-resolution: 120dpi) {
				#logo .normal-logo{display:none;}
				#logo .retina-logo{display:inline;}
			}
			<?php } ?>

			<?php if(zels_get_option('slider_bg_image')) { ?>
				#top-section {
					background: url(<?php echo esc_url(zels_get_option('slider_bg_image')) ?>) 50% 0 no-repeat fixed;
				}
				<?php } ?>

			<?php if(zels_get_option('team_bg_image')) { ?>
				.team {
					background: url(<?php echo esc_url(zels_get_option('team_bg_image')) ?>) 50% 0 no-repeat fixed;
				}
				<?php } ?>
			
			<?php if(zels_get_option('core_feature_bg_image')) { ?>
				#features {
					background: url(<?php echo esc_url(zels_get_option('core_feature_bg_image')) ?>) 50% 0 no-repeat fixed;
				}
				<?php } ?>
			
		

			<?php if(zels_get_option('client_bg_image')) { ?>
				.clients {
					background: url(<?php echo esc_url(zels_get_option('client_bg_image')) ?>) 50% 0 no-repeat fixed;	
				}
				<?php } ?>

			<?php if(zels_get_option('blog_single_head_img')) { ?>
				#blog-head {
					background: url(<?php echo esc_url(zels_get_option('blog_single_head_img')) ?>) 50% 0 no-repeat fixed;	
				}
				<?php } ?>

			<?php if(zels_get_option('blog_single_page_head_img')) { ?>
				#blog-head {
					background: url(<?php echo esc_url(zels_get_option('blog_single_page_head_img')) ?>) 50% 0 no-repeat fixed;	
				}
				<?php } ?>	

			<?php if(zels_get_option('social_bg')) { ?>
				#social-buttons {
					background: url(<?php echo esc_url(zels_get_option('social_bg')) ?>) 50% 0 no-repeat fixed;	
				}
			<?php } ?>		
			<?php if(zels_get_option('videos_section_bg')) { ?>
				#watch-video{
					background: url(<?php echo esc_url(zels_get_option('videos_section_bg')) ?>) 50% 0 no-repeat fixed;	
				}
			<?php } ?>


			<?php 
			$custom_css = zels_get_option('custom_css');
			if(!empty($custom_css)) {
				print(zels_get_option('custom_css'));
			}
			?>	
		</style>
		<?php
	}

/*------------------------------------------------------------------------------------------------------------------*/
/*	search 
/*------------------------------------------------------------------------------------------------------------------*/ 

add_filter( 'get_search_form', 'codex_coder_search_form');

function codex_coder_search_form($form) {

			/**
			 * Search form customization.
			 *
			 * @link http://codex.wordpress.org/Function_Reference/get_search_form
			 * @since 1.0.0
			 */
			$form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '">
			<input type="search" class="search-field" placeholder="Type and Hit Enter ..." value="" name="s" title="Search for:">
			<button class="btn" type="submit"><i class="fa fa-search"></i></button>
			</form>';

		return $form;
 }


/**  author bio social link.
--------------------------------------------------------------------------------------------------- */
function awe_new_contactmethods( $contactmethods ) {

//add Facebook
$contactmethods['facebook'] = 'Facebook';
// add pinterest
$contactmethods['pinterest'] = 'Pinterest';
// Add Twitter
$contactmethods['twitter'] = 'Twitter';
//add gplus
$contactmethods['googleplus'] = 'Google Plus';
//add insta
//$contactmethods['instagram'] = 'Instagram';


 
return $contactmethods;
}
add_filter('user_contactmethods','awe_new_contactmethods',10,1);


/**  comments from call back function.
--------------------------------------------------------------------------------------------------- */

if(!function_exists('codexcoder_comment')):

    function codexcoder_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
            // Display trackbacks differently than normal comments.
        ?>
        <li <?php comment_class('comment parent clearfix'); ?> id="submited-comment">

            <p>Pingback: <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'AWE' ), '<span class="edit-link">', '</span>' ); ?></p>
            <?php
            break;
            default :

            global $post;
            ?>

            <li <?php comment_class('comment parent clearfix'); ?>>

                <div class="comment">
                    <ul class="commentlist">

                        <li class="comments-block clearfix comment" id="comment-<?php comment_ID(); ?>">
                            <article class="comment-body">
                            <div class="comment-meta">
                            	<div class="comment-author vcard">

                            		<?php
                            		echo get_avatar( $comment, $args['avatar_size'] );
                            		?>       

                            	</div><!-- /.author -->
                            </div>


                              
                                    <div class="comment-metadata">
                                        <?php
                                        printf( '<h5 class="user-name">%1$s</h5>',
                                            get_comment_author_link());
                                            ?>
                                            <time class="date-cm" datetime="<?php echo get_comment_date() ?>"><?php echo get_comment_date() ?> <span class="date-cm"> at <?php echo get_comment_time()?></span> </time>
                                            <?php edit_comment_link( __( 'Edit', 'AWE' ), '<span class="edit-link">', '</span>' ); ?>
                                         <div class="reply pull-right">
                                            <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'AWE' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                                        </div>
                                        </div>
                                       
                                        <div class="clearfix"></div>

                                        <div class="comment-content">
                                            <?php comment_text(); ?>
                                        </div>


                                        <?php if ( '0' == $comment->comment_approved ) : ?>
                                            <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'AWE' ); ?></p>
                                        <?php endif; ?>

                                    
                                </article>
                            </li>

                        </ul>
                    </div>
                </li>
            </li>
            <?php
            break;
            endswitch; 
        }

        endif;


/*------------------------------------------------------------------------------------------------------------------*/
/*	load in footer
/*------------------------------------------------------------------------------------------------------------------*/ 

add_action('wp_footer', 'codex_coder_load_script_on_footer', 100 );


function codex_coder_load_script_on_footer() { ?>
	

	<script type="text/javascript"> 

		/*----------- Google Map - with support of gmaps.js ----------------*/

		function isMobile() { 
			return ('ontouchstart' in document.documentElement);
		}

		function init_gmap() {
			if ( typeof google == 'undefined' ) return;
			var options = {
				center: [<?php echo esc_html(zels_get_option('map_lati')) ?>, <?php echo esc_html(zels_get_option('map_langi')) ?>],
				zoom: 15,
				mapTypeControl: true,
				mapTypeControlOptions: {
					style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
				},
				navigationControl: true,
				scrollwheel: false,
				streetViewControl: true
			}

			if (isMobile()) {
				options.draggable = false;
			}

			jQuery('#googleMaps').gmap3({
				map: {
					options: options
				},
				marker: {
					latLng: [<?php echo esc_html(zels_get_option('map_lati')) ?>, <?php echo esc_html(zels_get_option('map_langi')) ?>],
					options: { icon: '<?php echo esc_url(zels_get_option('map_icon')) ?>' }
				}
			});
		}

		init_gmap();



		
		jQuery(document).ready(function($) {
			"use strict";

			/*---------------------- Current Menu Item -------------------------*/
			jQuery('#main-menu #headernavigation').onePageNav({
				currentClass: 'active',
				changeHash: false,
				scrollSpeed: 750,
				scrollThreshold: 0.5,
				scrollOffset: 160,
				filter: ':not(.sub-menu a, .not-in-home)',
				easing: 'swing'
			}); 
		});
		// document ready function End


		/**  mailchimp.
		--------------------------------------------------------------------------------------------------- */
		jQuery(".aw-mc-ajax-form").each(function () {
			var $this = $(this);

				// Newselleter Scripts
				$this.submit(function () {
					$this.find("button[type=\"submit\"]").addClass("clicked");
					var action = $(this).attr("action");
					$.ajax({
						url: action,
						type: "POST",
						data: {
							action: $this.find("input[name=\"action\"]").val(),
							email: $this.find("input[name=\"email\"]").val()
						},
						success: function success(data) {
							$this.find(".aw-mc-response").html(data).addClass("success").css("display", "block");
							$this.find("button[type=\"submit\"]").removeClass("clicked");
						},
						error: function error() {
							$this.find(".aw-mc-response").html("Sorry, an error occurred.").addClass("error").css("display", "block");
							$this.find("button[type=\"submit\"]").removeClass("clicked");
						}
					});
					return false;
				});
				
			});	

	</script>	

	<?php 

}


/*------------------------------------------------------------------------------------------------------------------*/
/*	blog link 
/*------------------------------------------------------------------------------------------------------------------*/ 

function cc_get_blog_link(){
	$blog_post = get_option("page_for_posts");
	if($blog_post){
		$permalink = get_permalink($blog_post);
	}
	else
		$permalink = site_url();
	return $permalink;
} 


/*-----------------------------------------------------------------------------------*/
/*	 Post Format Icons
/*-----------------------------------------------------------------------------------*/ 
function cc_post_format_icon() {
	
	if ( has_post_format( 'aside' )) {
		return '<i class="fa fa-file-text-o"></i>';
	} elseif ( has_post_format( 'chat' )) {
		return '<i class="fa fa-wechat"></i>';
	} elseif ( has_post_format( 'gallery' )) {
		return '<i class="fa fa-picture-o"></i>';
	} elseif ( has_post_format( 'link' )) {
		return '<i class="fa fa-link"></i>';
	} elseif ( has_post_format( 'image' )) {
		return '<i class="fa fa-file-image-o"></i>';
	} elseif ( has_post_format( 'quote' )) {
		return '<i class="fa fa-quote-left"></i>';
	} elseif ( has_post_format( 'status' )) {
		return '<i class="fa fa-refresh"></i>';
	} elseif ( has_post_format( 'video' )) {
		return '<i class="fa fa-file-video-o"></i>';
	} elseif ( has_post_format( 'audio' )) {
		return '<i class="fa fa-file-audio-o"></i>';
	} else {
		return '<i class="fa fa-pencil"></i>';
	}

}



/*-----------------------------------------------------------------------------------*/
/*	 require plugin of awe 
/*-----------------------------------------------------------------------------------*/ 

add_action( 'tgmpa_register', 'awe_req_plugins_include');

if(!function_exists('awe_req_plugins_include')){

	function awe_req_plugins_include()
	{
		$plugins = array(
			

			array(
				'name'      => 'Contact Form 7',
				'slug'      => 'contact-form-7',
				'required'  => true,
				)
			

			);


	/**
	* Array of configuration settings. Amend each line as needed.
	* If you want the default strings to be available under your own theme domain,
	* leave the strings uncommented.
	* Some of the strings are added into a sprintf, so see the comments at the
	* end of each line for what each argument will be.
	*/
	$config = array(
			'domain'            => 'awe',           			 // Text domain - likely want to be the same as your theme.
			'default_path'      => '',                           // Default absolute path to pre-packaged plugins
			'parent_menu_slug'  => 'themes.php',         		 // Default parent menu slug
			'parent_url_slug'   => 'themes.php',         		 // Default parent URL slug
			'menu'              => 'install-required-plugins',   // Menu slug
			'has_notices'       => true,                         // Show admin notices or not
			'is_automatic'      => true,            			 // Automatically activate plugins after installation or not
			'message'           => '',               			 // Message to output right before the plugins table
			'strings'           => array(
				'page_title'                                => __( 'Install Required Plugins', 'awe' ),
				'menu_title'                                => __( 'Install Plugins', 'awe' ),
						'installing'                                => __( 'Installing Plugin: %s', 'awe' ), // %1$s = plugin name
						'oops'                                      => __( 'Something went wrong with the plugin API.', 'awe' ),
						'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
						'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
						'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
						'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
						'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
						'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
						'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
						'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
						'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
						'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
						'return'                                    => __( 'Return to Required Plugins Installer', 'awe' ),
						'plugin_activated'                          => __( 'Plugin activated successfully.', 'awe' ),
						'complete'                                  => __( 'All plugins installed and activated successfully. %s', 'awe' ) // %1$s = dashboard link
						)
);

tgmpa( $plugins, $config );

}
}
