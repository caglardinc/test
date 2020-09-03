<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Soup
 */
global $soup;
$soup_opt = new Soup();
$soup_foter_sws = $soup_opt->soup_footer_widget_swithch(); 
$soup_foter_lgo = $soup_opt->soup_foter_2_lgo();  
$soup_logo = $soup_opt->soup_logo();
$soup_header_cart = $soup_opt->soup_header_cart_swithch();
?>

	</div><!-- #content -->
<?php  
if(is_page()){
    $soup_fotr_styl = get_post_meta(get_the_ID(),'_soup_footer_type',true);
}else{
    $soup_fotr_styl = $soup_opt->soup_footer_style();
}

if($soup_fotr_styl == 1){
?>
    <!-- Footer -->
    <footer id="footer" class="bg-dark dark">
        
        <div class="container"> 
            <?php if ( is_active_sidebar( 'sidebar-f' ) ): ?>
                <?php if($soup_foter_sws!=0): ?>
                    <!-- Footer 1st Row -->
                    <div class="footer-first-row row">
                        <?php dynamic_sidebar( 'sidebar-f' ); ?>
                    </div>              
                    <!-- Footer 2nd Row -->
                <?php endif; ?> 
            <?php endif; ?> 
            <div class="footer-second-row">
                <?php printf(esc_html__('%s','soup'),$soup_opt->soup_copyright_text()); ?> 
            </div>
        </div>

        <!-- Back To Top -->
        <a href="#" id="back-to-top"><i class="ti ti-angle-up"></i></a>

    </footer>
    <!-- Footer / End -->
<?php }else{ ?>
    <footer id="footer" class="bg-dark dark">
        
        <div class="container">
            <!-- Footer 2nd Row -->
            <div class="footer-second-row row align-items-center">
                <div class="col-lg-4 text-center text-md-left">
                    <span class="text-sm text-muted">
                        <?php printf(esc_html__('%s','soup'),$soup_opt->soup_copyright_text_2()); ?> 
                    </span>
                </div>
                <div class="col-lg-4 text-center">
                    <a href="<?php esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($soup_foter_lgo); ?>" alt="<?php esc_attr_e('Footer Logo','soup'); ?>" class="mt-5 mb-5 ft2"></a>
                </div>
                <div class="col-lg-4 col-md-6 text-center text-md-right"> 
                    <?php $soup_opt->soup_footer_social_2(); ?>
                </div>
            </div>
        </div>

        <!-- Back To Top -->
        <a href="#" id="back-to-top"><i class="ti ti-angle-up"></i></a>

    </footer>
<?php } ?>
    </div>
    <!-- Content / End -->

    <!-- Panel Cart -->
    <div id="panel-cart">
        <div class="panel-cart-container">
            <div class="panel-cart-title">
                <h5 class="title"><?php esc_html_e('Your Cart','soup'); ?></h5>
                <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
            </div>
            <?php soup_woocommere_min_cart_2(); ?>
        </div> 
        <a href="<?php if ( class_exists( 'WooCommerce' ) ) { echo esc_url(home_url('/').'checkout/'); } ?>" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span><?php esc_html_e('Go to checkout','soup'); ?></span></a>
    </div>

    <!-- Panel Mobile -->
    <nav id="panel-mobile">
        <div class="module module-logo bg-dark dark">
            <a href="<?php echo esc_url(home_url('/')); ?>"> 
                <img src="<?php echo esc_url($soup_logo); ?>" alt="<?php esc_attr_e('Logo','soup'); ?>" width="88">
            </a>
            <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
        </div>
        <nav class="module module-navigation"></nav>
        <div class="module module-social">
            <?php 
            $soup_mobile_follow_fb = (!empty($soup['follow-us-fb'])) ? $soup['follow-us-fb'] : '';
            $soup_mobile_follow_gp = (!empty($soup['follow-us-gp'])) ? $soup['follow-us-gp'] : '';
            $soup_mobile_follow_tw = (!empty($soup['follow-us-tw'])) ? $soup['follow-us-tw'] : '';
            $soup_mobile_follow_yt = (!empty($soup['follow-us-yt'])) ? $soup['follow-us-yt'] : '';
            $soup_mobile_follow_ins = (!empty($soup['follow-us-ins'])) ? $soup['follow-us-ins'] : '';
            if($soup['follow-us-mobile']!=0):
            ?> 
                <h6 class="text-sm mb-3"><?php esc_html_e('Follow Us!','soup'); ?></h6>
                <?php if($soup_mobile_follow_fb): ?>
                    <a href="<?php echo esc_url($soup_mobile_follow_fb); ?>" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                <?php endif; ?>
                <?php if($soup_mobile_follow_gp): ?>
                    <a href="<?php echo esc_url($soup_mobile_follow_gp); ?>" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
                <?php endif; ?>
                <?php if($soup_mobile_follow_tw): ?>
                    <a href="<?php echo esc_url($soup_mobile_follow_tw); ?>" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                <?php endif; ?>
                <?php if($soup_mobile_follow_yt): ?>
                    <a href="<?php echo esc_url($soup_mobile_follow_yt); ?>" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                <?php endif; ?>
                <?php if($soup_mobile_follow_ins): ?>
                    <a href="<?php echo esc_url($soup_mobile_follow_ins); ?>" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Modal / Product -->
    <div class="modal fade woocommerce" id="productModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
            </div>
        </div>
    </div>
     
    <!-- Body Overlay -->
    <div id="body-overlay"></div>

    <div id="added" style="display: none;"><span><?php esc_html_e('Added','soup'); ?></span></div>

</div>
 
</div> 


<?php wp_footer(); ?>

</body>
</html>
