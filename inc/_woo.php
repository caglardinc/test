<?php 
if ( class_exists( 'Redux' ) ) {
   Redux::init( 'soup' );
}
global $soup;
$soup_checkout_deliver = (isset($soup['chck-delver'])) ? $soup['chck-delver'] : 1;
 

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'soup_woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
 


$delivery_sec = (isset($soup['delivery_sec'])) ? $soup['delivery_sec'] : 1;
if($delivery_sec){
	add_action('woocommerce_after_order_notes', 'soup_own_checkout_field');
	add_action('woocommerce_checkout_process', 'soup_own_checkout_field_process');
	add_action('woocommerce_checkout_update_user_meta', 'soup_own_checkout_field_update_user_meta');
	add_action('woocommerce_checkout_update_order_meta', 'soup_own_checkout_field_update_order_meta');
	add_filter('woocommerce_email_order_meta_keys', 'soup_own_checkout_field_order_meta_keys');
	add_action( 'woocommerce_admin_order_data_after_billing_address', 'soup_own_checkout_field_display_admin_order_meta', 10, 1 );
}
	 
	/**
	 * Add the field to the checkout
	 */

	function soup_own_checkout_field( $checkout ) {
		global $soup;
		$soup_checkout_deliver = (isset($soup['chck-delver'])) ? $soup['chck-delver'] : 1;
		?>
		<div id="soup_own_checkout_field">
			<h3><?php esc_html_e('Delivery','soup'); ?></h3>
			<div class="form-row deliver-field-class  orm-row-first " id="soup_deliver_opt_field" >
				<ul class="takeaway">
					<?php if($soup_checkout_deliver==1){ ?>
						<li> 
							<label for="soup_deliver_opt_Take_Away" class="custom-control custom-radio">
								<input type="radio" class="input-radio custom-control-input" value="Take Away" name="soup_deliver_opt" id="soup_deliver_opt_Take_Away">
								<span class="custom-control-indicator"><svg class="icon" x="0px" y="0px" viewBox="0 0 32 32"><path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="4" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path></svg></span>
								<span class="custom-control-description"><?php esc_html_e('Take Away','soup'); ?></span>  
							</label>
						</li>
					<?php } ?>
					<li <?php echo esc_attr(($soup_checkout_deliver!=1) ? 'style="display: none"' : ''); ?> > 
						<label for="soup_deliver_opt_Delivery" class="custom-control custom-radio">
							<input type="radio" class="input-radio custom-control-input" value="Delivery" name="soup_deliver_opt" id="soup_deliver_opt_Delivery" checked>
							<span class="custom-control-indicator"><svg class="icon" x="0px" y="0px" viewBox="0 0 32 32"><path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="4" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path></svg></span>
							<span class="custom-control-description"><?php esc_html_e('Delivery','soup'); ?></span>  
						</label>
					</li> 
				</ul> 
			</div>  
			<div class="form-row deliver-field-class  orm-row-first woocommerce-validated" id="soupdatetimepicker_field"> 
				<input type="text" class="input-text form-control" style="width:200px" name="soup_deliver_time" id="soupdatetimepicker" placeholder="<?php esc_attr_e('Date & Time','soup'); ?>" value="" autocomplete="off">
			</div>
		</div>

		<?php  
		 
	}
	/**
	 * Process the checkout
	 **/
	function soup_own_checkout_field_process() {
		global $woocommerce;
		
		// Check if set, if its not set add an error. This one is only requite for companies
		if ($_POST['billing_company']){
			if (!$_POST['soup_deliver_time']){ 
				$woocommerce->add_notice( esc_html_e('Please enter your XXX.','soup') );
			}
			if (!$_POST['soup_deliver_opt']){ 
				$woocommerce->add_notice( esc_html_e('Please enter your XXX.','soup') );
			}
		}
	}
	/**
	 * Update the user meta with field value
	 **/
	function soup_own_checkout_field_update_user_meta( $user_id ) {
		if ($user_id && $_POST['soup_deliver_time']) update_user_meta( $user_id, 'soup_deliver_time', esc_attr($_POST['soup_deliver_time']) );
		if ($user_id && $_POST['soup_deliver_opt']) update_user_meta( $user_id, 'soup_deliver_opt', esc_attr($_POST['soup_deliver_opt']) );
	}
	/**
	 * Update the order meta with field value
	 **/
	function soup_own_checkout_field_update_order_meta( $order_id ) {
		if ($_POST['soup_deliver_time']) update_post_meta( $order_id, 'Delivery Time', esc_attr($_POST['soup_deliver_time']));
		if ($_POST['soup_deliver_opt']) update_post_meta( $order_id, 'Delivery Type', esc_attr($_POST['soup_deliver_opt']));
	}
	/**
	 * Add the field to order emails
	 **/
	function soup_own_checkout_field_order_meta_keys( $keys ) {
		$keys[] = esc_html__('Delivery Time','soup');
		$keys[] = esc_html__('Delivery Type','soup');
		return $keys;
	}
	/**
	 * Display field value on the order edit page
	 */

	function soup_own_checkout_field_display_admin_order_meta($order){
		echo '<h3>'.esc_html__('Delivery','soup').':</h3>';
	    echo '<p><strong>'.esc_html__('Type','soup').':</strong> ' . get_post_meta( $order->get_order_number(), 'Delivery Type', true ) . '</p>';
	    echo '<p><strong>'.esc_html__('Time','soup').':</strong> ' . get_post_meta( $order->get_order_number(), 'Delivery Time', true ) . '</p>';
	} 
 

add_action( 'woocommerce_single_product_cart', 'woocommerce_template_single_add_to_cart', 30 );

// page redirect after order placed

add_action( 'woocommerce_thankyou', 'bbloomer_redirectcustom');
 
function bbloomer_redirectcustom( $order_id ){
	global $soup;
    $order = new WC_Order( $order_id );
    $redirect_url = $soup['order_redirect_url'] ? $soup['order_redirect_url'] : home_url('/').'confirmation/';
    $redirect_url = trim($redirect_url);
    if($soup['on_redirect']){
	    if(!empty($redirect_url)){
	        $url = $redirect_url;
	        if ( $order->status != 'failed' ) {
		        wp_redirect($url);
		        exit;
		    }
	    } 
    }

}

 
 // display lowest price from variation product
function soup_variation_price_format( ) {
	global $product;
	$wo_price = wc_price($product->get_price());
	if( $product->is_type( 'variable' ) ){
		$min_price = $product->get_variation_price( 'min', true );
		$max_price = $product->get_variation_price( 'max', true );
		if ( $min_price != $max_price ) {
			$price = sprintf( wp_kses( '<span class="text-muted">from</span> %1$s', 'soup' ), wc_price( $min_price ) );
			return $price;
		} else {
			$price = sprintf( wp_kses( '%1$s', 'soup' ), wc_price( $min_price ) );
			return $price;
		}
	}else{
		return $wo_price;
	}
}
  

function soup_store_margin(){
	global $soup;	 
	if(1==$soup['open_close']){
	   return 'mt65';
	}
}


/**
 * ajax quantity udpate form mn cart & checkout page
 */
function load_ajax() {
  if ( !is_user_logged_in() ){
      add_action( 'wp_ajax_nopriv_update_order_review', 'update_order_review' );
  } else{
      add_action( 'wp_ajax_update_order_review',        'update_order_review' );
  }
}
add_action( 'init', 'load_ajax' );

function update_order_review() {
  $values = array(); 
  parse_str($_POST['post_data'], $values);
  $cart = $values['cart'];
  foreach ( $cart as $cart_key => $cart_value ){
      WC()->cart->set_quantity( $cart_key, $cart_value['qty'], false );
      WC()->cart->calculate_totals();
      woocommerce_cart_totals();
  }
  wp_die();
}
 