
<?php get_header();?>
<?php get_template_part( 'preloader/preloader' );?>
<?php
$index_cover = get_cs_option('index_cover');
$index_nl_bg = get_cs_option('index_nl_bg');
$cover_title = get_cs_option('cover_title');
$cover_excerpt = get_cs_option('cover_excerpt');
?> 
<div class="px-4 py-5 text-center border-bottom text-dark" style="background-image: url('<?php echo esc_url($index_cover); ?>'); background-size:cover;">
<h1 class="display-4 fw-bold"><?php echo esc_html($cover_title); ?></h1>
<div class="col-lg-6 mx-auto">
<p class="lead mb-4"><?php echo esc_html($cover_excerpt); ?></p>
<div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
<a href="<?php echo the_permalink();?>" class="btn btn-primary btn-lg px-4 me-sm-3">View Art</a>
<a href="/commissions" class="btn btn-outline-danger btn-lg px-4">Request Art</a>

</div>
</div>
<div class="overflow-hidden" style="max-height: 30vh;">

</div>
</div>
<div class="b-example-divider"></div>
<div class="row align-items-md-stretch mt-3">
<div class="col-md-6">

<?php
$args = array(
'post_type' => 'artwork', // Assuming 'photos' is your CPT
'posts_per_page' => 1,
'order' => 'ASC', // Ascending order
'orderby' => 'date' // Order by date
);

$query = new WP_Query($args);?>
<?php if ($query->have_posts()) : $count = 0; ?>
<?php while ($query->have_posts()) : $query->the_post(); $count++; ?>



<div class="h-100 p-5 text-white rounded-3" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full');?>);'); background-size:cover; background-position: center;">
<h2><?php the_title();?></h2>
<p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
<button class="btn btn-outline-light" type="button">See More</button>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<div class="col-md-6">

<?php
$args = array(
'post_type' => 'artwork', // Assuming 'photos' is your CPT
'posts_per_page' => 1,
'offset' => 1,
'order' => 'ASC', // Ascending order
'orderby' => 'date' // Order by date
);

$query = new WP_Query($args);?>
<?php if ($query->have_posts()) : $count = 0; ?>
<?php while ($query->have_posts()) : $query->the_post(); $count++; ?>
<div class="h-100 p-5 rounded-3"  style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full');?>);'); background-size:cover;background-position: center;">
<h2><?php the_title();?></h2>
<p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
<button class="btn btn-outline-secondary" type="button">See More</button>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>


</div>
</div>
</div>


<section class="fdb-block py-3 mt-3" style="background-image: url('<?php echo esc_url($index_nl_bg); ?>'); background-size:cover;">
<div class="container">
<div class="row justify-content-center">
<div class="col-12  col-md-10 col-lg-8 col-xl-6 text-center">
<i class="fa-solid fs-1 fa-envelope mb-2 border p-2 rounded-circle"></i>
<h1>Never miss an update</h1>
<p class="lead">Join our exclusive newsletter community today to stay informed about the latest art releases, products, and auctions. You'll receive updates straight to your inbox and access to my most sought-after collections. </p>
<input type="text" class="form-control mx-auto" placeholder="Name" style="max-width:80%;">
<div class="input-group mt-2 mb-4">
<input type="text" class="form-control" placeholder="Enter your email address">
<div class="input-group-append">
<button class="btn btn-primary" type="button">Submit</button>
</div>
</div>
<p class="h5"><em>*Your information is safe with us. We never share your email address.</em></p>
</div>
</div>
</div>
</section>

<section class="fdb-block text-dark">
<div class="container-fluid">
<div class="row text-center">
<div class="col-12 mt-4">
<h1>Videos</h1>
<p class="text-dark"><a href="https://www.froala.com">See all videos <i class="fas fa-angle-right"></i></a>
</p>
</div>
</div>

<div class="row text-center justify-content-center mt-5">

<?php
$args = array(
'post_type' => 'video', // Assuming 'photos' is your CPT
'posts_per_page' => 4,
'order' => 'ASC', // Ascending order
'orderby' => 'date' // Order by date
);

$query = new WP_Query($args);?>
<?php if ($query->have_posts()) : $count = 0; ?>
<?php while ($query->have_posts()) : $query->the_post(); $count++; ?>
<div class="col-10 col-sm-3">
<img alt="image" width="300" height="200" class="rounded" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full');?>">
<h3><strong><?php the_title();?></strong></h3>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>


</div>
</div>
</section>


<footer class="fdb-block bg-dark mt-3 py-5 footer-large">
<div class="container-fluid">
<div class="row align-items-top justify-content-center text-left">
<div class="col-12 col-sm-6 col-md-4 col-lg-3 text-sm-left">
<h3><strong>Dry Media</strong></h3>
<nav class="nav flex-column">
<a class="nav-link active" href="https://www.froala.com">Sketches</a>
<a class="nav-link" href="https://www.froala.com">Charcoal</a>
<a class="nav-link" href="https://www.froala.com">Graphite</a>
<a class="nav-link" href="https://www.froala.com">Pastel</a>
<a class="nav-link" href="https://www.froala.com">Wax</a>
</nav>
</div>

<div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-5 mt-sm-0 text-sm-left">
<h3><strong>Wet Media</strong></h3>
<nav class="nav flex-column">
<a class="nav-link active" href="https://www.froala.com">Ink</a>
<a class="nav-link" href="https://www.froala.com">Markers</a>
<a class="nav-link" href="https://www.froala.com">Acrylic</a>
<a class="nav-link" href="https://www.froala.com">Watercolor</a>
<a class="nav-link" href="https://www.froala.com">Oil Paint</a>
<a class="nav-link" href="https://www.froala.com">Relief Prints</a>
<a class="nav-link" href="https://www.froala.com">Mixed-Media</a>
</nav>
</div>


<div class="col-12 col-lg-2 ml-auto text-lg-left mt-4 mt-lg-0">
<h3><strong>Materials</strong></h3>
<nav class="nav flex-column">
<a class="nav-link active" href="https://www.froala.com">Wood</a>
<a class="nav-link" href="https://www.froala.com">Sculptures</a>
<a class="nav-link" href="https://www.froala.com">Reliefs</a>
<a class="nav-link" href="https://www.froala.com">Murals</a>
<a class="nav-link" href="https://www.froala.com">Body Art</a>
</nav>
</div>


<div class="col-12 col-md-4 col-lg-3 text-md-left mt-5 mt-md-0">
<h3>"<u><strong>Quality! <span class="text-danger">not <del>Quantity</del></span></strong></u>"</h3>
<p class="small">Each art piece is unique and one of a kind with the exception being relief prints. However for select pieces prints will be made available for a limited time.</p>
<br>
<p class="small">Although, the <a href="<?php echo home_url();?>/shop">shop</a> is always open and constantly being updated with new items, the auction is only open at select times, usually during events. To obtain a schedule of these promotions, please subscribe to the
<a class="<?php echo home_url();?>/newsletter">Newsletter</a> or contact me directly using the 
<a href="<?php echo home_url();?>/contact">contact page</a>.</p>
</div>

</div>
</footer>

<?php get_footer();?>