<?php get_header(); ?>
<?php get_template_part( 'preloader/preloader' );?>

<?php
$contact_bg_img = get_cs_option('contact_bg_img');
 ?>


      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
     
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
<section class="fdb-block pt-0" style="background-image: url('<?php echo esc_url($contact_bg_img);?>'); background-size:cover; background-position:center;">
  <div class="col-10 mx-auto rounded-3 p-3" style="background:rgba(0, 0, 0, .5);">
      <div class="bg-gray">
        <div class="container py-5">
          <div class="row-100"></div>
          <div class="row text-left mx-auto">
            <div class="col-8">
              <h1>Contact Us</h1>
              <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <div class="row-100"></div>
        </div>
      </div>
      <div class="container">
        <div class="row-100"></div>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-5">
            <h2>Call or email</h2>
            <p class="text-large">Support, Sales, and Account Management services are currently available in English</p>
    
            <p class="h3 mt-4 mt-lg-5">
              <strong>Support</strong>
            </p>
            <p>
              +800 3005 4300
            </p>
            <p>
              <a href="https://www.froala.com">Contact Support</a>
            </p>
            <p>
              Our technical support is available by phone or email from 11am to 11pm BST, Monday through Friday.
            </p>
    
            <p class="h3 mt-4 mt-lg-5">
              <strong>Sales</strong>
            </p>
            <p>
              +800 3005 4300
            </p>
            <p>
              <a href="https://www.froala.com">Contact Sales</a>
            </p>
            <p>
              Our technical support is available by phone or email from 11am to 11pm BST, Monday through Friday.
            </p>
    
            <p class="h3 mt-4 mt-lg-5">
              <strong>General inquiries</strong>
            </p>
            <p>
              <a href="https://www.froala.com">hello@website.com</a>
            </p>
          </div>
    
          <div class="col-12 col-md-6 ml-auto">
            <h2>Drop us a line</h2>
            <form>
              <div class="row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Last name">
                </div>
              </div>
    
              <div class="row mt-4">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Company Name">
                </div>
              </div>
    
              <div class="row mt-4">
                <div class="col">
                  <input type="email" class="form-control" placeholder="Email">
                </div>
              </div>
    
              <div class="row mt-4">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Phone">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Country">
                </div>
              </div>
    
              <div class="row mt-4">
                <div class="col">
                  <select class="form-control" required="">
                      <option value="">Select Department</option>
                      <option value="1">Support</option>
                      <option value="2">Sales</option>
                      <option value="3">Accounting</option>
                    </select>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col">
                  <textarea class="form-control" name="message" rows="5" placeholder="How can we help?"></textarea>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

       </div>
    </section>
 <section class="fdb-block bg-gray py-5">
      <div class="container text-dark">
        <div class="row text-center justify-content-center">
          <div class="col-12 col-md-8 col-lg-7">
            <p class="h2">support@website.com</p>
            <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <p><br></p>
            <p class="h2">
              <a href="https://www.froala.com" class="mx-2"><i class="text-dark fab fa-facebook"></i></a>
              <a href="https://www.froala.com" class="mx-2"><i class="text-dark fab fa-twitter"></i></a>
              <a href="https://www.froala.com" class="mx-2"><i class="text-dark fab fa-instagram"></i></a>
              <a href="https://www.froala.com" class="mx-2"><i class="text-dark fab fa-google"></i></a>
              <a href="https://www.froala.com" class="mx-2"><i class="text-dark fab fa-pinterest"></i></a>
            </p>
          </div>
        </div>
      </div>
    </section>
      <?php get_sidebar(); ?>


<?php get_footer(); ?>
