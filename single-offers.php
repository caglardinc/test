<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Soup
 */
global $soup;
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			while ( have_posts() ) : the_post(); ?>
		        <!-- Section -->
		        <section class="signleoffer section section-double border-top">
		            <div class="row no-gutters">
		                <div class="content col-xl-4 col-md-5 push-xl-8 push-md-7">
		                    <h2><?php the_title(); ?></h2>
		                    <p class="lead text-muted"><?php echo get_the_content(); ?></p>
		                    <ul class="list-check text-lg">
								<?php 
									$entries = get_post_meta( get_the_ID(), 'wiki_test_repeat_group', true ); 
									foreach ( (array) $entries as $key => $entry ) {
										$title = $enable = '';
										if ( isset( $entry['fe_txt'] ) ) {
											$title = esc_html( $entry['fe_txt'] );
										}
										if ( isset( $entry['ft_enable'] ) ) {
											$enable = $entry['ft_enable'] ;
										}
										if($enable=='y'){
											echo '<li>';
										}else{
											echo '<li class="false">';
										}
										echo wp_kses_post($title);
										echo '</li>';
									} 
								?> 
		                    </ul> 
		                    <?php $soup_product_offer = get_post_meta(get_the_ID(),'_soup_ofrs_productlnk',true); ?>
		                    <a href="<?php echo esc_url($soup_product_offer); ?>" class="btn btn-outline-primary"><span><?php esc_html_e('Go to checkout!','soup'); ?></span></a>
		                    <a href="javascript:history.back()" class="btn btn-link"><span><?php esc_html_e('Back','soup'); ?></span></a>
		                </div>
		                <div class="image col-xl-8 col-md-7 pull-xl-4 pull-md-5">
		                    <div class="bg-image"><?php the_post_thumbnail(); ?></div>
		                </div>
		            </div>
		        </section>
				<?php 
					$soup_banner_enable = (isset($soup['offersingle-enable'])) ? $soup['offersingle-enable'] : 0;  
					$soup_banner_title = (!empty($soup['offersingle-title'])) ? $soup['offersingle-title'] : '';  
					$soup_banner_subtitle = (!empty($soup['offersingle-subtitle'])) ? $soup['offersingle-subtitle'] : '';  
					$soup_banner_media = (!empty($soup['offersingle-banner']['url'])) ? $soup['offersingle-banner']['url'] : ''; 
					$soup_banner_lftbtn_lbl = (!empty($soup['offersingle-lftbtnlbl'])) ? $soup['offersingle-lftbtnlbl'] : esc_html__('Order Online','soup');  
					$soup_banner_lftbtn_urll = (!empty($soup['offersingle-lftbtnurll'])) ? $soup['offersingle-lftbtnurll'] : ''; 
					$soup_banner_rightbtn_lbl = (!empty($soup['offersingle-rightbtnlbl'])) ? $soup['offersingle-rightbtnlbl'] : esc_html__('Book a table','soup');  
					$soup_banner_rightbtn_urll = (!empty($soup['offersingle-rightbtnurll'])) ? $soup['offersingle-rightbtnurll'] : ''; 
					if($soup_banner_enable !=0): 
				?>
				    <!-- Section -->
				    <section class="section section-lg dark bg-dark">
				        <!-- BG Image -->
				        <div class="bg-image bg-parallax"><img src="<?php echo esc_url($soup_banner_media); ?>" alt="<?php esc_attr_e('Banner','soup'); ?>"></div>
				    
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
			<?php endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer();
