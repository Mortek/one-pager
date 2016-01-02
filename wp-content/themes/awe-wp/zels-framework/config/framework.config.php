<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings      = array(
  'menu_title' => 'AWE',
  'menu_type'  => 'add_menu_page',
  'menu_slug'  => 'zels-framework',
  'ajax_save'  => false,
  );

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

// ----------------------------------------
// a option section for options overview  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'general',
  'title'       => 'General',
  'icon'        => 'fa fa-home',

  // begin: fields
  'fields'      => array(

    // begin: a field
    array(
      'id'         => 'logo_on_off',
      'type'       => 'switcher',
      'title'      => 'Logo Enable',
      'label'      => 'Set Site logo',
      'default'    => true
      ),

    array(
      'id'         => 'logo_text',
      'type'       => 'text',
      'title'      => 'Logo Text',
      'dependency' => array( 'logo_on_off', '==', 'false' ),
      ),
    array(
      'id'      => 'logo_upload',
      'type'    => 'upload',
      'title'   => 'Logo',
      'default' => get_template_directory_uri(). '/assets/images/logo-big.png',
      'dependency' => array( 'logo_on_off', '==', 'true' ),
      'help'    => 'Upload a site logo for your branding.',
      ),

    array(
      'id'      => 'logo_in_menu_upload',
      'type'    => 'upload',
      'title'   => 'Logo In Menubar',
      'default' => get_template_directory_uri(). '/assets/images/logo.png',
      'dependency' => array( 'logo_on_off', '==', 'true' ),
      ),


    array(
      'id'      => 'ratinalogo_upload',
      'type'    => 'upload',
      'title'   => 'Upload Ratina Logo',
      'dependency' => array( 'logo_on_off', '==', 'true' ),
      'desc'    => 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.',
      ),

    array(
      'id'         => 'retina_logo_width',
      'type'       => 'number',
      'title'      => 'Standard Logo Width for Retina Display',
      'dependency' => array( 'logo_on_off', '==', 'true' ),
      'desc'    => 'Type the number only. for example 120',
      ),

    array(
      'id'         => 'retina_logo_height',
      'type'       => 'number',
      'title'      => 'Standard Logo Height for Retina Display',
      'dependency' => array( 'logo_on_off', '==', 'true' ),
      'desc'    => 'Type the number only. for example 60',
      ),

    array(
      'type'    => 'heading',
      'content' => 'Favicon Settings'
      ),


    array(
      'id'      => 'favicon_upload',
      'type'    => 'upload',
      'title'   => 'Upload Favicon',
      'after'    => '<p class="cs-text-info">Upload a site favicon for your branding.</p>',
      ),

    array(
      'id'      => 'iphone_icon',
      'type'    => 'upload',
      'title'   => 'Apple iPhone Icon Upload -Favicon',
      'after'    => '<p class="cs-text-info">Favicon for Apple iPhone (57px X 57px).</p>',
      ),

    array(
      'id'      => 'iphone_icon_retina',
      'type'    => 'upload',
      'title'   => 'Apple iPhone Retina Icon Upload -Favicon',
      'after'    => '<p class="cs-text-info">Favicon for Apple iPhone Retina Version (114px x 114px).</p>',
      ),

    array(
      'id'      => 'ipad_icon',
      'type'    => 'upload',
      'title'   => 'Apple iPad Icon Upload -Favicon',
      'after'    => '<p class="cs-text-info">Favicon for Apple iPad (72px x 72px).</p>',
      ),

    array(
      'id'      => 'ipad_icon_retina',
      'type'    => 'upload',
      'title'   => 'Apple iPad Retina Icon Upload -Favicon',
      'after'    => '<p class="cs-text-info">Favicon for Apple iPad Retina Version (144px x 144px).</p>',
      ),


    ), // end field
);

/**  slider.
--------------------------------------------------------------------------------------------------- */

$options[]      = array(
  'name'        => 'slider',
  'title'       => 'Slider',
  'icon'        => 'fa fa-sliders',

  // begin: fields
  'fields'      => array(


    array(
      'id'      => 'slider_bg_image',
      'type'    => 'upload',
      'title'   => 'Upload Background Image',
      'desc'    => 'Recommended Image size- 1920x1300',
      'help'    => 'Upload Slider Background Image',
      ),


    // begin: a field
    array(
      'id'              => 'slider_settings',
      'type'            => 'group',
      'title'           => 'Add Slider',
      'button_title'    => 'Add New',
      'accordion_title' => 'Add New Slide',
      'fields'          => array(

        array(
          'id'          => 'codex_slider_text',
          'type'        => 'text',
          'title'       => 'Title',
          ),


        array(
          'id'          => 'codex_slider_textarea',
          'type'        => 'textarea',
          'title'       => 'Subtitle',
          ),

        array(
          'id'          => 'codex_slider_link_text',
          'type'        => 'text',
          'title'       => 'Link Text',
          ),
        array(
          'id'          => 'codex_slider_link_url',
          'type'        => 'text',
          'title'       => 'Link URL',
          ),

        ),
      'default'                   => array(
        array(
          'codex_slider_text'     => 'SKILLED ON',
          'codex_slider_textarea' => 'PHP - HTML - CSS - JAVASCRIPT',
          ),
        array(
          'codex_slider_text'     => 'WE DO BEST',
          'codex_slider_textarea' => 'DESIGN - BRANDING - DEVELOP',
          ),
        )
      ),
    // end: a field

  ), // end: fields
);


/**  feature section.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'feature_section',
  'title'       => 'Feature',
  'icon'        => 'fa fa-coffee',

  // begin: fields
  'fields'      => array(

    array(
      'id'        => 'feature',
      'type'      => 'fieldset',
      'title'     => 'Menu Title',
      'fields'    => array(

        array(
          'id'    => 'name',
          'type'  => 'text',
          ),

        ),
      ),

    array(
      'id'    => 'section_title',
      'type'  => 'text',
      'title' => 'Section Title',
          // 'default' => 'some default value bla bla bla',
      'default'  => 'Feature',
      ),

    array(
      'id'              => 'feature_section_group',
      'type'            => 'group',
      'title'           => 'Add Item',
      'button_title'    => 'Add Item',
      'accordion_title' => 'Add New Item',
      'fields'          => array(

        array(
          'id'      => 'feature_icon',
          'type'    => 'icon',
          'title'   => 'Icon',
          'desc'    => 'Add feature icon',
          ),

        array(
          'id'          => 'feature_title',
          'type'        => 'text',
          'title'       => 'Title',
          ),

        array(
          'id'          => 'feature_description',
          'type'        => 'textarea',
          'title'       => 'Description',
          ),

        ),

      'default'                     => array(
        array(
          'feature_icon'     => 'fa fa-thumbs-o-up',
          'feature_title' => 'Elegant',
          'feature_description' => 'We Developed AWE HTML Template Following Coding Standard which is W3C Validated.',
          ),
        array(
          'feature_icon'     => 'fa fa-laptop',
          'feature_title' => 'Responsive',
          'feature_description' => 'AWE HTML Template Following Coding Standard which is W3C Validated.',
          ),
        array(
          'feature_icon'     => 'fa fa-gift',
          'feature_title' => 'Modern',
          'feature_description' => 'CodexCoder Developed AWE HTML Template And Follows Coding Standard which is W3C Validated.',
          ),

        )
      ),

)
);
    // end: a field



/**  About section.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'about_section',
  'title'       => 'About',
  'icon'        => 'fa fa-magic',

  // begin: fields
  'fields'      => array(

    array(
      'id'        => 'about',
      'type'      => 'fieldset',
      'title'     => 'Menu Title',
      'fields'    => array(

        array(
          'id'    => 'name',
          'type'  => 'text',
          'desc'  => 'IF blank - noting display on menu',
          ),

        ),
      'default'   => array(
        'name'     => 'About',
        )
      ),

    array(
      'id'    => 'about_section_title',
      'type'  => 'text',
      'title' => 'Section Title',
      'default'  => 'About us',
      ),

    array(
      'id'    => 'about_section_des',
      'type'  => 'wysiwyg',
      'title' => 'Section Description',
      'default'  => 'AWE is a creative work by CodexCoder Team. Our Experts develop Premium WordPress Themes, HTML5 Templates, PSD Design, Plugins and Apps for our valuable customer.',
      ),

    array(
      'type'    => 'subheading',
      'content' => 'Who We Are',
      ),
    array(
      'id'      => 'about_img',
      'type'    => 'upload',
      'title'   => 'Image',
      'default' => get_template_directory_uri(). '/images/about-us/history.jpg',
      ),

    array(
      'id'          => 'who_title',
      'type'        => 'text',
      'title'       => 'Title',
      'default'     => 'WHO WE ARE',
      ),

    array(
      'id'          => 'who_description',
      'type'        => 'wysiwyg',
      'title'       => 'Description',
      'default'     => '<p>
      <strong>A strong Team to keep promise surrounding the world. We developed a wide range of web Product</strong>
    </p>
    <p>
      Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. 
      Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit.
    </p>',
    ),

    array(
      'type'    => 'subheading',
      'content' => 'Mission',
      ),
    array(
      'id'      => 'mission_video',
      'type'    => 'upload',
      'title'   => 'Video upload or paste youtube/vimeo video link',
      'default' => 'https://vimeo.com/74715441',
      ),

    array(
      'id'          => 'mission_title',
      'type'        => 'text',
      'title'       => 'Title',
      'default'     => 'OUR MISSION',
      ),

    array(
      'id'          => 'mission_description',
      'type'        => 'wysiwyg',
      'title'       => 'Description',
      'default' => '<p>
      <strong>A strong Team to keep promise surrounding the world. We developed a wide range of web Product</strong>
    </p>
    <p>
      Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. 
      Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit.
    </p>',
    ),

    )
);
    // end: a field


/**  skill section.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'skill_section',
  'title'       => 'Skill',
  'icon'        => 'fa fa-mortar-board',

  // begin: fields
  'fields'      => array(

    array(
      'id'        => 'skill',
      'type'      => 'fieldset',
      'title'     => 'Menu Title',
      'fields'    => array(

        array(
          'id'    => 'name',
          'type'  => 'text',
          // 'title' => 'Menu Title',
          //'default'  => 'skill',
          // 'desc'  => 'IF blank - noting display on menu',
          ),

        ),
      ),

    array(
      'id'    => 'skill_title',
      'type'  => 'text',
      'title' => 'Section Title',
          // 'default' => 'some default value bla bla bla',
      'default'  => 'TOP SKILLS',
      ),

    array(
      'id'              => 'skill_section_group',
      'type'            => 'group',
      'title'           => 'Add Skill',
      'button_title'    => 'Add Skill',
      'accordion_title' => 'Add New Skill',
      'fields'          => array(


        array(
          'id'          => 'skill_title',
          'type'        => 'text',
          'title'       => 'Title',
          ),

        array(
          'id'          => 'skill_percentage',
          'type'        => 'number',
          'title'       => 'Percentage',
          ),

        array(
          'id'      => 'skill_bar_color',
          'type'    => 'color_picker',
          'title'   => 'Color Picker',
          ),

        ),

      'default'                     => array(
        array(
          'skill_title'           => 'photoshop',
          'skill_percentage'      => '76',
          'skill_bar_color'       => '#e12444',
          ),
        array(
          'skill_title'           => 'Wordpress',
          'skill_percentage'      => '95',
          'skill_bar_color'       => '#e0c124',
          ),
        array(
          'skill_title'           => 'Joomla',
          'skill_percentage'      => '85',
          'skill_bar_color'       => '#9324e1',
          ),

        array(
          'skill_title'           => 'Branding',
          'skill_percentage'      => '69',
          'skill_bar_color'       => '#1fb538',
          ),

        )
      ),

)
);
    // end: a field

/**  team.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'team_section',
  'title'       => 'Team',
  'icon'        => 'fa fa-users',

  // begin: fields
  'fields'      => array(

    array(
      'id'        => 'team',
      'type'      => 'fieldset',
      'title'     => 'Menu Title',
      'fields'    => array(

        array(
          'id'    => 'name',
          'type'  => 'text',
          'desc'  => 'IF blank - noting display on menu',
          ),

        ),
      'default'   => array(
        'name'     => 'team',
        )
      ),

    array(
      'id'      => 'team_bg_image',
      'type'    => 'upload',
      'title'   => 'Upload Background Image',
      'desc'    => 'Recommended Image size- 1920x1300',
      'help'    => 'Upload Slider Background Image',
      ),

    array(
      'id'    => 'team_section_title',
      'type'  => 'text',
      'title' => 'Section Title',
      'default'  => 'Our Team',
      ),

    array(
      'id'    => 'team_section_des',
      'type'  => 'wysiwyg',
      'title' => 'Section Description',
      'default'  => 'AWE is a creative work by CodexCoder Team. Our Experts develop Premium WordPress Themes, HTML5 Templates, PSD Design, Plugins and Apps for our valuable customer.',
      ),

    array(
      'id'              => 'team_group',
      'type'            => 'group',
      'title'           => 'Add Team Member',
      'button_title'    => 'Add New Team',
      'accordion_title' => 'Adding New Team',
      'fields'          => array(

        array(
          'id'          => 'about_name',
          'type'        => 'text',
          'title'       => 'Name',
          ),

        array(
          'id'          => 'image',
          'type'        => 'upload',
          'title'       => 'Picture',
          ),

        array(
          'id'          => 'designation',
          'type'        => 'text',
          'title'       => 'Designation',
          ),

        array(
          'id'          => 'bio',
          'type'        => 'textarea',
          'title'       => 'Sort Bio',
          ),

        array(
          'id'          => 'detail',
          'type'        => 'text',
          'title'       => 'Detail Page Link',
          'default'     => '#',
          ),

        array(
          'type'    => 'subheading',
          'content' => 'Social',
          ),
        array(
          'id'          => 'twt',
          'type'        => 'text',
          'title'       => 'Twitter',
          'default'     => '#',
          ),
        array(
          'id'          => 'fb',
          'type'        => 'text',
          'title'       => 'Facebook',
          'default'     => '#',
          ),
        array(
          'id'          => 'dri',
          'type'        => 'text',
          'title'       => 'Dribbble',
          'default'     => '#',
          ),
        array(
          'id'          => 'ln',
          'type'        => 'text',
          'title'       => 'Linkedin',
          'default'     => '#',
          ),


        )
),

array(
  'type'    => 'subheading',
  'content' => 'About Project',
  ),

array(
  'id'          => 'cup',
  'type'        => 'text',
  'title'       => 'Cups of Tea Consumed',
  'default'     => 'Cups of Tea Consumed',
  ),

array(
  'id'          => 'numb',
  'type'        => 'number',
  'title'       => 'How Many?',
  'default'     => '3214',
  ),

array(
  'id'          => 'project',
  'type'        => 'text',
  'title'       => 'Project Completed',
  'default'     => 'Project Completed',
  ),

array(
  'id'          => 'proj_numb',
  'type'        => 'number',
  'title'       => 'How Many?',
  'default'     => '657',
  ),
array(
  'id'          => 'client_text',
  'type'        => 'text',
  'title'       => 'Clients Worked With',
  'default'     => 'Clients Worked With',
  ),

array(
  'id'          => 'client_numb',
  'type'        => 'number',
  'title'       => 'How Many?',
  'default'     => '213',
  ),
array(
  'id'          => 'won',
  'type'        => 'text',
  'title'       => 'Award Won',
  'default'     => 'Award Won',
  ),

array(
  'id'          => 'won_numb',
  'type'        => 'number',
  'title'       => 'How Many?',
  'default'     => '99',
  ),




)
);
    // end: a field



/**  service section.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'service_section',
  'title'       => 'Service',
  'icon'        => 'fa fa-pencil',

  // begin: fields
  'fields'      => array(

    array(
      'id'        => 'service',
      'type'      => 'fieldset',
      'title'     => 'Menu Title',
      'fields'    => array(

        array(
          'id'    => 'name',
          'type'  => 'text',
          ),

        ),
        'default'   => array(
        'name'     => 'Service',
        )
      ),

    array(
      'id'    => 'service_section_title',
      'type'  => 'text',
      'title' => 'Section Title',
          // 'default' => 'some default value bla bla bla',
      'default'  => 'service',
      ),


    array(
      'id'    => 'service_section_des',
      'type'  => 'wysiwyg',
      'title' => 'Section Description',
      'default'  => 'AWE is a creative work by CodexCoder Team. Our Experts develop Premium WordPress Themes, HTML5 Templates, PSD Design, Plugins and Apps for our valuable customer.',
      ),


    array(
      'id'              => 'service_section_group',
      'type'            => 'group',
      'title'           => 'Add Service',
      'button_title'    => 'Add Service',
      'accordion_title' => 'Add New Service',
      'fields'          => array(

        array(
          'id'      => 'service_icon',
          'type'    => 'icon',
          'title'   => 'Icon',
          'desc'    => 'Add service icon',
          ),

        array(
          'id'          => 'service_title',
          'type'        => 'text',
          'title'       => 'Title',
          ),

        array(
          'id'          => 'service_description',
          'type'        => 'textarea',
          'title'       => 'Description',
          ),

        ),

      'default'                     => array(
        array(
          'service_icon'     => 'fa fa-pencil',
          'service_title' => 'Web Development',
          'service_description' => 'Our Web Development Services offer you a variety of services including enhancing your existing site.',
          ),
        array(
          'service_icon'     => 'fa fa-flask',
          'service_title' => 'Web Design',
          'service_description' => 'AWE HTML Template Following Coding Standard which is W3C Validated.',
          ),
        array(
          'service_icon'     => 'fa fa-shield',
          'service_title' => 'Wordpress Ready',
          'service_description' => 'CodexCoder Developed AWE HTML Template And Follows Coding Standard which is W3C Validated.',
          ),

        )
      ),
array(
  'type'    => 'subheading',
  'content' => 'Core Feature',
  ),
array(
  'id'      => 'core_feature_bg_image',
  'type'    => 'upload',
  'title'   => 'Upload Background Image',
  'desc'    => 'Recommended Image size- 1920x1300',
  'help'    => 'Upload Slider Background Image',
  ),

array(
  'id'    => 'core_feature_section_title',
  'type'  => 'text',
  'title' => 'Section Title',
  'default'  => 'Core Feature',
  ),

array(
  'id'              => 'core_service_section_group',
  'type'            => 'group',
  'title'           => 'Add core Service',
  'button_title'    => 'Add core Service',
  'accordion_title' => 'Add New core Service',
  'fields'          => array(

    array(
      'id'      => 'core_service_icon',
      'type'    => 'icon',
      'title'   => 'Icon',
      'desc'    => 'Add core service icon',
      ),

    array(
      'id'          => 'core_service_title',
      'type'        => 'text',
      'title'       => 'Title',
      ),

    array(
      'id'          => 'core_service_description',
      'type'        => 'textarea',
      'title'       => 'Description',
      ),

    ),

  'default'                     => array(
    array(
      'core_service_icon'     => 'fa fa-mobile-phone',
      'core_service_title' => 'ATTRACTIVE DESIGN',
      'core_service_description' => 'All of our Themes designed attractively. Attractiveness is a power to attract visitor, make different from or related to other.',
      ),
    array(
      'core_service_icon'     => 'fa fa-gear',
      'core_service_title' => 'RESPONSIVE LAYOUT',
      'core_service_description' => 'AWE HTML Template Following Coding Standard which is W3C Validated.',
      ),
    array(
      'core_service_icon'     => 'fa fa-file-o',
      'core_service_title' => 'EXPANSIVE DOCUMENTATION',
      'core_service_description' => 'CodexCoder Developed AWE HTML Template And Follows Coding Standard which is W3C Validated.',
      ),

    )
  ),

  array(
  'id'      => 'core_feature_bg_image_right',
  'type'    => 'upload',
  'title'   => 'Upload A Image',
  'desc'    => 'Recommended Image size- 635 X 472',
  ),


)
);
    // end: a field



/**  portfolio section.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'portfolio_section',
  'title'       => 'portfolio',
  'icon'        => 'fa fa-list',

  // begin: fields
  'fields'      => array(

    array(
      'id'        => 'portfolio',
      'type'      => 'fieldset',
      'title'     => 'Menu Title',
      'fields'    => array(

        array(
          'id'    => 'name',
          'type'  => 'text',
          ),

        ),
        'default'   => array(
        'name'     => 'portfolio',
        )
      ),

    array(
      'id'    => 'portfolio_section_title',
      'type'  => 'text',
      'title' => 'Section Title',
          // 'default' => 'some default value bla bla bla',
      'default'  => 'portfolio',
      ),


    array(
      'id'    => 'portfolio_section_des',
      'type'  => 'wysiwyg',
      'title' => 'Section Description',
      'default'  => 'AWE is a creative work by CodexCoder Team. Our Experts develop Premium WordPress Themes, HTML5 Templates, PSD Design, Plugins and Apps for our valuable customer.',
      ),

)
);
    // end: a field



/**  Pricing table section.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'pricing_section',
  'title'       => 'Pricing Table',
  'icon'        => 'fa fa-table',

  // begin: fields
  'fields'      => array(

    array(
      'id'        => 'pricing',
      'type'      => 'fieldset',
      'title'     => 'Menu Title',
      'fields'    => array(

        array(
          'id'    => 'name',
          'type'  => 'text',
          ),

        ),
      ),

    array(
      'id'    => 'pricing_section_title',
      'type'  => 'text',
      'title' => 'Section Title',
          // 'default' => 'some default value bla bla bla',
      'default'  => 'Choose Plan',
      ),


    array(
      'id'              => 'pricing_table_section_group',
      'type'            => 'group',
      'title'           => 'Add pricing table',
      'button_title'    => 'Add pricing table',
      'accordion_title' => 'Add New pricing table',
      'fields'          => array(


        array(
          'id'          => 'pricing_table_title',
          'type'        => 'text',
          'title'       => 'Title',
          ),

        array(
          'id'          => 'pricing_table_percentage',
          'type'        => 'number',
          'title'       => 'Price',
          ),

        array(
          'id'          => 'pricing_table_sign',
          'type'        => 'text',
          'title'       => 'Currency Sign',
          ),

        array(
          'id'          => 'pricing_table_mo_y',
          'type'        => 'text',
          'title'       => 'Monthly/Yearly',
          ),

        array(
          'id'      => 'pricing_table_list',
          'type'    => 'textarea',
          'title'   => 'List',
          ),

        array(
          'id'          => 'pricing_table_sign_id',
          'type'        => 'text',
          'title'       => 'Sign in Text',
          ),

        array(
          'id'          => 'pricing_table_payment_link',
          'type'        => 'text',
          'title'       => 'Payment Getway link',
          ),

        

        ),

      'default'                     => array(
        array(
          'pricing_table_title'           => 'basic',
          'pricing_table_percentage'      => '19',
          'pricing_table_sign'          => '$',
          'pricing_table_mo_y'        => 'MO',
          'pricing_table_list'       => '<ul><li><span>5</span> Domain Uses</li>
                <li>14+ <span>WordPress</span>Theme</li>
                <li>34+ <span>HTML</span>Template</li>
                <li><span>2TB</span> of Storage</li></ul>',
          'pricing_table_sign_id'     => 'SIGN IN',
          'pricing_table_payment_link'  => '#',
          ),
        array(
          'pricing_table_title'           => 'Standard',
          'pricing_table_percentage'      => '39',
          'pricing_table_sign'          => '$',
          'pricing_table_mo_y'        => 'MO',
          'pricing_table_list'       => '<ul><li><span>15</span> Domain Uses</li>
                <li>24+ <span>WordPress</span>Theme</li>
                <li>54+ <span>HTML</span>Template</li>
                <li><span>5TB</span> of Storage</li></ul>',
          'pricing_table_sign_id'     => 'SIGN IN',
          'pricing_table_payment_link'  => '#',
          ),
        array(
          'pricing_table_title'           => 'Premium',
          'pricing_table_percentage'      => '59',
          'pricing_table_sign'          => '$',
          'pricing_table_mo_y'        => 'MO',
          'pricing_table_list'       => '
               <ul> <li><span>59</span> Domain Uses</li>
                <li>59+ <span>WordPress</span>Theme</li>
                <li>59+ <span>HTML</span>Template</li>
                <li><span>9TB</span> of Storage</li></ul>',
          'pricing_table_sign_id'     => 'SIGN IN',
          'pricing_table_payment_link'  => '#',
          ),

        array(
          'pricing_table_title'           => 'pro',
          'pricing_table_percentage'      => '99',
          'pricing_table_sign'          => '$',
          'pricing_table_mo_y'        => 'MO',
          'pricing_table_list'       => '
                <ul><li><span>100+</span> Domain Uses</li>
                <li>100+ <span>WordPress</span>Theme</li>
                <li>100+ <span>HTML</span>Template</li>
                <li><span>50TB</span> of Storage</li></ul>',
          'pricing_table_sign_id'     => 'SIGN IN',
          'pricing_table_payment_link'  => '#',
          ),

        )
      ),



)
);
    // end: a field


/**  client section.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'client_section',
  'title'       => 'Client',
  'icon'        => 'fa fa-heart',

  // begin: fields
  'fields'      => array(

    array(
      'id'        => 'client',
      'type'      => 'fieldset',
      'title'     => 'Menu Title',
      'fields'    => array(

        array(
          'id'    => 'name',
          'type'  => 'text',
          ),

        ),
        'default' => array(
          'name'     => 'Client',
          )
      ),

    array(
      'id'      => 'client_bg_image',
      'type'    => 'upload',
      'title'   => 'Upload Background Image',
      'desc'    => 'Recommended Image size- 1920x1300',
      'help'    => 'Upload Slider Background Image',
      ),

    array(
      'id'    => 'client_section_title',
      'type'  => 'text',
      'title' => 'Section Title',
      'default'  => 'client',
      ),

     array(
      'id'    => 'client_section_des',
      'type'  => 'wysiwyg',
      'title' => 'Section Description',
      'default'  => 'AWE is a creative work by CodexCoder Team. Our Experts develop Premium WordPress Themes, HTML5 Templates, PSD Design, Plugins and Apps for our valuable customer.',
      ),

    array(
      'id'              => 'client_section_group',
      'type'            => 'group',
      'title'           => 'Add Testimonial',
      'button_title'    => 'Add Testimonial',
      'accordion_title' => 'Add New Testimonial',
      'fields'          => array(

        
        array(
          'id'          => 'client_name',
          'type'        => 'text',
          'title'       => 'Name',
          ),

        array(
          'id'      => 'client_img',
          'type'    => 'upload',
          'title'   => 'Upload',
          'desc'    => 'Add client image',
          ),


        array(
          'id'          => 'client_designation',
          'type'        => 'text',
          'title'       => 'Designation',
          ),

        array(
          'id'          => 'client_description',
          'type'        => 'textarea',
          'title'       => 'Testimonial',
          ),

        ),

      'default'                     => array(
        array(
          
          'client_name' => 'Maria',
          'client_img'     => get_template_directory_uri(). '/images/testimonial/01.jpg',
          'client_designation' => 'CEO, CodexCoder',
          'client_description' => 'We Developed AWE HTML Template Following Coding Standard which is W3C Validated.',
          ),
        array(
          
          'client_name' => 'Jake',
          'client_img'     => get_template_directory_uri(). '/images/testimonial/02.jpg',
          'client_designation' => 'CEO, CodexCoder',
          'client_description' => 'AWE HTML Template Following Coding Standard which is W3C Validated.',
          ),
        array(
          
          'client_name' => 'Martin',
          'client_img'     => get_template_directory_uri(). '/images/testimonial/03.jpg',
          'client_designation' => 'CEO, CodexCoder',
          'client_description' => 'CodexCoder Developed AWE HTML Template And Follows Coding Standard which is W3C Validated.',
          ),

        )
      ),


    array(
      'type'    => 'subheading',
      'content' => 'Add Client Logo',
      ),

    array(
      'id'              => 'client_logo',
      'type'            => 'group',
      'title'           => 'Add logo',
      'button_title'    => 'Add logo',
      'accordion_title' => 'Add New logo',
      'fields'          => array(

        array(
          'id'      => 'client_logo_img',
          'type'    => 'upload',
          'title'   => 'Upload',
          'desc'    => 'Add client logo',
          ),

        array(
          'id'          => 'client_logo_url',
          'type'        => 'text',
          'title'       => 'URL',
          ),

        ),
      ),
)
);
    // end: a field

/**  blog section.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'blog_section',
  'title'       => 'Blog',
  'icon'        => 'fa fa-rss',

  
  // begin: fields
  'fields'      => array(

    array(
      'id'        => 'blog',
      'type'      => 'fieldset',
      'title'     => 'Menu Title',
      'fields'    => array(

        array(
          'id'    => 'name',
          'type'  => 'text',
          ),

        ),
      'default' => array(
        'name'     => 'blog',
        )
      ),

    // begin: a field
    array(
      'id'      => 'blog_section_title',
      'type'    => 'text',
      'title'   => 'Section Title',
      'default' => 'Our Blog'
      ),


    array(
      'id'    => 'blog_section_des',
      'type'  => 'wysiwyg',
      'title' => 'Section Description',
      'default'  => 'Get Latest Product Updates, News, Tutorial, Template or Theme Reviews from CodexCoder Legend Team.',
      ),

    array(
      'type'    => 'subheading',
      'content' => 'Blog Single',
      ),

     array(
      'id'      => 'blog_single_head_img',
      'type'    => 'upload',
      'title'   => 'Blog Single Section Background',
      ),


     array(
      'type'    => 'subheading',
      'content' => 'Page',
      ),

     array(
      'id'      => 'blog_single_page_head_img',
      'type'    => 'upload',
      'title'   => 'Page Background',
      ),

     array(
      'id'      => 'page_section_title',
      'type'    => 'text',
      'title'   => 'Section Title',
      'default' => 'Our Blog'
      ),


    array(
      'id'    => 'page_section_des',
      'type'  => 'wysiwyg',
      'title' => 'Section Description',
      'default'  => 'Get Latest Product Updates, News, Tutorial, Template or Theme Reviews from CodexCoder Legend Team.',
      ),



    // end: a field
    )
  );

/**  Video section.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'video',
  'title'       => 'Video',
  'icon'        => 'fa fa-video-camera',

// begin: fields
  'fields'      => array(

    array(
    'id'      => 'videos_section_bg',
    'type'    => 'upload',
    'title'   => 'Section Background',
    ),

   array(
    'id'      => 'video_section_title',
    'type'    => 'text',
    'title'   => 'Section Title',
    'default' => 'Watch This'
    ),

    array(
      'id'      => 'video_section_dsc',
      'type'    => 'textarea',
      'type'  => 'wysiwyg',
      'title' => 'Section Description',
      'default'  => 'Feel free to contact us to ask your question about AWE Multipurpose HTML5 Template or any Premium WordPress Theme you like to buy from us.',

      ),
    array(
    'id'      => 'videos_url',
    'type'    => 'text',
    'title'   => 'Video URL',
    'default' => 'https://vimeo.com/130848841'
    ),

   )
  );

/**  contact.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'contact',
  'title'       => 'Contact',
  'icon'        => 'fa fa-phone',

  // begin: fields
  'fields'      => array(

    array(
      'id'        => 'contact',
      'type'      => 'fieldset',
      'title'     => 'Menu Title',
      'fields'    => array(

        array(
          'id'    => 'name',
          'type'  => 'text',
          ),

        ),
      'default' => array(
        'name'     => 'Contact',
        )
      ),

    // begin: a field
    array(
      'id'      => 'contact_section_title',
      'type'    => 'text',
      'title'   => 'Section Title',
      'default' => 'Contact'
      ),


    array(
      'id'    => 'contact_section_des',
      'type'  => 'wysiwyg',
      'title' => 'Section Description',
      'default'  => 'Feel free to contact us to ask your question about AWE Multipurpose HTML5 Template or any Premium WordPress Theme you like to buy from us.',
      ),

    array(
          'id'             => 'contact_form_7',
          'type'           => 'select',
          'class'          => 'chosen',
          'title'          => 'Select Contact Form 7',
          'options'        => 'posts',
          'query_args'     => array(
            'post_type'    => 'wpcf7_contact_form',
            'orderby'      => 'post_date',
            'order'        => 'DESC',
          ),
          'default_option' => 'Select Form',
        ),

    array(
      'type'    => 'content',
      'content' => 'When edit contact form, paste following code to get style- <pre>&lt;div class=&quot;col-sm-6&quot;&gt;[text* your-name class:form-control placeholder &quot;Your name&quot;] &lt;/div&gt;

&lt;div class=&quot;col-sm-6&quot;&gt;
    [email* your-email class:form-control placeholder &quot;Your email&quot;] &lt;/div&gt;

&lt;div class=&quot;col-sm-6&quot;&gt;
    [text your-subject class:form-control placeholder &quot;Your subject&quot;] &lt;/div&gt;

&lt;div class=&quot;col-sm-6&quot;&gt;
    [text your-webite class:form-control placeholder &quot;Your Website&quot;] &lt;/div&gt;

&lt;div class=&quot;col-sm-12&quot;&gt;
    [textarea your-message class:form-control placeholder &quot;Write Your message&quot;] &lt;/div&gt;

&lt;div class=&quot;col-sm-12&quot;&gt;[submit class:btn class:btn-lg class:top2bottom-effect class:full-width-btn class:btn-submit &quot;Send Message&quot;]&lt;/div&gt;
</pre>',
      ),

    
     array(
      'type'    => 'subheading',
      'content' => 'Address',
      ),

     array(
      'id'      => 'get_intouch_section_title',
      'type'    => 'text',
      'title'   => 'Section Title',
      'default' => 'Get in touch'
      ),

     array(
      'id'      => 'get_intouch_section_title',
      'type'    => 'text',
      'title'   => 'Section Title',
      'default' => 'Get in touch'
      ),
     array(
      'id'      => 'detail_address',
      'type'    => 'textarea',
      'title'   => 'Address',
      'default' => 'Inner Circular Road, Broker <br>
                Sector Rang Plaza, UK'
      ),
     array(
      'id'      => 'detail_mail',
      'type'    => 'textarea',
      'title'   => 'Mail',
      'default' => 'support@yoursite.com  <br>
                  info@yoursite.com'
      ),
     array(
      'id'      => 'detail_phone',
      'type'    => 'textarea',
      'title'   => 'Phone',
      'default' => '
      +61 (001) 2345 67890 <br>
      +61 (001) 2345 67890'
      ),
     array(
      'id'      => 'detail_skype',
      'type'    => 'textarea',
      'title'   => 'Skype',
      'default' => 'support.awe@skype.com  <br>
help.awe@skype.com'
      ),

   array(
      'type'    => 'subheading',
      'content' => 'Newsletter',
      ),

   array(
    'id'          => 'mc_API',
    'type'        => 'text',
    'title'       => 'Your Mailchimp API key',
    'desc'        => 'To get API <a href="http://kb.mailchimp.com/accounts/management/about-api-keys" title="">Click Here</a> '
    ),
   array(
    'id'          => 'mc_lst',
    'type'        => 'text',
    'title'       => 'Your Mailchimp List ID',
    'desc'        => 'To get List ID <a href="http://kb.mailchimp.com/lists/managing-subscribers/find-your-list-id" title="">Click Here</a> '
    ),


     )
  );



/**  twitter 
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'twitter',
  'title'       => 'Twitter Feed',
  'icon'        => 'fa fa-twitter',

  // begin: fields
  'fields'      => array(

      array(
    'id'      => 'twitter_section_title',
    'type'    => 'text',
    'title'   => 'Title',
    'default' => 'Latest Tweet'
    ),

    array(
    'id'      => 'twitter_username',
    'type'    => 'text',
    'title'   => 'Username',
    ),

    array(
    'id'      => 'tweet_count',
    'type'    => 'text',
    'title'   => 'How many tweet slide?',
    'default' => '5',
    ),

     array(
    'id'      => 'tweet_cache_time',
    'type'    => 'text',
    'title'   => 'Tweets Cache Time (in minutes)',
    'default' => '4',
    ),


   array(
    'id'      => 'consumer_key',
    'type'    => 'text',
    'title'   => 'Consumer key',
    ),

    array(
    'id'      => 'consumer_secret',
    'type'    => 'text',
    'title'   => 'Consumer secret',
    ),

     array(
    'id'      => 'access_token',
    'type'    => 'text',
    'title'   => 'Access token',
    ),

      array(
    'id'      => 'access_token_secret',
    'type'    => 'text',
    'title'   => 'Access token secret',
    ),



   )
  );


/**  google map.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'map',
  'title'       => 'Map',
  'icon'        => 'fa fa-location-arrow',

  // begin: fields
  'fields'      => array(
   array(
    'id'      => 'map_lati',
    'type'    => 'text',
    'title'   => 'Latitude',
    'default' => 53.599339,
    'desc'    => 'Get latitude <a target="_blank" href="http://www.gps-coordinates.net/">Click Here</a>'
    ),

    array(
    'id'      => 'map_langi',
    'type'    => 'text',
    'title'   => 'Langitude',
     'default' => 10.172954,
     'desc'    => 'Get latitude <a target="_blank" href="http://www.gps-coordinates.net/">Click Here</a>'
    ),

     array(
    'id'      => 'map_icon',
    'type'    => 'upload',
    'title'   => 'Upload Map Icon',
    'default' => get_template_directory_uri() . '/assets/images/mapicon.png',
    ),



   )
  );
/**  footer.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'footer',
  'title'       => 'Footer',
  'icon'        => 'fa fa-copyright',

  // begin: fields
  'fields'      => array(

    array(
          'id'      => 'custom_css',
          'type'    => 'textarea',
          'title'   => 'Add custom css code here',
          ),

     array(
          'id'      => 'copyright_txt',
          'type'    => 'textarea',
          'title'   => 'Add Copyright Text',
          'default' => '  © <a href="#">AWE</a>  2014 - Developed by <a href="http://www.codexcoder.com">CodexCoder</a>',
          ),

     )
  );

/**  advance settings.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'advance',
  'title'       => 'Advance',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(
    array(
      'id'             => 'section_sorter',
      'type'           => 'sorter',
      'title'          => 'Sorter',
      'default'        => array(
        'enabled'      => array(
          'feature'       => 'Feature',
          'about'         => 'About',
          'skill'         => 'Skill',
          'team'          => 'Team',
          'service'       => 'Service',
          'portfolio'     => 'Portfolio',
          'pricingtable'  => 'Pricing Table',
          'client'        => 'Client',
          'blog'          => 'Blog',
          'twitter'       => 'Twitter',
          'video'         => 'Video',
          'contact'       => 'Contact'


          ),
        'disabled'     => array(
          'black'      => 'Black',
          'white'      => 'White',
          ),
        ),
      'enabled_title'  => 'Active Sections',
      'disabled_title' => 'Deactive Sections',
      ),
    )
  );
    // end: a field

/**  social.
--------------------------------------------------------------------------------------------------- */
$options[]      = array(
  'name'        => 'awesocial',
  'title'       => 'Social',
  'icon'        => 'fa fa-plus',

  // begin: fields
  'fields'      => array(

     array(
          'id'      => 'social_bg',
          'type'    => 'upload',
          'title'   => 'Add Social Section background',
          ),

    array(
      'id'              => 'social_section_group',
      'type'            => 'group',
      'title'           => 'Add Social Account',
      'button_title'    => 'Add social',
      'accordion_title' => 'Add New social',
      'fields'          => array(


        array(
          'id'          => 'social_name',
          'type'        => 'text',
          'title'       => 'Name',
          ),

        array(
          'id'      => 'social_icon',
          'type'    => 'icon',
          'title'   => 'Add Icon',
          'desc'    => 'Add social image',
          ),


        array(
          'id'          => 'social_url',
          'type'        => 'text',
          'title'       => 'Social Url',
          ),


        ),

      'default'                     => array(
        array(

          'social_name' => 'Facebook',
          'social_icon'     => 'fa fa-facebook',
          'social_url' => '#',
          ),
        array(

          'social_name' => 'Twitter',
          'social_icon'     => 'fa fa-twitter',
          'social_url' => '#',
          ),
        array(

          'social_name' => 'Google',
          'social_icon'     => 'fa fa-google-plus',
          'social_url' => '#',
          ),

        )
      )
)
);


Zels_Framework::instance( $settings, $options );
