<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

    <div class="page-content">
        <div class="container">
        	<div class="row">
                <div class="row no-gutters"> 
                    <div class="col-md-12"> 
                        <div class="menu-category"> 
                            <div class="menu-category-content padded">
                                <div class="row gutters-sm">  
					            	<?php while(have_posts()): the_post(); ?>
	                                    <div class="col-lg-3 col-md-3 col-6">
	                                        <!-- Menu Item -->
	                                        <div class="menu-item menu-grid-item">
	                                        	<?php the_post_thumbnail('soup-product-grid',array('class'=>'mb-4')); ?> 
	                                            <h6 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
	                                            <span class="text-muted text-sm"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></span>
	                                            <div class="row align-items-center mt-4">
	                                                <div class="col-sm-6"><span class="text-md mr-4"><?php echo soup_variation_price_format(); ?></span></div>
	                                                <div class="col-sm-6 text-sm-right mt-2 mt-sm-0 popup">
			                                            <?php global $soup;
			                                            if(1==$soup['open_close']): ?>
			                                            <button class="btn btn-outline-secondary btn-sm ptom" data-target="#productModal" data-pid="<?php echo get_the_ID(); ?>" data-toggle="modal"><span><?php global $product; echo esc_html( $product->single_add_to_cart_text() ); ?></span></button>
			                                            <?php else: ?>
			                                            	<button class="btn btn-outline-secondary btn-sm ptom"><span><?php esc_html_e('Store Close','soup'); ?></span></button>
			                                            <?php endif; ?>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>  
									<?php endwhile; wp_reset_postdata(); ?> 
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer( 'shop' ); ?>
