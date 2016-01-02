<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Shortcodes Class
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class Zels_Framework_Shortcode_Manager extends Zels_Framework_Abstract{

  /**
   *
   * shortcode options
   * @access public
   * @var array
   *
   */
  public $options = array();

  /**
   *
   * shortcodes options
   * @access public
   * @var array
   *
   */
  public $shortcodes = array();

  /**
   *
   * exclude_post_types
   * @access public
   * @var array
   *
   */
  public $exclude_post_types = array();

  /**
   *
   * instance
   * @access private
   * @var class
   *
   */
  private static $instance = null;

  // run shortcode construct
  public function __construct( $options ) {

    $this->options = apply_filters( 'zels_shortcode_options', $options );
    $this->exclude_post_types = apply_filters( 'zels_shortcode_exclude', $this->exclude_post_types );

    if( ! empty( $this->options ) ) {

      $this->shortcodes = $this->get_shortcodes();
      $this->addAction( 'media_buttons', 'media_shortcode_button', 99 );
      $this->addAction( 'admin_footer', 'shortcode_dialog', 99 );
      $this->addAction( 'customize_controls_print_footer_scripts', 'shortcode_dialog', 99 );
      $this->addAction( 'wp_ajax_zels-get-shortcode', 'shortcode_generator', 99 );

    }

  }

  // instance
  public static function instance( $options = array() ){
    if ( is_null( self::$instance ) && ZELS_ACTIVE_SHORTCODE ) {
      self::$instance = new self( $options );
    }
    return self::$instance;
  }

  // add shortcode button
  public function media_shortcode_button( $editor_id ) {

    global $post;

    $post_type = ( isset( $post ) ) ? $post->post_type : '';

    if( ! in_array( $post_type, $this->exclude_post_types ) ) {
      echo '<a href="#" class="button button-primary zels-shortcode" data-editor-id="'. $editor_id .'">'. __( 'Add Shortcode', ZELS_TEXTDOMAIN ) .'</a>';
    }

  }

  // shortcode dialog
  public function shortcode_dialog() {
  ?>
    <div id="zels-shortcode-dialog" class="zels-dialog" title="<?php _e( 'Add Shortcode', ZELS_TEXTDOMAIN ); ?>">
      <div class="zels-dialog-header">
        <select class="chosen <?php echo ( is_rtl() ) ? 'chosen-rtl' : ''; ?> zels-dialog-select" data-placeholder="<?php _e( 'Select a shortcode', ZELS_TEXTDOMAIN ); ?>">
          <option value=""></option>
          <?php
            foreach ( $this->options as $group ) {
              echo '<optgroup label="'. $group['title'] .'">';
              foreach ( $group['shortcodes'] as $shortcode ) {
                $view = ( isset( $shortcode['view'] ) ) ? $shortcode['view'] : 'normal';
                echo '<option value="'. $shortcode['name'] .'" data-view="'. $view .'">'. $shortcode['title'] .'</option>';
              }
              echo '</optgroup>';
            }
          ?>
        </select>
      </div>
      <div class="zels-dialog-load"></div>
      <div class="zels-insert-button hidden">
        <a href="#" class="button button-primary zels-dialog-insert"><?php _e( 'Insert Shortcode', ZELS_TEXTDOMAIN ); ?></a>
      </div>
    </div>
  <?php
  }

  // shortcode generator function for dialog
  public function shortcode_generator() {

    if( ! isset( $_REQUEST['shortcode'] ) ) { die(); }

    $request   = $_REQUEST['shortcode'];
    $shortcode = $this->shortcodes[$request];

    if( isset( $shortcode['fields'] ) ) {

      foreach ( $shortcode['fields'] as $key => $field ) {

        if( isset( $field['id'] ) ) {
          $field['attributes'] = ( isset( $field['attributes'] ) ) ? wp_parse_args( array( 'data-atts' => $field['id'] ), $field['attributes'] ) : array( 'data-atts' => $field['id'] );
        }
        $field_default = ( isset( $field['default'] ) ) ? $field['default'] : '';

        if( in_array( $field['type'], array('image_select', 'checkbox') ) && isset( $field['options'] ) ) {
          $field['attributes']['data-check'] = true;
        }

        echo zels_add_element( $field, $field_default, 'shortcode' );

      }

    }

    if( isset( $shortcode['clone_fields'] ) ) {

      $clone_id = isset( $shortcode['clone_id'] ) ? $shortcode['clone_id'] : $shortcode['name'];

      echo '<div class="zels-shortcode-clone" data-clone-id="'. $clone_id .'">';
      echo '<a href="#" class="zels-remove-clone"><i class="fa fa-trash"></i></a>';

      foreach ( $shortcode['clone_fields'] as $key => $field ) {

        $field['sub']        = true;
        $field['attributes'] = ( isset( $field['attributes'] ) ) ? wp_parse_args( array( 'data-clone-atts' => $field['id'] ), $field['attributes'] ) : array( 'data-clone-atts' => $field['id'] );
        $field_default       = ( isset( $field['default'] ) ) ? $field['default'] : '';

        if( in_array( $field['type'], array('image_select', 'checkbox') ) && isset( $field['options'] ) ) {
          $field['attributes']['data-check'] = true;
        }

        echo zels_add_element( $field, $field_default, 'shortcode' );

      }

      echo '</div>';

      echo '<div class="zels-clone-button"><a id="shortcode-clone-button" class="button" href="#"><i class="fa fa-plus-circle"></i> '. $shortcode['clone_title'] .'</a></div>';

    }

    die();
  }

  // getting shortcodes from config array
  public function get_shortcodes() {

    $shortcodes = array();

    foreach ( $this->options as $group_value ) {
      foreach ( $group_value['shortcodes'] as $shortcode ) {
        $shortcodes[$shortcode['name']] = $shortcode;
      }
    }

    return $shortcodes;
  }

}
