<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => 'Site Settings',
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'cs-framework',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'Codestar Framework <small>by Codestar</small>',
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


// ------------------------------
// a seperator                  -
// ------------------------------
$options[] = array(
  'name'   => 'seperator_1',
  'title'  => 'Main Site Pages',
  'icon'   => 'fa fa-gear'
);

// ------------------------------
// backup                       -
// ------------------------------
$options[]   = array(
  'name'     => 'home_section',
  'title'    => 'Home',
  'icon'     => 'fa fa-home',
  'fields'   => array(



   
  array(
  'id'      => 'index_cover',
  'type'    => 'upload',
  'title'   => 'Index Cover Img',
  'help'    => 'Upload an Image for Index Cover',
),


 
    array(
      'id'      => 'cover_title',
      'type'    => 'text',
      'title'   => 'Cover Title',
    ),
   

    array(
      'id'      => 'cover_excerpt',
      'type'    => 'textarea',
      'title'   => 'Cover Excerpt',
    ),










  array(
  'id'      => 'index_nl_bg',
  'type'    => 'upload',
  'title'   => 'Newsletter Background Image Upload',
  'help'    => 'Upload an Image for the Newsletter BG',
),








  )
);








$options[]   = array(
'name'     => 'merch_section',
'title'    => 'Merch',
'icon'     => 'fa fa-shopping-cart',
'fields'   => array(


       array(
      'id'      => 'merch_banner_imgi',
      'type'    => 'upload',
      'title'   => 'Carousel Upload I',
    
    ),

 array(
      'id'      => 'merch_banner_urli',
      'type'    => 'text',
      'title'   => 'URL',
    ),
         
    array(
      'id'      => 'merch_banner_titlei',
      'type'    => 'text',
      'title'   => 'Title',
    ),


    array(
      'id'      => 'merch_banner_excerpti',
      'type'    => 'textarea',
      'title'   => 'Excerpt',
  
    ),







 array(
      'id'      => 'merch_banner_imgii',
      'type'    => 'upload',
      'title'   => 'Carousel Upload II',
    ),

 array(
      'id'      => 'merch_banner_urlii',
      'type'    => 'text',
      'title'   => 'URL',
    ),
         
    array(
      'id'      => 'merch_banner_titleii',
      'type'    => 'text',
      'title'   => 'Title',
    ),


    array(
      'id'      => 'merch_banner_excerptii',
      'type'    => 'textarea',
      'title'   => 'Excerpt',
    ),







 array(
      'id'      => 'merch_banner_imgiii',
      'type'    => 'upload',
      'title'   => 'Carousel Upload III',
    ),

 array(
      'id'      => 'merch_banner_urliii',
      'type'    => 'text',
      'title'   => 'URL',
    ),
         
    array(
      'id'      => 'merch_banner_titleiii',
      'type'    => 'text',
      'title'   => 'Title',
    ),


    array(
      'id'      => 'merch_banner_excerptiii',
      'type'    => 'textarea',
      'title'   => 'Excerpt',
    ),









  array(
  'id'      => 'merch_nl_bg',
  'type'    => 'upload',
  'title'   => 'Newsletter Background Image Upload',
  'help'    => 'Upload an Image for the Newsletter Footer',
),




  )
);








$options[]   = array(
'name'     => 'about_section',
'title'    => 'About',
'icon'     => 'fa fa-user',
'fields'   => array(

  array(
    'id'      => 'about_selfie',
    'type'    => 'upload',
    'title'   => 'About Page Bio Image',
    'help'    => 'Upload a selfie for your bio.',
  ),


array(
    'id'      => 'fb_url',
    'type'    => 'text',
    'title'   => 'Facebook URL',
    'help'    => 'This option field is useful. You will love it!',
  ),array(
    'id'      => 'twt_url',
    'type'    => 'text',
    'title'   => 'Twitter URL',
    'help'    => 'This option field is useful. You will love it!',
  ),array(
    'id'      => 'ig_url',
    'type'    => 'text',
    'title'   => 'Instagram URL',
    'help'    => 'This option field is useful. You will love it!',
  ),array(
    'id'      => 'sc_url',
    'type'    => 'text',
    'title'   => 'Snapchat URL',
    'help'    => 'This option field is useful. You will love it!',
  ),array(
    'id'      => 'as_url',
    'type'    => 'text',
    'title'   => 'ArtStation URL',
    'help'    => 'This option field is useful. You will love it!',
  ),array(
    'id'      => 'da_url',
    'type'    => 'text',
    'title'   => 'DeviantArt URL',
    'help'    => 'This option field is useful. You will love it!',
  ),array(
    'id'      => 'tb_url',
    'type'    => 'text',
    'title'   => 'Tumblr URL',
    'help'    => 'This option field is useful. You will love it!',
  ),array(
    'id'      => 'Et_url',
    'type'    => 'text',
    'title'   => 'Etsy URL',
    'help'    => 'This option field is useful. You will love it!',
  ),




  array(
    'id'      => 'explore_arti',
    'type'    => 'upload',
    'title'   => 'Explore Artwork Image I',
    'help'    => 'Upload Image I for About.',
  ),


  array(
    'id'      => 'explore_artii',
    'type'    => 'upload',
    'title'   => 'Explore Artwork Image II',
    'help'    => 'Upload Image II for About.',
  ),


  array(
    'id'      => 'explore_artiii',
    'type'    => 'upload',
    'title'   => 'Explore Artwork Image III',
    'help'    => 'Upload Image III for About.',
  ),


  array(
    'id'      => 'collection_art',
    'type'    => 'upload',
    'title'   => 'Collection Artwork Image',
    'help'    => 'Upload Imag for Collection Section.',
  ),



  array(
    'id'      => 'about_nl_bg',
    'type'    => 'upload',
    'title'   => 'Newsletter Background Image',
    'help'    => 'Upload BAckground Image for Newsletter Section.',
  ),


  )
);


$options[]   = array(
'name'     => 'contact_section',
'title'    => 'Contact',
'icon'     => 'fa fa-envelope',
'fields'   => array(


   array(
  'id'      => 'contact_bg_img',
  'type'    => 'upload',
  'title'   => 'Contact BG IMG',
  'help'    => 'Upload a Background Image for the Contact Page.',
),


  )
);
CSFramework::instance( $settings, $options );
