<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

    <!-- Section -->
    <?php while ( have_posts() ) : the_post(); ?>
        <section class="section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-2">
                        <!-- Product Single -->
                        <div class="product-single">
                            <?php if(has_post_thumbnail()): ?>
                                <div class="product-image">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                            <?php endif; ?>
                            <div class="product-content singlepropop">
                                <div class="product-header text-center">
                                    <h1 class="product-title"><?php the_title(); ?></h1>
                                    <span class="product-caption text-muted"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></span>
                                    <h4 class="mid-price"><?php echo soup_variation_price_format(); ?></h4>
                                </div>
                                <p class="lead"><?php echo get_the_content(); ?></p>
                                <hr class="hr-primary">
                                <h5 class="text-center text-muted"><?php esc_html_e('Order details','soup'); ?></h5>
                                <div class="panel-details-container popsoup">
                                    <?php do_action( 'woocommerce_single_product_cart' ); ?> 
                                </div>  
                                <div class="backbtn mt-4">
                                    <a href="javascript:history.back()" class="btn btn-link"><?php esc_html_e('Back to menu','soup'); ?></a>
                                </div>

                            </div>

                            <?php 
                                $soup_review_enable = (isset($soup['singlepro-review-enable'])) ? $soup['singlepro-review-enable'] : 0;  
                                $soup_review_title = (!empty($soup['singlepro-review-title'])) ? $soup['singlepro-review-title'] : esc_html__('Reviews','soup');   
                                $soup_review_num = (!empty($soup['singlepro-review-num'])) ? $soup['singlepro-review-num'] : 2;   
                                if($soup_review_enable !=0): 
                            ?> 
                                <h3 class="mt-5 mb-5 text-center"><?php echo esc_html($soup_review_title); ?></h3>
                                <!-- Blockquote -->
                                <?php $soup_review = new WP_Query(array('post_type'=>'reviews','posts_per_page'=> $soup_review_num)); ?>
                                <?php while($soup_review->have_posts()): $soup_review->the_post(); 
                                $reviews_desig = get_post_meta(get_the_ID(),'_soup_revie_design',true);
                                $reviews_star = get_post_meta(get_the_ID(),'_soup_revie_rat',true);
                                $reviews_email = get_post_meta(get_the_ID(),'_soup_revie_email',true);
                                ?>                          
                                    <blockquote class="blockquote blockquote-lg" data-center-top="filter: blur(0); transform: scale(1);" data-bottom-top="transform: scale(0.9);">
                                        <div class="blockquote-content dark">
                                            <div class="rate rate-sm mb-3">
                                                <?php 
                                                $rat = 5; 
                                                for ($i=1; $i <=$rat ; $i++) { ?>
                                                    <i class="fa fa-star <?php echo esc_attr(($i<=$reviews_star) ? 'active' : ''); ?>"></i>
                                                <?php } ?> 
                                            </div>
                                            <?php the_content(); ?>
                                        </div>
                                        <footer>
                                            <?php 
                                            $getuseremail = $reviews_email;
                                            $usergravatar = 'http://www.gravatar.com/avatar/' . md5($getuseremail) . '?s=32';
                                            echo '<img src="' . $usergravatar . '" class="wpb_gravatar"  alt="'.esc_attr('Gravatar','soup').'"/>';
                                            ?> 
                                            <span class="name"><?php the_title(); ?><span class="text-muted"><?php echo esc_attr(($reviews_desig!='') ? ', '.$reviews_desig : ''); ?></span></span>
                                        </footer>
                                    </blockquote> 
                                <?php endwhile; wp_reset_postdata(); ?> 
                            <?php endif; ?>  
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section -->
        <?php 
            $soup_banner_enable = (isset($soup['singlprod-enable'])) ? $soup['singlprod-enable'] : 0;  
            $soup_banner_title = (!empty($soup['singlprod-title'])) ? $soup['singlprod-title'] : '';  
            $soup_banner_subtitle = (!empty($soup['singlprod-subtitle'])) ? $soup['singlprod-subtitle'] : '';  
            $soup_banner_media = (!empty($soup['singlprod-banner']['url'])) ? $soup['singlprod-banner']['url'] : ''; 
            $soup_banner_lftbtn_lbl = (!empty($soup['singlprod-lftbtnlbl'])) ? $soup['singlprod-lftbtnlbl'] : 'Order Online';  
            $soup_banner_lftbtn_urll = (!empty($soup['singlprod-lftbtnurll'])) ? $soup['singlprod-lftbtnurll'] : ''; 
            $soup_banner_rightbtn_lbl = (!empty($soup['singlprod-rightbtnlbl'])) ? $soup['singlprod-rightbtnlbl'] : 'Book a table';  
            $soup_banner_rightbtn_urll = (!empty($soup['singlprod-rightbtnurll'])) ? $soup['singlprod-rightbtnurll'] : ''; 
            if($soup_banner_enable !=0): 
        ?>
            <!-- Section -->
            <section class="section section-lg dark bg-dark">
                <!-- BG Image -->
                <div class="bg-image bg-parallax"><img src="<?php echo esc_url($soup_banner_media); ?>" alt="<?php esc_attr_e('banner','soup'); ?>"></div>
            
                <div class="container text-center">
                    <div class="col-lg-8 push-lg-2">
                        <h2 class="mb-3"><?php echo esc_html($soup_banner_title); ?></h2>
                        <h5 class="text-muted"><?php echo esc_html($soup_banner_subtitle); ?></h5>
                        <a href="<?php echo esc_url($soup_banner_lftbtn_urll); ?>" class="btn btn-primary"><span><?php echo esc_html($soup_banner_lftbtn_lbl); ?></span></a>
                        <a href="<?php echo esc_url($soup_banner_rightbtn_urll); ?>" class="btn btn-outline-primary"><span><?php echo esc_html($soup_banner_rightbtn_lbl); ?></span></a>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; // end of the loop. ?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
