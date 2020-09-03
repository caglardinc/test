<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="section bg-light soup-woo-checkout">
    <div class="container">
    <?php 
        wc_print_notices(); 
        do_action( 'woocommerce_before_checkout_form', $checkout ); 
        // If checkout registration is disabled and not logged in, the user cannot checkout
        if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
            echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', esc_html_e( 'You must be logged in to checkout.', 'soup' ) );
            return;
        }
    ?>
    </div> 
    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data"> 
        <div class="container">
            <div class="row"> 
                <div class="col-xl-4 push-xl-8 col-lg-5 push-lg-7">
                    <div class="shadow bg-white stick-to-content mb-4">
                        <div class="bg-dark dark p-4"><h5 class="mb-0"><?php esc_html_e('You order','soup'); ?></h5></div>
                       <?php do_action( 'woocommerce_checkout_before_order_review' ); ?> 
                            <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                         
                        <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
                    </div>
                </div>
                <div class="col-xl-8 pull-xl-4 col-lg-7 pull-lg-5">
                    <div class="bg-white p-4 p-md-5 mb-4"> 
                         <?php do_action( 'woocommerce_checkout_billing' ); ?>
                        <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                        <h4 class="border-bottom pb-4 mt-5"><i class="ti ti-wallet mr-3 text-primary"></i><?php esc_html_e('Payment','soup'); ?></h4>
                        <?php do_action( 'soup_woocommerce_checkout_order_review'); ?>
                    </div>  
                </div>
            </div>
        </div> 
    </form> 
</section> 
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
