<?php
// Seperate Site Aspects into Modules
  //require_once get_template_directory() . '/inc/custom-functions.php';

  function like_dislike_scripts() {
    // Register the JavaScript file
    wp_register_script('mothership-like-dislike', get_template_directory_uri() . '/mothership-like-dislike.js', array('jquery'), '1.0', true);

    // Create and enqueue a nonce for the AJAX calls
    $nonce = wp_create_nonce('mothership_like_dislike');
    wp_localize_script('mothership-like-dislike', 'mothership_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => $nonce,
    ));

    // Enqueue the JavaScript file
    wp_enqueue_script('mothership-like-dislike');
}

add_action('wp_enqueue_scripts', 'like_dislike_scripts');

/* Start Project */
// The rest of your functions.php code should remain unchanged.


// 1a Register custom post meta for like and dislike counts
function mothership_register_post_meta($post_types) {
    foreach ($post_types as $post_type) {
        register_post_meta($post_type, '_mothership_like_count', array(
            'type' => 'integer',
            'single' => true,
            'default' => 0,
            'show_in_rest' => true,
        ));
        register_post_meta($post_type, '_mothership_dislike_count', array(
            'type' => 'integer',
            'single' => true,
            'default' => 0,
            'show_in_rest' => true,
        ));
    }
}

function mothership_init_post_meta() {
    $post_types = array('post', 'product'); // Add any post types you want here
    mothership_register_post_meta($post_types);
}
add_action('init', 'mothership_init_post_meta');

// 1b AJAX handlers for updating like and dislike counts
function mothership_update_like_count() {
  // Check for nonce and authentication
  check_ajax_referer('mothership_like_dislike', 'security');

  // Get the post ID and current like count
  $post_id = intval($_POST['post_id']);
  $current_like_count = get_post_meta($post_id, '_mothership_like_count', true);

  // Increment the like count and update the post meta
  update_post_meta($post_id, '_mothership_like_count', $current_like_count + 1);

  // Return the updated like count
  wp_send_json_success(array('like_count' => $current_like_count + 1));
}

add_action('wp_ajax_mothership_update_like_count', 'mothership_update_like_count');

function mothership_update_dislike_count() {
  // Check for nonce and authentication
  check_ajax_referer('mothership_like_dislike', 'security');

  // Get the post ID and current dislike count
  $post_id = intval($_POST['post_id']);
  $current_dislike_count = get_post_meta($post_id, '_mothership_dislike_count', true);

  // Increment the dislike count and update the post meta
  update_post_meta($post_id, '_mothership_dislike_count', $current_dislike_count + 1);

  // Return the updated dislike count
  wp_send_json_success(array('dislike_count' => $current_dislike_count + 1));
}

add_action('wp_ajax_mothership_update_dislike_count', 'mothership_update_dislike_count');












// BACKEND

// Create the admin menu item
function mothership_likes_dislikes_admin_menu() {
  add_menu_page(
      'Likes/Dislikes',
      'Likes/Dislikes',
      'manage_options',
      'mothership-likes-dislikes',
      'mothership_likes_dislikes_page_html',
      'dashicons-thumbs-up',
      20
  );
}

add_action('admin_menu', 'mothership_likes_dislikes_admin_menu');



// Display the admin page content
function mothership_likes_dislikes_page_html() {
  global $wpdb;
  
  // Check user capabilities
  if (!current_user_can('manage_options')) {
      return;
  }
  
  // Fetch posts with their like and dislike counts
  $query = "
      SELECT
          p.ID,
          p.post_title,
          COALESCE(pm_likes.meta_value, 0) AS like_count,
          COALESCE(pm_dislikes.meta_value, 0) AS dislike_count
      FROM
          {$wpdb->prefix}posts p
      LEFT JOIN
          {$wpdb->prefix}postmeta pm_likes ON p.ID = pm_likes.post_id AND pm_likes.meta_key = '_mothership_like_count'
      LEFT JOIN
          {$wpdb->prefix}postmeta pm_dislikes ON p.ID = pm_dislikes.post_id AND pm_dislikes.meta_key = '_mothership_dislike_count'
      WHERE
          p.post_type = 'post' AND p.post_status = 'publish'
      ORDER BY
          like_count DESC, p.post_title ASC;
  ";
  $posts = $wpdb->get_results($query);
  
  ?>
  <div class="wrap">
      <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
      <table class="wp-list-table widefat fixed striped">
          <thead>
              <tr>
                  <th>Post Title</th>
                  <th>Likes</th>
                  <th>Dislikes</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($posts as $post) : ?>
                  <tr>
                      <td><?php echo esc_html($post->post_title); ?></td>
                      <td><?php echo esc_html($post->like_count); ?></td>
                      <td><?php echo esc_html($post->dislike_count); ?></td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
  </div>
 
 
    <form method="post">
        <?php wp_nonce_field('mothership_reset_likes_dislikes', 'mothership_reset_likes_dislikes_nonce'); ?>
        <input type="submit" name="mothership_reset_likes_dislikes" class="button button-primary" value="Reset Likes and Dislikes">
    </form>
    <?php
}



function mothership_register_product_likes_dislikes_page() {
    add_submenu_page(
        'mothership-likes-dislikes', // Parent slug is now the existing "Likes/Dislikes" menu page slug
        'Product Likes/Dislikes',
        'Product Likes/Dislikes',
        'manage_options',
        'mothership-product-likes-dislikes',
        'mothership_render_product_likes_dislikes_page'
    );
}
add_action('admin_menu', 'mothership_register_product_likes_dislikes_page');


function mothership_render_product_likes_dislikes_page() {
    // Check user permissions
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    // Query products with likes and dislikes metadata
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'orderby'        => 'meta_value_num',
        'meta_key'       => '_mothership_like_count',
        'order'          => 'DESC',
    );

    $products_query = new WP_Query($args);

    echo '<div class="wrap">';
    echo '<h1 class="wp-heading-inline">Product Likes/Dislikes</h1>';

    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Product</th>';
    echo '<th scope="col">Likes</th>';
    echo '<th scope="col">Dislikes</th>';
    echo '</tr>';
    echo '</thead>';

    echo '<tbody>';

    if ($products_query->have_posts()) {
        while ($products_query->have_posts()) {
            $products_query->the_post();
            $post_id = get_the_ID();
            $likes = get_post_meta($post_id, '_mothership_like_count', true);
            $dislikes = get_post_meta($post_id, '_mothership_dislike_count', true);

            echo '<tr>';
            echo '<td><a href="' . get_edit_post_link($post_id) . '">' . get_the_title() . '</a></td>';
            echo '<td>' . $likes . '</td>';
            echo '<td>' . $dislikes . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="3">No products found.</td></tr>';
    }

    echo '</tbody>';
    echo '</table>';

    // Add the reset button form here
    echo '<form method="post" action="">';
    wp_nonce_field('mothership_reset_product_likes_dislikes', 'mothership_reset_product_likes_dislikes_nonce');
    echo '<input type="submit" name="mothership_reset_product_likes_dislikes" value="Reset All Product Likes/Dislikes" class="button">';
    echo '</form>';

    echo '</div>';

    wp_reset_postdata();
}



function mothership_add_like_dislike_to_products() {
    global $product;

    // Get the post ID and nonce
    $post_id = $product->get_id();
    $nonce = wp_create_nonce('mothership_like_dislike');

    // Output the like/dislike buttons
    ?>
    <div class="woo-like-dislike-btn row position-relative">
        <div class="col-auto">
            <button class="btn btn-danger like-btn" data-post-id="<?php echo $post_id; ?>" data-nonce="<?php echo $nonce; ?>">
                <i class="fas fa-heart"></i> <span class="like-count"><?php echo get_post_meta($post_id, '_mothership_like_count', true); ?></span>
            </button>
        </div>
        <div class="col-auto">
            <button class="btn btn-dark dislike-btn" data-post-id="<?php echo $post_id; ?>" data-nonce="<?php echo $nonce; ?>">
              <i class="fas fa-heart-crack"></i> <span class="dislike-count"><?php echo get_post_meta($post_id, '_mothership_dislike_count', true); ?></span>
            </button>
        </div>
    </div>
    <?php
}
add_action('woocommerce_single_product_summary', 'mothership_add_like_dislike_to_products', 31);


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );

function display_product_content() {
    global $product;
    echo apply_filters( 'the_content', $product->get_post_data()->post_excerpt );
}
add_action( 'woocommerce_single_product_summary', 'display_product_content', 25 );

















function register_like_dislike_shortcode() {
    cs_shortcode_map( array(
        'shortcode_tag'   => 'like_dislike',
        'atts'            => array(),
        'html'            => 'like_dislike_shortcode_callback'
    ) );
}
add_action( 'cs_init', 'register_like_dislike_shortcode' );

function like_dislike_shortcode_callback() {
    global $post;
    $product_id = $post->ID;

    // Get the current like and dislike counts for the product
    $like_count = get_post_meta( $product_id, '_like_count', true );
    $dislike_count = get_post_meta( $product_id, '_dislike_count', true );

    // Define the HTML for the like and dislike buttons using FontAwesome icons
    $like_button = '<a href="#" class="like-button" data-product-id="' . $product_id . '"><i class="fa fa-heart"></i></a>';
    $dislike_button = '<a href="#" class="dislike-button" data-product-id="' . $product_id . '"><i class="fa heartbreak"></i></a>';

    // Display the like and dislike buttons
    return $like_button . ' ' . $like_count . ' Likes / ' . $dislike_button . ' ' . $dislike_count . ' Dislikes';
}



function mothership_add_like_dislike_to_shop_page() {
    global $product;

    // Get the post ID and nonce
    $post_id = $product->get_id();
    $nonce = wp_create_nonce('mothership_like_dislike');

    // Output the like/dislike buttons
    ?>
  <div class="row">
        <div class="col-auto">
            <button class="btn btn-danger like-btn" data-post-id="<?php echo $post_id; ?>" data-nonce="<?php echo $nonce; ?>">
                <i class="fas fa-heart"></i> <span class="like-count"><?php echo get_post_meta($post_id, '_mothership_like_count', true); ?></span>
            </button>
        </div>
        <div class="col-auto">
            <button class="btn btn-dark dislike-btn" data-post-id="<?php echo $post_id; ?>" data-nonce="<?php echo $nonce; ?>">
              <i class="fas fa-heart-crack"></i> <span class="dislike-count"><?php echo get_post_meta($post_id, '_mothership_dislike_count', true); ?></span>
            </button>
        </div>
    </div>
    <?php
}
add_action('woocommerce_after_shop_loop_item', 'mothership_add_like_dislike_to_shop_page', 15);







function mothership_add_like_dislike_to_taxonomy_page() {
    $cat_id = get_queried_object_id();
    $nonce = wp_create_nonce('mothership_like_dislike');

    // Output the like/dislike buttons
    ?>
  <div class="row">
        <div class="col-auto">
            <button class="btn btn-danger like-btn" data-cat-id="<?php echo $cat_id; ?>" data-nonce="<?php echo $nonce; ?>">
                <i class="fas fa-heart"></i> <span class="like-count"><?php echo get_term_meta($cat_id, '_mothership_like_count', true); ?></span>
            </button>
        </div>
        <div class="col-auto">
            <button class="btn btn-dark dislike-btn" data-cat-id="<?php echo $cat_id; ?>" data-nonce="<?php echo $nonce; ?>">
              <i class="fas fa-heart-crack"></i> <span class="dislike-count"><?php echo get_term_meta($cat_id, '_mothership_dislike_count', true); ?></span>
            </button>
        </div>
    </div>
    <?php
}
add_action('woocommerce_after_subcategory', 'mothership_add_like_dislike_to_taxonomy_page', 15);














function mothership_like_dislike_shortcode($atts) {
    global $post;

    // Get the post ID and nonce
    $post_id = $post->ID;
    $nonce = wp_create_nonce('mothership_like_dislike');

    // Output the like/dislike buttons
    ob_start();
    ?>
   <div class="row">
        <div class="col-auto">
            <button class="btn btn-danger like-btn" data-post-id="<?php echo $post_id; ?>" data-nonce="<?php echo $nonce; ?>">
                <i class="fas fa-heart"></i> <span class="like-count"><?php echo get_post_meta($post_id, '_mothership_like_count', true); ?></span>
            </button>
        </div>
        <div class="col-auto">
            <button class="btn btn-dark dislike-btn" data-post-id="<?php echo $post_id; ?>" data-nonce="<?php echo $nonce; ?>">
              <i class="fas fa-heart-crack"></i> <span class="dislike-count"><?php echo get_post_meta($post_id, '_mothership_dislike_count', true); ?></span>
            </button>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('mothership_like_dislike', 'mothership_like_dislike_shortcode');





// $args = array(
//     'post_type' => 'post',
//     'posts_per_page' => 10,
// );

// $query = new WP_Query($args);

// if ($query->have_posts()) {
//     while ($query->have_posts()) {
//         $query->the_post();
//         echo '<h2>' . get_the_title() . '</h2>';
//         // echo do_shortcode('[mothership_like_dislike]');
//     }
// }

// wp_reset_postdata();








function mothership_reset_likes_dislikes() {
    if (isset($_POST['mothership_reset_likes_dislikes'])) {
        // Check for nonce and user capability
        if (!wp_verify_nonce($_POST['mothership_reset_likes_dislikes_nonce'], 'mothership_reset_likes_dislikes') || !current_user_can('manage_options')) {
            wp_die('Sorry, you are not allowed to access this page.');
        }

        // Get all posts
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();

                // Reset likes and dislikes to 0
                update_post_meta($post_id, '_mothership_like_count', 0);
                update_post_meta($post_id, '_mothership_dislike_count', 0);
            }
        }
        wp_reset_postdata();

        // Add an admin notice to inform the user of the successful reset
        add_action('admin_notices', 'mothership_reset_likes_dislikes_notice');

        // Redirect to the same page without the $_POST variable
        wp_safe_redirect(remove_query_arg(array('_wpnonce', '_wp_http_referer'), wp_get_referer()));
        exit;
    }
}
add_action('admin_init', 'mothership_reset_likes_dislikes');




function mothership_reset_product_likes_dislikes() {
    if (isset($_POST['mothership_reset_product_likes_dislikes']) && check_admin_referer('mothership_reset_product_likes_dislikes', 'mothership_reset_product_likes_dislikes_nonce')) {
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'fields' => 'ids',
        );

        $products_query = new WP_Query($args);

        if ($products_query->have_posts()) {
            foreach ($products_query->posts as $post_id) {
                update_post_meta($post_id, '_mothership_like_count', 0);
                update_post_meta($post_id, '_mothership_dislike_count', 0);
            }
        }
        wp_reset_postdata();

        // Redirect to the same admin page after resetting
        wp_redirect(add_query_arg(array('page' => 'mothership-product-likes-dislikes'), admin_url('admin.php')));
        exit;
    }
}
add_action('admin_init', 'mothership_reset_product_likes_dislikes');







// //use in post loop:

// $args = array(
//     'post_type' => 'post',
//     'posts_per_page' => -1,
//     'meta_key' => '_mothership_like_count',
//     'orderby' => 'meta_value_num',
//     'order' => 'DESC',
// );

// $query = new WP_Query($args);

// if ($query->have_posts()) {
//     while ($query->have_posts()) {
//         $query->the_post();

//         echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
//         echo '<p>' . get_the_excerpt() . '</p>';
//         echo '<p>Likes: ' . get_post_meta(get_the_ID(), '_mothership_like_count', true) . '</p>';
//     }
// } else {
//     echo '<p>No posts found.</p>';
// }

// wp_reset_postdata();

