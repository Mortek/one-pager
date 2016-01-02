<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Framework constants
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
defined( 'ZELS_VERSION' )     or  define( 'ZELS_VERSION',     '1.0.0' );
defined( 'ZELS_TEXTDOMAIN' )  or  define( 'ZELS_TEXTDOMAIN',  'zels-framework' );
defined( 'ZELS_OPTION' )      or  define( 'ZELS_OPTION',      '_ZELS_OPTIONs' );
defined( 'ZELS_CUSTOMIZE' )   or  define( 'ZELS_CUSTOMIZE',   '_ZELS_CUSTOMIZE_options' );

/**
 *
 * Framework path finder
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'zels_get_path_locate' ) ) {
  function zels_get_path_locate() {

    if ( ! function_exists( 'get_plugins' ) || ! function_exists( 'is_plugin_active' ) ) {
      include_once ABSPATH .'wp-admin/includes/plugin.php';
    }

    foreach ( get_plugins() as $key => $value ) {
      if ( strpos( $key, 'zels-framework.php' ) !== false ) {
        if( is_plugin_active( $key ) ) {
          $basename = '/'. str_replace( '/zels-framework.php', '', $key );
          $dir      = WP_PLUGIN_DIR . $basename;
          $uri      = WP_PLUGIN_URL . $basename;
        }
      }
    }

    if ( ! isset( $basename ) ) {
      $basename  = str_replace( wp_normalize_path( get_template_directory() ), '', wp_normalize_path( dirname( __FILE__ ) ) );
      $dir       = get_template_directory() . $basename;
      $uri       = get_template_directory_uri() . $basename;
    }

    return apply_filters( 'zels_get_path_locate', array(
      'basename' => wp_normalize_path( $basename ),
      'dir'      => wp_normalize_path( $dir ),
      'uri'      => $uri
    ) );

  }
}

/**
 *
 * Framework set paths
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 *
 */
$get_path = zels_get_path_locate();

defined( 'ZELS_BASENAME' )  or  define( 'ZELS_BASENAME',  $get_path['basename'] );
defined( 'ZELS_DIR' )       or  define( 'ZELS_DIR',       $get_path['dir'] );
defined( 'ZELS_URI' )       or  define( 'ZELS_URI',       $get_path['uri'] );

/**
 *
 * Framework locate template and override files
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'zels_locate_template' ) ) {
  function zels_locate_template( $template_name ) {

    $located      = '';
    $override     = apply_filters( 'zels_framework_override', 'zels-framework-override' );
    $dir_plugin   = WP_PLUGIN_DIR;
    $dir_theme    = get_template_directory();
    $dir_child    = get_stylesheet_directory();
    $dir_override = '/'. $override .'/'. $template_name;
    $dir_template = ZELS_BASENAME .'/'. $template_name;

    // child theme override
    $child_force_overide    = $dir_child . $dir_override;
    $child_normal_override  = $dir_child . $dir_template;

    // theme override paths
    $theme_force_override   = $dir_theme . $dir_override;
    $theme_normal_override  = $dir_theme . $dir_template;

    // plugin override
    $plugin_force_override  = $dir_plugin . $dir_override;
    $plugin_normal_override = $dir_plugin . $dir_template;

    if ( file_exists( $child_force_overide ) ) {

      $located = $child_force_overide;

    } else if ( file_exists( $child_normal_override ) ) {

      $located = $child_normal_override;

    } else if ( file_exists( $theme_force_override ) ) {

      $located = $theme_force_override;

    } else if ( file_exists( $theme_normal_override ) ) {

      $located = $theme_normal_override;

    } else if ( file_exists( $plugin_force_override ) ) {

      $located =  $plugin_force_override;

    } else if ( file_exists( $plugin_normal_override ) ) {

      $located =  $plugin_normal_override;
    }

    $located = apply_filters( 'zels_locate_template', $located, $template_name );

    if ( ! empty( $located ) ) {
      load_template( $located, true );
    }

    return $located;

  }
}

/**
 *
 * Get option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'zels_get_option' ) ) {
  function zels_get_option( $option_name = '', $default = '' ) {

    $options = apply_filters( 'zels_get_option', get_option( ZELS_OPTION ), $option_name, $default );

    if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
      return $options[$option_name];
    } else {
      return ( ! empty( $default ) ) ? $default : null;
    }

  }
}

/**
 *
 * Set option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'zels_set_option' ) ) {
  function zels_set_option( $option_name = '', $new_value = '' ) {

    $options = apply_filters( 'zels_set_option', get_option( ZELS_OPTION ), $option_name, $new_value );

    if( ! empty( $option_name ) ) {
      $options[$option_name] = $new_value;
      update_option( ZELS_OPTION, $options );
    }

  }
}

/**
 *
 * Get all option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'zels_get_all_option' ) ) {
  function zels_get_all_option() {
    return get_option( ZELS_OPTION );
  }
}

/**
 *
 * Multi language value
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'zels_get_multilang_option' ) ) {
  function zels_get_multilang_option( $option_name = '', $default = '' ) {

    $value     = zels_get_option( $option_name, $default );
    $languages = zels_language_defaults();
    $default   = $languages['default'];
    $current   = $languages['current'];

    if ( is_array( $value ) && is_array( $languages ) && isset( $value[$current] ) ) {
      return  $value[$current];
    } else if ( $default != $current ) {
      return  '';
    }

    return $value;

  }
}

/**
 *
 * Get customize option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'zels_get_customize_option' ) ) {
  function zels_get_customize_option( $option_name = '', $default = '' ) {

    $options = apply_filters( 'zels_get_customize_option', get_option( ZELS_CUSTOMIZE ), $option_name, $default );

    if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
      return $options[$option_name];
    } else {
      return ( ! empty( $default ) ) ? $default : null;
    }

  }
}

/**
 *
 * Set customize option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'zels_set_customize_option' ) ) {
  function zels_set_customize_option( $option_name = '', $new_value = '' ) {

    $options = apply_filters( 'zels_set_customize_option', get_option( ZELS_CUSTOMIZE ), $option_name, $new_value );

    if( ! empty( $option_name ) ) {
      $options[$option_name] = $new_value;
      update_option( ZELS_CUSTOMIZE, $options );
    }

  }
}

/**
 *
 * Get all customize option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'zels_get_all_customize_option' ) ) {
  function zels_get_all_customize_option() {
    return get_option( ZELS_CUSTOMIZE );
  }
}

/**
 *
 * WPML plugin is activated
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'zels_is_wpml_activated' ) ) {
  function zels_is_wpml_activated() {
    if ( class_exists( 'SitePress' ) ) { return true; } else { return false; }
  }
}

/**
 *
 * qTranslate plugin is activated
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'zels_is_qtranslate_activated' ) ) {
  function zels_is_qtranslate_activated() {
    if ( function_exists( 'qtrans_getSortedLanguages' ) ) { return true; } else { return false; }
  }
}

/**
 *
 * Polylang plugin is activated
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'zels_is_polylang_activated' ) ) {
  function zels_is_polylang_activated() {
    if ( class_exists( 'Polylang' ) ) { return true; } else { return false; }
   }
 }

/**
 *
 * Get language defaults
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'zels_language_defaults' ) ) {
  function zels_language_defaults() {

    $multilang = array();

    if( zels_is_wpml_activated() || zels_is_qtranslate_activated() || zels_is_polylang_activated() ) {

      if( zels_is_wpml_activated() ) {

        global $sitepress;
        $multilang['default']   = $sitepress->get_default_language();
        $multilang['current']   = $sitepress->get_current_language();
        $multilang['languages'] = $sitepress->get_active_languages();

      } else if( zels_is_polylang_activated() ) {

        global $polylang;
        $current    = pll_current_language();
        $default    = pll_default_language();
        $current    = ( empty( $current ) ) ? $default : $current;
        $poly_langs = $polylang->model->get_languages_list();
        $languages  = array();

        foreach ( $poly_langs as $p_lang ) {
          $languages[$p_lang->slug] = $p_lang->slug;
        }

        $multilang['default']   = $default;
        $multilang['current']   = $current;
        $multilang['languages'] = $languages;

      } else if( zels_is_qtranslate_activated() ) {

        global $q_config;
        $multilang['default']   = $q_config['default_language'];
        $multilang['current']   = $q_config['language'];
        $multilang['languages'] = array_flip( qtrans_getSortedLanguages() );

      }

    }

    $multilang = apply_filters( 'zels_language_defaults', $multilang );

    return ( ! empty( $multilang ) ) ? $multilang : false;

  }
}

/**
 *
 * Get locate for load textdomain
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function zels_get_locale() {

  global $locale, $wp_local_package;

  if ( isset( $locale ) ) {
    return apply_filters( 'locale', $locale );
  }

  if ( isset( $wp_local_package ) ) {
    $locale = $wp_local_package;
  }

  if ( defined( 'WPLANG' ) ) {
    $locale = WPLANG;
  }

  if ( is_multisite() ) {

    if ( defined( 'WP_INSTALLING' ) || ( false === $ms_locale = get_option( 'WPLANG' ) ) ) {
      $ms_locale = get_site_option( 'WPLANG' );
    }

    if ( $ms_locale !== false ) {
      $locale = $ms_locale;
    }

  } else {

    $db_locale = get_option( 'WPLANG' );

    if ( $db_locale !== false ) {
      $locale = $db_locale;
    }

  }

  if ( empty( $locale ) ) {
    $locale = 'en_US';
  }

  return apply_filters( 'locale', $locale );

}

/**
 *
 * Framework load text domain
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
load_textdomain( ZELS_TEXTDOMAIN, ZELS_DIR . '/languages/'. zels_get_locale() .'.mo' );
