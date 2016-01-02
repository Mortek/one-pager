<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Backup
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class Zels_Framework_Option_backup extends Zels_Framework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();

    echo '<textarea name="'. $this->unique .'[import]"'. $this->element_class() . $this->element_attributes() .'></textarea>';
    submit_button( __( 'Import a Backup', ZELS_TEXTDOMAIN ), 'primary zels-import-backup', 'backup', false );
    echo '<small>( '. __( 'copy-paste your backup string here', ZELS_TEXTDOMAIN ).' )</small>';

    echo '<hr />';

    echo '<textarea name="_nonce"'. $this->element_class() . $this->element_attributes() .' disabled="disabled">'. zels_encode_string( get_option( $this->unique ) ) .'</textarea>';
    echo '<a href="'. admin_url( 'admin-ajax.php?action=zels-export-options' ) .'" class="button button-primary" target="_blank">'. __( 'Export and Download Backup', ZELS_TEXTDOMAIN ) .'</a>';
    echo '<small>-( '. __( 'or', ZELS_TEXTDOMAIN ) .' )-</small>';
    submit_button( __( '!!! Reset All Options !!!', ZELS_TEXTDOMAIN ), 'zels-warning-primary zels-reset-confirm', $this->unique . '[resetall]', false );
    echo '<small class="zels-text-warning">'. __( 'Please be sure for reset all of framework options.', ZELS_TEXTDOMAIN ) .'</small>';
    echo $this->element_after();

  }

}
