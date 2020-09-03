<?php 
/**
 * Theme Core Functions 
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**===============================================================================
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 ===============================================================================*/

if ( ! function_exists( 'soup_setup' ) ) :

function soup_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Soup, use a find and replace
	 * to change 'soup' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'soup', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// support woocommerce
	add_theme_support( 'woocommerce' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('soup-product-grid',288,192,true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'mainmenu' => esc_html__( 'Main Menu', 'soup' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'soup_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', soup_fonts_url() ) );

}
endif;
add_action( 'after_setup_theme', 'soup_setup' );

/**
 *	Fonts Enqueue
 */
function soup_fonts_url() {
    $soup_font = '';
     
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'soup' );
	$Oswald = _x( 'on', 'Oswald font: on or off', 'soup' );
	$Raleway = _x( 'on', 'Raleway font: on or off', 'soup' );
	 
	if ( 'off' !== $open_sans || 'off' !== $Oswald || 'off' !== $Raleway ) {
		$font_families = array();
 
		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans: 400,300,300italic,400italic,600,600italic,700,700italic,800,800italic';
		}
		 
		if ( 'off' !== $Oswald ) {
			$font_families[] = 'Oswald: 400,300,700';
		}
		 
		if ( 'off' !== $Raleway ) {
			$font_families[] = 'Raleway: 100,200,400,500';
		}
		 
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' )
		);

		$soup_font = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
    return esc_url_raw( $soup_font );
}



/**===============================================================================
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 ===============================================================================*/
function soup_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'soup_content_width', 1170 );
}
add_action( 'after_setup_theme', 'soup_content_width', 0 );


/**===============================================================================
 * Enqueue Theme Assets (Scripts & Styles)
 =================================================================================*/
if ( file_exists( SOUP_DIR . '/lib/theme-core-functions/_enqueue-assets.php')) {
    require SOUP_DIR . '/lib/theme-core-functions/_enqueue-assets.php';
}

/**===============================================================================
 * Register Functions
 =================================================================================*/
if ( file_exists( SOUP_DIR . '/lib/theme-core-functions/_register.php')) { 
    require SOUP_DIR . '/lib/theme-core-functions/_register.php';
}
/**===============================================================================
 * Register Functions
 =================================================================================*/
if ( file_exists( SOUP_DIR . '/lib/theme-core-functions/_helpers.php')) { 
    require SOUP_DIR . '/lib/theme-core-functions/_helpers.php';
}
 
/**
 * Excerpt lenght.
 */
function soup_excerpt_length( $length ) {
    return 11;  
}
add_filter( 'excerpt_length', 'soup_excerpt_length', 999 );

/**
 * Excerpt More.
 */
function soup_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'soup_excerpt_more');
