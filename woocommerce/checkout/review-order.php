<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
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
 * @version     3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<table class="table-cart woocommerce-checkout-review-order-table"> 
	<tbody>
		<?php
			do_action( 'woocommerce_review_order_before_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					?>
					<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						<td class="product-name title">
							<?php echo wp_kses_post($_product->get_title()); ?>
							<br>
							<dd><?php //echo apply_filters( 'woocommerce_checkout_cart_item_quantity',  sprintf( '&times; %s', $cart_item['quantity'] ) , $cart_item, $cart_item_key );
								$item_id = ( !empty( $cart_item['variation_id'] ) ) ? $cart_item['variation_id'] : '';
								$V_product = new WC_Product_Variation( $item_id );
								$variation_data = $V_product->get_variation_attributes();
								$variation_detail = wc_get_formatted_variation( $variation_data, true ); 
								echo str_replace(",", "<br>", $variation_detail)  ; 
							 ?></dd>
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?> 
							<dd>
								<span class="checkout_qty"><?php esc_html_e('Qty: ','soup'); ?></span>
								<?php 

									$_product   = $cart_item['data'] ;
									if ( $_product->is_sold_individually() ) {
									  $return_value = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
									} else {
									  $return_value = woocommerce_quantity_input( array(
									      'input_name'  => "cart[{$cart_item_key}][qty]",
									      'input_value' => $cart_item['quantity'],
									      'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
									      'min_value'   => '1'
									      ), $_product, false );
									}
									echo $return_value;
								 ?> 
							</dd>
						</td>
						<td class="product-total price">
							<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
						</td>
					</tr>
					<?php
				}
			}

			do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
		<tr class="cart-subtotal">
			<td><b><?php esc_html_e( 'Subtotal', 'soup' ); ?></b></td>
			<td><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<td><b><?php wc_cart_totals_coupon_label( $coupon ); ?></b></td>
				<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<td><b><?php echo esc_html( $fee->name ); ?></b></td>
				<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
					<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
						<td><b><?php echo esc_html( $tax->label ); ?></b></td>
						<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<td><b><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></b></td>
					<td><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<tr class="order-total">
			<td><b><?php esc_html_e( 'Total', 'soup' ); ?></b></td>
			<td><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</tbody> 

</table>
