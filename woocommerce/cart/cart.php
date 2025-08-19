<?php
defined( 'ABSPATH' ) || exit;
get_header();
do_action( 'woocommerce_before_cart' ); ?>

<section class="h-100 gradient-custom">
  <div class="container py-5 text-dark">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-10">
        <div class="card mb-4 dark-glass bg-dark">
          <div class="card-header bg-mid-2 py-3">
            <h5 class="mb-0 wht">Cart - <?php echo WC()->cart->get_cart_contents_count(); ?> items</h5>
          </div>

          <div class="card-body">
            <!-- Cart Form -->
            <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
              <?php do_action( 'woocommerce_before_cart_table' ); ?>
              
              <div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                  $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                  if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                ?>
                  <div class="row">
                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                      <!-- Product Image -->
                      <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                        <?php
                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                        if ( ! $product_permalink ) {
                          echo $thumbnail;
                        } else {
                          printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                        }
                        ?>
                      </div>
                    </div>

                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                      <!-- Product Name & Meta Data -->
                      <h4 class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?> Name:</h4>
                      <strong>
                        <?php
                        if ( ! $product_permalink ) {
                          echo wp_kses_post( $_product->get_name() );
                        } else {
                          echo wp_kses_post( sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ) );
                        }
                        echo wc_get_formatted_cart_item_data( $cart_item );
                        ?>
                      </strong>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                      <!-- Quantity and Remove Link -->
                      <div class="d-flex mb-4">
                        <div class="form-outline">
                          <?php
                          if ( $_product->is_sold_individually() ) {
                            $min_quantity = 1;
                            $max_quantity = 1;
                          } else {
                            $min_quantity = 0;
                            $max_quantity = $_product->get_max_purchase_quantity();
                          }
                          $product_quantity = woocommerce_quantity_input( array(
                            'input_name' => "cart[{$cart_item_key}][qty]",
                            'input_value' => $cart_item['quantity'],
                            'max_value' => $max_quantity,
                            'min_value' => $min_quantity,
                          ), $_product, false );
                          echo $product_quantity;
                          ?>
                        </div>
                        <div class="product-remove ms-4">
                          <?php
                          echo apply_filters(
                            'woocommerce_cart_item_remove_link',
                            sprintf(
                              '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                              esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                              esc_html__( 'Remove this item', 'woocommerce' ),
                              esc_attr( $cart_item['product_id'] ),
                              esc_attr( $_product->get_sku() )
                            ),
                            $cart_item_key
                          );
                          ?>
                        </div>
                      </div>
                      <!-- Price -->
                      <div class="product-price">
                        <?php
                        echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                        ?>
                      </div>
                      <!-- Subtotal -->
                      <div class="product-subtotal">
                        <?php
                        echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                        ?>
                      </div>
                    </div>
                  </div>
                  <hr>
                <?php endif; endforeach; ?>
              </div>

              <?php do_action( 'woocommerce_cart_contents' ); ?>

              <!-- Coupon and Update Cart Button -->
              <div class="actions">
                <?php if ( wc_coupons_enabled() ) { ?>
                  <div class="coupon">
                    <label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label>
                    <input type="text" name="coupon_code" id="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" />
                    <button type="submit" class="button" name="apply_coupon"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
                    <?php do_action( 'woocommerce_cart_coupon' ); ?>
                  </div>
                <?php } ?>
                <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                <button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_attr_e( 'Update cart', 'woocommerce' ); ?></button>
              </div>

              <?php do_action( 'woocommerce_after_cart_contents' ); ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Cart Totals -->
<div class="cart-totals">
  <div class="container">
    <?php woocommerce_cart_totals(); ?>
  </div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
<?php get_footer(); ?>
