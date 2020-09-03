<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Soup
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11"> 
    <?php 
    $soup_opt = new Soup();
    $soup_logo = $soup_opt->soup_logo();
    $soup_header_cart = $soup_opt->soup_header_cart_swithch();
    wp_head(); ?>
</head>
<body <?php body_class(); ?>> 

<div id="body-wrapper" class="animsition">
    <!-- Header -->
    <?php 
    global $soup;
    $soup_top = '';
    if(1!=$soup['open_close']){
        $soup_top = 'mt65';
    ?>
        <div class="container store-close-notice">
            <span><?php echo wp_kses_post($soup['open_close_msg']); ?></span>
        </div>
    <?php } ?>

    <?php
    $soup_hdr_style = '';
    $soup_logo_uniq = '';
    if(is_page()){
        $soup_hdr_style = get_post_meta(get_the_ID(),'_soup_pg_bnr_typ',true);
        $soup_logo_uniq = get_post_meta(get_the_ID(),'_soup_pg_uniq_logo',true);
    } ?>

    <header id="header" class="<?php echo esc_attr(($soup_hdr_style=='spvdo') ? 'absolute transparent' : 'light'); ?> <?php echo esc_attr($soup_top); ?>">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <?php if($soup_logo_uniq!=2): ?>
                        <!-- Logo -->
                        <div class="module module-logo dark">
                            <a href="<?php echo esc_url(home_url('/')); ?>"> 
                                <img src="<?php echo esc_url($soup_logo); ?>" alt="<?php esc_attr_e('Logo','soup'); ?>" >
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-7">
                    <!-- Navigation -->
                    <nav class="module module-navigation left mr-4">
                        <?php soup_main_menu(); ?> 
                    </nav> 
                </div>
                <?php if($soup_header_cart!=0): ?>
                    <div class="col-md-2">
                        <a href="#" class="module module-cart right" data-toggle="panel-cart">
                            <?php soup_woocommere_min_cart(); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </header>
    <!-- Header / End -->

    <!-- Header -->
    <header id="header-mobile" class="light">

        <div class="module module-nav-toggle">
            <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
        </div>    

        <div class="module module-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>"> 
                <img src="<?php echo esc_url($soup_logo); ?>" alt="<?php esc_attr_e('Logo','soup'); ?>">
            </a>
        </div>

        <?php if($soup_header_cart!=0): ?>
            <a href="#" class="module module-cart" data-toggle="panel-cart">
                <i class="ti ti-shopping-cart"></i>
                <?php soup_woocommere_min_cart_mobile(); ?>
            </a>
        <?php endif; ?>

    </header>
    <!-- Header / End -->

    <!-- Content -->
    <div id="content">
        
        <?php if(!is_single()): ?> 
            <?php 
                if(is_page()){
                    $soup_bnr_style = get_post_meta(get_the_ID(),'_soup_pg_bnr_typ',true);
                    $soup_slider_alias = get_post_meta(get_the_ID(),'_soup_rev_slider_alias',true);
                    $soup_slider_styl = get_post_meta(get_the_ID(),'_soup_pg_slider_styl',true);
                    if($soup_bnr_style=='pslidr'){ 
                        if($soup_slider_styl==1){
                            get_template_part('header/slider');
                        }else{
                            get_template_part('header/slider-2');
                        }
                    }elseif($soup_bnr_style=='rvslidr'){ 
                         putRevSlider($soup_slider_alias); 
                    }elseif($soup_bnr_style=='spvdo'){ 
                        get_template_part('header/video');  
                    }elseif($soup_bnr_style!='non'){
                       get_template_part('header/banner'); 
                   } 
                }else{
                    get_template_part('header/banner');
                }
            ?> 
        <?php endif; ?>

	<div class="site-content <?php echo is_page() ? '' : (is_404() ? '' : 'bg-light'); ?>">
