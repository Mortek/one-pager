<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Group
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class Zels_Framework_Option_group extends Zels_Framework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();

    $last_id     = ( is_array( $this->value ) ) ? count( $this->value ) : 0;
    $acc_title   = ( isset( $this->field['accordion_title'] ) ) ? $this->field['accordion_title'] : __( 'Adding', ZELS_TEXTDOMAIN );
    $field_title = ( isset( $this->field['fields'][0]['title'] ) ) ? $this->field['fields'][0]['title'] : $this->field['fields'][1]['title'];
    $field_id    = ( isset( $this->field['fields'][0]['id'] ) ) ? $this->field['fields'][0]['id'] : $this->field['fields'][1]['id'];
    $search_id   = zels_array_search( $this->field['fields'], 'id', $acc_title );

    if( ! empty( $search_id ) ) {

      $acc_title = ( isset( $search_id[0]['title'] ) ) ? $search_id[0]['title'] : $acc_title;
      $field_id  = ( isset( $search_id[0]['id'] ) ) ? $search_id[0]['id'] : $field_id;

    }

    echo '<div class="zels-group hidden">';

      echo '<h4 class="zels-group-title">'. $acc_title .'</h4>';
      echo '<div class="zels-group-content">';
      foreach ( $this->field['fields'] as $field_key => $field ) {
        $field['sub']   = true;
        $unique         = $this->unique .'[_nonce]['. $this->field['id'] .']['. $last_id .']';
        $field_default  = ( isset( $field['default'] ) ) ? $field['default'] : '';
        echo zels_add_element( $field, $field_default, $unique );
      }
      echo '<div class="zels-element zels-text-right"><a href="#" class="button zels-warning-primary zels-remove-group">'. __( 'Remove', ZELS_TEXTDOMAIN ) .'</a></div>';
      echo '</div>';

    echo '</div>';

    echo '<div class="zels-groups zels-accordion">';

      if( ! empty( $this->value ) ) {

        foreach ( $this->value as $key => $value ) {

          $title = ( isset( $this->value[$key][$field_id] ) ) ? $this->value[$key][$field_id] : '';

          if ( is_array( $title ) && isset( $this->multilang ) ) {
            $lang  = zels_language_defaults();
            $title = $title[$lang['current']];
            $title = is_array( $title ) ? $title[0] : $title;
          }

          $field_title = ( ! empty( $search_id ) ) ? $acc_title : $field_title;

          echo '<div class="zels-group">';
          echo '<h4 class="zels-group-title">'. $field_title .': '. $title .'</h4>';
          echo '<div class="zels-group-content">';

          foreach ( $this->field['fields'] as $field_key => $field ) {
            $field['sub'] = true;
            $unique = $this->unique . '[' . $this->field['id'] . ']['.$key.']';
            $value  = ( isset( $field['id'] ) && isset( $this->value[$key][$field['id']] ) ) ? $this->value[$key][$field['id']] : '';
            echo zels_add_element( $field, $value, $unique );
          }

          echo '<div class="zels-element zels-text-right"><a href="#" class="button zels-warning-primary zels-remove-group">'. __( 'Remove', ZELS_TEXTDOMAIN ) .'</a></div>';
          echo '</div>';
          echo '</div>';

        }

      }

    echo '</div>';

    echo '<a href="#" class="button button-primary zels-add-group">'. $this->field['button_title'] .'</a>';

    echo $this->element_after();

  }

}
