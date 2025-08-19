<?php get_header('shop'); ?>
<?php get_template_part( 'preloader/preloader' );?>

<?php
$merch_nl_bg = get_cs_option('merch_nl_bg');

$merch_banner_imgi = get_cs_option('merch_banner_imgi');
$merch_banner_imgii = get_cs_option('merch_banner_imgii');
$merch_banner_imgiii = get_cs_option('merch_banner_imgiii');

$merch_banner_urli = get_cs_option('merch_banner_urli');
$merch_banner_urlii = get_cs_option('merch_banner_urlii');
$merch_banner_urliii = get_cs_option('merch_banner_urliii');

$merch_banner_titlei = get_cs_option('merch_banner_titlei');
$merch_banner_titleii = get_cs_option('merch_banner_titleii');
$merch_banner_titleiii = get_cs_option('merch_banner_titleiii');

$merch_banner_excerpti = get_cs_option('merch_banner_excerpti');
$merch_banner_excerptii = get_cs_option('merch_banner_excerptii');
$merch_banner_excerptiii = get_cs_option('merch_banner_excerptiii');

?> 


<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-indicators">
<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
</div>
<div class="carousel-inner">








<div class="carousel-item active">
<img src="<?php echo esc_url($merch_banner_imgi); ?>" class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" focusable="false">

<div class="container">
<div class="carousel-caption text-start">
<h1> <?php echo esc_html($merch_banner_titlei); ?></h1>
<p> <?php echo esc_html($merch_banner_excerpti); ?></p>
<p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
</div>
</div>
</div>



<div class="carousel-item">
<img src="<?php echo esc_url($merch_banner_imgii); ?>" class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" focusable="false">

<div class="container">
<div class="carousel-caption">
<h1> <?php echo esc_html($merch_banner_titleii); ?></h1>
<p><?php echo esc_html($merch_banner_excerptii); ?></p>
<p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
</div>
</div>
</div>



<div class="carousel-item">
<img src="<?php echo esc_url($merch_banner_imgiii); ?>" class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" focusable="false">

<div class="container">
<div class="carousel-caption text-end">
<h1><?php echo esc_html($merch_banner_titleiii); ?></h1>
<p><?php echo esc_html($merch_banner_excerptiii); ?></p>
<p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
</div>
</div>
</div>











</div>
<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div>
<!-- myCarousel -->




<?php
$args = array(
'post_type' => 'product', // Assuming 'photos' is your CPT
'posts_per_page' => 1,
'order' => 'ASC', // Ascending order
'orderby' => 'date' // Order by date
);

$query = new WP_Query($args);?>
<?php if ($query->have_posts()) : $count = 0; ?>
<?php while ($query->have_posts()) : $query->the_post(); $count++; ?>

<section class="fdb-block bg-dark text-light py-5">
<div class="container align-items-end justify-content-center d-flex">
<div class="row align-items-top text-left">
<div class="col-12 col-md-6 col-lg-5">
<h1><?php echo get_the_title(); ?></h1>
<p class="lead"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
<div class="row">
<p class="mt-4 col-auto">
	<?php woocommerce_template_loop_add_to_cart();?>
</p>
<p class="mt-4 col-auto justify-end"><a href="<?php the_permalink();?>" class="btn btn-outline-primary">More Details</a></p>
</div><!-- Button Row -->
</div>

<div class="col-12 col-sm-6 m-auto">
<img alt="image"  width="540" height="392" class="img-fluid rounded" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full');?>">
</div>
</div>
</div>
</section>


<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>








<?php
$args = array(
'post_type' => 'product', // Assuming 'photos' is your CPT
'posts_per_page' => 1,
'offset' => 1,
'order' => 'ASC', // Ascending order
'orderby' => 'date' // Order by date
);

$query = new WP_Query($args);?>
<?php if ($query->have_posts()) : $count = 0; ?>
<?php while ($query->have_posts()) : $query->the_post(); $count++; ?>

<section class="fdb-block bg-dark text-light py-5">
<div class="container align-items-center justify-content-center d-flex">
<div class="row align-items-center text-left">
<div class="col-12 col-sm-6">
<img alt="image"  width="540" height="392" class="img-fluid rounded" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full');?>">
</div>

<div class="col-12 col-lg-5 ml-auto pt-5 pt-lg-0">
<h1><?php echo get_the_title(); ?></h1>
<p class="lead"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
<div class="row">
<p class="mt-4 col-auto"><?php woocommerce_template_loop_add_to_cart();?></p>
<p class="mt-4 col-auto justify-end"><a href="<?php the_permalink();?>" class="btn btn-outline-primary">More Details</a></p>
</div><!-- Button Row -->
</div>
</div>
</div>
</section>

<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>

<section class="fdb-block container-fluid py-5">



<div class="container text-dark">
<div class="row text-center justify-content-center">
<div class="col-8">
<h1>Top Products</h1>
</div>
</div>

<div class="row text-center mt-5">


<?php
$args = array(
'post_type' => 'product', // Assuming 'photos' is your CPT
'posts_per_page' => 4,
'offset' => 2,
'order' => 'ASC', // Ascending order
'orderby' => 'date' // Order by date
);

$query = new WP_Query($args);?>
<?php if ($query->have_posts()) : $count = 0; ?>
<?php while ($query->have_posts()) : $query->the_post(); $count++; ?>


<div class="col-3">
<a href="<?php the_permalink(); ?>">
<img alt="image" width="255" height="255" class="img-fluid rounded" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full');?>">
<h3 class="text-dark"><strong><?php echo get_the_title(); ?></strong></h3>
</a>
<p>
<?php
$categories = get_the_category();
if (!empty($categories)) {
$category_names = array_map(function($cat) { return $cat->name; }, $categories);
echo implode(', ', $category_names);
}
?>	
</p>
<p><?php echo wp_trim_words( get_the_excerpt(), 10 ); ?></p>
<?php woocommerce_template_loop_add_to_cart();?>
</div>

<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>

</div>






<div class="row text-center mt-5">


<?php
$args = array(
'post_type' => 'product', // Assuming 'photos' is your CPT
'posts_per_page' => 4,
'offset' => 6,
'order' => 'ASC', // Ascending order
'orderby' => 'date' // Order by date
);

$query = new WP_Query($args);?>
<?php if ($query->have_posts()) : $count = 0; ?>
<?php while ($query->have_posts()) : $query->the_post(); $count++; ?>


<div class="col-3">
<a href="<?php the_permalink(); ?>">
<img alt="image"  width="255" height="255" class="img-fluid rounded" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full');?>">
<h3 class="text-dark"><strong><?php echo get_the_title(); ?></strong></h3>
</a>
<p>
<?php
$categories = get_the_category();
if (!empty($categories)) {
$category_names = array_map(function($cat) { return $cat->name; }, $categories);
echo implode(', ', $category_names);
}
?>
</p>
<p><?php echo wp_trim_words( get_the_excerpt(), 10 ); ?></p>
<?php woocommerce_template_loop_add_to_cart();?>
</div>

<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>

</div>



</section>




<section class="fdb-block bg-dark text-light py-3">


<h1 class="text-center mt-3">More Products</h1>

<?php get_template_part( 'product', 'glide' );?>
</section>

<section class="fdb-block py-5" style="background-image: url('<?php echo esc_url($merch_nl_bg); ?>'); background-position: center; background-repeat: no-repeat; background-size:cover;">
<div class="container">

<div class="fdb-box bg-light my-5 py-5 rounded rounded-lg shadow-lg">
<div class="row justify-content-center align-items-center">
<div class="col-12 col-lg-6">
<h2 class="text-primary">Join Our Newsletter!</h2>
<p class="lead">Get Weekly Updates on Premier of New Artwork, News about Art Shows & Events, Exclusive Sales, and First Access to New Merchandise! </p>
</div>
<div class="col-12 col-lg-5 text-center">
<div class="input-group mt-4">
<input type="text" class="form-control" placeholder="Enter your email address">
<div class="input-group-append">
<button class="btn btn-primary" type="button">Submit</button>
</div>
</div>
</div>
</div>
</div>
</div>
</section>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php the_content(); ?>
<?php endwhile; endif; ?>


<?php get_sidebar(); ?>


<?php get_footer(); ?>
