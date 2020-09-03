<?php 
require_once get_template_directory() . '/lib/theme-config/config-tgm/_class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'soup_register_required_plugins' );

/**
 * Register the required plugins for this theme. 
 */
function soup_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		//This is an example of how to include a plugin bundled with a theme. 
		array(
			'name'               => esc_html__('Soup Core','soup'), // The plugin name.
			'slug'               => 'soup-core', // The plugin slug (typically the folder name).
			'source'             => SOUP_DIR . '/inc/plugins/soup-core.zip', // The plugin source.
			'required'           => true,  
		), 
		array(
			'name'               => esc_html__('Redux Framework','soup'), // The plugin name.
			'slug'               => 'redux-framework', // The plugin slug (typically the folder name). 
			'required'           => true,  
		),
		array(
			'name'               => esc_html__('Slider Revolution','soup'), // The plugin name.
			'slug'               => 'revslider', // The plugin slug (typically the folder name).
			'source'             => 'http://themebeer.com/wp/plug-dist/revslider.zip', // The plugin source.
			'required'           => false
		), 
		array(
			'name'               => esc_html__('WPBakery Page Builder','soup'), // The plugin name.
			'slug'               => 'js_composer', // The plugin slug (typically the folder name).
			'source'             => 'http://themebeer.com/wp/plug-dist/js_composer.zip', // The plugin source.
			'required'           => true
		), 
		array(
			'name'               => esc_html__('WC Variations Radio Buttons','soup'), // The plugin name.
			'slug'               => 'wc-variations-radio-buttons', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/plugins/wc-variations-radio-buttons.zip', // The plugin source.
			'required'           => true
		), 
		array(
			'name'      => esc_html__('CMB2','soup'),
			'slug'      => 'cmb2',
			'required'  => true,
		), 
		array(
			'name'      => esc_html__('WooCommerce','soup'),
			'slug'      => 'woocommerce',
			'required'  => true,
		),  
		array(
			'name'      => esc_html__('Contact Form 7','soup'),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('Mailchimp for Wp','soup'),
			'slug'      => 'mailchimp-for-wp',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('One Click Demo Import','soup'),
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		) 
	); 

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'soup',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
