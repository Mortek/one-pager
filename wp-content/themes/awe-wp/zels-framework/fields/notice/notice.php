<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Notice
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class Zels_Framework_Option_notice extends Zels_Framework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();
    echo '<div class="zels-notice zels-'. $this->field['class'] .'">'. $this->field['content'] .'</div>';
    echo $this->element_after();

  }

}
