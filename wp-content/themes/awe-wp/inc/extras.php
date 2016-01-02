<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package AWE
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function awe_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'awe_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function awe_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'awe' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'awe_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function awe_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'awe_render_title' );
endif;


/**  excerpt.
--------------------------------------------------------------------------------------------------- */
function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return ' ';
}
add_filter('excerpt_more', 'new_excerpt_more');


/*------------------------------------------------------------------------------------------------------------------*/
/*	mail chimp 
/*------------------------------------------------------------------------------------------------------------------*/ 

/**
 * Mailchimp Email Subscription Handler
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Aminul Islam <aminmedia@gmail.com>
 */


function aw_chimp_subscribe() {
		
	$mc_API = zels_get_option('mc_API');
	$mc_LID = zels_get_option('mc_lst');
	
	
	// Get the Server ID
	$srv = substr($mc_API, -3);
	$subscribe_url = 'https://' . $srv . '.api.mailchimp.com/2.0/lists/subscribe';

	// Prepare for MC
	$email_struct = new StdClass();
	$email_struct->email = $_REQUEST['email'];
	$parameters = array(
	    'apikey'	 	=> $mc_API,
	    'id' 			=> $mc_LID,
	    'email' 		=> $email_struct,
	    'double_optin' 	=> false,
	    'send_welcome' 	=> true
	);

	// Get data from MC
	$curl = curl_init($subscribe_url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($parameters));
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($curl);
	$response = json_decode($response, true);

	// Run Ajax request
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		if ( ! empty( $_REQUEST['email'] ) ) {
			
			if ( ! empty( $response['error'] ) ) {
				echo $response['error'];
			} else {
				_e( 'Added! Thank you for subscribing.', 'appsworld' );
			}

		} else {
			_e( 'Please enter your email address.', 'appsworld' );
		}

		die();
	}
	else {
		wp_redirect( home_url() );
		exit();
	}
}

// Action it for ajax request
add_action( 'wp_ajax_nopriv_aw_chimp_subscribe', 'aw_chimp_subscribe' );
add_action( 'wp_ajax_aw_chimp_subscribe', 'aw_chimp_subscribe' );



