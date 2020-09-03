<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.5
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'print_attribute_radio' ) ) {
	function print_attribute_radio( $checked_value, $value, $label, $name ) {
		global $product;
		// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
		$checked = sanitize_title( $checked_value ) === $checked_value ? checked( $checked_value, sanitize_title( $value ), false ) : checked( $checked_value, $value, false );

		$input_name = 'attribute_' . esc_attr( $name ) ;
		$esc_value = esc_attr( $value );
		$id = esc_attr( $name . '_v_' . $value . $product->get_id() ); //added product ID at the end of the name to target single products
		$filtered_label = apply_filters( 'woocommerce_variation_option_name', $label );
		//printf( '<div><input type="radio" name="%1$s" value="%2$s" id="%3$s" %4$s><label for="%3$s" style="background:%5$s">%5$s</label></div>', $input_name, $esc_value, $id, $checked, $filtered_label, $filtered_label ); 
		printf( ' <div class="form-group">
				    <label class="custom-control custom-radio">
				    	<input type="radio" name="%1$s" value="%2$s" id="%3$s" class="custom-control-input jacai" %4$s> 
				        <span class="custom-control-indicator"></span>
				        <span class="custom-control-description">%5$s</span>
				    </label>
				</div> ', $input_name, $esc_value, $id, $checked, $filtered_label  );
	}
}

global $product;

$attribute_keys = array_keys( $attributes );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( wp_json_encode( $available_variations ) ) ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'soup' ); ?></p>
	<?php else : ?>  
				<?php foreach ( $attributes as $name => $options ) : 
				$tab_id_1 = rand(9,99999999);
				$tab_id_2 = rand(9,99999999);
				$tab_id = md5($tab_id_1.$tab_id_2);
				$nm_atr = strtolower(wc_attribute_label( $name )); 
				$nm_atr = md5(str_replace(" ", "_", $nm_atr));

				?>
        <div class="variations panel-details">
            <h5 class="panel-details-title">
                <label class="custom-control custom-radio">
                    <input name="radio_title_<?php echo wc_attribute_label( $nm_atr ); ?>" type="radio" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                </label>
                <a href="#panelDetails_<?php echo esc_attr($tab_id); ?>" data-toggle="collapse"><?php echo wc_attribute_label( $name ); ?></a>
            </h5>
			<?php
				$sanitized_name = sanitize_title( $name );
				if ( isset( $_REQUEST[ 'attribute_' . $sanitized_name ] ) ) {
					$checked_value = $_REQUEST[ 'attribute_' . $sanitized_name ];
				} elseif ( isset( $selected_attributes[ $sanitized_name ] ) ) {
					$checked_value = $selected_attributes[ $sanitized_name ];
				} else {
					$checked_value = '';
				}
			?>

            <div id="panelDetails_<?php echo esc_attr($tab_id); ?>" class="collapse">
                <div class="panel-details-content value"> 
 
							<?php
							if ( ! empty( $options ) ) {
								if ( taxonomy_exists( $name ) ) {
									// Get terms if this is a taxonomy - ordered. We need the names too.
									$terms = wc_get_product_terms( $product->get_id(), $name, array( 'fields' => 'all' ) );

									foreach ( $terms as $term ) {
										if ( ! in_array( $term->slug, $options ) ) {
											continue;
										}
										print_attribute_radio( $checked_value, $term->slug, $term->name, $sanitized_name ); 
									}
								} else {
									foreach ( $options as $option ) {
										print_attribute_radio( $checked_value, $option, $option, $sanitized_name );	 
									}
								}
							}

							?> 

                </div>
            </div>
        </div>
<?php echo end( $attribute_keys ) === $name ? apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'soup' ) . '</a>' ) : ''; ?>
				<?php endforeach; ?> 

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		<div class="single_variation_wrap"> 
			<?php
				do_action( 'woocommerce_before_single_variation' );
				do_action( 'woocommerce_single_variation' );
				do_action( 'woocommerce_after_single_variation' );
			?> 
		</div>
		<button style="display:none" data-link="<?php the_permalink(); ?>"></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
