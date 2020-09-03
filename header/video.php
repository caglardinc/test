<?php 
/**
 * Video
 */   
$soup_hvdo_logo = get_post_meta(get_the_ID(),'_soup_page_vdo_logo',true);
$soup_hvdo_title = get_post_meta(get_the_ID(),'_soup_page_vdo_title',true);
$soup_hvdo_subtitle = get_post_meta(get_the_ID(),'_soup_page_vdo_subtitle',true);
$soup_hvdo_url = get_post_meta(get_the_ID(),'_soup_page_vdo_bgurl',true);
$soup_hvdo_btntxt = get_post_meta(get_the_ID(),'_soup_page_vdo_btntxt',true);
$soup_hvdo_btnlink = get_post_meta(get_the_ID(),'_soup_page_vdo_btnlink',true);
?>
    <section class="section section-main section-main-2 bg-dark dark videohdr">
        <div class="bg-video" data-property="{videoURL:'<?php echo esc_url($soup_hvdo_url); ?>', showControls: false, containment:'self',startAt:1,stopAt:39,mute:true,autoPlay:true,loop:true,opacity:0.3,quality:'hd1080'}"></div>
        <div class="bg-image bg-video-placeholder zooming"><img src="<?php echo esc_url($soup_hvdo_logo); ?>" alt="<?php esc_attr_e('video logo','soup'); ?>"></div>
        <div class="container v-center text-center">
            <img src="<?php echo esc_url($soup_hvdo_logo); ?>" alt="<?php esc_attr_e('video logo','soup'); ?>" width="111" class="mb-5">
            <h1 class="display-2 mb-2"><?php echo esc_html($soup_hvdo_title); ?></h1>
            <h4 class="text-muted mb-5"><?php echo esc_html($soup_hvdo_subtitle); ?></h4>
            <?php if($soup_hvdo_btnlink): ?>
                <a href="<?php echo esc_url($soup_hvdo_btnlink); ?>" class="btn btn-outline-primary btn-lg"><span><?php echo esc_html($soup_hvdo_btntxt); ?></span></a>
            <?php endif; ?>
        </div>
    </section>
