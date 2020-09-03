<?php 

class Soup{

    // logo
    public function soup_logo(){
        global $post,$soup; 
        if((isset($soup['logo-up']['url'])) && !empty($soup['logo-up']['url'])){
            return $soup['logo-up']['url'];
        }else{
            return get_template_directory_uri()."/assets/img/logo-light.svg";
        }  
        
    } 

    // header cart switch
    public function soup_header_cart_swithch(){
        global $soup; 
        if(isset($soup['cart-ico']) && $soup['cart-ico']!=''){
            return $soup['cart-ico'];
        }else{
            return 0;
        }

    }
	// checkout delivery switch
	public function soup_checkout_delivery_swithch(){
		global $soup; 
		if(isset($soup['chck-delver']) && $soup['chck-delver']!=''){
			return $soup['chck-delver'];
		}else{
			return 1;
		}

	}
	// footer widget switch
	public function soup_footer_widget_swithch(){
		global $soup; 
		if(isset($soup['footer-widget']) && $soup['footer-widget']!=''){
			return $soup['footer-widget'];
		}else{
			return 0;
		}

	}

    // copyright text
    public function soup_copyright_text(){
        global $soup;  
        if(isset($soup['copyright-text']) && !empty($soup['copyright-text'])){ ?>
           <span class="text-muted"><?php echo sprintf(esc_html__('%s','soup'),$soup['copyright-text']); ?></span>
        <?php }else{ ?> 
            <span class="text-muted"><?php echo sprintf(esc_html__('%s','soup'),"Copyright &copy; 2020 by ThemeBeer"); ?></span>
        <?php }
    } 
    // copyright text 2
    public function soup_copyright_text_2(){
        global $soup;  
        if(isset($soup['copyright-text-2']) && !empty($soup['copyright-text-2'])){ ?>
           <span class="text-muted"><?php echo sprintf(esc_html__('%s','soup'),$soup['copyright-text-2']); ?></span>
        <?php }else{ ?> 
            <span class="text-muted"><?php echo sprintf(esc_html__('%s','soup'),"Copyright &copy;<br> 2020 by ThemeBeer"); ?></span>
        <?php }
    } 

    // map api key
    public function soup_gmap_api_key(){
        global $soup;  
        if(isset($soup['map-api-key']) && !empty($soup['map-api-key'])){
            return $soup['map-api-key'];
        }else{ 
            return 'AIzaSyCMDppZqO6OGovhkcgaqd1Kj_pCTTzXUs4';
        }
    }  
    // map icon
    public function soup_gmap_icon(){
        global $soup;  
        if(isset($soup['map-icon']['url']) && !empty($soup['map-icon']['url'])){
            return $soup['map-icon']['url'];
        }else{ 
            return get_template_directory_uri().'/assets/img/location-pin.png';
        }
    }  
    // map icon
    public function soup_foter_2_lgo(){
        global $soup;  
        if(isset($soup['logo-ft2']['url']) && !empty($soup['logo-ft2']['url'])){
            return $soup['logo-ft2']['url'];
        }else{ 
            return get_template_directory_uri().'/assets/img/logo-light.png';
        }
    }  
    // footer style
    public function soup_footer_style(){
        global $soup;  
        if(isset($soup['spft-style']) ){
            return $soup['spft-style'];
        }else{ 
            return 1;
        }
    }  

    // footer style
    public function soup_footer_social_2(){
        global $soup;  
        $facbok = $soup['social-fb'];
        $goglplus = $soup['social-gl'];
        $twiter = $soup['social-tw'];
        $yotube = $soup['social-yt'];
        $instgram = $soup['social-in'];
        ?> 
            <?php if($facbok): ?>
                <a href="<?php echo esc_url($facbok); ?>" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
            <?php endif; ?>
            <?php if($goglplus): ?>
                <a href="<?php echo esc_url($goglplus); ?>" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
            <?php endif; ?>
            <?php if($twiter): ?>
                <a href="<?php echo esc_url($twiter); ?>" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
            <?php endif; ?>
            <?php if($yotube): ?>
                <a href="<?php echo esc_url($yotube); ?>" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
            <?php endif; ?>
            <?php if($instgram): ?>
                <a href="<?php echo esc_url($instgram); ?>" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
            <?php endif; ?> 
        <?php
    }  




}
