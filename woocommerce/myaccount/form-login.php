<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
	
}

do_action( 'woocommerce_before_customer_login_form' ); ?>


<?php if ( is_user_logged_in() ) { ?>
    <!-- Your logged-in content here -->


  <div class="nav-scroller bg-dark box-shadow d-xl-none">
      <nav class="nav nav-underline text-center">
  <?php
$endpoint_urls = wc_get_account_menu_items();
foreach ($endpoint_urls as $endpoint => $label) {
  $url = wc_get_account_endpoint_url($endpoint);
?>

    <a href="<?php echo esc_url($url); ?>" class="nav-link text-center mx-auto"><?php echo esc_html($label); ?></a>


  <?php } ?>
      </nav>
  </div>
  <?php } ?>
  
  

<div class="row mt-4">
	<?php if ( is_user_logged_in() ) { ?>
    <!-- Your logged-in content here -->


  <div class="non-mobile-account-nav d-flex flex-column flex-shrink-0 p-3 text-bg-dark col-auto d-none d-xl-block" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Your Account</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
		
		
		<?php
$endpoint_urls = wc_get_account_menu_items();
foreach ($endpoint_urls as $endpoint => $label) {
  $url = wc_get_account_endpoint_url($endpoint);
?>
<li class="nav-item">
    <a href="<?php echo esc_url($url); ?>" class="nav-link"><?php echo esc_html($label); ?></a>

  </li>
<?php } ?>


    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
</div>

<?php } ?>




<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>



<?php endif; ?>

		<h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>



<main class="woo-sign-in col-8 mx-auto p-5 justify-content-end pt-3 bg-light rounded-3 border-light border-2 m-3">
    <form method="post" class="wc-auth-login">
    <?php get_template_part( 'logo', 'alt' );?>
		
		
        <h1 class="h3 mb-1 mt-3 text-center fw-normal"><?php esc_html_e( 'Sign In', 'woocommerce' ); ?></h1>
        <?php wc_print_notices(); ?>
       
        <hr>
        <div class="form-floating">
            <input type="text" class="form-control" name="username" id="username" placeholder="<?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>">
            <label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?></label>
        </div>
        <br>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>">
            <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?></label>
        </div>
        <br>
        <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="rememberme" value="forever"><?php esc_html_e( 'Remember me', 'woocommerce' ); ?>
            </label>
        </div>
        
        <?php
$redirect_url = isset( $_POST['redirect'] ) ? $_POST['redirect'] : wc_get_page_permalink( 'myaccount' );
?>
<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect_url ); ?>" />

        <button class="w-100 btn btn-lg btn-primary" type="submit" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
        <input type="hidden" name="redirect" value="<?php echo esc_url( $redirect_url ); ?>" />
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    </form>
</main> 
    
    
    <div class="d-block w-100 my-5 position-relative"></div>
    
    <hr>
    <h5 class="text-center rye">-Sign-In Above or Register to The Site Below-</h5>
     <hr>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>







		<form method="post" class="woocommerce-form woocommerce-form-register woo-register register p-5 mx-auto col-8" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
 <h1 class="h3 mb-3 fw-normal"><?php esc_html_e( 'Register', 'woocommerce' ); ?></h1>
			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-form-row form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>





<?php endif; ?>
</div>
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

