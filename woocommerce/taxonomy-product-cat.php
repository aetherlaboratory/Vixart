<?php
/**
 * The template for displaying subcategory product archives, including the main shop page which is a post type archive.
 */

get_header(); ?>

<!-- Your code goes here -->






	<?php 
if ( is_product_category() ) {
$term = get_queried_object();
$term_id = $term->term_id;
  if ( $term->parent == 0 ) {
    





	if ( is_product_category() ) {
		$term = get_queried_object();
		if ( $term->parent ) {
		  get_template_part( 'subcatergory-product' );
		  exit();
		}
	  }
	  ?>
	  
	  <!-- Rest of the archive-product.php file code goes here -->
	  
	  
		  <?php
	  // Get current parent category
	  $current_cat = get_queried_object();
	  
	  // Get subcategories
	  $subcategories = get_categories(array(
		  'taxonomy' => 'product_cat',
			  'posts_per_page' => 3,
		  'child_of' => $current_cat->term_id,
	  ));
	  
	  // Loop through subcategories
	  foreach($subcategories as $subcategory) {
		  // Check if subcategory has posts
		  $args = array(
			  'post_type' => 'product',
			 'posts_per_page' => 3,
			  'tax_query' => array(
				  array(
					  'taxonomy' => 'product_cat',
					  'field' => 'term_id',
					  'terms' => $subcategory->term_id,
				  ),
			  ),
		  );
		  $query = new WP_Query($args);
	  
		  if($query->have_posts()) {
			  // Display subcategory if it has posts
			  $subcat_name = $subcategory->name;
			  $subcat_link = get_term_link($subcategory->term_id, 'product_cat');
			  ?>
			  <div class="fdb-block <?php echo $i % 2 === 0 ? 'bg-light' : 'bg-dark'; ?>">
				  <h2 class="mb-3"><?php echo $subcat_name; ?></h2><br>
				  <div class="row">
					  <?php while($query->have_posts()) : $query->the_post(); ?>
			  <div class="col-4 <?php //echo $row_classes; ?>">
          <div class="card h-100 rounded-3">
			   <div class="card-body card-image-body">
            <?php the_post_thumbnail( 'medium', array( 'class' => 'card-img-top mx-auto position-relative d-block' ) ); ?>
		</div>
            <div class="card-body rounded-3 <?php echo $i % 2 === 0 ? 'frost-glass' : 'tint-glass'; ?>">
              <h2 class="card-title text-center text-info"><?php the_title(); ?></h2>
			  	<p class="card-text fs-3 wht text-center">
						<?php global $product;

if ( $product->get_price_html() ) {
    echo $product->get_price_html() ;
}
?>
</p>
<hr>
			   <div class="w-100 my-3 py-2 spacer d-block position-relative"></div>
              <p class="card-text"><?php the_excerpt(); ?></p>
			  <hr>
 <div class="row justify-content-center col-auto mx-auto">
		<div class="col-auto">
			<a href="<?php the_permalink();?>" class="btn btn-primary">Read More</a>
		</div>
<div class="col-auto text-center">
	<?php
        add_filter( 'woocommerce_loop_add_to_cart_args', 'custom_add_to_cart_button_class', 10, 2 );
        woocommerce_template_loop_add_to_cart();
        remove_filter( 'woocommerce_loop_add_to_cart_args', 'custom_add_to_cart_button_class', 10 );
		?>
	</div>	</div>

						     <br>
		        <div class="row justify-content-center col-auto mx-auto">
				
            <div class="col-auto">
                <button class="btn btn-danger like-btn" data-post-id="<?php the_ID(); ?>" data-nonce="<?php echo wp_create_nonce('mothership_like_dislike'); ?>">
                     <i class="fas fa-heart"></i> <span class="like-count"><?php echo get_post_meta(get_the_ID(), '_mothership_like_count', true); ?></span>
                </button>
            </div>
            <div class="col-auto">
                <button class="btn btn-dark dislike-btn" data-post-id="<?php the_ID(); ?>" data-nonce="<?php echo wp_create_nonce('mothership_like_dislike'); ?>">
                    <i class="fas fa-heart-crack"></i> <span class="dislike-count"><?php echo get_post_meta(get_the_ID(), '_mothership_dislike_count', true); ?></span>
                </button>
            </div>
        </div>   
	</div>

            </div>
		</div>
					  <?php endwhile; ?>
				  </div>
				  <div class="spacer my-5 py-3 w-100 d-block"></div>
				 	<div class="row">
		<?php
// Get the product categories of the current product in the loop
$product_cats = get_the_terms( $post->ID, 'product_cat' );

// Loop through the categories assigned to the product and find the child category
foreach ( $product_cats as $product_cat ) {
  if ( $product_cat->parent > 0 ) {
    // Get the URL of the current product subcategory
    $subcat_url = get_term_link( $product_cat );
    // Get the name of the current product subcategory
    $subcat_name = $product_cat->name;
    // Exit the loop once a child category is found
    break;
  }
}

// Output the button with the subcategory name and URL
if ( isset( $subcat_url ) && isset( $subcat_name ) ) {
  echo '<a href="' . esc_url( $subcat_url ) . '" class="btn btn-primary border-info position-relative bg-bright col-auto ms-auto me-5 justify-content-end">More ' . esc_html( $subcat_name ) . '</a>';
}
?>

	</div> 
			  </div>
			  <?php
			  
			  wp_reset_postdata();
			  $i++;
			  
			  
				  
		  }
		  
	  }
	  
	  


  } else {
    


	  





 get_template_part( 'subcategory', 'products' );





















  }
}
?>

<?php get_header(); ?>

<!-- Your content goes here -->

<?php get_footer(); ?>


    <?php 
	/*

*/
?>
















    

</div><!-- Collection Wrapper -->



<?php



get_footer();
