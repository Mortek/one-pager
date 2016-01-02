<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Get icons from admin ajax
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'zels_get_icons' ) ) {
  function zels_get_icons() {

    $jsons = glob( ZELS_DIR . '/fields/icon/*.json' );

    if( ! empty( $jsons ) ) {
      foreach ( $jsons as $path ) {

        $object = json_decode( wp_remote_fopen( ZELS_URI .'/fields/icon/'. basename( $path ) ) );

        echo ( count( $jsons ) >= 2 ) ? '<h4 class="zels-icon-title">'. $object->name .'</h4>' : '';

        foreach ( $object->icons as $icon ) {
          echo '<a class="zels-icon-tooltip" data-icon="'. $icon .'" data-title="'. $icon .'"><span class="zels-icon zels-selector"><i class="'. $icon .'"></i></span></a>';
        }

      }
    }

    do_action( 'zels_add_icons' );

    die();
  }
  add_action( 'wp_ajax_zels-get-icons', 'zels_get_icons' );
}

/**
 *
 * Set icons for wp dialog
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'zels_set_icons' ) ) {
  function zels_set_icons() {

    echo '<div id="zels-icon-dialog" class="zels-dialog" title="'. __( 'Add Icon', ZELS_TEXTDOMAIN ) .'">';
    echo '<div class="zels-dialog-header zels-text-center"><input type="text" placeholder='. __( 'Search a Icon...', ZELS_TEXTDOMAIN ) .'" class="zels-icon-search" /></div>';
    echo '<div class="zels-dialog-load"><div class="zels-icon-loading">'. __( 'Loading...', ZELS_TEXTDOMAIN ) .'</div></div>';
    echo '</div>';

  }
  add_action( 'admin_footer', 'zels_set_icons' );
  add_action( 'customize_controls_print_footer_scripts', 'zels_set_icons' );
}
