<?php
/**
 * Auth form login
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/auth/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Auth
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_auth_page_header' ); ?>

<h1>
	TESTING
</h1>

<?php wc_print_notices(); ?>

<p>
	<?php
	/* translators: %1$s: app name, %2$s: URL */
	echo wp_kses_post( sprintf( __( 'To connect to %1$s you need to be logged in. Log in to your store below, or <a href="%2$s">cancel and return to %1$s</a>', 'woocommerce' ), esc_html( wc_clean( $app_name ) ), esc_url( $return_url ) ) );
	?>
</p>


<main class="form-signin w-100 m-auto">
    <form method="post" class="wc-auth-login">
        <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal"><?php esc_html_e( 'Please sign in', 'woocommerce' ); ?></h1>
        <?php wc_print_notices(); ?>
        <div class="form-floating">
			<h1>TEST</h1>
            <input type="text" class="form-control" name="username" id="username" placeholder="<?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>">
            <label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?></label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>">
            <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?></label>
        </div>
        <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="rememberme" value="forever"><?php esc_html_e( 'Remember me', 'woocommerce' ); ?>
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
		
		
		
        <input type="hidden" name="redirect" value="<?php echo esc_url( $redirect_url ); ?>" />
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    </form>
</main> 

<?php do_action( 'woocommerce_auth_page_footer' ); ?>
