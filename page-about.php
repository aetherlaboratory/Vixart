<?php get_header(); ?>
<?php get_template_part( 'preloader/preloader' );?>

<?php
$about_selfie = get_cs_option('about_selfie');
$explore_arti = get_cs_option('explore_arti');
$explore_artii = get_cs_option('explore_artii');
$explore_artiii = get_cs_option('explore_artiii');
$collection_art = get_cs_option('collection_art');
$about_nl_bg = get_cs_option('about_nl_bg');
?> 

<section class="fdb-block py-3">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-md-12 col-lg-6 col-xl-5 text-dark">
            <h1>About Me</h1>
            <p class="lead mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
    
            <p><strong>Connect with me:</strong></p>
            <p class="h1 text-danger">
          <button class="btn btn-sm text-danger"> <i class="fab fa-facebook mr-3 fs-1"></i><span class="text-center d-block">Facebook</span></button>
            <button class="btn btn-sm text-danger">  <i class="fab fa-twitter mr-3 fs-1"></i><span class="text-center d-block">Twitter</span></button>
            <button class="btn btn-sm text-danger">  <i class="fab fa-instagram mr-3 fs-1"></i><span class="text-center d-block">Instagram</span></button>
               <button class="btn btn-sm text-danger">  <i class="fab fa-snapchat mr-3 fs-1"></i><span class="text-center d-block">Snapchat</span></button>
                <br>
             <button class="btn btn-sm text-danger">    <i class="fab fa-artstation mr-3 fs-1"></i><span class="text-center d-block">Artstation</span></button>

               <button class="btn btn-sm text-danger">    <i class="fab fa-deviantart mr-3 fs-1"></i><span class="text-center d-block">Deviantart</span></button>
              <button class="btn btn-sm text-danger">    <i class="fab fa-tumblr mr-3 fs-1"></i><span class="text-center d-block">Tumblr</span></button>
              <button class="btn btn-sm text-danger">   <i class="fab fa-etsy mr-3 fs-1"></i><span class="text-center d-block">Etsy</span></button>
           
            
            </p>
          </div>
          <div class="col-12 col-md-8 m-auto ml-lg-auto mr-lg-0 col-lg-6 pt-5 pt-lg-0">
            <img alt="image" class="img-fluid" src="<?php echo esc_url($about_selfie); ?>">
          </div>
        </div>
      </div>
    </section>






<section class="fdb-block pb-1 pt-3 mb-5 bg-dark">
      <div class="container">
        <div class="row text-center">
          <div class="col-12">
              <div class="row col-auto mx-auto justify-content-center">
            <span class="righteous h3 col-auto"><i class="fas fa-envelopes h2"></i> Vixartwork@gmail.com </span>
                  </div>
          </div>
        </div>
      </div>
    </section>

<section class="fdb-block">
      <div class="container">
        <div class="row text-center align-items-center">
          <div class="col-8 col-md-4">
            <img alt="image" width="350" height="350" class="img-fluid" src="<?php echo esc_url($explore_arti); ?>">
          </div>
    
          <div class="col-4 col-md-2">
            <div class="row">
              <div class="col-12">
                <img alt="image" width="160" height="160" class="img-fluid" src="<?php echo esc_url($explore_artii); ?>">
              </div>
            </div>
    
            <div class="row mt-4">
              <div class="col-12">
                <img alt="image" width="160" height="160" class="img-fluid" src="<?php echo esc_url($explore_artiii); ?>">
              </div>
            </div>
          </div>
    
          <div class="col-12 col-md-6 col-lg-5 ml-auto pt-5 pt-md-0 text-dark">
           <i class="fas fa-brush display-1"></i>
            <h1>Explore My Artwork</h1>
            <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
          </div>
        </div>
      </div>
    </section>

<section class="fdb-block py-4 my-5 bg-dark">
      <div class="container">
        <div class="row text-center">
          <div class="col-12">
            <span class="righteous h3">Concocted by <i class="fa-regular fa-flask text-danger"></i>  Æ-Lab </span>
          </div>
        </div>
      </div>
    </section>

<section class="fdb-block my-5">
      <div class="container">
        <div class="row text-right align-items-center">
          <div class="col-7 col-md-4 m-auto">
            <img alt="image" width="360" height="695" class="img-fluid" src="<?php echo esc_url($collection_art); ?>">
          </div>
    
          <div class="col-12 col-md-7 col-lg-5 m-auto text-left pt-4 pt-md-0 text-dark">
            <div class="row pb-lg-3">
              <div class="col-3">
                <i class="fas fa-shopping-bag display-1"></i>
              </div>
              <div class="col-9">
                <h3><strong>Browse My Collection!</strong></h3>
                <p>Even the all-powerful Pointing has no control about the blind texts.</p>
              </div>
            </div>
    
            <div class="row pt-1 pt-md-2 pb-lg-3">
              <div class="col-3">
                 <i class="fas fa-gavel display-1"></i>
              </div>
              <div class="col-9">
                <h3><strong>Place Your Bid!</strong></h3>
                <p>Duden flows by their place far far away, behind the word mountains.</p>
              </div>
            </div>
    
    
            <div class="row pt-1 pt-md-2">
              <div class="col-3">
                 <i class="fas fa-clipboard-list display-1"></i>
              </div>
              <div class="col-9">
                <h3><strong>Need Artwork?</strong></h3>
                <p>A small river named Duden flows by their place and supplies it.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>









<section class="fdb-block fdb-viewport py-4 bg-dark">
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


<section class="fdb-block py-0">
 <div class="container-fluid px-5 py-5 mb-5" style="background-image: url('<?php echo esc_url($about_nl_bg); ?>'); background-position: center; background-repeat: no-repeat; background-size:cover;">
        <div class=" row justify-content-end">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5 card p-5 text-left text-dark">
            <div class="fdb-box">
              <div class="row">
                <div class="col">
                  <h1>Join My Newsletter</h1>
                  <p class="lead">Right at the coast of the Semantics, a large language ocean. A small river named Duden.</p>
                </div>
              </div>
              <div class="row">
                <div class="col mt-4">
                  <input type="text" class="form-control text-dark border-dark" placeholder="Full Name">
                </div>
              </div>
              <div class="row mt-4">
                <div class="col">
                 <input type="text" class="form-control text-dark border-dark" placeholder="Email">
                </div>
              </div>
              <div class="row mt-4">
                <div class="col">
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
