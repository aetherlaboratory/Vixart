
<div class="glide products my-5">
<div class="glide__track" data-glide-el="track">
<ul class="glide__slides">
<?php
$args = array(
'post_type' => 'product', // Assuming 'photos' is your CPT
'posts_per_page' => 10,
'order' => 'ASC', // Ascending order
'orderby' => 'date' // Order by date
);

$query = new WP_Query($args);?>
<?php if ($query->have_posts()) : $count = 0; ?>
<?php while ($query->have_posts()) : $query->the_post(); $count++; ?>
<li class="glide__slide slide"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full');?>" class="img-fluid"></li>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
</ul>
</div>

<div class="glide__arrows" data-glide-el="controls">
<button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
<button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
</div>

</div>