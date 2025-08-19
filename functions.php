<?php
/**
* Functions and definitions for the Vixart theme.
*
* @link https://ae-lab.io
*
* @package Kraken Ink
* @since 1.2
*/



require_once get_template_directory() .'/cs-framework/cs-framework.php';

function get_cs_option($option_name, $default = '') {
    $options = get_option('_cs_options');
    return !empty($options[$option_name]) ? $options[$option_name] : $default;
}


function add_custom_mime_types( $mimes ) {
$mimes['mpd'] = 'application/dash+xml'; //for Live Videos via Dash.js
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter( 'upload_mimes', 'add_custom_mime_types' );




function vix_art_setup() {
load_theme_textdomain( 'vix_art', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'vix_art_setup' );



//This filter will change the add-to-cart button by adding the necessary Bootstrap classes while keeping the AJAX add-to-cart functionality intact.

add_filter( 'woocommerce_loop_add_to_cart_link', 'change_loop_add_to_cart_button', 10, 2 );

function change_loop_add_to_cart_button( $button, $product ) {
    $button_text = __("Add to cart", "woocommerce");
    $button = '<a href="' . $product->add_to_cart_url() . '" data-quantity="1" class="button alt ajax_add_to_cart btn btn-primary" data-product_id="' . $product->get_id() . '" aria-label="' . $button_text . '" rel="nofollow">' . $button_text . '</a>';

    return $button;
}





function exclude_pages_from_search( $query ) {
if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
$query->set( 'post_type', array( 'post', 'product', 'video', 'artwork' ) ); // search both posts and products
}
}
add_filter( 'pre_get_posts', 'exclude_pages_from_search' );
















function main_enq() {
wp_register_style( 'main-css',  get_stylesheet_directory_uri() .'/style.css', false, '' );
wp_enqueue_style( 'main-css' );

wp_register_style( 'type',  get_stylesheet_directory_uri() .'/font/typography.css', false, '' );
wp_enqueue_style( 'type' );


wp_register_style( 'woo-css',  get_stylesheet_directory_uri() .'/woocommerce.css', false, '' );
wp_enqueue_style( 'woo-css' );


wp_register_script( 'main-js',  get_stylesheet_directory_uri() .'/script.js', true, '' );
wp_enqueue_script( 'main-js' );

wp_register_style( 'xxl',  get_stylesheet_directory_uri() .'/css/xxl.css', array( 'main-css' ), '' );
wp_enqueue_style( 'xxl' );

wp_register_style( 'xl',  get_stylesheet_directory_uri() .'/css/xl.css', array( 'main-css' ), '' );
wp_enqueue_style( 'xl' );

wp_register_style( 'lg',  get_stylesheet_directory_uri() .'/css/lg.css', array( 'main-css' ), '' );
wp_enqueue_style( 'lg' );

wp_register_style( 'md',  get_stylesheet_directory_uri() .'/css/md.css', array( 'main-css' ), '' );
wp_enqueue_style( 'md' );


wp_register_style( 'sm',  get_stylesheet_directory_uri() .'/css/sm.css', array( 'main-css' ), '' );
wp_enqueue_style( 'sm' );

wp_register_style( 'xs',  get_stylesheet_directory_uri() .'/css/xs.css', array( 'main-css' ), '' );
wp_enqueue_style( 'xs' );


wp_register_style( 'mobile',  get_stylesheet_directory_uri() .'/css/mobile.css', array( 'main-css' ), '' );
wp_enqueue_style( 'mobile' );

wp_register_style( 'tablet',  get_stylesheet_directory_uri() .'/css/tablet.css', array( 'main-css' ), '' );
wp_enqueue_style( 'tablet' );


wp_register_style( 'laptop-desktop',  get_stylesheet_directory_uri() .'/css/laptop-desktop.css', array( 'main-css' ), '' );
wp_enqueue_style( 'laptop-desktop' );

wp_register_style( 'retina',  get_stylesheet_directory_uri() .'/css/retina.css', array( 'main-css' ), '' );
wp_enqueue_style( 'retina' );




}
add_action( 'wp_enqueue_scripts', 'main_enq' );



function iconography() {

wp_register_style( 'fontawesome',  get_stylesheet_directory_uri() .'/fonts/css/all.min.css', false, '1.1' );
wp_enqueue_style( 'fontawesome' );

wp_register_script( 'fa6pro-js',  get_stylesheet_directory_uri() .'/fonts/js/pro.min.js', true, '' );
wp_enqueue_script( 'fa6pro-js' );

}
add_action( 'wp_enqueue_scripts', 'iconography' );








function enqueue_bootstrap() {

wp_register_style( 'quartz',  get_stylesheet_directory_uri() .'/css/bs/quartz.bootstrap.min.css', false, '' );
wp_enqueue_style( 'quartz' );

wp_register_style( 'bs-ext',  get_stylesheet_directory_uri() .'/css/bs/bs-ext.css', array( 'quartz' ), '' );
wp_enqueue_style( 'bs-ext' );

wp_register_style( 'offcanvas-css',  get_stylesheet_directory_uri() .'/css/bs/offcanvas-navbar.css', array( 'quartz' ), '' );
wp_register_script( 'offcanvas-js',  get_stylesheet_directory_uri() .'/css/bs/offcanvas-navbar.js', true, '' );

wp_register_script( 'bundle-bs',  get_stylesheet_directory_uri() .'/css/bs/bootstrap.bundle.min.js', true, '' );
wp_enqueue_script( 'bundle-bs' );
//wp_register_script( 'modernizr-custom',  get_template_directory_uri() .'/css/bs/modernizr.custom.js', array(), false, true );
wp_register_script( 'popper-bs',  get_stylesheet_directory_uri() .'/css/bs/popper.min.js', true, '' );
// wp_register_script( 'glide-js',  get_stylesheet_directory_uri() .'/glides/glide/glide.min.js', true, '' );	;
wp_register_style( 'glide-core',  get_stylesheet_directory_uri() .'/glides/glide.core.min.css', false, '' );
wp_register_style( 'glide-theme',  get_stylesheet_directory_uri() .'/glides/glide.theme.min.css', false, '' );
wp_register_style( 'cover',  get_stylesheet_directory_uri() .'/css/bs/cover.css', array( 'quartz' ), '' );	
wp_register_style( 'carousel-bs',  get_stylesheet_directory_uri() .'/css/bs/carousel.css', array( 'quartz' ), '' );	
wp_register_script( 'masonry-bs',  get_stylesheet_directory_uri() .'/css/bs/masonry.pkgd.min.js', true, '' );

}
add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap' );



function tattoo_grid() {
wp_register_style( 'tattoo-grid-css',  get_stylesheet_directory_uri() .'/js/tattoo-grid/tattoo-grid.css', array( 'main-css' ), '' );
wp_register_style( 'grid-style',  get_stylesheet_directory_uri() .'/js/tattoo-grid/tattoo-grid-style.css', array( 'main-css' ), '' );
wp_register_script( 'modernizr-custom-tg',  get_template_directory_uri() .'/js/tattoo-grid/modernizr-custom.js', false, '' );
wp_register_script( 'masonry-tg',  get_stylesheet_directory_uri() .'/js/tattoo-grid/masonry.pkgd.min.js', array('modernizr-custom-tg'), '1.0', true);
wp_register_script( 'images-loaded',  get_stylesheet_directory_uri() .'/js/tattoo-grid/imagesloaded.pkgd.min.js',  array('modernizr-custom-tg'), '1.0', true);
wp_register_script( 'classie',  get_stylesheet_directory_uri() .'/js/tattoo-grid/classie.js',  array('modernizr-custom-tg'), '1.0', true);
wp_register_script( 'tattoo-grid-js',  get_stylesheet_directory_uri() .'/js/tattoo-grid/main.js',  array('modernizr-custom-tg'), '1.0', true);


}
add_action( 'wp_enqueue_scripts', 'tattoo_grid' );





function video_player() {
wp_register_style( 'normalize-vp',  get_stylesheet_directory_uri() .'/js/video-player/normalize.css', array( 'main-css' ), '' );
wp_register_style( 'demo-vp',  get_stylesheet_directory_uri() .'/js/video-player/demo.css', array( 'main-css' ), '' );
wp_register_style( 'icons-vp',  get_stylesheet_directory_uri() .'/js/video-player/icons.css', array( 'main-css' ), '' );
wp_register_style( 'style6-vp',  get_stylesheet_directory_uri() .'/js/video-player/style6.css', array( 'main-css' ), '' );

wp_register_script( 'modernizr-custom-vp',  get_template_directory_uri() .'/js/video-player/modernizr.custom.js', false, '' );
wp_register_script( 'border-menu-vp',  get_stylesheet_directory_uri() .'/js/video-player/borderMenu.js', array('modernizr-custom-vp'), '1.0', true);
wp_register_script( 'classie-vp',  get_stylesheet_directory_uri() .'/js/video-player/classie.js',  array('modernizr-custom-vp'), '1.0', true);
wp_register_script( 'video-player-js',  get_stylesheet_directory_uri() .'/js/video-player/vp-script.js',  array('modernizr-custom-vp'), '1.0', true);


}
add_action( 'wp_enqueue_scripts', 'video_player' );







//link sub-pages folder frontend files to the site
function custom_page_template_hierarchy( $templates ) {
$slug = get_queried_object()->post_name;

$templates[] = "sub-pages/page-{$slug}.php";
$templates[] = "page-{$slug}.php";

return $templates;
}
add_filter( 'page_template_hierarchy', 'custom_page_template_hierarchy' );














function home_styles() {
// only enqueue on site's index page
if ( is_front_page() ) {

}
}
add_action( 'wp_enqueue_scripts', 'home_styles' );

function artwork_styles() {
// only enqueue on site's index page
if ( is_page( 'Artwork' ) ) {

wp_enqueue_style( 'tattoo-grid-css' );
wp_enqueue_style( 'grid-style' );
wp_enqueue_script( 'modernizr-custom-tg' );
wp_enqueue_script( 'masonry-tg' );
wp_enqueue_script( 'images-loaded' );
wp_enqueue_script( 'classie' );
wp_enqueue_script( 'tattoo-grid-js' );
}
}
add_action( 'wp_enqueue_scripts', 'artwork_styles' );

function videos_styles() {
// only enqueue on site's index page
if ( is_page( 'Videos' ) ) {
wp_enqueue_style( 'style6-vp' );
wp_enqueue_script( 'video-player-js' );
}
}
add_action( 'wp_enqueue_scripts', 'videos_styles' );




function merch_styles() {
// only enqueue on site's index page
if ( is_page( 'Merch' ) ) {

wp_enqueue_style( 'carousel-bs' );
// wp_enqueue_script( 'glide-js' );
wp_enqueue_style( 'glide-core' );
wp_enqueue_style( 'glide-theme' );
}
}

add_action( 'wp_enqueue_scripts', 'merch_styles' );


function product_styles() {
// only enqueue on site's index page
if ( is_product() ) {


// wp_enqueue_script( 'glide-js' );
wp_enqueue_style( 'glide-core' );
wp_enqueue_style( 'glide-theme' );
}
}

add_action( 'wp_enqueue_scripts', 'product_styles' );
/*
function appointment_page_styles() {
if ( is_page( 'Appointments' ) ) {

}
}
add_action( 'wp_enqueue_scripts', 'appointment_page_styles' );





function enqueue_account_page_styles() {
if ( is_account_page() ) {

}
}
add_action( 'wp_enqueue_scripts', 'enqueue_account_page_styles' );

*/



function enqueue_fdb() {
wp_register_style( 'fdb', get_stylesheet_directory_uri() .'/css/fdb/froala_blocks.min.css', array('bs-css') );
wp_enqueue_style( 'fdb' );


}
add_action( 'wp_enqueue_scripts', 'enqueue_fdb' );




// function enqueue_960_gs() {
// wp_register_script( '960-js', get_stylesheet_directory_uri() .'/css/960/960.js', false, '' );
// wp_enqueue_script( '960-js' );
// 
// wp_register_style( '960-css', get_stylesheet_directory_uri() .'/css/960/960.css', false, '' );
// wp_enqueue_style( '960-css' );
// 
// 
// }
// add_action( 'wp_enqueue_scripts', 'enqueue_960_gs' );









function site_menus() {

wp_register_style( 'main-menu',  get_stylesheet_directory_uri() .'/menu.css', false, '' );
wp_enqueue_style( 'main-menu' );

wp_register_script( 'menu-js',  get_stylesheet_directory_uri() .'/menu.js', true, '' );
wp_enqueue_script( 'menu-js' );


}
add_action( 'wp_enqueue_scripts', 'site_menus' );









function mytheme_add_woocommerce_support() {
add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


// Require the Likes/Dislikes related functions
require_once get_template_directory() . '/mothership-likes-dislikes-functions.php';








add_action( 'init', 'remove_woocommerce_breadcrumbs' );
function remove_woocommerce_breadcrumbs() {
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}




remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'custom_product_description', 20 );

function custom_product_description() {
global $product;
echo '<p class="single-summary">' . apply_filters( 'woocommerce_product_description', $product->get_description() ) . '</p>';
}

add_filter( 'woocommerce_short_description', '__return_false' );



add_filter( 'woocommerce_product_tabs', 'remove_product_tabs', 98 );
function remove_product_tabs( $tabs ) {
unset( $tabs['description'] );
unset( $tabs['additional_information'] );
unset( $tabs['reviews'] );
return $tabs;
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );







function remove_error_404_class( $classes ) {
if ( is_404() ) {
$classes = array_diff( $classes, array( 'error404' ) );
}
return $classes;
}
add_filter( 'body_class', 'remove_error_404_class', 20 );



// add tag support to pages
function tags_support_all() {
register_taxonomy_for_object_type('post_tag', 'page');
}

// ensure all tags are included in queries
function tags_support_query($wp_query) {
if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');



add_filter( 'get_template_part_preloader/preloader', 'my_custom_template_part_preloader' );

function my_custom_template_part_preloader( $file ) {
$file = 'preloader/preloader.php';
return $file;
}

/*
require_once get_template_directory() .'/brand-posts.php';

require_once get_template_directory() .'/background-posts.php';


require_once get_template_directory() .'/cart-counter.php';

require_once get_template_directory() .'/widgets.php';

*/


//Create individual attribute pages for colors and sizes

function product_attributes_rewrite_rules() {
// Colors
$colors = array( 'pink', 'red', 'orange', 'yellow', 'green', 'blue', 'purple', 'black', 'gray', 'white', 'beige', 'brown', 'gold', 'silver', 'pattern' );

foreach ( $colors as $color ) {
add_rewrite_rule( "^color/{$color}/?$", 'index.php?product_attribute=' . urlencode( $color ), 'top' );
}

// Sizes
$sizes = array( 'xsmall', 'small', 'medium', 'large', 'xlarge', 'xxlarge' );

foreach ( $sizes as $size ) {
add_rewrite_rule( "^size/{$size}/?$", 'index.php?product_size=' . urlencode( $size ), 'top' );
}
}
add_action( 'init', 'product_attributes_rewrite_rules' );

function product_attributes_query_vars( $vars ) {
$vars[] = 'product_attribute';
$vars[] = 'product_size';
return $vars;
}
add_filter( 'query_vars', 'product_attributes_query_vars' );

function product_attributes_template( $template ) {
global $wp_query;

if ( $wp_query->get( 'product_attribute' ) ) {
$template = locate_template( array( 'page.php', 'page-' . $wp_query->get( 'product_attribute' ) . '.php', 'index.php' ) );
}

if ( $wp_query->get( 'product_size' ) ) {
$template = locate_template( array( 'page.php', 'page-' . $wp_query->get( 'product_size' ) . '.php', 'index.php' ) );
}

return $template;
}
add_filter( 'template_include', 'product_attributes_template' );








//*** CREATES PAGINATION FOR SUBCATEGORY PAGES ***/
function subcategory_pagination_pre_get_posts($query) {
if (!is_admin() && $query->is_main_query() && $query->is_tax('product_cat')) {
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$term_id = get_queried_object_id();

$query->set('post_type', 'product');
$query->set('posts_per_page', 12);
$query->set('paged', $paged);
$query->set('tax_query', array(
array(
'taxonomy' => 'product_cat',
'field' => 'term_id',
'terms' => $term_id
)
));
}
}
add_action('pre_get_posts', 'subcategory_pagination_pre_get_posts');





















// Register Custom Post Type
function artwork_post_type() {

$labels = array(
'name'                  => _x( 'Artwork', 'Post Type General Name', 'text_domain' ),
'singular_name'         => _x( 'Artwork', 'Post Type Singular Name', 'text_domain' ),
'menu_name'             => __( 'Artwork', 'text_domain' ),
'name_admin_bar'        => __( 'Artwork', 'text_domain' ),
'archives'              => __( 'Artwork Archives', 'text_domain' ),
'attributes'            => __( 'Artwork Attributes', 'text_domain' ),
'parent_item_colon'     => __( 'Parent Artwork', 'text_domain' ),
'all_items'             => __( 'All Artwork', 'text_domain' ),
'add_new_item'          => __( 'Add New Artwork', 'text_domain' ),
'add_new'               => __( 'Add Artwork', 'text_domain' ),
'new_item'              => __( 'New Artwork', 'text_domain' ),
'edit_item'             => __( 'Edit Artwork', 'text_domain' ),
'update_item'           => __( 'Update Artwork', 'text_domain' ),
'view_item'             => __( 'View Artwork', 'text_domain' ),
'view_items'            => __( 'View Artwork', 'text_domain' ),
'search_items'          => __( 'Search Artwork', 'text_domain' ),
'not_found'             => __( 'Not found', 'text_domain' ),
'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
'featured_image'        => __( 'Featured Artwork', 'text_domain' ),
'set_featured_image'    => __( 'Set featured Artwork', 'text_domain' ),
'remove_featured_image' => __( 'Remove featured Artwork', 'text_domain' ),
'use_featured_image'    => __( 'Use as featured Artwork', 'text_domain' ),
'insert_into_item'      => __( 'Insert into Artwork', 'text_domain' ),
'uploaded_to_this_item' => __( 'Uploaded to this Artwork', 'text_domain' ),
'items_list'            => __( 'Artwork list', 'text_domain' ),
'items_list_navigation' => __( 'Artwork list navigation', 'text_domain' ),
'filter_items_list'     => __( 'Filter Artwork list', 'text_domain' ),
);
$args = array(
'label'                 => __( 'Artwork', 'text_domain' ),
'description'           => __( 'All Artwork, some with timelapse videos', 'text_domain' ),
'labels'                => $labels,
'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'page-attributes' ),
'taxonomies'            => array( 'category', 'post_tag' ),
'hierarchical'          => true,
'public'                => true,
'show_ui'               => true,
'show_in_menu'          => true,
'menu_position'         => 5,
'menu_icon'             => 'dashicons-admin-appearance',
'show_in_admin_bar'     => true,
'show_in_nav_menus'     => true,
'can_export'            => true,
'has_archive'           => true,
'exclude_from_search'   => false,
'publicly_queryable'    => true,
'capability_type'       => 'page',
);
register_post_type( 'artwork', $args );

}
add_action( 'init', 'artwork_post_type', 0 );
















// Register Custom Post Type
function video_post_type() {

$labels = array(
'name'                  => _x( 'Videos', 'Post Type General Name', 'text_domain' ),
'singular_name'         => _x( 'Video', 'Post Type Singular Name', 'text_domain' ),
'menu_name'             => __( 'Videos', 'text_domain' ),
'name_admin_bar'        => __( 'Videos', 'text_domain' ),
'archives'              => __( 'Video Archives', 'text_domain' ),
'attributes'            => __( 'Video Attributes', 'text_domain' ),
'parent_item_colon'     => __( 'Parent Video', 'text_domain' ),
'all_items'             => __( 'All Videos', 'text_domain' ),
'add_new_item'          => __( 'Add New Videos', 'text_domain' ),
'add_new'               => __( 'Add Video', 'text_domain' ),
'new_item'              => __( 'New Video', 'text_domain' ),
'edit_item'             => __( 'Edit Video', 'text_domain' ),
'update_item'           => __( 'Update Video', 'text_domain' ),
'view_item'             => __( 'View Video', 'text_domain' ),
'view_items'            => __( 'View Videos', 'text_domain' ),
'search_items'          => __( 'Search Videos', 'text_domain' ),
'not_found'             => __( 'Not found', 'text_domain' ),
'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
'featured_image'        => __( 'Featured Video', 'text_domain' ),
'set_featured_image'    => __( 'Set featured Video', 'text_domain' ),
'remove_featured_image' => __( 'Remove featured Video', 'text_domain' ),
'use_featured_image'    => __( 'Use as featured Video', 'text_domain' ),
'insert_into_item'      => __( 'Insert into Video', 'text_domain' ),
'uploaded_to_this_item' => __( 'Uploaded to this Video', 'text_domain' ),
'items_list'            => __( 'Videos list', 'text_domain' ),
'items_list_navigation' => __( 'Videos list navigation', 'text_domain' ),
'filter_items_list'     => __( 'Filter Videos list', 'text_domain' ),
);
$args = array(
'label'                 => __( 'Video', 'text_domain' ),
'description'           => __( 'All Videos and live video', 'text_domain' ),
'labels'                => $labels,
'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'page-attributes' ),
'taxonomies'            => array( 'category', 'post_tag' ),
'hierarchical'          => true,
'public'                => true,
'show_ui'               => true,
'show_in_menu'          => true,
'menu_position'         => 5,
'menu_icon'             => 'dashicons-editor-video',
'show_in_admin_bar'     => true,
'show_in_nav_menus'     => true,
'can_export'            => true,
'has_archive'           => true,
'exclude_from_search'   => false,
'publicly_queryable'    => true,
'capability_type'       => 'page',
);
register_post_type( 'video', $args );

}
add_action( 'init', 'video_post_type', 0 );

add_filter( 'wp_logout_url', 'my_logout_redirect' );
function my_logout_redirect( $logout_url ) {
return $logout_url . '&amp;_wpnonce=' . wp_create_nonce( 'log-out' );
}


