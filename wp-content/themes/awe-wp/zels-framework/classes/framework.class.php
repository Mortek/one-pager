<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Framework Class
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class Zels_Framework extends Zels_Framework_Abstract {

  /**
   *
   * option database/data name
   * @access public
   * @var string
   *
   */
  public $unique = ZELS_OPTION;

  /**
   *
   * settings
   * @access public
   * @var array
   *
   */
  public $settings = array();

  /**
   *
   * options tab
   * @access public
   * @var array
   *
   */
  public $options = array();

  /**
   *
   * options section
   * @access public
   * @var array
   *
   */
  public $sections = array();

  /**
   *
   * options store
   * @access public
   * @var array
   *
   */
  public $get_option = array();

  /**
   *
   * instance
   * @access private
   * @var class
   *
   */
  private static $instance = null;

  // run framework construct
  public function __construct( $settings, $options ) {

    $this->settings = apply_filters( 'zels_framework_settings', $settings );
    $this->options  = apply_filters( 'zels_framework_options', $options );

    if( ! empty( $this->options ) ) {

      $this->sections   = $this->get_sections();
      $this->get_option = get_option( ZELS_OPTION );
      $this->addAction( 'admin_init', 'settings_api' );
      $this->addAction( 'admin_menu', 'admin_menu' );
      $this->addAction( 'wp_ajax_zels-export-options', 'export' );

    }

  }

  // instance
  public static function instance( $settings = array(), $options = array() ) {
    if ( is_null( self::$instance ) && ZELS_ACTIVE_FRAMEWORK ) {
      self::$instance = new self( $settings, $options );
    }
    return self::$instance;
  }

  // get sections
  public function get_sections() {

    $sections = array();

    foreach ( $this->options as $key => $value ) {

      if( isset( $value['sections'] ) ) {

        foreach ( $value['sections'] as $section ) {

          if( isset( $section['fields'] ) ) {
            $sections[] = $section;
          }

        }

      } else {

        if( isset( $value['fields'] ) ) {
          $sections[] = $value;
        }

      }

    }

    return $sections;

  }

  // wp settings api
  public function settings_api() {

    $defaults = array();

    foreach( $this->sections as $section ) {

      register_setting( $this->unique .'_group', $this->unique, array( &$this,'validate_save' ) );

      if( isset( $section['fields'] ) ) {

        add_settings_section( $section['name'] .'_section', $section['title'], '', $section['name'] .'_section_group' );

        foreach( $section['fields'] as $field_key => $field ) {

          add_settings_field( $field_key .'_field', '', array( &$this, 'field_callback' ), $section['name'] .'_section_group', $section['name'] .'_section', $field );

          // set default option if isset
          if( isset( $field['default'] ) ) {
            $defaults[$field['id']] = $field['default'];
            if( ! empty( $this->get_option ) && ! isset( $this->get_option[$field['id']] ) ) {
              $this->get_option[$field['id']] = $field['default'];
            }
          }

        }
      }

    }

    // set default variable if empty options and not empty defaults
    if( empty( $this->get_option )  && ! empty( $defaults ) ) {
      update_option( $this->unique, $defaults );
      $this->get_option = $defaults;
    }

  }

  // section fields validate in save
  public function validate_save( $request ) {

    // ignore nonce requests
    if( isset( $request['_nonce'] ) ) { unset( $request['_nonce'] ); }

    // set section id
    if( isset( $_POST['zels_section_id'] ) ) {
      $transient_time = ( zels_language_defaults() !== false ) ? 30 : 10;
      set_transient( 'zels_section_id', $_POST['zels_section_id'], $transient_time );
    }

    // import
    if ( isset( $request['import'] ) && ! empty( $request['import'] ) ) {
      $decode_string = zels_decode_string( $request['import'] );
      if( is_array( $decode_string ) ) {
        return $decode_string;
      }
      $this->add_settings_error( __( 'Success. Imported backup options.', ZELS_TEXTDOMAIN ), 'updated' );
    }

    // reset all options
    if ( isset( $request['resetall'] ) ) {
      $this->add_settings_error( __( 'Default options restored.', ZELS_TEXTDOMAIN ), 'updated' );
      return;
    }

    // reset only section
    if ( isset( $request['reset'] ) && isset( $_POST['zels_section_id'] ) ) {
      foreach ( $this->sections as $value ) {
        if( $value['name'] == $_POST['zels_section_id'] ) {
          foreach ( $value['fields'] as $field ) {
            if( isset( $field['id'] ) ) {
              if( isset( $field['default'] ) ) {
                $request[$field['id']] = $field['default'];
              } else {
                unset( $request[$field['id']] );
              }
            }
          }
        }
      }
      $this->add_settings_error( __( 'Default options restored for only this section.', ZELS_TEXTDOMAIN ), 'updated' );
    }

    // option sanitize and validate
    foreach( $this->sections as $section ) {
      if( isset( $section['fields'] ) ) {
        foreach( $section['fields'] as $field ) {

          // ignore santize and validate if element multilangual
          if ( isset( $field['type'] ) && ! isset( $field['multilang'] ) && isset( $field['id'] ) ) {

            // sanitize options
            $request_value = isset( $request[$field['id']] ) ? $request[$field['id']] : '';
            $sanitize_type = $field['type'];

            if( isset( $field['sanitize'] ) ) {
              $sanitize_type = ( $field['sanitize'] !== false ) ? $field['sanitize'] : false;
            }

            if( $sanitize_type !== false && has_filter( 'zels_sanitize_'. $sanitize_type ) ) {
              $request[$field['id']] = apply_filters( 'zels_sanitize_' . $sanitize_type, $request_value, $field, $section['fields'] );
            }

            // validate options
            if ( isset( $field['validate'] ) && has_filter( 'zels_validate_'. $field['validate'] ) ) {

              $validate = apply_filters( 'zels_validate_' . $field['validate'], $request_value, $field, $section['fields'] );

              if( ! empty( $validate ) ) {
                $this->add_settings_error( $validate, 'error', $field['id'] );
                $request[$field['id']] = ( isset( $this->get_option[$field['id']] ) ) ? $this->get_option[$field['id']] : '';
              }

            }

          }

          if( ! isset( $field['id'] ) || empty( $request[$field['id']] ) ) {
            continue;
          }

        }
      }
    }

    $request = apply_filters( 'zels_validate_save', $request );

    return $request;
  }

  // field callback classes
  public function field_callback( $field ) {
    $value = ( isset( $field['id'] ) && isset( $this->get_option[$field['id']] ) ) ? $this->get_option[$field['id']] : '';
    echo zels_add_element( $field, $value, $this->unique );
  }

  // settings sections
  public function do_settings_sections( $page ) {

    global $wp_settings_sections, $wp_settings_fields;

    if ( ! isset( $wp_settings_sections[$page] ) ){
      return;
    }

    foreach ( $wp_settings_sections[$page] as $section ) {

      if ( $section['callback'] ){
        call_user_func( $section['callback'], $section );
      }

      if ( ! isset( $wp_settings_fields ) || !isset( $wp_settings_fields[$page] ) || !isset( $wp_settings_fields[$page][$section['id']] ) ){
        continue;
      }

      $this->do_settings_fields( $page, $section['id'] );

    }

  }

  // settings fields
  public function do_settings_fields( $page, $section ) {

    global $wp_settings_fields;

    if ( ! isset( $wp_settings_fields[$page][$section] ) ) {
      return;
    }

    foreach ( $wp_settings_fields[$page][$section] as $field ) {
      call_user_func($field['callback'], $field['args']);
    }

  }

  public function add_settings_error( $message, $type = 'error', $id = 'global' ) {
    add_settings_error( 'zels-framework-errors', $id, $message, $type );
  }

  // adding option page
  public function admin_menu() {

    $defaults_menu_args = array(
      'menu_parent'     => '',
      'menu_title'      => '',
      'menu_type'       => '',
      'menu_slug'       => '',
      'menu_icon'       => get_template_directory_uri() . "/assets/images/icon.png",
      'menu_capability' => 'manage_options',
      'menu_position'   => null,
    );

    $args = wp_parse_args( $this->settings, $defaults_menu_args );

    if( $args['menu_type'] == 'add_submenu_page' ) {
      call_user_func( $args['menu_type'], $args['menu_parent'], $args['menu_title'], $args['menu_title'], $args['menu_capability'], $args['menu_slug'], array( &$this, 'admin_page' ) );
    } else {
      call_user_func( $args['menu_type'], $args['menu_title'], $args['menu_title'], $args['menu_capability'], $args['menu_slug'], array( &$this, 'admin_page' ), $args['menu_icon'], $args['menu_position'] );
    }

  }

  // option page html output
  public function admin_page() {

    $has_nav    = ( count( $this->options ) <= 1 ) ? ' zels-show-all' : '';
    $section_id = ( get_transient( 'zels_section_id' ) ) ? get_transient( 'zels_section_id' ) : $this->sections[0]['name'];
    $section_id = ( isset( $_GET['zels-section'] ) ) ? esc_attr( $_GET['zels-section'] ) : $section_id;

    echo '<div class="zels-framework zels-option-framework">';

      echo '<form method="post" action="options.php" enctype="multipart/form-data" id="zels_framework_form">';
      echo '<input type="hidden" class="zels-reset" name="zels_section_id" value="'. $section_id .'" />';

      if( $this->settings['ajax_save'] !== true ) {

        $errors = get_settings_errors();

        if ( ! empty( $errors ) ) {
          foreach ( $errors as $error ) {
            if( in_array( $error['setting'], array( 'general', 'zels-framework-errors' ) ) ) {
              echo '<div class="zels-settings-error '. $error['type'] .'">';
              echo '<p><strong>'. $error['message'] .'</strong></p>';
              echo '</div>';
            }
          }
        }

      }

      settings_fields( $this->unique. '_group' );

      echo '<header class="zels-header">';
      echo '<div class="zels-logo">';
      //if (ZELS_THEME_LOGO == true) {
        echo '<img src="' . esc_url( get_template_directory_uri(). '/assets/images/logo.png' ) . '" alt="'. ZELS_THEME_NAME .'"/>';
      //}
      echo '</div>';
      // echo '<div class="zels-info">';

      //   echo '<h1 class="zels-heading">' . esc_attr( ZELS_THEME_NAME ) . '<small class="zels-name">' . esc_attr( ZELS_THEME_VERSION ) . '</small></h1>';

      // echo '</div>';
      echo '<fieldset class="zels-action-field">';
      echo ( $this->settings['ajax_save'] === true ) ? '<span id="zels-save-ajax">'. __( 'Settings saved.', ZELS_TEXTDOMAIN ) .'</span>' : '';
      submit_button( __( 'Save Changes', ZELS_TEXTDOMAIN ), 'primary', 'save', false, array( 'data-ajax' => $this->settings['ajax_save'], 'data-save' => __( 'Saving...', ZELS_TEXTDOMAIN ) ) );
      submit_button( __( 'Restore Settings', ZELS_TEXTDOMAIN ), 'secondary zels-restore zels-reset-confirm', $this->unique .'[reset]', false );
      echo '</fieldset>';
      echo ( empty( $has_nav ) ) ? '<a href="#" class="zels-expand-all"><i class="fa fa-eye-slash"></i> '. __( 'show all options', ZELS_TEXTDOMAIN ) .'</a>' : '';
      echo '<div class="clear"></div>';
      echo '</header>'; // end .zels-header

      echo '<div class="zels-body'. $has_nav .'">';

        echo '<div class="zels-nav">';

          echo '<ul>';
          foreach ( $this->options as $key => $tab ) {

            if( ( isset( $tab['sections'] ) ) ) {

              $tab_active   = zels_array_search( $tab['sections'], 'name', $section_id );
              $active_style = ( ! empty( $tab_active ) ) ? ' style="display: block;"' : '';
              $active_list  = ( ! empty( $tab_active ) ) ? ' zels-tab-active' : '';
              $tab_icon     = ( ! empty( $tab['icon'] ) ) ? '<i class="zels-icon '. $tab['icon'] .'"></i>' : '';

              echo '<li class="zels-sub'. $active_list .'">';

                echo '<a href="#" class="zels-arrow">'. $tab_icon . $tab['title'] .'</a>';

                echo '<ul'. $active_style .'>';
                foreach ( $tab['sections'] as $tab_section ) {

                  $active_tab = ( $section_id == $tab_section['name'] ) ? ' class="zels-section-active"' : '';
                  $icon = ( ! empty( $tab_section['icon'] ) ) ? '<i class="zels-icon '. $tab_section['icon'] .'"></i>' : '';

                  echo '<li><a href="#"'. $active_tab .' data-section="'. $tab_section['name'] .'">'. $icon . $tab_section['title'] .'</a></li>';

                }
                echo '</ul>';

              echo '</li>';

            } else {

              $icon = ( ! empty( $tab['icon'] ) ) ? '<i class="zels-icon '. $tab['icon'] .'"></i>' : '';

              if( isset( $tab['fields'] ) ) {

                $active_list = ( $section_id == $tab['name'] ) ? ' class="zels-section-active"' : '';
                echo '<li><a href="#"'. $active_list .' data-section="'. $tab['name'] .'">'. $icon . $tab['title'] .'</a></li>';

              } else {

                echo '<li><div class="zels-seperator">'. $icon . $tab['title'] .'</div></li>';

              }

            }

          }
          echo '</ul>';

        echo '</div>'; // end .zels-nav

        echo '<div class="zels-content">';

          echo '<div class="zels-sections">';

          foreach( $this->sections as $section ) {

            if( isset( $section['fields'] ) ) {

              $active_content = ( $section_id == $section['name'] ) ? ' style="display: block;"' : '';
              echo '<div id="zels-tab-'. $section['name'] .'" class="zels-section"'. $active_content .'>';
              echo ( isset( $section['title'] ) && empty( $has_nav ) ) ? '<div class="zels-section-title"><h3>'. $section['title'] .'</h3></div>' : '';
              $this->do_settings_sections( $section['name'] . '_section_group' );
              echo '</div>';

            }

          }

          echo '</div>'; // end .zels-sections

          echo '<div class="clear"></div>';

        echo '</div>'; // end .zels-content

        echo '<div class="zels-nav-background"></div>';

      echo '</div>'; // end .zels-body

      echo '<footer class="zels-footer">';
      echo 'Zels Framework <strong>v'. ZELS_VERSION .' adapted from <a href="' . esc_url('github.com/Codestar/codestar-framework') . '">codestar</a> by CodexCoder</strong>';
      echo '</footer>'; // end .zels-footer

      echo '</form>'; // end form

      echo '<div class="clear"></div>';

    echo '</div>'; // end .zels-framework

  }

  // export options
  public function export() {

    header('Content-Type: plain/text');
    header('Content-disposition: attachment; filename=backup-options-'. gmdate( 'd-m-Y' ) .'.txt');
    header('Content-Transfer-Encoding: binary');
    header('Pragma: no-cache');
    header('Expires: 0');

    echo zels_encode_string( get_option( ZELS_OPTION ) );

    die();

  }

}
