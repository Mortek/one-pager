<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();


// -----------------------------------------
// Post Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => '_portfolio_settings',
  'title'     => 'Add Portfolio Image',
  'post_type' => 'portfolio',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_4',
      'fields' => array(

        array(
          'id'    => 'upload_gallery',
          'type'  => 'gallery',
          'title' => 'Upload Field',
          'desc' => 'Please add image caption or edit image name before upload',
        ),

      ),
    ),

  ),
);

Zels_Framework_Metabox::instance( $options );
