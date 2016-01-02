<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Framework admin enqueue style and scripts
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'zels_admin_enqueue_scripts' ) ) {
  function zels_admin_enqueue_scripts() {

    // admin utilities
    wp_enqueue_media();

    // wp core styles
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'wp-jquery-ui-dialog' );

    // framework core styles
    wp_enqueue_style( 'zels-framework', ZELS_URI .'/assets/css/zels-framework.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'font-awesome', ZELS_URI .'/assets/css/font-awesome.css', array(), '4.2.0', 'all' );

    if ( is_rtl() ) {
      wp_enqueue_style( 'zels-framework-rtl', ZELS_URI .'/assets/css/zels-framework-rtl.css', array(), '1.0.0', 'all' );
    }

    // wp core scripts
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'jquery-ui-dialog' );
    wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'jquery-ui-accordion' );

    // framework core scripts
    wp_enqueue_script( 'zels-plugins',    ZELS_URI .'/assets/js/zels-plugins.js',    array(), '1.0.0', true );
    wp_enqueue_script( 'zels-framework',  ZELS_URI .'/assets/js/zels-framework.js',  array( 'zels-plugins' ), '1.0.0', true );

  }
  add_action( 'admin_enqueue_scripts', 'zels_admin_enqueue_scripts' );
}
