<?php 


/**=====================================================================
 * Soup Pagination
 =====================================================================*/

if ( ! function_exists( 'soup_pagination' ) ){ 

	function soup_pagination($numpages = '', $pagerange = '', $paged='') {

		if (empty($pagerange)) {
			$pagerange = 2;
		}

		global $paged;
		if (empty($paged)) {
			$paged = 1;
		}
		if ($numpages == '') {
			global $wp_query;
			$numpages = $wp_query->max_num_pages;
				if(!$numpages) {
				    $numpages = 1;
			}
		}
	 
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );
		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}
		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	  	$pagination_args = array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $numpages,
			'current'   => $paged,
			'mid_size'  => 3,
			'show_all'  => False,
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="ti-arrow-left"></i>',
			'next_text' => '<i class="ti-arrow-right"></i>',
			'type'      => 'list',
	  	);

	  	$paginate_links = paginate_links($pagination_args);

	  	if ($paginate_links) { 
	  		printf(esc_html__('%s','soup'),$paginate_links); 
	  	} 
	}
}


/**=============================================================
 * About Widget & Mega Menu 
 ==============================================================*/
function soup_about_us_widgetscript($hook) {
    wp_enqueue_media();
    if("nav-menus.php"==$hook){ 
	    wp_enqueue_script('media-megamenu', SOUP_DIR_URI . 'assets/js/megamenu.js', false, '1.0', true);
	}    
    if("widgets.php"==$hook){ 
	    wp_enqueue_script('soup-widget', SOUP_DIR_URI . 'assets/js/widget.js', false, '1.0', true);
	}

    
}
add_action('admin_enqueue_scripts', 'soup_about_us_widgetscript');

 


/**=====================================================================
 * Soup nav menus
=====================================================================*/

function soup_main_menu(){
	wp_nav_menu( array(
		'theme_location'    => 'mainmenu',
		'depth'             => 3,
		'container'         => false,
		'menu_id'        	=> 'nav-main',
		'menu_class'        => 'nav nav-main',
		'walker'       		=> new Soup_navwalker(),
		'fallback_cb'       => 'soup_default_menu'
	));
}


/**=====================================================================
 * Soup fallback menu
=====================================================================*/
 
if(is_user_logged_in()):
	function soup_default_menu() {
		?>
		<ul id="nav-main" class="nav nav-main"> 
			<li>
		        <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"><?php esc_html_e( 'Add Menu', 'soup' ); ?></a> 
		    </li>                
		</ul>
		<?php
	}
endif;


/**=====================================================================
 *  hexa to rgb color converter
=====================================================================*/ 
function soup_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex); 
   if(strlen($hex) == 3) {
      $r = hexdec($hex[0].$hex[0]);
      $g = hexdec($hex[1].$hex[1]);
      $b = hexdec($hex[2].$hex[2]);
   } else {
      $r = hexdec($hex[0].$hex[1]);
      $g = hexdec($hex[2].$hex[3]);
      $b = hexdec($hex[4].$hex[5]);
   } 
   return implode(', ',array($r, $g, $b));  
}


/**=====================================================================
 * Soup Comment List 
=====================================================================*/
 
function soup_comments_list($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
        <div class="avatar"><?php echo get_avatar( $comment, 60 ); ?></div>
        <div class="content">
            <span class="details"><?php comment_author_link() ?> <?php esc_html_e('on','soup'); ?> <?php printf( esc_html__( '%1$s','soup' ), get_comment_date( 'M n, Y', $comment ) ); ?>,  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span>
	            <?php if ($comment->comment_approved == '0') : ?>
					<p><em><?php esc_html_e('Your comment is awaiting moderation.','soup'); ?></em></p>
				<?php endif; ?>
	            <?php comment_text() ?> 
        </div> 
<?php } 

/**=====================================================================
 * Soup Comment Form MOdify 
=====================================================================*/
 
function soup_comment_fields($fields) {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

    unset($fields['url']);

    $fields['author'] = ' <div class="row gutters-sm"><div class="col-md-6 form-group">
                            <input type="text" class="form-control" id="inputEmail1" placeholder="'.esc_attr('Name','soup').'" name="author" value="' . esc_attr( $commenter['comment_author'] ) .
    '"></div>';
    $fields['email'] = '<div class="col-md-6 form-group">
	                        <input type="email" class="form-control" id="inputPassword2" placeholder="'.esc_attr('Email','soup').'" name="email"  value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '"> </div></div>';
    $fields['url'] = '';
    return $fields;
}
add_filter('comment_form_default_fields','soup_comment_fields');

 
/**=====================================================================
 * Soup Comment form field order change 
=====================================================================*/
 
add_action( 'comment_form_after_fields', 'soup_form_order_textarea' );
add_action( 'comment_form_logged_in_after', 'soup_form_order_textarea' );

function soup_form_order_textarea()
{
    echo '<div class="form-group">
    		<textarea id="comment" name="comment" cols="30" rows="4" class="form-control" placeholder="'.esc_attr('Comment','soup').'" required></textarea> 
         </div> ';
}

/**=====================================================================
 * Soup Comment args change
=====================================================================*/
  
add_filter( 'comment_form_defaults', 'soup_comment_form_allowed_tags' );
function soup_comment_form_allowed_tags( $defaults ) { 

	$defaults['class_form'] = 'validate-form'; 
	$defaults['id_form'] = 'add-comment'; 
	$defaults['class_submit'] = ''; 
	$defaults['title_reply'] = wp_kses( esc_html__('Write a comment','soup'  ), array('i'=> array('class' => array())) ); 
	$defaults['title_reply_before'] =  '<h4><i class="ti ti-pencil mr-3 text-primary"></i>';
	$defaults['title_reply_after'] =  '</h4>';
    $defaults['comment_notes_before'] =  '';
    $defaults['comment_field'] = '';
	$defaults['label_submit'] =  esc_html__( 'Send a comment','soup' ); 
	// $defaults['submit_button'] =  '
 //            	<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />
 //        	  </div>'; 
	return $defaults;

}
 

/**=====================================================================
 * Soup Category & Archive Widget modify
=====================================================================*/

add_filter('wp_list_categories', 'soup_add_span_cat_count');
function soup_add_span_cat_count($soup_links) {
	$soup_links = str_replace('</a> (', '</a> <span class="post-count">', $soup_links);
	$soup_links = str_replace(')', '</span>', $soup_links);
	return $soup_links;
}
function soup_archive_count_span( $links ) {
	$links = str_replace( '</a>&nbsp;(', '</a><span class="post-count">', $links );
	$links = str_replace( ')', '</span>', $links );
	return $links;
}
add_filter( 'get_archives_link', 'soup_archive_count_span' );



/**=====================================================================
 * Soup Breadcrumb
=====================================================================*/
function soup_breadcrumb(){
	global $post,$soup;
	if(isset($soup['blog-title'])){
		$soup_blog_title=  $soup['blog-title'];
	}else{
		$soup_blog_title=  esc_html__('Blog','soup');
	}

	if(is_front_page() && is_home()){
		echo esc_html($soup_blog_title);

	}elseif(is_home() || is_page()){
		if(is_page()){
		    if(''!=get_post_meta($post->ID,'_soup_page_banner_title',true)){
		        $soup_ptitle = get_post_meta($post->ID,'_soup_page_banner_title',true);
			}else{
				$soup_ptitle =  get_the_title();
			}
		}else{
			$soup_ptitle =  $soup_blog_title;
		}
	  printf( esc_html__('%s','soup'),$soup_ptitle);
	}elseif(is_single()){
		if(isset($soup['single-title']) && (''!=$soup['single-title'])){
			printf(  $soup['single-title'] );
		}else{
			the_title();
		}
	}elseif(is_search()){
		if(isset($soup['srch-title']) && (''!=$soup['srch-title'])){
			printf( $soup['srch-title'] );
		}else{
			printf( get_search_query()  );
		}
	}elseif(is_category() || is_tag()) {
		if(isset($soup['archv-title']) && (''!=$soup['archv-title'])){
			printf(esc_html__('%s','soup'),$soup['archv-title']);
		}else{
			single_cat_title("", true);
		}
	}elseif(is_archive()){ 
 		if ( class_exists('WooCommerce' ) ){
 			if(is_shop() || is_product_category() || is_product_tag() ){
	 			if(isset($soup['shop-title']) && (''!=$soup['shop-title'])){
					printf($soup['shop-title']);
				}else{
	 				woocommerce_page_title();  
	 			} 
 			}else{ 
	 			if(isset($soup['archv-title']) && (''!=$soup['archv-title'])){
					printf($soup['archv-title']);
				}else{
	 				echo get_the_date('F Y'); 
	 			}
 			} 
 		}else{ 
 			if(isset($soup['archv-title']) && (''!=$soup['archv-title'])){
				printf($soup['archv-title']);
			}else{
 				echo get_the_date('F Y'); 
 			}
		}
	}elseif(is_404()){ esc_html_e('404 Error','soup');}else{ the_title();}
}


function soup_breadcrumb_2(){
	global $post,$soup;
	if(isset($soup['blog-title'])){
		$soup_blog_title=  $soup['blog-subtitle'];
	}else{
		$soup_blog_title=  esc_html__('Some informations about our restaurant','soup');
	}

	if(is_front_page() && is_home()){
		echo esc_html($soup_blog_title);

	}elseif(is_home() || is_page()){
		if(is_page()){
		    if(''!=get_post_meta($post->ID,'_soup_page_banner_subtitle',true)){
		        $soup_ptitle = get_post_meta($post->ID,'_soup_page_banner_subtitle',true);
			}else{
				$soup_ptitle =  '';
			}
		}else{
			$soup_ptitle =  $soup_blog_title;
		}
	  printf( esc_html__('%s','soup'),$soup_ptitle);
	}elseif(is_single()){
		if(isset($soup['single-title']) && (''!=$soup['single-title'])){
			printf(  $soup['single-title'] );
		}else{
			the_title();
		}
	}elseif(is_search()){
		if(isset($soup['srch-subtitle']) && (''!=$soup['srch-subtitle'])){
			printf( $soup['srch-subtitle'] );
		}else{
			printf( get_search_query()  );
		}
	}elseif(is_category() || is_tag()) {
		if(isset($soup['archv-subtitle']) && (''!=$soup['archv-subtitle'])){
			printf(esc_html__('%s','soup'),$soup['archv-subtitle']);
		}else{
			single_cat_title("", true);
		}
	}elseif(is_archive()){ 
 		if ( class_exists('WooCommerce' ) ){
 			if(is_shop() || is_product_category() || is_product_tag() ){
	 			if(isset($soup['shop-title']) && (''!=$soup['shop-title'])){
					printf($soup['shop-title']);
				}else{
	 				woocommerce_page_title();  
	 			} 
 			}else{ 
	 			if(isset($soup['archv-title']) && (''!=$soup['archv-title'])){
					printf($soup['archv-title']);
				}else{
	 				echo get_the_date('F Y'); 
	 			}
 			} 
 		}else{ 
 			if(isset($soup['archv-title']) && (''!=$soup['archv-title'])){
				printf($soup['archv-title']);
			}else{
 				echo get_the_date('F Y'); 
 			}
		}
	}elseif(is_404()){ esc_html_e('404 Error','soup');}else{ the_title();}
}


/**=====================================================================
 * Soup Slider Category Query
=====================================================================*/
function soup_slider_terms(){
	$soup_all_terms = array();
	$soup_term_name = array();
	$soup_term_slug = array();
	$soup_terms = get_terms( 'slider_cat' );
	if ( ! empty( $soup_terms ) && ! is_wp_error( $soup_terms ) ){
	    foreach ( $soup_terms as $soup_term ) {
	        $soup_term_name[] =  $soup_term->name;
	        $soup_term_slug[] =  $soup_term->slug;
	    }
	}
	$soup_all_terms =  array_combine($soup_term_slug,$soup_term_name);
	if(empty($soup_all_terms)){
		return $soup_all_terms = array( esc_html__('None. Create slider categor first.','soup') => 'none');
	}else{
		return $soup_all_terms;
	}

}


/**=====================================================================
 * Soup Review Query
=====================================================================*/
function soup_team_query(){
	$rvw_post_title = array();
	$rvw_post_id = array();
	$rvw_posts = array();
	query_posts(array('post_type'=>'reviews','posts_per_page'=>-1));
	while ( have_posts() ) : the_post();
	     $rvw_post_title[] = get_the_title();
	     $rvw_post_id[] = get_the_ID();
	endwhile;
	wp_reset_query();

	$rvw_posts =  array_combine($rvw_post_title, $rvw_post_id);
	if(empty($rvw_posts)){
		return $rvw_posts = array('none' => esc_html__('None','soup'));
	}else{
		return $rvw_posts;
	}

}

/**=====================================================================
 *  body class added
=====================================================================*/ 
add_filter( 'body_class', 'soup_body_custom_class' );
function soup_body_custom_class( $classes ) {
	global $post;
    if (  is_page() ) {
    	$bodclr = get_post_meta($post->ID,'_soup_pgbdclr_sidebar',true);

        $classes[] = "{$bodclr}";
    }
    return $classes;
}


/**=====================================================================
 *  woocommerce min cart
=====================================================================*/ 

function soup_woocommere_min_cart(){
	global $woocommerce;
?>  
	<div class="minc">
	    <span class="cart-icon">
	        <i class="ti ti-shopping-cart"></i>
	        <span class="notification"><?php if ( class_exists( 'WooCommerce' ) ) { echo wp_kses_post($woocommerce->cart->cart_contents_count); }else{ echo '0'; } ?></span>
	    </span>
	    <span class="cart-value"><?php if ( class_exists( 'WooCommerce' ) ) { echo html_entity_decode($woocommerce->cart->get_cart_total()); }else{ echo '0.00'; } ?></span>
	</div>
	<?php 
} 

// product item count with ajax
add_filter( 'woocommerce_add_to_cart_fragments', 'soup_woocommerce_header_add_to_cart_fragment' );
function soup_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<div class="minc">
	    <span class="cart-icon">
	        <i class="ti ti-shopping-cart"></i>
	        <span class="notification"><?php if ( class_exists( 'WooCommerce' ) ) { echo wp_kses_post($woocommerce->cart->cart_contents_count); }else{ echo '0'; } ?></span>
	    </span>
	    <span class="cart-value"><?php if ( class_exists( 'WooCommerce' ) ) { echo html_entity_decode($woocommerce->cart->get_cart_total()); }else{ echo '0.00'; } ?></span>
	</div>
	<?php
	$fragments['div.minc'] = ob_get_clean();
	return $fragments;
}

function soup_woocommere_min_cart_2(){
	global $woocommerce;
?>  
    <div class="panel-cart-content minc-list">
    	<form action="" class="sp-mincart"  method="post">
		<?php if ( class_exists( 'WooCommerce' ) ) : ?>
	        <table class="table-cart min">
					<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) { ?>        	
	            <tr>
	                <td class="title">
	                    <span class="name"><a href="#" data-toggle="modal"><?php echo apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product);?></a></span>
	                    <span class="caption text-muted"> 
	                    <?php  
							$item_id = ( !empty( $cart_item['variation_id'] ) ) ? $cart_item['variation_id'] : '';
							$V_product = new WC_Product_Variation( $item_id );
							$variation_data = $V_product->get_variation_attributes();
							$variation_detail = wc_get_formatted_variation( $variation_data, true ); 
							echo str_replace(",", "<br>", $variation_detail)  ; 
						 
							echo wc_get_formatted_cart_item_data( $cart_item );
						 
						?>  
						</span>
	                </td>  
	                <td class="price">
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
	                 x <?php echo wc_price($_product->get_price());?></td>
	                <td class="actions"> 
	                    <!-- <a href="<?php //echo esc_url( wc_get_cart_remove_url( $cart_item_key ) );?>" class="action-icon"><i class="ti ti-close"></i></a> -->
	                    <a href="#" data-pid="<?php echo esc_attr($_product->get_id()); ?>" data-item_key="<?php echo esc_attr($cart_item_key); ?>" class="action-icon"><i class="ti ti-close"></i></a>
	                </td>
	            </tr>
					<?php } } ?>
	        </table>
	        <div class="cart-summary"> 
	        	<?php if ( sizeof( $woocommerce->cart->cart_contents ) > 0 ): ?>
		            <div class="row text-lg">
		                <div class="col-7 text-right text-muted"><?php esc_html_e('Total','soup'); ?>:</div> 
	        			<?php $total = $woocommerce->cart->get_cart_total(); ?>
		                <div class="col-5"><strong><?php printf( esc_html__('%1$s','soup'),$total); ?></strong></div>
		            </div>
				<?php else: ?>
					<p><?php esc_html_e( 'No products in the cart.', 'soup' ); ?></p>
				<?php endif; ?>	
	        </div>
		<?php else : ?>
			<p><?php esc_html_e( 'No products in the cart.', 'soup' ); ?></p>
		<?php endif; ?> </form>
    </div>
	<?php 
} 
// product item count with ajax
add_filter( 'woocommerce_add_to_cart_fragments', 'soup_woocommerce_header_add_to_cart_fragment_2',10,1 );
function soup_woocommerce_header_add_to_cart_fragment_2( $fragments ) {
		global $woocommerce;
	ob_start();
	?>
    <div class="panel-cart-content minc-list">
    	<form action="" class="sp-mincart" method="post">
		<?php if ( class_exists( 'WooCommerce' ) ) : ?>
	        <table class="table-cart min">
				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) { ?>        	
		            <tr>
		                <td class="title">
		                    <span class="name"><a href="#" data-toggle="modal"><?php echo apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product);?></a></span>
		                    <span class="caption text-muted"> 
		                    <?php  
								$item_id = ( !empty( $cart_item['variation_id'] ) ) ? $cart_item['variation_id'] : '';
								$V_product = new WC_Product_Variation( $item_id );
								$variation_data = $V_product->get_variation_attributes();
								$variation_detail = wc_get_formatted_variation( $variation_data, true ); 
								echo str_replace(",", "<br>", $variation_detail)  ; 
							 
								echo wc_get_formatted_cart_item_data( $cart_item ); 

							?> 
							</span>
		                </td>  
		                <td class="price">
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
		                 x <?php echo wc_price($_product->get_price());?></td>
		                <td class="actions"> 
		                    <!-- <a href="<?php //echo esc_url( wc_get_cart_remove_url( $cart_item_key ) );?>" class="action-icon"><i class="ti ti-close"></i></a> -->
		                    <a href="#" data-pid="<?php echo esc_attr($_product->get_id()); ?>" data-item_key="<?php echo esc_attr($cart_item_key); ?>" class="action-icon"><i class="ti ti-close"></i></a>
		                </td>
		            </tr>
				<?php } } ?>
	        </table>
	        <div class="cart-summary"> 
	        	<?php if ( sizeof( $woocommerce->cart->cart_contents ) > 0 ): ?> 
		            <div class="row text-lg">
		                <div class="col-7 text-right text-muted"><?php esc_html_e('Total','soup'); ?>:</div>
	        			<?php $total = $woocommerce->cart->get_cart_total(); ?>
		                <div class="col-5"><strong><?php printf( esc_html__('%1$s','soup'),$total); ?></strong></div>
		            </div>
				<?php else: ?>
					<p><?php esc_html_e( 'No products in the cart.', 'soup' ); ?></p>
				<?php endif; ?>	
	        </div>
		<?php else : ?>
			<p><?php esc_html_e( 'No products in the cart.', 'soup' ); ?></p>
		<?php endif; ?> </form>
    </div>
	<?php
	$fragments['div.minc-list'] = ob_get_clean();
	return $fragments;
}
 

/**=====================================================================
 *  woocommerce min cart mobile
=====================================================================*/ 

function soup_woocommere_min_cart_mobile(){
	global $woocommerce;
	?>  
	<span class="notification"><?php if ( class_exists( 'WooCommerce' ) ) { echo wp_kses_post($woocommerce->cart->cart_contents_count); }else{ echo '0'; } ?></span> 
	<?php 
} 
// product item count with ajax
add_filter( 'woocommerce_add_to_cart_fragments', 'soup_woocommerce_header_add_to_cart_fragment_mobile' );
function soup_woocommerce_header_add_to_cart_fragment_mobile( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<span class="notification"><?php if ( class_exists( 'WooCommerce' ) ) { echo wp_kses_post($woocommerce->cart->cart_contents_count); }else{ echo '0'; } ?></span> 
	<?php
	$fragments['.notification'] = ob_get_clean();
	return $fragments;
}

// redux redirect false
add_action( 'redux/construct', 'radium_remove_as_plugin_flag' ); 
function radium_remove_as_plugin_flag() {
	ReduxFramework::$_as_plugin = false;
}

// custom css
function soup_custom_css(){
	global $soup;
	if($soup['pop_img']==1){
		$popup_title_bgimh = (!empty($soup['pop_up_bgimg']['url'])) ? $soup['pop_up_bgimg']['url'] : get_template_directory_uri().'/assets/img/photos/modal-add.jpg';
		?>
			<style>
				.modal-content .bg-image{
					background-image: url(<?php echo esc_attr($popup_title_bgimh); ?>);
				}
			</style>
		<?php
	}

}
add_action('wp_head','soup_custom_css');
