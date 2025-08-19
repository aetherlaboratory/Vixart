
<?php


// Define the ajax_cart_counter action
add_action( 'wp_ajax_ajax_cart_counter', 'ajax_cart_counter_callback' );
add_action( 'wp_ajax_nopriv_ajax_cart_counter', 'ajax_cart_counter_callback' );

// Enqueue the cart-counter.js script and localize it
wp_enqueue_script( 'cart-count', get_stylesheet_directory_uri() . '/js/cart-counter.js', array( 'jquery' ), '1.0', true );
wp_localize_script( 'cart-count', 'cartCount', array(
    'ajax_url' => admin_url( 'admin-ajax.php?action=ajax_cart_counter' ),
) );

// Callback function for ajax_cart_counter
function ajax_cart_counter_callback() {
    $count = WC()->cart->get_cart_contents_count();
    echo $count;
    die();
}


//The code that defines the ajax_cart_counter action should be defined before it is called in the cart-counter.js file.




function cart_count() {
	 
wp_enqueue_script( 'cart-count', get_stylesheet_directory_uri() . '/js/cart-counter.js', array( 'jquery' ), '1.0', true );
wp_localize_script( 'cart-count', 'cartCount', array(
    'ajax_url' => admin_url( 'admin-ajax.php?action=ajax_cart_counter' ),
) );


 
   
  }
  add_action( 'wp_enqueue_scripts', 'cart_count' );



  



add_filter( 'woocommerce_add_to_cart_fragments', 'bd_vintage_wc', 10, 1 );

function bd_vintage_wc( $fragments ) {
    
    $fragments['div.cart-counter'] = '<div class="cart-counter tint-glass col-auto gold badge">' . WC()->cart->get_cart_contents_count() . '</div>';
    
    return $fragments;
    
}
?>
