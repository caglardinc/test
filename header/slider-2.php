<?php 
/**
 * Slider 2
 */
?> 
    <section class="section section-main section-main-2 bg-dark dark">

        <div id="section-main-2-slider" class="section-slider inner-controls">
            <?php $soup_slider_cat = get_post_meta(get_the_ID(),'_soup_page_psldr_cat',true); ?>
            <?php $soup_slider = new WP_Query(
                array(
                    'post_type'=>'sliders',
                    'posts_per_page'=>-1,
                    'tax_query' => array(
                        array (
                            'taxonomy' => 'slider_cat',
                            'field' => 'slug',
                            'terms' => $soup_slider_cat,
                        )
                    ) 
                )
            ); ?>
            <?php while($soup_slider->have_posts()): $soup_slider->the_post(); ?> 
                <div class="slide">
                    <div class="bg-image zooming"><?php the_post_thumbnail(); ?></div>
                    <div class="container v-center">
                        <h1 class="display-2 mb-2"><?php the_title(); ?></h1>
                        <h4 class="text-muted mb-5"><?php echo get_post_meta(get_the_ID(),'_soup_slider_subttl',true); ?></h4>
                        <a href="<?php echo esc_url(get_post_meta(get_the_ID(),'_soup_slider_buton_link',true)); ?>" class="btn btn-outline-primary btn-lg"><span><?php echo get_post_meta(get_the_ID(),'_soup_slider_buton_txt',true); ?></span></a>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>  
        </div>

    </section>