<?php
/**
 * Output a single payment method
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment-method.php.
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
<div class="col-md-4 col-sm-6 form-group wc_payment_method payment_method_<?php echo esc_attr($gateway->id); ?>"> 
	<label for="payment_method_<?php echo esc_attr($gateway->id); ?>" class="custom-control custom-radio">
		<input id="payment_method_<?php echo esc_attr($gateway->id); ?>" type="radio" class="input-radio custom-control-input" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"><?php echo wp_kses_post($gateway->get_title()); ?></span> 
	</label>
</div>
