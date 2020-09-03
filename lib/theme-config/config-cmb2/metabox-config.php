<?php
/**
 * Cmb2 Metabox Fileds
 */

add_action( 'cmb2_admin_init', 'soup_metabox' ); 
function soup_metabox() { 

	//  prefix
	$prefix = '_soup_'; 
 
	/**=====================================================================
	 * metabox for page banner
	 =====================================================================*/ 
	$cmb2_Page_Banner = new_cmb2_box( array(
		'id'           => $prefix . '_soup_page_settings',
		'title'        => esc_html__( 'Header Settings', 'soup' ),
		'object_types' => array( 'page'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true
	) ); 
	$cmb2_Page_Banner->add_field( array(
		'name'    => esc_html__( 'Logo', 'soup' ),
		'id'      => $prefix . 'pg_uniq_logo',
		'type'    => 'radio_inline',
		'options' => array(
			'1'   => esc_html__( 'Show', 'soup' ),
			'2'   => esc_html__( 'Hide', 'soup' ) 
		),
		'default' => '1',
	    'desc'    => esc_html__( 'You can dsiplay or hide the logo for specifice page using this option.','soup' ),
	) ); 

	$cmb2_Page_Banner->add_field( array(
		'name'    => esc_html__( 'Banner Type', 'soup' ),
		'id'      => $prefix . 'pg_bnr_typ',
		'type'    => 'radio_inline',
		'options' => array(
			'img'   => esc_html__( 'Image', 'soup' ),
			'clr'   => esc_html__( 'Color', 'soup' ),
			'pslidr'   => esc_html__( 'Post Slider', 'soup' ), 
			'rvslidr'   => esc_html__( 'Rev Slider', 'soup' ), 
			'spvdo'   => esc_html__( 'Video', 'soup' ), 
			'non'   => esc_html__( 'None', 'soup' ) 
		),
		'default' => 'clr' 
	) ); 
	
	$cmb2_Page_Banner->add_field( array(
		'name'    => esc_html__( 'Slider Style', 'soup' ),
		'id'      => $prefix . 'pg_slider_styl',
		'type'    => 'radio_inline',
		'options' => array(
			'1'   => esc_html__( 'Box Style', 'soup' ),
			'2'   => esc_html__( 'Fullwidth Style', 'soup' ) 
		),
		'default' => '1' 
	) ); 
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Slider Category', 'soup' ),
	    'id'               => $prefix.'page_psldr_cat', 
	    'desc'             => esc_html__( 'Select a slider category to disiplay slider from your specified category.','soup' ),
	    'type'             => 'select',
	    'options_cb'       => 'soup_slider_terms',
	) ); 

	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Banner Image', 'soup' ),
	    'id'               => $prefix.'page_banner',
	    'desc'             => esc_html__( 'Upload individual page banner','soup' ),
	    'type'             => 'file',
	) );
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Banner Bg Color', 'soup' ),
	    'id'               => $prefix.'page_banner_clr',
	    'desc'             => esc_html__( 'Pick a color for banner.','soup' ),
	    'type'             => 'colorpicker',
	    'default'             => '#f3f4f4'
	) );
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Banner Text Color', 'soup' ),
	    'id'               => $prefix.'page_banner_txtclr',
	    'desc'             => esc_html__( 'Pick a color for banner text.','soup' ),
	    'type'             => 'colorpicker',
	    'default'          => ''
	) );

	if (class_exists('RevSlider')) {
		global $wpdb;
		$soup_id = 99999; 
 
		$soup_rs = $wpdb->get_results( 
			$wpdb->prepare( 
				"SELECT alias FROM {$wpdb->prefix}revslider_sliders WHERE id != %s",
				 $soup_id 
			) 
		);   

		$soup_revsliders = array();
		if ($soup_rs) {
			foreach ( $soup_rs as $soup_slider ) {
				$soup_revsliders[$soup_slider->alias] = $soup_slider->alias;
			}
		} else {
			$soup_revsliders["No sliders found"] = esc_html__('No Alias found','soup');
		}
		$cmb2_Page_Banner->add_field( array(
		    'name'             =>  esc_html__('Rev Slider Alias','soup' ), 
		    'id'               => $prefix.'rev_slider_alias',
		    'type'             => 'select',
		    'options'          => $soup_revsliders,
		    'default'          => '',
		    'desc'         	   => esc_html__( 'Select any One, Which One You want to display','soup' ),
			'show_option_none' => true,
		) );
	}
 
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Banner Title', 'soup' ),
	    'id'               => $prefix.'page_banner_title', 
	    'desc'             => esc_html__( 'Write banner title here. if keep empty then will display the default page title','soup' ),
	    'type'             => 'text',
	) ); 

	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Banner Sub Title', 'soup' ),
	    'id'               => $prefix.'page_banner_subtitle', 
	    'desc'             => esc_html__( 'Write banner sub title here. if keep empty then will display nothing.','soup' ),
	    'type'             => 'text',
	) ); 
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Video Logo', 'soup' ),
	    'id'               => $prefix.'page_vdo_logo', 
	    'desc'             => esc_html__( 'Upload an image from here..','soup' ),
	    'type'             => 'file',
	) ); 
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Title', 'soup' ),
	    'id'               => $prefix.'page_vdo_title', 
	    'desc'             => esc_html__( 'Write title here..','soup' ),
	    'type'             => 'text',
	) ); 
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Sub Title', 'soup' ),
	    'id'               => $prefix.'page_vdo_subtitle', 
	    'desc'             => esc_html__( 'Write sub title here.','soup' ),
	    'type'             => 'text',
	) ); 
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Background Video Url', 'soup' ),
	    'id'               => $prefix.'page_vdo_bgurl', 
	    'desc'             => esc_html__( 'Input youtube video url.','soup' ),
	    'type'             => 'text',
	) ); 
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Button Text', 'soup' ),
	    'id'               => $prefix.'page_vdo_btntxt', 
	    'desc'             => esc_html__( 'Write button text here.','soup' ),
	    'type'             => 'text',
	) ); 
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Button Link', 'soup' ),
	    'id'               => $prefix.'page_vdo_btnlink', 
	    'desc'             => esc_html__( 'Write button link here.','soup' ),
	    'type'             => 'text',
	) ); 

	/**=====================================================================
	 * metabox for footer
	 =====================================================================*/  
	$cmb2_Page_Banner = new_cmb2_box( array(
		'id'           => $prefix . '_soup_call2action_settings',
		'title'        => esc_html__( 'Footer Settings', 'soup' ),
		'object_types' => array( 'page'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true
	) ); 
	$cmb2_Page_Banner->add_field( array(
	    'name'             =>  esc_html__( 'Footer Style', 'soup' ),
	    'id'               => $prefix.'footer_type',
	    'type'             => 'radio_inline', 
	    'options'          => array(
    		'1' => esc_html__( 'Style One', 'soup' ), 
    		'2' => esc_html__( 'Style Two', 'soup' ) 
	    ),
	    'desc'             => esc_html__( 'Select any one above of them','soup' ),
	    'default'          => '1'
	) );   


	/**=====================================================================
	 * metabox for post sidebar
	 =====================================================================*/  
	$cmb2_post_sidebar = new_cmb2_box( array(
		'id'           => $prefix . '_soup_posts_sidebar',
		'title'        => esc_html__( 'Post Sidebar', 'soup' ),
		'object_types' => array( 'page'), // Post type
		'context'      => 'side',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_post_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Sidebar Type', 'soup' ),
	    'id'               => $prefix.'post_sidebar',
	    'desc'             => esc_html__( 'Select any one. which you want to display','soup' ),
	    'type'             => 'select',
	    'default'          => 'right',
	    'options'          => array(
	        'left'    => esc_html__( 'Left Sidebar', 'soup' ),
	        'right'   => esc_html__( 'Right Sidebar', 'soup' ),
	        'fullw'   => esc_html__( 'Box Width', 'soup' ),
	        'fulls'   => esc_html__( 'Full Width', 'soup' )
	    ),
	) ); 
	/**=====================================================================
	 * metabox for body color
	 =====================================================================*/  
	$cmb2_post_sidebar = new_cmb2_box( array(
		'id'           => $prefix . '_soup_posts_bodycloor',
		'title'        => esc_html__( 'Body Color Options', 'soup' ),
		'object_types' => array( 'page'), // Post type
		'context'      => 'side',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_post_sidebar->add_field( array(
	    'name'             =>  esc_html__( 'Select Color', 'soup' ),
	    'id'               => $prefix.'pgbdclr_sidebar',
	    'desc'             => esc_html__( 'Select any one. which you want to display','soup' ),
	    'type'             => 'select',
	    'default'          => 'light-clr',
	    'options'          => array(
	        'light-clr'    => esc_html__( 'Light', 'soup' ),
	        'dark-clr'   => esc_html__( 'Light Dark', 'soup' ) 
	    ),
	) ); 
	/**=====================================================================
	 * metabox for post sidebar
	 =====================================================================*/  
	$cmb2_post_slider = new_cmb2_box( array(
		'id'           => $prefix . '_soup_posts_slider',
		'title'        => esc_html__( 'Slider Options', 'soup' ),
		'object_types' => array( 'sliders'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_post_slider->add_field( array(
	    'name'             =>  esc_html__( 'Subtitle', 'soup' ),
	    'id'               => $prefix.'slider_subttl',
	    'desc'             => esc_html__( 'Write subtitle here.','soup' ),
	    'type'             => 'text',
	    'default'          => ''
	) );  

	$cmb2_post_slider->add_field( array(
	    'name'             =>  esc_html__( 'Subtitle Position', 'soup' ),
	    'id'               => $prefix.'slider_subttl_post',
	    'desc'             => esc_html__( 'Select any one. which you want to display','soup' ),
	    'type'             => 'select',
	    'default'          => 'right',
	    'options'          => array(
	        'top'    => esc_html__( 'Top of Title', 'soup' ),
	        'bot'   => esc_html__( 'Bellow of Title', 'soup' ) 
	    ),
	) );  
	$cmb2_post_slider->add_field( array(
	    'name'             =>  esc_html__( 'Button Text', 'soup' ),
	    'id'               => $prefix.'slider_buton_txt',
	    'desc'             => esc_html__( 'Write button text here.','soup' ),
	    'type'             => 'text',
	    'default'          => ''
	) ); 
	$cmb2_post_slider->add_field( array(
	    'name'             =>  esc_html__( 'Button Link', 'soup' ),
	    'id'               => $prefix.'slider_buton_link',
	    'desc'             => esc_html__( 'Input button link here.','soup' ),
	    'type'             => 'text',
	    'default'          => ''
	) ); 

	/**=====================================================================
	 * metabox for reviews
	 =====================================================================*/  
	$cmb2_post_reviews = new_cmb2_box( array(
		'id'           => $prefix . '_soup_reviews_options',
		'title'        => esc_html__( 'Reviews Options', 'soup' ),
		'object_types' => array( 'reviews'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_post_reviews->add_field( array(
	    'name'             =>  esc_html__( 'Avatar', 'soup' ),
	    'id'               => $prefix.'revie_image',
	    'desc'             => esc_html__( 'Upload avatar image here. If not upload image then will show the gravatar image instead via email.','soup' ),
	    'type'             => 'file',
	    'default'          => ''
	) );  
	$cmb2_post_reviews->add_field( array(
	    'name'             =>  esc_html__( 'Company', 'soup' ),
	    'id'               => $prefix.'revie_design',
	    'desc'             => esc_html__( 'Write your company name here.','soup' ),
	    'type'             => 'text',
	    'default'          => ''
	) );  
	$cmb2_post_reviews->add_field( array(
	    'name'             =>  esc_html__( 'Email', 'soup' ),
	    'id'               => $prefix.'revie_email',
	    'desc'             => esc_html__( 'Write your email here.','soup' ),
	    'type'             => 'text',
	    'default'          => ''
	) );  
	$cmb2_post_reviews->add_field( array(
	    'name'             =>  esc_html__( 'Your Rating', 'soup' ),
	    'id'               => $prefix.'revie_rat',
	    'desc'             => esc_html__( 'Provide your rating.','soup' ),
	    'type'             => 'select',
	    'default'          => '1',
	    'options'          => array(
	        '1'   => esc_html__( '1', 'soup' ),
	        '2'   => esc_html__( '2', 'soup' ), 
	        '3'   => esc_html__( '3', 'soup' ), 
	        '4'   => esc_html__( '4', 'soup' ), 
	        '5'   => esc_html__( '5', 'soup' )  
	    ),
	) );  

	/**=====================================================================
	 * metabox for offers
	 =====================================================================*/  
	$cmb2_offers_reviews = new_cmb2_box( array(
		'id'           => $prefix . '_soup_offers_options',
		'title'        => esc_html__( 'Offers Options', 'soup' ),
		'object_types' => array( 'offers'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_offers_reviews->add_field( array(
	    'name'             =>  esc_html__( 'Excerpt', 'soup' ),
	    'id'               => $prefix.'ofrs_subttl',
	    'desc'             => esc_html__( 'Input excerpt text here.','soup' ),
	    'type'             => 'text',
	    'default'          => '' 
	) );    
	$cmb2_offers_reviews->add_field( array(
	    'name'             =>  esc_html__( 'Product Link', 'soup' ),
	    'id'               => $prefix.'ofrs_productlnk',
	    'desc'             => esc_html__( 'Input product link here.','soup' ),
	    'type'             => 'text',
	    'default'          => '' 
	) );    
	$group_field_id = $cmb2_offers_reviews->add_field( array(
		'id'          => 'wiki_test_repeat_group',
		'type'        => 'group',
		'description' => esc_html__( 'Generates reusable form entries', 'soup' ),
		// 'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'   => esc_html__( 'Features {#}', 'soup' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Feature', 'soup' ),
			'remove_button' => esc_html__( 'Remove Feature', 'soup' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );
 
	$cmb2_offers_reviews->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Feature Text', 'soup' ),
		'id'   => 'fe_txt',
		'type' => 'text'
	) );

	$cmb2_offers_reviews->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Feature Enable', 'soup' ),
		'id'   => 'ft_enable',
		'type' => 'select',
	    'options'          => array(
    		'y' => esc_html__( 'Yes', 'soup' ), 
    		'n' => esc_html__( 'No', 'soup' ) 
	    )
	) );	
 
 
}

