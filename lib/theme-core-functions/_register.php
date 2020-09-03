<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function soup_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'soup' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'soup' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '<hr></div> ',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'soup' ),
		'id'            => 'sidebar-f',
		'description'   => esc_html__( 'Add widgets here.', 'soup' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div> ',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'soup_widgets_init' );
