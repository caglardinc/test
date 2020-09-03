<?php
/**
 * Soup functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Soup
 */

/**=====================================================================
 * Constant & definitions
 =======================================================================*/
define('SOUP_NAME', wp_get_theme()->get( 'Name' ));
define('SOUP_STYLE', get_template_directory_uri().'/assets/css/');
define('SOUP_SCRIPT', get_template_directory_uri().'/assets/js/'); 
define('SOUP_DIR', get_template_directory() ); 
define('SOUP_DIR_URI', get_template_directory_uri() .'/'); 

/**=====================================================================
 * Theme Core Functions
 ======================================================================*/  
if ( file_exists( SOUP_DIR . '/lib/theme-core-functions/theme-core-functions.php' ) ) { 
	require SOUP_DIR . '/lib/theme-core-functions/theme-core-functions.php';
}

/**=====================================================================
 * Includes Theme Config
 ======================================================================*/  
if ( file_exists( SOUP_DIR . '/lib/theme-config/theme-config.php' ) ) {
	require SOUP_DIR . '/lib/theme-config/theme-config.php';
}



 
/**=====================================================================
 * Load Megamenu Functions
 =====================================================================*/
if ( file_exists( SOUP_DIR . '/inc/megamenu/soup-menu.php' ) ) {
	require SOUP_DIR . '/inc/megamenu/soup-menu.php';
}  

/**=====================================================================
 * Implement the Custom Header feature.
 =====================================================================*/
if ( file_exists( SOUP_DIR . '/inc/custom-header.php' ) ) {
	require SOUP_DIR . '/inc/custom-header.php';
}

/**=====================================================================
 * Custom template tags for this theme.
 =====================================================================*/
if ( file_exists( SOUP_DIR . '/inc/template-tags.php' ) ) {
	require SOUP_DIR . '/inc/template-tags.php';
} 

/**=====================================================================
 * Custom functions that act independently of the theme templates.
 =====================================================================*/
if ( file_exists( SOUP_DIR . '/inc/extras.php' ) ) {
	require SOUP_DIR . '/inc/extras.php';
}  

/**=====================================================================
 * Customizer additions.
 =====================================================================*/
if ( file_exists( SOUP_DIR . '/inc/customizer.php' ) ) {
	require SOUP_DIR . '/inc/customizer.php';
}   

/**=====================================================================
 * Load Jetpack compatibility file.
 =====================================================================*/
if ( file_exists( SOUP_DIR . '/inc/jetpack.php' ) ) {
	require SOUP_DIR . '/inc/jetpack.php';
}    


/**=====================================================================
 *  Initialising Visual shortcode editor
 =====================================================================*/
if (class_exists('WPBakeryVisualComposerAbstract')) {
	function soup_requireVcExtend(){
		include_once( get_template_directory().'/vc_extend/extend_vc.php');
	}
 add_action('init', 'soup_requireVcExtend',2);
}

/**===============================================================================
 * Woocommerce Functions
 =================================================================================*/
if ( file_exists( SOUP_DIR . '/inc/_woo.php')) { 
    require SOUP_DIR . '/inc/_woo.php';
}



function soup_style_css(){ 
	global $soup;
	$body_full = ($soup['body_full']) ? $soup['body_full'] : 0;
	?>
	<style> 
		<?php if('1'==$body_full): ?>
			body {
				margin:0 !important; 
			}
		<?php endif; ?>
	</style>
	<?php
}
add_action('wp_head','soup_style_css');

 
/**===================================================================
 *   product quick view
=====================================================================*/ 

function soup_product_view(){
    ob_start();
    $return_str = ''; 
   
    $productId =  intval($_POST['productId']);  
    global $product;
    $_product = wc_get_product( $productId );

 
    // Check if the input was a valid integer
    if ( $productId == 0 ) {
        esc_html_e('Invalid Input','soup'); 
    }else{
        $args = array(
            'post_type'=>'product',
            'posts_per_page'=>1,
            'p'=> $productId
        );
        $the_query = new WP_Query( $args ); 
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 
			    <div class="modal-content">
			        <div class="modal-header modal-header-lg dark bg-dark">
			            <?php global $soup,$post; 
			                $popup_title = (!empty($soup['pop_up_title'])) ? $soup['pop_up_title'] : esc_html__('Specify your dish','soup'); 
                            $pop = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full');
                            if($soup['pop_img']!=1){
                                $popup_title_bgimh = $pop[0];
                            }else{
                                $popup_title_bgimh = (!empty($soup['pop_up_bgimg']['url'])) ? $soup['pop_up_bgimg']['url'] : get_template_directory_uri().'/assets/img/photos/modal-add.jpg';
                            }   
			            ?>
                        <div class="bg-image" style="background-image: url(<?php echo esc_url($popup_title_bgimh); ?>);"><img src="<?php echo esc_url($popup_title_bgimh); ?>" alt="<?php esc_attr_e('soup wordpress theme','soup'); ?>"></div>
			            <h4 class="modal-title"><?php echo esc_html($popup_title); ?></h4>
			            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
			        </div>
			        <div class="modal-product-details">
			            <div class="row align-items-center">
			                <div class="col-8">
			                    <h6 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
			                    <span class="text-muted"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></span>
			                </div>
			                <div class="col-4 text-lg text-right"><?php echo soup_variation_price_format(); ?></div>
			            </div>
			        </div>
			        <div class="modal-body panel-details-container popsoup">  
			            <?php do_action( 'woocommerce_single_product_cart' ); ?>
			        </div> 
			    </div> 
            <?php endwhile;
        wp_reset_postdata();
        else :
           esc_html_e('No posts found','soup'); 
        endif;
    } 
    ob_flush();
    die; 
}
// creating Ajax call for WordPress
add_action( 'wp_ajax_nopriv_soup_product_view', 'soup_product_view' );
add_action( 'wp_ajax_soup_product_view', 'soup_product_view' );

 
// START ajax add to cart By Sajib Talukder
add_action( 'wp_ajax_nopriv_variation_to_cart', 'product_variation_add_to_cart' );
add_action( 'wp_ajax_variation_to_cart', 'product_variation_add_to_cart' );
function product_variation_add_to_cart(){

    $product_id = (isset($_POST['pid']) && !empty($_POST['pid'])) ? $_POST['pid'] : get_the_ID(); 
    $prodct_quantity = (isset($_POST['quantity']) && !empty($_POST['quantity'])) ? $_POST['quantity'] : 1 ;
    $item = (!empty($_POST['item'])) ? $_POST['item'] : 0 ; 
    if($item!=0){
        $var_id = find_matching_product_variation_id( $product_id, $item );
        $var_id = (!empty($var_id)) ? $var_id : 0;
        WC()->cart->add_to_cart( $product_id, $prodct_quantity, $var_id ); 
    }else{
        WC()->cart->add_to_cart( $product_id, $prodct_quantity,0 ); 
    }   

    // $count = WC()->cart->get_cart_contents_count();
    WC_AJAX::get_refreshed_fragments();

    // die(); // To avoid server error 500
}

function find_matching_product_variation_id($product_id, $attributes){
    return (new WC_Product_Data_Store_CPT())->find_matching_product_variation(
        new WC_Product($product_id),
        $attributes
    );
}

// END ajax add to cart By Sajib Talukder
 

// Remove product in the cart using ajax
function warp_ajax_product_remove()
{ 
   $product_id = $_POST['product_id']; 
   $cart_item_key = $_POST['cart_item_key']; 
   WC()->cart->remove_cart_item($cart_item_key);
   WC_AJAX::get_refreshed_fragments();
    
}

add_action( 'wp_ajax_product_remove', 'warp_ajax_product_remove' );
add_action( 'wp_ajax_nopriv_product_remove', 'warp_ajax_product_remove' );