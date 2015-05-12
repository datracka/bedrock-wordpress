<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => 'general_help',
          'title'     => 'General',
          'content'   => '<p>Help content goes here!</p>'
        )
      ),
      'sidebar'       => '<p>Sidebar content goes here!</p>'
    ),
    'sections'        => array( 
      array(
        'id'          => 'analytics',
        'title'       => 'Analytics'
      ),
      array(
        'id'          => 'css',
        'title'       => 'Custom CSS'
      ),
      array(
        'id'          => 'sidebars',
        'title'       => 'Widget Areas'
      ),

      array(
        'id'          => 'admin',
        'title'       => 'Admin'
      ),
      array(
        'id'          => 'updates',
        'title'       => 'Updates'
      ),
      array(
        'id'          => 'log',
        'title'       => '<strong>Changelog</strong>'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'krown_tracking_enable',
        'label'       => 'Enable analytics',
        'desc'        => 'Please select this if you\'ll be using Google Analytics in the theme.',
        'std'         => 'disabled',
        'type'        => 'radio',
        'section'     => 'analytics',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enabled',
            'label'       => 'Enabled',
            'src'         => ''
          ),
          array(
            'value'       => 'disabled',
            'label'       => 'Disabled',
            'src'         => ''
          )
        ),
      ),


      array(
        'id'          => 'krown_changelog',
        'label'       => 'Changelog', 'krown',
        'desc'        => '<ul>
<li><strong>Version 1.2.3 : 20 December 2014</strong>
<br>~ Added WP 4.1 compatibility
<br>~ Fixed some bugs related to media formatting in blog posts
<br>~ Updated the Revolution Slider and Visual Composer plugins to their latest versions<br><br></li>
<li><strong>Version 1.2.2 : 1 December 2014</strong>
<br>~ Improved image scaling for the single images shortcode
<br>~ Added alt tags for the single images shortcode
<br>~ Fixed navigation styling issues in the Revolution Slider plugin
<br>~ Updated the Revolution Slider plugin to it\'s latest version<br><br></li>
<li><strong>Version 1.2.1 : 25 November 2014</strong>
<br>~ Fixed a bug with the content slider
<br>~ Fixed a bug with the images slider caused by last update
<br>~ Fixed some WooCommerce related errors
<br>~ Fixed image scaling issues
<br>~ Added changelog view in the backend<br><br></li>
<li><strong>Version 1.2 : 19 November 2014</strong>
<br>~ Added a new gallery page template	
<br>~ Added RTL support
<br>~ Added a header widget area
<br>~ Added Google Fonts subsets in the Theme Customizer
<br>~ Improved support for WPML 
<br>~ Improved retina support
<br>~ Updated the Revolution Slider plugin to it\'s latest version
<br>~ Fixed some errors related to variable products in WooCommerce
<br>~ Fixed an issue in the Visual Composer backend<br><br></li>
<li><strong>Version 1.1 : 10 November 2014</strong>
<br>~ Added support for WooCommerce
<br>~ Added a new portfolio masonry style - "simple resizing"
<br>~ Added the ability to post content on the portfolio page<br><br></li>
<li><strong>Version 1.0.4 : 6 November 2014</strong>
<br>~ Fixed a small bug related to SVG colors<br><br></li>
<li><strong>Version 1.0.3 : 5 November 2014</strong>
<br>~ Fixed a bug related to the unlimited portfolios feature
<br>~ Fixed some responsiveness issues
<br>~ Fixed another bug related to the social shortcodes<br><br></li>
<li><strong>Version 1.0.2 : 31 October 2014</strong>
<br>~ Fixed social shortcode issues
<br>~ Fixed header margin issue
<br>~ Improved IE compatibility<br><br></li>
<li><strong>Version 1.0.1 : 24 October 2014</strong>
<br>~ Fixed some minor bugs
<br>~ Added the option to disable unlimited portfolios
<br>~ Added the option for a pure HTML header in pages<br><br></li>
<li><strong>Version 1.0 : 21 October 2014</strong><br>~ First release</li>
</ul>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'log',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),

      array(
        'id'          => 'krown_sidebars_text',
        'label'       => 'About the sidebars', 'krown',
        'desc'        => 'All sidebars that you create here will appear both in the Widgets Page(Appearance &gt; Widgets), from where you\'ll have to configure them(put widgets inside them), and in the custom pages(default templates), where you\'ll be able to choose a sidebar for each page', 'krown',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'krown_sidebars',
        'label'       => 'Create Sidebars', 'krown',
        'desc'       => 'Please choose a unique title for each sidebar!', 'krown',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'sidebars',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array( 
          array(
            'id'          => 'id',
            'label'       => 'ID', 'krown',
            'desc'       => 'Please write a lowercase id, with NO SPACES!!!',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
        )
      ),

      array(
        'id'          => 'krown_tracking',
        'label'       => 'Analytics code',
        'desc'        => 'Put your Analytics code inside here. Make sure you include the entire script, not just your ID.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'analytics',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'krown_custom_css',
        'label'       => 'Custom CSS',
        'desc'        => 'Write any custom css here. Please don\'t change theme files, because you won\'t be able to easily update in the future.',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'css',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'krown_custom_login_logo_uri',
        'label'       => 'Admin logo',
        'desc'        => 'Add a custom <strong>273x63</strong> image for the WordPress login page.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'admin',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'krown_updates_about',
        'label'       => 'About',
        'desc'        => 'These two fields are required for the theme automatic updates. If you want to protect yourself against security attacks and have the latest features available as soon as they appear, you should complete this section, and you\'ll be notified about new theme updates whenever they appear on ThemeForest.',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'updates',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'krown_updates_user',
        'label'       => 'Username',
        'desc'        => 'Please insert your ThemeForest username.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'updates',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'krown_updates_api',
        'label'       => 'API Key',
        'desc'        => 'Please insert your <a target="_blank" href="http://themeforest.net/help/api">ThemeForest API key</a>.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'updates',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}

?>