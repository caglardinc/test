<?php 
/**
 * Slider 1
 */   
?> 
    <section class="section section-main section-main-1 bg-light">
        
        <div class="container dark">
            <div class="slide-container">
                <div id="section-main-1-carousel-image" class="image inner-controls">
                    <?php $soup_slider_cat = get_post_meta(get_the_ID(),'_soup_page_psldr_cat',true); ?>
                    <?php $soup_slider = new WP_Query(array('post_type'=>'sliders','posts_per_page'=>-1,
                        'tax_query' => array(
                            array (
                                'taxonomy' => 'slider_cat',
                                'field' => 'slug',
                                'terms' => $soup_slider_cat,
                            )
                        ) )); ?>
                    <?php while($soup_slider->have_posts()): $soup_slider->the_post(); ?>
                        <div class="slide"><div class="bg-image"><?php the_post_thumbnail(); ?></div></div>
                    <?php endwhile; wp_reset_postdata(); ?> 
                </div>
                <div class="content dark">
                    <div id="section-main-1-carousel-content"> 
                        <?php while($soup_slider->have_posts()): $soup_slider->the_post(); 
                        $soup_sldr_pos = get_post_meta(get_the_ID(),'_soup_slider_subttl_post',true); ?> 
                            <div class="content-inner">
                                <?php if($soup_sldr_pos=='top'): ?>
                                    <h4 class="text-muted"><?php echo get_post_meta(get_the_ID(),'_soup_slider_subttl',true); ?></h4>
                                <?php endif; ?>
                                <h1><?php the_title(); ?></h1>
                                <?php if($soup_sldr_pos!='top'): ?>
                                    <h5 class="text-muted mb-5"><?php echo get_post_meta(get_the_ID(),'_soup_slider_subttl',true); ?></h5>
                                <?php endif; ?>
                                <a href="<?php echo esc_url(get_post_meta(get_the_ID(),'_soup_slider_buton_link',true)); ?>" class="btn btn-outline-primary btn-lg"><span><?php echo get_post_meta(get_the_ID(),'_soup_slider_buton_txt',true); ?></span></a>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>  
                    </div>
                    <nav class="content-nav">
                        <a class="prev" href="#"><i class="ti-arrow-left"></i></a>
                        <a class="next" href="#"><i class="ti-arrow-right"></i></a>
                    </nav>
                </div>
            </div>
        </div>

    </section>