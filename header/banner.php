<?php 
/**
 * Banner
 */ 
if(is_page()){
    $soup_pg_banr = get_post_meta(get_the_ID(),'_soup_page_banner',true);
    $soup_bnr_style = get_post_meta(get_the_ID(),'_soup_pg_bnr_typ',true);
}else{
	$soup_pg_banr = '';
    $soup_bnr_style = '';
}
?>
<div class="page-title bg-light">
    <?php if($soup_bnr_style=='img'): ?>
    	<div class="bg-image bg-parallax"><img src="<?php echo esc_url($soup_pg_banr); ?>" alt="<?php esc_attr_e('Banner','soup'); ?>"></div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 push-lg-4">
                <h1 class="mb-0"><?php echo soup_breadcrumb(); ?></h1>
                <h4 class="text-muted mb-0"><?php echo soup_breadcrumb_2(); ?></h4>
            </div>
        </div>
    </div>
</div>