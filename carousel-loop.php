
	   
		  
<?php
$args = array(
    'post_type' => 'background',
		  'orderby' => 'title', // Order by post title
    'order' => 'DESC', // Order in ascending order
    'posts_per_page' => 1 // Retrieve only one post
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        $background_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); // Retrieve the full image URL
        ?>
		
		<div class="carousel-item active">
        <div class="background-image" style="background-image: url('<?php echo esc_url( $background_image_url ); ?>');">
            <!-- Optional content that will be displayed on top of the background image -->
        </div>
		   <div class="container">
          <div class="carousel-caption">
            <h1>Example headline.</h1>
            <p>Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
        </div>
	</div>
	
        <?php
    }
    wp_reset_postdata();
}
?>
		  
		  
		  


<?php
$args = array(
    'post_type' => 'background',
	'offset' => 1,
		  'orderby' => 'title', // Order by post title
    'order' => 'DESC', // Order in ascending order
    'posts_per_page' => 2 // Retrieve only one post
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        $background_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); // Retrieve the full image URL
        ?>
		
		<div class="carousel-item">
        <div class="background-image" style="background-image: url('<?php echo esc_url( $background_image_url ); ?>');">
            <!-- Optional content that will be displayed on top of the background image -->
        </div>
		   <div class="container">
          <div class="carousel-caption">
            <h1>Example headline.</h1>
            <p>Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
        </div>
	</div>
	
        <?php
    }
    wp_reset_postdata();
}
?>

