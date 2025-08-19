
<div class="glide productsi my-5">
  <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">
		
		
<?php

$args = array(
    'post_type' => 'product',
    'posts_per_page' => 6,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => 'headwear'
        )
    )
);

$loop = new WP_Query( $args );

if ( $loop->have_posts() ) :
    while ( $loop->have_posts() ) : $loop->the_post();
		?>
		        <li class="glide__slide slide"><img style="height:300px;"  src="<?php the_post_thumbnail_url(); ?>" class="img-fluid d-block mx-auto">
					<br><h3 class="text-center"><?php the_title(); ?></span></h3>
				
		<?php endwhile;
endif;
wp_reset_postdata();
?>

		
    </ul>
  </div>

  <div class="glide__arrows" data-glide-el="controls">
    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
  </div>

  </div>