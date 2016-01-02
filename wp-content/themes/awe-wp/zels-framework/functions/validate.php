<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Email validate
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'zels_validate_email' ) ) {
  function zels_validate_email( $value, $field ) {

    if ( ! sanitize_email( $value ) ) {
      return __( 'Please write a valid email address!', ZELS_TEXTDOMAIN );
    }

  }
  add_filter( 'zels_validate_email', 'zels_validate_email', 10, 2 );
}

/**
 *
 * Numeric validate
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'zels_validate_numeric' ) ) {
  function zels_validate_numeric( $value, $field ) {

    if ( ! is_numeric( $value ) ) {
      return __( 'Please write a numeric data!', ZELS_TEXTDOMAIN );
    }

  }
  add_filter( 'zels_validate_numeric', 'zels_validate_numeric', 10, 2 );
}

/**
 *
 * Required validate
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'zels_validate_required' ) ) {
  function zels_validate_required( $value ) {
    if ( empty( $value ) ) {
      return __( 'Fatal Error! This field is required!', ZELS_TEXTDOMAIN );
    }
  }
  add_filter( 'zels_validate_required', 'zels_validate_required' );
}
