<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
?>
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

<div class="row">
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
  <img class="rounded-circle me-2" src=
                                  "<?php 
$current_user = wp_get_current_user();
echo get_avatar_url($current_user->ID, ['size' => '32']); 
?>"
      
    />
        <strong><i class="mx-2 fa-solid fa-gear"></i>Settings</strong>
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







<div class="woocommerce-MyAccount-content col-12 col-md-11 mx-md-auto col-lg-11 justify-content-end pt-4 px-5 rounded-3 border-light border-2 my-3 ms-md-5">
	<?php
		/**
		 * My Account content.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_content' );
	?>
</div>
</div>
