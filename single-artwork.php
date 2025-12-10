<?php get_header(); ?>
<?php get_template_part( 'preloader/preloader' );?>



<section class="fdb-block w-100 py-5">
 <!-- Faux background image div -->
    <div class="faux-background py-5" style="background-image: url('<?php the_post_thumbnail_url();?>'); background-position: center; background-repeat: no-repeat; background-size: cover;">
    </div>
  <div class="container">
	
	
	<div class="row align-items-center">
	  <div class="col-12 col-md-6 mb-4 mb-md-0">
		<img alt="image" class="img-fluid rounded rounded-lg shadow-lg" src="<?php the_post_thumbnail_url();?>">
	  </div>
	  <div class="col-12 col-md-6 col-lg-5 ml-md-auto text-left text-dark">
		<h1><?php the_title();?></h1>
		<h3 class="text-success p-1 col-4">
			<?php 

?>

		</h3>
		<p class="lead"><?php the_content();?></p>
		
		<hr>
		<span>Share This Artwork!</span>
		<p class="h1 text-muted">
		  <i class="fab fa-chrome mr-3"></i>
		  <i class="fab fa-safari mr-3"></i>
		  <i class="fab fa-firefox mr-3"></i>
		  <i class="fab fa-edge"></i>
		</p>
	  </div>
	</div>
	
  </div>
</section>



<section class="fdb-block fdb-viewport py-4 bg-light text-dark" style="background-image: url(imgs/hero/purple.svg);">
  <div class="container justify-content-center align-items-center d-flex">
	<div class="row justify-content-center text-center">
	  <div class="col-12 col-md-8">
		  <bold>-</bold>
		<i class="fa-solid fa-brush display-2"></i> 
		  <i class="fa-solid fa-paintbrush-pencil display-2 mx-3"></i>
		  <i class="fa-solid fa-palette display-2"></i>
		   <bold>-</bold>
		  <hr>
		<h1 class="my-4">Request a Commission</h1>
		<p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
		<p class="mt-5"><a href="https://www.froala.com" class="btn btn-outline-light">Request Art</a></p>
	  </div>
	</div>
  </div>
</section>


<section class="fdb-block py-5 bg-dark" style="background-image: url(); background-position: center; background-repeat: no-repeat; background-size:cover;">
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




<?php get_footer(); ?>