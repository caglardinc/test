<?php 

// disable full scren
vc_add_param( 'vc_row' , array(
      "type" => "checkbox",
      "heading" => esc_html__("Enable Inner Container","soup"),
      "param_name" => "enable_full_screen",
	  "value" => array( esc_html__("Yes", "soup") => 'yes') ,
      "description" => ""
));

// Display services item
vc_map( 
    array(
		'name' => esc_html__('Services Item', 'soup'),
		'base' => 'services_item_text',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array( 
			array(
				'type' => 'textfield',
				'heading' => esc_html__(' Title', 'soup'),
				'param_name' => 'sit_title',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write title here.', 'soup')
			), 
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Short Text', 'soup'),
				'param_name' => 'sit_text',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write short text here.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Button Text', 'soup'),
				'param_name' => 'sit_bttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write button text here.', 'soup')
			) , 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Button Link', 'soup'),
				'param_name' => 'sit_bturl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Input button link here.', 'soup')
			)  	
		)   
	) 
); 
// Display Visit Us 
vc_map( 
    array(
		'name' => esc_html__('Visit Us', 'soup'),
		'base' => 'like_to_visit_us',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array( 
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image', 'soup'),
				'param_name' => 'tvu_bgimg',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write title here.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'soup'),
				'param_name' => 'tvu_ttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write title here.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Subtitle', 'soup'),
				'param_name' => 'tvu_subttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write short text here.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Left Button Text', 'soup'),
				'param_name' => 'tvu_lftttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write button text here.', 'soup')
			) , 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Left Button Link', 'soup'),
				'param_name' => 'tvu_lfturl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Input button link here.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Right Button Text', 'soup'),
				'param_name' => 'tvu_rftttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write button text here.', 'soup')
			) , 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Right Button Link', 'soup'),
				'param_name' => 'tvu_rfturl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Input button link here.', 'soup')
			)  	
		)   
	) 
); 
// Display Gallery Slider 
vc_map( 
    array(
		'name' => esc_html__('Gallery Slider', 'soup'),
		'base' => 's_gallery_slider',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array( 
			array(
				'type' => 'attach_images',
				'heading' => esc_html__('Upload Multiple Images', 'soup'),
				'param_name' => 'glr_sldr_img',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Upload multiple images for gallery slider.', 'soup')
			) 	
		)   
	) 
); 
// Display FAQ
vc_map( 
    array(
		'name' => esc_html__('FAQ', 'soup'),
		'base' => 'faq_page',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Section Title', 'soup'),
                'param_name' => 'faq_sub_secttl',
                'description' => esc_html__('Write section title here', 'soup')
            ),
            // params group
            array(
				'heading' => esc_html__('Main Section Part', 'soup'),
                'type' => 'param_group',
                'value' => '',
                'param_name' => 'faq_main',
                // Note params is mapped inside param-group:
                'params' => array( 
                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => esc_html__('Menu Title', 'soup'),
                        'param_name' => 'faq_menuttl',
                        'description' => esc_html__('Write menu title here', 'soup')
                    ),
                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => esc_html__('Section Icon', 'soup'),
                        'param_name' => 'faq_sec_ico',
                        'description' => esc_html__('put font awesome icon class here. it will display before title.', 'soup')
                    ),
                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => esc_html__('Section Title', 'soup'),
                        'param_name' => 'faq_secttl',
                        'description' => esc_html__('Write section title here', 'soup')
                    ),
		            // params group
		            array(
						'heading' => esc_html__('Sub Section Part', 'soup'),
		                'type' => 'param_group',
		                'value' => '',
		                'param_name' => 'faq_sub',
		                // Note params is mapped inside param-group:
		                'params' => array( 
		                    array(
		                        'type' => 'textfield',
		                        'value' => '',
		                        'heading' => esc_html__('Menu Sub Title', 'soup'),
		                        'param_name' => 'faq_submnu_ttl',
		                        'description' => esc_html__('Write menu title here', 'soup')
		                    ), 
		                    array(
		                        'type' => 'textarea',
		                        'value' => '',
		                        'heading' => esc_html__('Section Sub Text', 'soup'),
		                        'param_name' => 'faq_sec_subtxt',
		                        'description' => esc_html__('Write section short text here', 'soup')
		                    )
		                )
		            ) 
                )
            ) 	
		)   
	) 
); 

// Display About Section 
vc_map( 
    array(
		'name' => esc_html__('About', 'soup'),
		'base' => 'about_us_page',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array( 
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Profile Image', 'soup'),
				'param_name' => 'abtus_prof_img',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Upload profile image.', 'soup')
			), 
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Rating', 'soup'),
				'param_name' => 'abtus_star_rat',
				'value' => array(
					esc_html__('1','soup') => '1',
					esc_html__('2','soup') => '2',
					esc_html__('3','soup') => '3',
					esc_html__('4','soup') => '4',
					esc_html__('5','soup') => '5'  
					),
				'admin_label' => true,
                'description' => esc_html__('Select a order.', 'soup')
			), 
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Section Titlet', 'soup'),
                'param_name' => 'abtus_sec_ttl',
                'description' => esc_html__('Write section title here', 'soup')
            ), 
            array(
                'type' => 'textarea_html',
                'value' => '',
                'heading' => esc_html__('Section Description', 'soup'),
                'param_name' => 'content',
                'description' => esc_html__('Write section description here', 'soup')
            ), 
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Name And Designation', 'soup'),
                'param_name' => 'abtus_sec_nmdg',
                'description' => esc_html__('Write name and designation with comma (,)', 'soup')
            ),  
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Signature Image', 'soup'),
				'param_name' => 'abtus_prof_sign',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Upload signature image.', 'soup')
			),  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Question', 'soup'),
				'param_name' => 'abtus_sec_abtus',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Upload signature image.', 'soup')
			), 
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Button Label', 'soup'),
                'param_name' => 'abtus_sec_btnlbl',
                'description' => esc_html__('Write button label here.', 'soup')
            ), 
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Button Link', 'soup'),
                'param_name' => 'abtus_sec_btnlnk',
                'description' => esc_html__('Input button link here.', 'soup')
            ) 	
		)   
	) 
); 

// Display Contact Info  
vc_map( 
    array(
		'name' => esc_html__('Contact Info', 'soup'),
		'base' => 'contact_info',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(
            array(
                'type' => 'attach_image',
                'value' => '',
                'heading' => esc_html__('Upload Logo', 'soup'),
                'param_name' => 'cinfo_logo',
                'description' => esc_html__('Write section title here', 'soup')
            ),
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Logo Width', 'soup'),
                'param_name' => 'cinfo_logo_w',
                'description' => esc_html__('Insert logo width value with pixel. ex. 100px', 'soup')
            ),
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Logo Height', 'soup'),
                'param_name' => 'cinfo_logo_h',
                'description' => esc_html__('Insert logo height value with pixel. ex. 100px', 'soup')
            ),
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Title', 'soup'),
                'param_name' => 'cinfo_title',
                'description' => esc_html__('Write section title here', 'soup')
            ),
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Address', 'soup'),
                'param_name' => 'cinfo_addres',
                'description' => esc_html__('Write address here', 'soup')
            ),
            // params group
            array(
				'heading' => esc_html__('Mailing Info', 'soup'),
                'type' => 'param_group',
                'value' => '',
                'param_name' => 'cinfo_mailing',
                // Note params is mapped inside param-group:
                'params' => array( 
                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => esc_html__('Title', 'soup'),
                        'param_name' => 'cinfo_ml_ttl',
                        'description' => esc_html__('Write title here', 'soup')
                    ),
                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => esc_html__('Text', 'soup'),
                        'param_name' => 'cinfo_ml_txt',
                        'description' => esc_html__('Write text here.', 'soup')
                    )  
                )
            ),
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Social Title', 'soup'),
                'param_name' => 'cinfo_social',
                'description' => esc_html__('Write address here', 'soup')
            ), 
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Facebook Link', 'soup'),
                'param_name' => 'cinfo_scl_fb',
                'description' => esc_html__('Input facebook link here', 'soup')
            ),
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Google Plus Link', 'soup'),
                'param_name' => 'cinfo_scl_gp',
                'description' => esc_html__('Input google plus link here', 'soup')
            ),
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Twitter Link', 'soup'),
                'param_name' => 'cinfo_scl_tw',
                'description' => esc_html__('Input twitter link here', 'soup')
            ),
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Youtube Link', 'soup'),
                'param_name' => 'cinfo_scl_yt',
                'description' => esc_html__('Input youtube link here', 'soup')
            ),
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Instagram Link', 'soup'),
                'param_name' => 'cinfo_scl_in',
                'description' => esc_html__('Input instagram link here', 'soup')
            ) 
		)   
	) 
); 
// Display Contact Map 
vc_map( 
    array(
		'name' => esc_html__('Contact Map', 'soup'),
		'base' => 'contact_map',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array( 
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Profile Image', 'soup'),
				'param_name' => 'abtus_prof_img',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Upload profile image.', 'soup')
			),  
		)   
	) 
); 
// Display Contact Map 
vc_map( 
    array(
		'name' => esc_html__('Offers', 'soup'),
		'base' => 'offers_page',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array( 
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image', 'soup'),
				'param_name' => 'ofr_img',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Upload an image.', 'soup')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'soup'),
				'param_name' => 'ofr_title',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write title here.', 'soup')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Sub Title', 'soup'),
				'param_name' => 'ofr_subtitle',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write sub title here.', 'soup')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Number of Offer to Show', 'soup'),
				'param_name' => 'ofr_post_count',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Input numeric value here.', 'soup')
			),
            // params group
            array(
				'heading' => esc_html__('Add Features', 'soup'),
                'type' => 'param_group',
                'value' => '',
                'param_name' => 'ofr_features',
                // Note params is mapped inside param-group:
                'params' => array( 
                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => esc_html__('Feature Text', 'soup'),
                        'param_name' => 'ofr_ftr_txt',
                        'description' => esc_html__('Write feature here.', 'soup')
                    ), 
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Highlight This Feature?', 'soup'),
						'param_name' => 'ofr_ysno',
						'value' => array(
							esc_html__('Yes','soup') => '1',
							esc_html__('No','soup') => '2'  
							),
						'admin_label' => true,
		                'description' => esc_html__('Select one of them.', 'soup')
					) 
                )
            )  
		)   
	) 
); 


// Display Navigation List 
vc_map( 
    array(
		'name' => esc_html__('List Navigation (Deprecated)', 'soup'),
		'base' => 'list_navigation',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Category Slug', 'soup'),
                'param_name' => 'list_nvg_catslug',
                'description' => esc_html__('Insert category slug using comma (,) here.', 'soup')
            ), 
		)   
	) 
); 
// Display list collapse
vc_map( 
    array(
		'name' => esc_html__('List Collapse (Deprecated)', 'soup'),
		'base' => 'list_collapse',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array( 
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Category Slug', 'soup'),
                'param_name' => 'list_catslug',
                'description' => esc_html__('Insert category slug using comma (,) here.', 'soup')
            ), 
		)   
	) 
); 
// Display grid Navigation 
vc_map( 
    array(
		'name' => esc_html__('Grid Navigation (Deprecated)', 'soup'),
		'base' => 'grid_navigation',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array( 
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Category Slug', 'soup'),
                'param_name' => 'list_catslug',
                'description' => esc_html__('Insert category slug using comma (,) here.', 'soup')
            ),  
		)   
	) 
); 
// Display grid collapse 
vc_map( 
    array(
		'name' => esc_html__('Grid Collapse (Deprecated) ', 'soup'),
		'base' => 'grid_collapse',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Category Slug', 'soup'),
                'param_name' => 'list_catslug',
                'description' => esc_html__('Insert category slug using comma (,) here.', 'soup')
            ),     
		)   
	) 
); 


// New Addition -  update
vc_map( 
    array(
		'name' => esc_html__('List Navigation (Update)', 'soup'),
		'base' => 'list_navigation_new',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Exclude Categories', 'soup'),
                'param_name' => 'list_nvg_catslug',
                'group' => esc_html__('Category', 'soup'),
                'description' => esc_html__('Insert category ID using comma (,) here.', 'soup')
            ), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Order', 'soup'),
				'param_name' => 'cat_porder',
                'group' => esc_html__('Category', 'soup'), 
                'description' => esc_html__('Insert ASC or DESC.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Orderby', 'soup'),
				'param_name' => 'cat_orderby',
                'group' => esc_html__('Category', 'soup'), 
                'description' => esc_html__('Insert name, slug or ID', 'soup')
			),  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Order', 'soup'),
				'param_name' => 'prod_order',
                'group' => esc_html__('Product', 'soup'), 
                'description' => esc_html__('Insert ASC or DESC.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Orderby', 'soup'),
				'param_name' => 'prod_orderby',
                'group' => esc_html__('Product', 'soup'),
                'description' => esc_html__('Insert none, ID, title, name (slug), date, or menu_order', 'soup')
			),   
		)    
	) 
); 
// New Addition -  update
vc_map( 
    array(
		'name' => esc_html__('List Collapse (Update)', 'soup'),
		'base' => 'list_collapse_new',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(  
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Exclude Categories', 'soup'),
                'param_name' => 'list_catslug',
                'group' => esc_html__('Category', 'soup'),
                'description' => esc_html__('Insert category ID using comma (,) here.', 'soup')
            ), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Order', 'soup'),
				'param_name' => 'cat_porder',
                'group' => esc_html__('Category', 'soup'), 
                'description' => esc_html__('Insert ASC or DESC.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Orderby', 'soup'),
				'param_name' => 'cat_orderby',
                'group' => esc_html__('Category', 'soup'), 
                'description' => esc_html__('Insert name, slug or ID', 'soup')
			),  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Order', 'soup'),
				'param_name' => 'prod_order',
                'group' => esc_html__('Product', 'soup'), 
                'description' => esc_html__('Insert ASC or DESC.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Orderby', 'soup'),
				'param_name' => 'prod_orderby',
                'group' => esc_html__('Product', 'soup'),
                'description' => esc_html__('Insert none, ID, title, name (slug), date, or menu_order', 'soup')
			),   
		)   
	) 
); 
// New Addition -  update
vc_map( 
    array(
		'name' => esc_html__('Grid Navigation (Update)', 'soup'),
		'base' => 'grid_navigation_new',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(  
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Exclude Categories', 'soup'),
                'param_name' => 'list_catslug',
                'group' => esc_html__('Category', 'soup'),
                'description' => esc_html__('Insert category ID using comma (,) here.', 'soup')
            ), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Order', 'soup'),
				'param_name' => 'cat_porder',
                'group' => esc_html__('Category', 'soup'), 
                'description' => esc_html__('Insert ASC or DESC.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Orderby', 'soup'),
				'param_name' => 'cat_orderby',
                'group' => esc_html__('Category', 'soup'), 
                'description' => esc_html__('Insert name, slug or ID', 'soup')
			),  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Order', 'soup'),
				'param_name' => 'prod_order',
                'group' => esc_html__('Product', 'soup'), 
                'description' => esc_html__('Insert ASC or DESC.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Orderby', 'soup'),
				'param_name' => 'prod_orderby',
                'group' => esc_html__('Product', 'soup'),
                'description' => esc_html__('Insert none, ID, title, name (slug), date, or menu_order', 'soup')
			),   
		)   
	) 
); 
// New Addition -  update 
vc_map( 
    array(
		'name' => esc_html__('Grid Collapse (Update)', 'soup'),
		'base' => 'grid_collapse_new',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => esc_html__('Exclude Categories', 'soup'),
                'param_name' => 'list_catslug',
                'group' => esc_html__('Category', 'soup'),
                'description' => esc_html__('Insert category ID using comma (,) here.', 'soup')
            ), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Order', 'soup'),
				'param_name' => 'cat_porder',
                'group' => esc_html__('Category', 'soup'), 
                'description' => esc_html__('Insert ASC or DESC.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Orderby', 'soup'),
				'param_name' => 'cat_orderby',
                'group' => esc_html__('Category', 'soup'), 
                'description' => esc_html__('Insert name, slug or ID', 'soup')
			),  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Order', 'soup'),
				'param_name' => 'prod_order',
                'group' => esc_html__('Product', 'soup'), 
                'description' => esc_html__('Insert ASC or DESC.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Orderby', 'soup'),
				'param_name' => 'prod_orderby',
                'group' => esc_html__('Product', 'soup'),
                'description' => esc_html__('Insert none, ID, title, name (slug), date, or menu_order', 'soup')
			),   
		)   
	) 
); 

// Display Reviews
vc_map( 
    array(
		'name' => esc_html__('All Reviews', 'soup'),
		'base' => 'page_review_display',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Number of Reviews to Show', 'soup'),
				'param_name' => 'rvw_post_pag',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Input number here.', 'soup')
			),   
		)   
	) 
); 
// Display Reviews Home
vc_map( 
    array(
		'name' => esc_html__('Reviews With Image', 'soup'),
		'base' => 'home_review_display',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Your Rate', 'soup'),
				'param_name' => 'h1_rating',
				'value' => array(
					esc_html__('1','soup') => '1',
					esc_html__('2','soup') => '2',  
					esc_html__('3','soup') => '3',  
					esc_html__('4','soup') => '4',  
					esc_html__('5','soup') => '5'  
					),
				'admin_label' => true,
                'description' => esc_html__('Provide your rating.', 'soup')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'soup'),
				'param_name' => 'h1_ttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write Section title here.', 'soup')
			), 
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Short Text', 'soup'),
				'param_name' => 'h1_sbttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write Section title here.', 'soup')
			),  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Number of Review to Show', 'soup'),
				'param_name' => 'h1_rating_prg',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Select a team member which you want to show.', 'soup')
			) ,  
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Section BG Image', 'soup'),
				'param_name' => 'h1_rat_bgimg',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Upload an image for section background.', 'soup')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Image Position', 'soup'),
				'param_name' => 'h1_img_pos',
				'value' => array(
					esc_html__('Left','soup') => 1,
					esc_html__('Right','soup') => 2   
					),
				'admin_label' => true,
                'description' => esc_html__('Select position.', 'soup')
			),   
		)   
	) 
); 
// Display Promo
vc_map( 
    array(
		'name' => esc_html__('Promo Info', 'soup'),
		'base' => 'page_promo_info',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Position', 'soup'),
				'param_name' => 'prmo_pos',
				'value' => array(
					esc_html__('Left','soup') => 1,
					esc_html__('Right','soup') => 2  
					),
				'admin_label' => true,
                'description' => esc_html__('Select one of them.', 'soup')
			),  
            // params group
            array(
				'heading' => esc_html__('Add Promo Feature', 'soup'),
                'type' => 'param_group',
                'value' => '',
                'param_name' => 'prmo_features',
                // Note params is mapped inside param-group:
                'params' => array( 
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title', 'soup'),
						'param_name' => 'prmo_f_ttl',
						'value' => '',
						'admin_label' => true,
                        'description' => esc_html__('Write title here.', 'soup')
					), 
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Sub Title', 'soup'),
						'param_name' => 'prmo_f_sbttl',
						'value' => '',
						'admin_label' => true,
                        'description' => esc_html__('Write subtitle here.', 'soup')
					), 
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Icon Class', 'soup'),
						'param_name' => 'prmo_f_ico',
						'value' => '',
						'admin_label' => true,
                        'description' => esc_html__('Input font-awesome icon class here.', 'soup')
					), 
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Link', 'soup'),
						'param_name' => 'prmo_f_link',
						'value' => '',
						'admin_label' => true,
                        'description' => esc_html__('Input custom link here.', 'soup')
					)
                )
            )   
		)   
	) 
); 
// Display Menu Slider
vc_map( 
    array(
		'name' => esc_html__('Menu Slider', 'soup'),
		'base' => 'page_menu_slider',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array( 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Section Title', 'soup'),
				'param_name' => 'pgmnu_sldr_ttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write section title here.', 'soup')
			),
            // params group
            array(
				'heading' => esc_html__('Add Slide', 'soup'),
                'type' => 'param_group',
                'value' => '',
                'param_name' => 'pg_mnu_slide',
                // Note params is mapped inside param-group:
                'params' => array( 
                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => esc_html__('Title', 'soup'),
                        'param_name' => 'pg_mnu_sld_ttl',
                        'description' => esc_html__('Write title here', 'soup')
                    ),  
                    array(
                        'type' => 'attach_image',
                        'value' => '',
                        'heading' => esc_html__('Image', 'soup'),
                        'param_name' => 'pg_mnu_sld_img',
                        'description' => esc_html__('Upload an image here', 'soup')
                    ), 
                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => esc_html__('Link', 'soup'),
                        'param_name' => 'pg_mnu_sld_link',
                        'description' => esc_html__('Input link here', 'soup')
                    ) 
                )
            )   
		)   
	) 
); 
 
// Display Menu Slider
vc_map( 
    array(
		'name' => esc_html__('Offers Slider', 'soup'),
		'base' => 'page_offers_slider',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Section Title', 'soup'),
				'param_name' => 'ofrs_ttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write section title here.', 'soup')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Number of Post to Show', 'soup'),
				'param_name' => 'ofrs_post_numbr',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Input number. How many post want to display.', 'soup')
			),   
		)   
	) 
); 

// Display Menu Slider
vc_map( 
    array(
		'name' => esc_html__('Promo Video', 'soup'),
		'base' => 'page_promo_video',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'soup'),
				'param_name' => 'prm_vdo_ttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write title here.', 'soup')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Sub Title', 'soup'),
				'param_name' => 'prm_vdo_sbttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write sub title here.', 'soup')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Video Link', 'soup'),
				'param_name' => 'prm_vdo_ytblnk',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Input youtube video  embeded link here.', 'soup')
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Section BG Image', 'soup'),
				'param_name' => 'prm_vdo_bgimg',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Upload an image from here.', 'soup')
			)   
		)   
	) 
); 
 
// Display Blog Post Slider
vc_map( 
    array(
		'name' => esc_html__('Blog Post Slider', 'soup'),
		'base' => 'page_latest_post',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Section Title', 'soup'),
				'param_name' => 'ltst_post',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write section title here.', 'soup')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Number of Post to Show', 'soup'),
				'param_name' => 'ltst_post_num',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Input number. how many post want ot show.', 'soup')
			),  
		)   
	) 
); 
// Display Write Review
vc_map( 
    array(
		'name' => esc_html__('Write A Review', 'soup'),
		'base' => 'page_write_review',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(  
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Background Image', 'soup'),
				'param_name' => 'wr_bg_img',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Upload section background image.', 'soup')
			),  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Section Title', 'soup'),
				'param_name' => 'wr_sec_ttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write section title here.', 'soup')
			),  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Section Sub Title', 'soup'),
				'param_name' => 'wr_sec_sbttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write section subtitle here.', 'soup')
			),  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Button Title', 'soup'),
				'param_name' => 'wr_sec_btnttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write button title here.', 'soup')
			)   
		)   
	) 
); 
// Display Write Review
vc_map( 
    array(
		'name' => esc_html__('Book A Table', 'soup'),
		'base' => 'page_book_a_table',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Mail Subject', 'soup'),
				'param_name' => 'bok_covr_sent_sub',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write mail subject here.', 'soup')
			) ,  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Received Mail', 'soup'),
				'param_name' => 'bok_covr_sent_to',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write receive mail here. Where you want to receive.', 'soup')
			) ,  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Admin Mail', 'soup'),
				'param_name' => 'bok_covr_sent_from',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write admin mail here. such as: admin(at)domain.com', 'soup')
			) ,  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Mail Subject', 'soup'),
				'param_name' => 'bok_covr_sent_sub',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write mail subject here.', 'soup')
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Form Header Image', 'soup'),
				'param_name' => 'bok_covr_img',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Upload header image.', 'soup')
			) ,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Icon Class', 'soup'),
				'param_name' => 'bok_covr_ico',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Input here font awesome icon class here which you want to show.', 'soup')
			) ,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Form Head Title', 'soup'),
				'param_name' => 'bok_covr_ico_ttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write form head title here.', 'soup')
			) ,
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Form Head Sub Title', 'soup'),
				'param_name' => 'bok_covr_ico_sbttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write form head sub title here.', 'soup')
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Background Image', 'soup'),
				'param_name' => 'bok_bg_img',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Upload section background image. If background video filed is empty then it will be displayed.', 'soup')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Form Background Video Link', 'soup'),
				'param_name' => 'bok_covr_vdourl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Input background video link here.', 'soup')
			)   
		)   
	) 
); 


// Display Write Review
vc_map( 
    array(
		'name' => esc_html__('Order Confirmation', 'soup'),
		'base' => 'book_confirmation',
		'class' => '',
		'icon' => 'icon-mpc-prod_slider',
		'category' => esc_html__('Soup', 'soup'),
		'params' => array(  
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Icon Class', 'soup'),
				'param_name' => 'con_ico',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Input here font awesome icon class here which you want to show.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Thank You Title', 'soup'),
				'param_name' => 'con_secttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write thank you title here.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Thank You Sub Title', 'soup'),
				'param_name' => 'con_secsbttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write thank you sub title here.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Button Title', 'soup'),
				'param_name' => 'con_btnttl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Write button title here.', 'soup')
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Button Link', 'soup'),
				'param_name' => 'con_btnurl',
				'value' => '',
				'admin_label' => true,
                'description' => esc_html__('Input button link here.', 'soup')
			)   
		)   
	) 
); 

