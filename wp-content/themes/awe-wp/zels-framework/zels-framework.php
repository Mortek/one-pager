<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * ----------------------------------------------------------------------------------------------------
 *
 * Zels Framework
 * A Lightweight and easy-to-use WordPress Options Framework
 *
 * Plugin Name: Zels Framework
 * Plugin URI: http://zels.codexcoder.com/
 * Author: CodexCoder
 * Author URI: http://www.codexcoder.com/
 * Version: 1.0.0
 * Description: A Lightweight and easy-to-use WordPress Options Framework
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: zels-framework
 *
 * ----------------------------------------------------------------------------------------------------
 *
 * Copyright 2015 CodexCoder <info@codexcoder.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * ----------------------------------------------------------------------------------------------------
 *
 */

// ------------------------------------------------------------------------------------------------
include_once dirname( __FILE__ ) .'/zels-framework-path.php';
// ------------------------------------------------------------------------------------------------

if( ! function_exists( 'zels_framework_init' ) && ! class_exists( 'Zels_Framework' ) ) {
  function zels_framework_init() {

    // active modules
    defined( 'ZELS_ACTIVE_FRAMEWORK' )  or  define( 'ZELS_ACTIVE_FRAMEWORK',  true );
    defined( 'ZELS_ACTIVE_METABOX'   )  or  define( 'ZELS_ACTIVE_METABOX',    true );
    defined( 'ZELS_ACTIVE_SHORTCODE' )  or  define( 'ZELS_ACTIVE_SHORTCODE',  true );
    defined( 'ZELS_ACTIVE_CUSTOMIZE' )  or  define( 'ZELS_ACTIVE_CUSTOMIZE',  true );

    // product info
    defined( 'ZELS_THEME_NAME'    )  or     define( 'ZELS_THEME_NAME',     'Zels' );
    defined( 'ZELS_THEME_VERSION' )  or     define( 'ZELS_THEME_VERSION',  '1.0.0' );
    defined( 'ZELS_THEME_LOGO'    )  or     define( 'ZELS_THEME_LOGO',      false  );

    // helpers
    zels_locate_template ( 'functions/deprecated.php'     );
    zels_locate_template ( 'functions/helpers.php'        );
    zels_locate_template ( 'functions/actions.php'        );
    zels_locate_template ( 'functions/enqueue.php'        );
    zels_locate_template ( 'functions/sanitize.php'       );
    zels_locate_template ( 'functions/validate.php'       );

    // classes
    zels_locate_template ( 'classes/abstract.class.php'   );
    zels_locate_template ( 'classes/options.class.php'    );
    zels_locate_template ( 'classes/framework.class.php'  );
    zels_locate_template ( 'classes/metabox.class.php'    );
    zels_locate_template ( 'classes/shortcode.class.php'  );
    zels_locate_template ( 'classes/customize.class.php'  );

    // configs
    zels_locate_template ( 'config/framework.config.php'  );
    zels_locate_template ( 'config/metabox.config.php'    );
    // zels_locate_template ( 'config/shortcode.config.php'  );
    zels_locate_template ( 'config/customize.config.php'  );

  }
  add_action( 'init', 'zels_framework_init', 10 );
}
