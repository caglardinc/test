<?php 
    //Adding custom config to redux framework
    if (file_exists(get_template_directory() . '/lib/theme-config/config-redux/_custom-config.php')){
        require get_template_directory() . '/lib/theme-config/config-redux/_custom-config.php';
    }

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */ 
    if ( ! class_exists( 'Redux' ) ) { 
        return; 
    } 
    // This is your option name where all the Redux data is stored.
    $opt_name = "soup"; 
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */ 
    $theme = wp_get_theme(); // For use with some settings. Not necessary. 
    $args = array(

        // TYPICAL -> Change these values as you need/desire

        'opt_name'             => $opt_name,

        // This is where your data is stored in the database and also becomes your global variable name.

        'display_name'         => $theme->get( 'Name' ),

        // Name that appears at the top of your panel

        'display_version'      => $theme->get( 'Version' ),

        // Version that appears at the top of your panel

        'menu_type'            => 'menu',

        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)

        'allow_sub_menu'       => true,

        // Show the sections below the admin menu item or not

        'menu_title'           => esc_html__( 'Soup Options', 'soup' ),

        'page_title'           => esc_html__( 'Soup Options', 'soup' ),

        // You will need to generate a Google API key to use this feature.

        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth

        'google_api_key'       => '',

        // Set it you want google fonts to update weekly. A google_api_key value is required.

        'google_update_weekly' => false,

        // Must be defined to add google fonts to the typography module

        'async_typography'     => true,

        // Use a asynchronous font on the front end or font string

        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader

        'admin_bar'            => true,

        // Show the panel pages on the admin bar

        'admin_bar_icon'       => 'dashicons-portfolio',

        // Choose an icon for the admin bar menu

        'admin_bar_priority'   => 50,

        // Choose an priority for the admin bar menu

        'global_variable'      => '',

        // Set a different name for your global variable other than the opt_name

        'dev_mode'             => true,

        // Show the time the page took to load, etc

        'update_notice'        => true,

        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo

        'customizer'           => true,

        // Enable basic customizer support

        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.

        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field



        // OPTIONAL -> Give you extra features

        'page_priority'        => null,

        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.

        'page_parent'          => 'themes.php',

        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters

        'page_permissions'     => 'manage_options',

        // Permissions needed to access the options panel.

        'menu_icon'            => '',

        // Specify a custom URL to an icon

        'last_tab'             => '',

        // Force your panel to always open to a specific tab (by id)

        'page_icon'            => 'icon-themes',

        // Icon displayed in the admin panel next to your menu_title

        'page_slug'            => 'soup_options',

        // Page slug used to denote the panel

        'save_defaults'        => true,

        // On load save the defaults to DB before user clicks save or not

        'default_show'         => false,

        // If true, shows the default value next to each field that is not the default value.

        'default_mark'         => '',

        // What to print by the field's title if the value shown is default. Suggested: *

        'show_import_export'   => true,

        // Shows the Import/Export panel when not used as a field.



        // CAREFUL -> These options are for advanced use only

        'transient_time'       => 60 * MINUTE_IN_SECONDS,

        'output'               => true,

        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output

        'output_tag'           => true,

        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head

        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.



        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.

        'database'             => '',

        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!



        'use_cdn'              => true,

        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.



        //'compiler'             => true,

 

    );



   

    // Panel Intro text -> before the form

    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {

        if ( ! empty( $args['global_variable'] ) ) {

            $v = $args['global_variable'];

        } else {

            $v = str_replace( '-', '_', $args['opt_name'] );

        }

        $args['intro_text'] = sprintf( esc_html__( '', 'soup' ), $v );

    } else {

        $args['intro_text'] = esc_html__( '', 'soup' );

    }



    // Add content after the form.

    $args['footer_text'] = esc_html__( '', 'soup' );



    Redux::setArgs( $opt_name, $args );



    /*

     * ---> END ARGUMENTS

     */



    /*

     * ---> START HELP TABS

     */



    $tabs = array(

        array(

            'id'      => 'redux-help-tab-1',

            'title'   => esc_html__( 'Theme Information 1', 'soup' ),

            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'soup' )

        ),

        array(

            'id'      => 'redux-help-tab-2',

            'title'   => esc_html__( 'Theme Information 2', 'soup' ),

            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'soup' )

        )

    );

    Redux::setHelpTab( $opt_name, $tabs );



    // Set the help sidebar

    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'soup' );

    Redux::setHelpSidebar( $opt_name, $content );

    // -> START Basic Fields

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Global Settings', 'soup' ), 
        'id'         => 'global-set', 
        'fields'     => array(
            array(
                'id'          => 'soup-typography',
                'type'        => 'typography', 
                'title'       => esc_html__('Body Typography', 'soup'),
                'google'      => true, 
                'subsets'     => true, 
                'text-align'     =>false, 
                'letter-spacing' => true,
                'line-height'     => false, 
                'font-backup' => false,
                'output'      => array( 'body', 'p' ),
                'units'       =>'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'soup'),
                'default'     => array( 
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '', 
                    'google'      => true,
                    'font-size'   => ''      
                ),
            ), 
            array(
                'id'       => 'body_bgclr',
                'type'     => 'color_rgba',  
                'title'    => esc_html__( 'Body Background', 'soup' ),  
                'default'  => '#fff', 
                'output'    => array('background-color' => 'body') 
            ), 
            array(
                'id'       => 'brand-color',
                'type'     => 'color',  
                'title'    => esc_html__( 'Brand Color', 'soup' ), 
                'desc'     => esc_html__( 'Pick a color as brand color.', 'soup' ) 
            ),
            array(
                'id'       => 'body_full',
                'type'     => 'switch',  
                'title'    => esc_html__( 'Body Style', 'soup' ), 
                'default'  => 0,
                'on'       => esc_html__( 'Full Width', 'soup' ), 
                'off'      => esc_html__( 'Box Width', 'soup' )
            )
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Product Style', 'soup' ), 
        'id'         => 'prod-style',
        'subsection' => true, 
        'fields'     => array( 
            array(
                'id'       => 'prod_title_typo',
                'type'     => 'typography',
                'title'    => __( 'Product Title', 'soup' ),
                'subtitle' => __( 'Specify the product title font properties.', 'soup' ),
                'google'   => true,
                'output'        => array( '.menu-item h6' ),
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '',
                    'font-family' => '',
                    'font-weight' => '',
                ),
            ), 
            array(
                'id'       => 'prod_sub_title_typo',
                'type'     => 'typography',
                'title'    => __( 'Product Subtitle', 'soup' ),
                'subtitle' => __( 'Specify the product subtitle font properties.', 'soup' ),
                'google'   => true,
                'output'        => array( '.menu-item span.text-muted' ),
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '',
                    'font-family' => '',
                    'font-weight' => '',
                ),
            ),
            array(
                'id'       => 'my_ac_menu',
                'type'     => 'typography',
                'title'    => __( 'My Account ( menu )', 'soup' ),
                'subtitle' => __( 'Specify the my acocunt page menu font properties.', 'soup' ),
                'google'   => true,
                'output'        => array( '.woocommerce-MyAccount-navigation li a' ),
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '',
                    'font-family' => '',
                    'font-weight' => '',
                ),
            ), 
        )
    ) ); 
 
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Main Header', 'soup' ), 
        'id'         => 'main-header', 
        'fields'     => array(
            array(
                'id'          => 'menu-typography',
                'type'        => 'typography', 
                'title'       => esc_html__('Menu Typography', 'soup'),
                'google'      => true, 
                'subsets'     =>false, 
                'text-align'     =>false, 
                'letter-spacing'=> true,
                'line-height'     =>false, 
                'font-backup' => false,
                'output'      => array( '.nav-main > li > a', 'p' ),
                'units'       =>'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'soup'),
                'default'     => array( 
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '', 
                    'google'      => true,
                    'font-size'   => ''      
                ),
            ), 
            array(
                'id'       => 'menu-bgclr',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Menu BG Color', 'soup' ),
                'validate' => 'color', 
                'default'  => '#282b2e', 
                'output'    => array('background-color' => '#header.light') 
            ),  
            array(
                'id'       => 'logo-up',
                'type'     => 'media', 
                'compiler' => true, 
                'title'    => esc_html__( 'Upload Logo', 'soup' ), 
                'desc'    => esc_html__( 'Best Size is (115 X 38) px', 'soup' ), 
            ),
            array(
                'id'       => 'logo-box',
                'type'     => 'select',
                'title'    => esc_html__( 'Logo Style', 'soup' ),
                'options'  => array(
                    'box' => esc_html__( 'Box', 'soup' ),
                    'fulimg' => esc_html__( 'Full Image', 'soup' ),
                ),
                'default'  => 'box'  
            ),
            array(
                'id'       => 'logo-width',
                'type'     => 'text',  
                'title'    => esc_html__( 'Logo Width', 'soup' ), 
                'desc'     => esc_html__( 'Put a numeric value with px. Such As: 113px or % value ', 'soup' ), 
                'default'  => '88px', 
            ),
            array(
                'id'       => 'logo-height',
                'type'     => 'text',  
                'title'    => esc_html__( 'Logo Height', 'soup' ), 
                'desc'    => esc_html__( 'Put a numeric value with px. Such As: 33px or % value ', 'soup' ), 
                'default'  => '96px', 
            ), 
            array(
                'id'       => 'mlogo-width',
                'type'     => 'text',  
                'title'    => esc_html__( 'Mobile Logo Width', 'soup' ), 
                'desc'     => esc_html__( 'Put a numeric value with px. Such As: 113px or % value ', 'soup' ), 
                'default'  => '88px', 
            ),
            array(
                'id'       => 'mlogo-height',
                'type'     => 'text',  
                'title'    => esc_html__( 'Mobile Logo Height', 'soup' ), 
                'desc'    => esc_html__( 'Put a numeric value with px. Such As: 33px or % value ', 'soup' ), 
                'default'  => '96px', 
            ), 
            array(
                'id'       => 'logo-bgclr',
                'type'     => 'color',
                'title'    => esc_html__( 'Logo BG Color', 'soup' ),
                'validate' => 'color', 
                'default'  => '#282b2e', 
                'output'    => array('background-color' => '#header .module-logo.dark') 
            ), 
            array(
                'id'       => 'cart-ico',
                'type'     => 'switch',  
                'title'    => esc_html__( 'Cart Icon', 'soup' ), 
                'default'  => 0,
                'on'       => esc_html__( 'Show', 'soup' ), 
                'off'      => esc_html__( 'Hide', 'soup' )
            ), 
            array(
                'id'       => 'follow-us-mobile',
                'type'     => 'switch',  
                'title'    => esc_html__( 'Follow Us', 'soup' ), 
                'desc'    => esc_html__( 'Mobile menu follow us section.', 'soup' ), 
                'default'  => 0,
                'on'       => esc_html__( 'Enable', 'soup' ), 
                'off'      => esc_html__( 'Disable', 'soup' )
            ), 
            array(
                'id'       => 'follow-us-fb',
                'type'     => 'text',  
                'required' => array( 'follow-us-mobile', '=', '1' ),
                'title'    => esc_html__( 'Facebook Url', 'soup' ), 
                'desc'    => esc_html__( 'Input facebook url here.', 'soup' ), 
                'default'  => ''
            ), 
            array(
                'id'       => 'follow-us-gp',
                'type'     => 'text',  
                'required' => array( 'follow-us-mobile', '=', '1' ),
                'title'    => esc_html__( 'Google Plus Url', 'soup' ), 
                'desc'    => esc_html__( 'Input google plus url here.', 'soup' ), 
                'default'  => ''
            ), 
            array(
                'id'       => 'follow-us-tw',
                'type'     => 'text',  
                'required' => array( 'follow-us-mobile', '=', '1' ),
                'title'    => esc_html__( 'Twitter Url', 'soup' ), 
                'desc'    => esc_html__( 'Input twitter url here.', 'soup' ), 
                'default'  => ''
            ), 
            array(
                'id'       => 'follow-us-yt',
                'type'     => 'text',  
                'required' => array( 'follow-us-mobile', '=', '1' ),
                'title'    => esc_html__( 'Youtube Url', 'soup' ), 
                'desc'    => esc_html__( 'Input youtube url here.', 'soup' ), 
                'default'  => ''
            ), 
            array(
                'id'       => 'follow-us-ins',
                'type'     => 'text',  
                'required' => array( 'follow-us-mobile', '=', '1' ),
                'title'    => esc_html__( 'Instagram Url', 'soup' ), 
                'desc'    => esc_html__( 'Input instagram url here.', 'soup' ), 
                'default'  => ''
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Options', 'soup' ), 
        'id'         => 'blog-page', 
        'fields'     => array( 
            array(
                'id'       => 'blog-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Blog Title', 'soup' ),  
                'default'  => esc_html__( 'Blog', 'soup' ), 
                'desc'    => esc_html__( 'If you put empty this field, it will display Default Value', 'soup' ), 
            ),
            array(
                'id'       => 'blog-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Blog SubTitle', 'soup' ),  
                'default'  => esc_html__( 'Some informations about our restaurant', 'soup' ), 
                'desc'    => esc_html__( 'If you put empty this field, it will display Default Value', 'soup' ), 
            ),
            array(
                'id'       => 'blog-banner',
                'type'     => 'media',
                'title'    => esc_html__( 'Banner Image', 'soup' )  
            ),
            array(
                'id'       => 'blog-sidebar',
                'type'     => 'select',
                'title'    => esc_html__( 'Blog Sidebar', 'soup' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'soup' ),
                    'right' => esc_html__( 'Right', 'soup' ),
                ),
                'default'  => 'right'  
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Slider Settings', 'soup' ), 
        'id'         => 'slider-page', 
        'fields'     => array( 
            array(
                'id'       => 'slider-title-colr',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Title Color', 'soup' ),  
                'default'  => '', 
                'desc'     => esc_html__( 'Select a color from here.', 'soup' ), 
                'output' => array('color' => '.slick-track .content-inner h1')
            ),  
            array(
                'id'       => 'slider-title-fsize',
                'type'     => 'text',
                'title'    => esc_html__( 'Title Font Size', 'soup' ),  
                'default'  => '', 
                'desc'     => esc_html__( 'Input font size value here. Must added unit value ( px or em ).', 'soup' ), 
            ), 
            array(
                'id'       => 'slider-title-fwet',
                'type'     => 'text',
                'title'    => esc_html__( 'Title Font Weight', 'soup' ),
                'default'  => '',
                'desc'     => esc_html__( 'Input font weight value here.', 'soup' ),   
            ), 
            array(
                'id'       => 'slider-title2-colr',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'SubTitle Color', 'soup' ),  
                'default'  => '', 
                'desc'     => esc_html__( 'Select a color from here.', 'soup' ), 
            ), 
            array(
                'id'       => 'slider-title2-fsize',
                'type'     => 'text',
                'title'    => esc_html__( 'SubTitle Font Size', 'soup' ),  
                'default'  => '', 
                'desc'     => esc_html__( 'Input font size value here. Must added unit value ( px or em ).', 'soup' ), 
            ), 
            array(
                'id'       => 'slider-title2-fwet',
                'type'     => 'text',
                'title'    => esc_html__( 'SubTitle Font Weight', 'soup' ),
                'default'  => '',
                'desc'     => esc_html__( 'Input font weight value here.', 'soup' ),   
            ),
            array(
                'id'       => 'slider-speed',
                'type'     => 'slider',
                'title'    => esc_html__( 'Slider Speed', 'soup' ),
                'default'  => 300,
                'desc'     => esc_html__( 'Input font weight value here.', 'soup' ),  
                "min"       => 500,
                "step"      => 500,
                "max"       => 10500,
                'display_value' => 'label' 
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Page Settings', 'soup' ),
        'id'    => 'wp-fremework-page',
        'desc'  => esc_html__( 'Multiple page settings support from here', 'soup' ) 
    ) );
 
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Search Page', 'soup' ), 
        'id'         => 'search-page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'search-enable',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Disable Banner ?', 'soup' ),
                'desc'     => esc_html__('If yes, then click the checkbox.','soup'),
                'default'  => false
            ),
            array(
                'id'       => 'srch-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Search Title', 'soup' ),  
                'default'  => esc_html__( 'Search Post', 'soup' ), 
                'desc'    => esc_html__( 'If you put empty this field, it will display Search text', 'soup' ), 
            ),
            array(
                'id'       => 'srch-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Search Sub Title', 'soup' ),  
                'default'  => esc_html__( 'Some informations about our restaurant', 'soup' ), 
                'desc'    => esc_html__( 'If you put empty this field, it will display Search text', 'soup' ), 
            ),
            array(
                'id'       => 'srch-banner',
                'type'     => 'media',
                'title'    => esc_html__( 'Banner Image', 'soup' )  
            ),
            array(
                'id'       => 'srch-sidebar',
                'type'     => 'select',
                'title'    => esc_html__( 'Search Sidebar', 'soup' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'soup' ),
                    'right' => esc_html__( 'Right', 'soup' ),
                ),
                'default'  => 'right'  
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Archive Page', 'soup' ), 
        'id'         => 'archive-page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'archive-enable',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Disable Banner ?', 'soup' ),
                'desc'     => esc_html__('If yes, then click the checkbox.','soup'),
                'default'  => false
            ),
            array(
                'id'       => 'archv-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Archive Title', 'soup' ),  
                'default'  => esc_html__( 'Archive Post', 'soup' ),  
                'desc'    => esc_html__( 'If you put empty this field, it will display Category,Tag, Date as Archive Title', 'soup' ),
            ),
            array(
                'id'       => 'archv-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Archive Sub Title', 'soup' ),  
                'default'  => esc_html__( 'Some informations about our restaurant', 'soup' ),  
                'desc'    => esc_html__( 'If you put empty this field, it will display Category,Tag, Date as Archive Title', 'soup' ),
            ),
            array(
                'id'       => 'archv-banner',
                'type'     => 'media',
                'title'    => esc_html__( 'Banner Image', 'soup' )  
            ),
            array(
                'id'       => 'archv-sidebar',
                'type'     => 'select',
                'title'    => esc_html__( 'Archive Sidebar', 'soup' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'soup' ),
                    'right' => esc_html__( 'Right', 'soup' ),
                ),
                'default'  => 'right'  
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Offer', 'soup' ), 
        'id'         => 'offersingle-page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'offersingle-enable',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Enable Banner ?', 'soup' ),
                'desc'     => esc_html__('If yes, then click the checkbox.','soup'),
                'default'  => false
            ),
            array(
                'id'       => 'offersingle-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Banner Title', 'soup' ),  
                'default'  => '',  
                'desc'    => esc_html__( 'Write banner title here.', 'soup' ),
            ),
            array(
                'id'       => 'offersingle-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Banner Sub Title', 'soup' ),  
                'default'  => '',  
                'desc'    => esc_html__( 'Write banner subtitle here.', 'soup' ),
            ),
            array(
                'id'       => 'offersingle-banner',
                'type'     => 'media',
                'title'    => esc_html__( 'Banner Image', 'soup' )  
            ),
            array(
                'id'       => 'offersingle-lftbtnlbl',
                'type'     => 'text',
                'title'    => esc_html__( 'Left Btton Label', 'soup' ),  
                'default'  => '',  
                'desc'    => esc_html__( 'Write button label here.', 'soup' ),
            ),
            array(
                'id'       => 'offersingle-lftbtnurll',
                'type'     => 'text',
                'title'    => esc_html__( 'Left Btton Url', 'soup' ),  
                'default'  => '',  
                'desc'    => esc_html__( 'Write button url here.', 'soup' ),
            ),
            array(
                'id'       => 'offersingle-rightbtnlbl',
                'type'     => 'text',
                'title'    => esc_html__( 'Right Btton Label', 'soup' ),  
                'default'  => '',  
                'desc'    => esc_html__( 'Write button label here.', 'soup' ),
            ),
            array(
                'id'       => 'offersingle-rightbtnurll',
                'type'     => 'text',
                'title'    => esc_html__( 'Right Btton Url', 'soup' ),  
                'default'  => '',  
                'desc'    => esc_html__( 'Write button url here.', 'soup' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Woocommerce', 'soup' ),
        'id'    => 'wp-fremework-woc',
        'desc'  => esc_html__( 'Multiple page settings support from here', 'soup' ) 
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Store Settings', 'soup' ), 
        'id'         => 'store-settings', 
        'subsection' => true,
        'fields'     => array( 
            array(
                'id'       => 'open_close',
                'type'     => 'switch',  
                'title'    => esc_html__( 'Opening/Closing', 'soup' ), 
                'default'  => 1,
                'on'       => esc_html__( 'Open', 'soup' ), 
                'off'      => esc_html__( 'Close', 'soup' )
            ),
            array(
                'id'       => 'open_close_msg',
                'required' => array( 'open_close', '=', '0' ),
                'type'     => 'textarea',  
                'title'    => esc_html__( 'Closing Message', 'soup' ), 
                'default'  => 'Store is close now.', 
            ), 
            array(
                'id'       => 'open_close_txc',
                'required' => array( 'open_close', '=', '0' ),
                'type'     => 'color_rgba',  
                'title'    => esc_html__( 'Text Color', 'soup' ), 
                'output'  => array('color'=>'.store-close-notice span'), 
            ), 
            array(
                'id'       => 'open_close_bgc',
                'required' => array( 'open_close', '=', '0' ),
                'type'     => 'color_rgba',  
                'title'    => esc_html__( 'Background Color', 'soup' ), 
                'output'  => array('background-color'=>'.store-close-notice'), 
            ), 
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Product', 'soup' ), 
        'id'         => 'singlprod-page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'    => 'singlepro-review-success',
                'type'  => 'info',
                'style' => 'success',
                'icon'  => 'el el-info-circle',
                'title' => esc_html__( 'Review Info', 'soup' ) 
            ),             
            array(
                'id'       => 'singlepro-review-enable',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Enable Review?', 'soup' ),
                'desc'     => esc_html__('If yes, then click the checkbox.','soup'),
                'default'  => false
            ),
            array(
                'id'       => 'singlepro-review-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Review Title', 'soup' ),  
                'default'  => '',  
                'desc'    => esc_html__( 'Write review title here.', 'soup' ),
            ), 
            array(
                'id'       => 'singlepro-review-num',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of Review to Show', 'soup' ),  
                'default'  => '',  
                'desc'    => esc_html__( 'Input numeric value here.', 'soup' ),
            ), 
            array(
                'id'    => 'singlepro-bnr-success',
                'type'  => 'info',
                'style' => 'success',
                'icon'  => 'el el-info-circle',
                'title' => esc_html__( 'Banner Info', 'soup' ) 
            ),            
            array(
                'id'       => 'singlprod-enable',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Enable Banner ?', 'soup' ),
                'desc'     => esc_html__('If yes, then click the checkbox.','soup'),
                'default'  => false
            ),
            array(
                'id'       => 'singlprod-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Banner Title', 'soup' ),  
                'default'  => '',  
                'desc'    => esc_html__( 'Write banner title here.', 'soup' ),
            ),
            array(
                'id'       => 'singlprod-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Banner Sub Title', 'soup' ),  
                'default'  => '',  
                'desc'    => esc_html__( 'Write banner subtitle here.', 'soup' ),
            ),
            array(
                'id'       => 'singlprod-banner',
                'type'     => 'media',
                'title'    => esc_html__( 'Banner Image', 'soup' )  
            ),
            array(
                'id'       => 'singlprod-lftbtnlbl',
                'type'     => 'text',
                'title'    => esc_html__( 'Left Btton Label', 'soup' ),  
                'default'  => '',  
                'desc'    => esc_html__( 'Write button label here.', 'soup' ),
            ),
            array(
                'id'       => 'singlprod-lftbtnurll',
                'type'     => 'text',
                'title'    => esc_html__( 'Left Btton Url', 'soup' ),  
                'default'  => '',  
                'desc'    => esc_html__( 'Write button url here.', 'soup' ),
            ),
            array(
                'id'       => 'singlprod-rightbtnlbl',
                'type'     => 'text',
                'title'    => esc_html__( 'Right Btton Label', 'soup' ),  
                'default'  => '',  
                'desc'    => esc_html__( 'Write button label here.', 'soup' ),
            ),
            array(
                'id'       => 'singlprod-rightbtnurll',
                'type'     => 'text',
                'title'    => esc_html__( 'Right Btton Url', 'soup' ),  
                'default'  => '',  
                'desc'    => esc_html__( 'Write button url here.', 'soup' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Pop UP Settings', 'soup' ), 
        'id'         => 'popup-options',
        'subsection' => true, 
        'fields'     => array(
            array(
                'id'       => 'pop_up_title',
                'type'     => 'text',
                'title'    => esc_html__('Write title here.', 'soup'), 
                'default'  => ""
            ), 
            array(
                'id'       => 'pop_img',
                'type'     => 'switch',  
                'title'    => esc_html__( 'Popup BG Image', 'soup' ), 
                'default'  => 1,
                'on'       => esc_html__( 'Custom Image', 'soup' ), 
                'off'      => esc_html__( 'Product Image', 'soup' )
            ),
            array(
                'id'       => 'pop_up_bgimg',
                'type'     => 'media',
                'required' => array( 'pop_img', '=', '1' ), 
                'title'    => esc_html__('Upload Image', 'soup'),
                'subtitle' => esc_html__('Upload pop-up title background image from here.', 'soup') 
            ) 
        )
    ) ); 
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Checkout Settings', 'soup' ), 
        'id'         => 'chck-options',
        'subsection' => true, 
        'fields'     => array( 
            array(
                'id'       => 'delivery_sec',
                'type'     => 'switch',
                'title'    => esc_html__( 'Delivery Section on Checkout', 'soup' ), 
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'chck-delver',
                'type'     => 'switch',
                'required' => array( 'delivery_sec', '=', '1' ), 
                'title'    => esc_html__( 'Enable Take Away?', 'soup' ),  
                'default'  => 0,
                'on'       => esc_html__( 'Yes', 'soup' ), 
                'off'      => esc_html__( 'No', 'soup' )
            ),
            array(
                'id'       => 'disabled_date',
                'type'     => 'text',
                'required' => array( 'delivery_sec', '=', '1' ),
                'title'    => esc_html__('Diable Dates.', 'soup'), 
                'desc'    => esc_html__('You can disable multiple dates. Date format is 2020-04-23. Use pipe (|) to divide each dates. Ex. 2020-04-23|2020-04-24|2020-04-25|2020-04-26 ', 'soup'), 
                'default'  => ""
            ), 
            array(
                'id'       => 'disabled_hour',
                'type'     => 'text',
                'required' => array( 'delivery_sec', '=', '1' ),
                'title'    => esc_html__('Diable Hours.', 'soup'), 
                'desc'    => esc_html__('You can disable multiple hours. Hours will be 0 to 23 (24 hours). Ex. 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23', 'soup'), 
                'default'  => ""
            ), 
        )
    ) ); 


    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Advanced Options', 'soup' ), 
        'id'         => 'atrd-options', 
        'fields'     => array(
            array(
                'id'       => 'collapse_list',
                'type'     => 'select',
                'title'    => esc_html__( 'Collapse Menu', 'soup' ),
                'options'  => array(
                    'fo' => esc_html__( 'First One Is Open', 'soup' ),
                    'ao' => esc_html__( 'All are Open', 'soup' ),
                    'ac' => esc_html__( 'All are Closed', 'soup' ),
                ),
                'default'  => 'box'  
            ),
            array(
                'id'       => 'on_redirect',
                'type'     => 'switch',
                'title'    => esc_html__( 'Order Redirect', 'soup' ), 
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'order_redirect_url',
                'type'     => 'text',
                'required' => array( 'on_redirect', '=', '1' ), 
                'title'    => esc_html__('Order Redirect to Confirmation Page', 'soup'),
                'subtitle' => esc_html__('Input page url here. where you want to redirect after order.', 'soup'), 
                'default'  => ""
            ), 
            array(
                'id'       => 'custom_css',
                'type'     => 'ace_editor',
                'title'    => esc_html__('Custom CSS', 'soup'),
                'subtitle' => esc_html__('Paste your CSS code here.', 'soup'),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'default'  => "#example{\n  margin: 0 auto;\n}"
            ), 
            array(
                'id'       => 'custom_js',
                'type'     => 'ace_editor',
                'title'    => esc_html__('Custom JS', 'soup'),
                'subtitle' => esc_html__('Paste your JS code here.', 'soup'),
                'mode'     => 'javascript',
                'theme'    => 'monokai',
                'default'  => "jQuery(document).ready(function(){\n  //code goes here\n});",
                'desc'  => "Write js code within jQuery(document).ready(function(){}) code block"
            ) 
        )
    ) ); 

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Google Map Options', 'soup' ), 
        'id'         => 'soupgmap-options', 
        'fields'     => array(
            array(
                'id'       => 'map-api-key',
                'type'     => 'text',
                'title'    => esc_html__( 'Map Api Key', 'soup' ),  
                'default'  => esc_html__( '', 'soup' ),  
                'desc'    => esc_html__( 'Input api key here.', 'soup' ),
            ),
            array(
                'id'       => 'map-lat',
                'type'     => 'text',
                'title'    => esc_html__( 'Latitude', 'soup' ),    
                'desc'    => esc_html__( 'Input latitude here..', 'soup' ),
            ),
            array(
                'id'       => 'map-long',
                'type'     => 'text',
                'title'    => esc_html__( 'Longitude', 'soup' ),    
                'desc'    => esc_html__( 'Input longitude here..', 'soup' ),
            ),
            array(
                'id'       => 'map-icon',
                'type'     => 'media',
                'title'    => esc_html__( 'Map Icon', 'soup' ),    
                'desc'    => esc_html__( 'Upload image here.( png format ).', 'soup' ),
            )
        )
    ) ); 

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Options', 'soup' ), 
        'id'         => 'footer-options', 
        'fields'     => array( 
            array(
                'id'       => 'spft-style',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Style', 'soup' ),  
                'default'  => 0,
                'on'       => esc_html__( 'Style One', 'soup' ), 
                'off'      => esc_html__( 'Style Two', 'soup' )
            ),
            array(
                'id'       => 'footer-bg-clr',
                'type'     => 'color',   
                'title'    => esc_html__( 'Footer BG Color', 'soup' )  ,
                'desc'    => esc_html__( 'If background image doesn\'t set, then defalut color will be set as a background', 'soup' )  ,
                'default'  => '#282b2e' 
            ),
            array(
                'id'       => 'footer-widget',
                'type'     => 'switch',
                'required' => array( 'spft-style', '=', '1' ), 
                'title'    => esc_html__( 'Footer Widget Section', 'soup' ), 
                'default'  => 0,
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'call-action-loog',
                'type'     => 'info',
                'style'    => 'success', 
                'required' => array( 'spft-style', '=', '0' ), 
                'icon'     => 'el el-info-circle',
                'title'    => esc_html__( 'Logo Section', 'soup' ) 
            ),
            array(
                'id'       => 'logo-ft2',
                'type'     => 'media', 
                'required' => array( 'spft-style', '=', '0' ),
                'compiler' => true, 
                'title'    => esc_html__( 'Upload Logo', 'soup' ), 
                'desc'    => esc_html__( 'Best Size is (88 X 96) px', 'soup' ), 
            ),
            array(
                'id'       => 'flogo-width',
                'required' => array( 'spft-style', '=', '0' ),
                'type'     => 'text',  
                'title'    => esc_html__( 'Logo Width', 'soup' ), 
                'desc'     => esc_html__( 'Put a numeric value with px. Such As: 113px or % value ', 'soup' ), 
                'default'  => '88px', 
            ),
            array(
                'id'       => 'flogo-height',
                'required' => array( 'spft-style', '=', '0' ),
                'type'     => 'text',  
                'title'    => esc_html__( 'Logo Height', 'soup' ), 
                'desc'    => esc_html__( 'Put a numeric value with px. Such As: 33px or % value ', 'soup' ), 
                'default'  => '99px', 
            ), 
            array(
                'id'       => 'call-action-ee',
                'type'     => 'info',
                'style'    => 'success', 
                'icon'     => 'el el-info-circle',
                'title'    => esc_html__( 'Copyright Section', 'soup' ) 
            ),
            array(
                'id'       => 'copyright-text',
                'type'     => 'editor', 
                'required' => array( 'spft-style', '=', '1' ),
                'title'    => esc_html__( 'Copyright Text', 'soup' ),
                'subtitle' => esc_html__( 'Put Copyright Text Here', 'soup' ), 
                'default'  => 'Copyright Soup 2020 &copy;. Made with love by Suelo.',
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 5
                )
            ),
            array(
                'id'       => 'copyright-text-2',
                'type'     => 'editor',  
                'required' => array( 'spft-style', '=', '0' ),
                'title'    => esc_html__( 'Copyright Text', 'soup' ),
                'subtitle' => esc_html__( 'Put Copyright Text Here', 'soup' ), 
                'default'  => 'Copyright Soup 2020 &copy;. Made with love by Suelo.',
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 5
                )
            ),
            array(
                'id'       => 'call-action-social',
                'type'     => 'info',
                'style'    => 'success', 
                'required' => array( 'spft-style', '=', '0' ), 
                'icon'     => 'el el-info-circle',
                'title'    => esc_html__( 'Social Section', 'soup' ) 
            ), 
            array(
                'id'       => 'social-fb',
                'type'     => 'text',
                'required' => array( 'spft-style', '=', '0' ),
                'title'    => esc_html__( 'Facebook Link', 'soup' ),  
                'default'  => esc_html__( '', 'soup' ),  
                'desc'    => esc_html__( 'Input facebook link here.', 'soup' ),
            ), 
            array(
                'id'       => 'social-gl',
                'type'     => 'text',
                'required' => array( 'spft-style', '=', '0' ),
                'title'    => esc_html__( 'Google Plus Link', 'soup' ),  
                'default'  => esc_html__( '', 'soup' ),  
                'desc'    => esc_html__( 'Input google plus link here.', 'soup' ),
            ), 
            array(
                'id'       => 'social-tw',
                'type'     => 'text',
                'required' => array( 'spft-style', '=', '0' ),
                'title'    => esc_html__( 'Twitter Link', 'soup' ),  
                'default'  => esc_html__( '', 'soup' ),  
                'desc'    => esc_html__( 'Input twitter link here.', 'soup' ),
            ), 
            array(
                'id'       => 'social-yt',
                'type'     => 'text',
                'required' => array( 'spft-style', '=', '0' ),
                'title'    => esc_html__( 'Youtube Link', 'soup' ),  
                'default'  => esc_html__( '', 'soup' ),  
                'desc'    => esc_html__( 'Input youtube link here.', 'soup' ),
            ), 
            array(
                'id'       => 'social-in',
                'type'     => 'text',
                'required' => array( 'spft-style', '=', '0' ),
                'title'    => esc_html__( 'Instagram Link', 'soup' ),  
                'default'  => esc_html__( '', 'soup' ),  
                'desc'    => esc_html__( 'Input instagram link here.', 'soup' ),
            )
        )
    ) );

