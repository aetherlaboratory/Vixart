</div> <!--#Wrapper-->


<footer class="mb-2">
<div class="col-auto mx-auto text-center copyright fs-h1 wht"><span>&copy; 2023 VixArt. All Rights Reserved.</span></div>

</footer>

<?php wp_footer(); ?>
<div class="canvas position-absolute" stye="width:100%; height:100%;"></div>	

<?php
	// You can add or change the conditions here depending on your needs
	if (is_front_page()) {
		// Code for the front page
	} elseif (is_page('all-artwork')) {
		// Code for the woodwork page
	} elseif (is_page('all-videos')) {
		// Code for the sculptures page
?>

<!-- Video Modal -->


  <?php
		  $args = array(
		  'post_type' => 'video', // Assuming 'photos' is your CPT
		  'posts_per_page' => 4,
		  'order' => 'ASC', // Ascending order
		  'orderby' => 'date' // Order by date
		  );
		  
		  $query = new WP_Query($args);?>
   <?php if ($query->have_posts()) : ?>
   <?php $counter = 0; // Initialize the counter ?>
   <?php while ($query->have_posts()) : $query->the_post(); ?>
   <?php $counter++; // Increment the counter ?>


<div class="modal fade" id="videoModal<?php echo $counter; ?>" tabindex="-1" aria-labelledby="videoModal<?php echo $counter; ?>Label" aria-hidden="true">
  	<button type="button" class="apex btn-close position-absolute top-0 end-0 me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"></button>	

<div class="modal-dialog modal-fullscreen">

		<div class="modal-header py-1">
		  <h5 class="modal-title" id="videoModal<?php echo $counter; ?>Label"><?php the_title(); ?></h5>	
		  
		</div>	
	<div class="modal-content">
	  <div class="modal-body">
		<video controls autoplay muted width="100%">
		  <source src="<?php $meta_data = get_post_meta( get_the_ID(), '_custom_post_options', true ); echo $meta_data['video_url'];?>">" type="video/mp4">
		  Your browser does not support the video tag.
		</video>
	  </div>
</div>
  </div>
</div>

	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
<?php else : ?>
<?php endif; ?>





<?php
	} elseif (is_page('merch')) {
		// Code for the collection page
	
?>
<script src="<?php bloginfo('template_url'); ?>/glides/glide.min.js"></script>

<script>
 var glide = new Glide('.glide', {
  type: 'carousel',
  perView: 4,
  focusAt: 'center',
  breakpoints: {
	800: {
	  perView: 2
	},
	480: {
	  perView: 1
	}
  }
})

glide.mount()
</script>




<?php
} elseif (is_product()) {
		// Code for the collection page
	
?>
<script src="<?php bloginfo('template_url'); ?>/glides/glide.min.js"></script>

<script>
 var glide = new Glide('.glide', {
  type: 'carousel',
  perView: 4,
  focusAt: 'center',
  breakpoints: {
	800: {
	  perView: 2
	},
	480: {
	  perView: 1
	}
  }
})

glide.mount()
</script>
<?php
} else {
	// Code for all other pages
}
?>

</body>

</html>
