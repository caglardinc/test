<?php

class Soup_Mega_Menu {

	function __construct() {

		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'soup_add_custom_nav_fields' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'soup_update_custom_nav_fields'), 10, 3 );
		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'soup_scm_edit_walker'), 10, 2 );

	} // end constructor
	

	
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function soup_add_custom_nav_fields( $menu_item ) {
	
	    $menu_item->mimg = get_post_meta( $menu_item->ID, '_menu_item_mimg', true ); 
	    $menu_item->megamenu = get_post_meta( $menu_item->ID, '_menu_item_megamenu', true );  
	    $menu_item->boxmenu = get_post_meta( $menu_item->ID, '_menu_item_boxmenu', true );  
	    return $menu_item;
	    
	}
	
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function soup_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent
        if( !isset( $_REQUEST['menu-item-mimg'][$menu_item_db_id] ) ) {
           $_REQUEST['menu-item-mimg'][$menu_item_db_id] = '';
        }
	        $ficon_value = $_REQUEST['menu-item-mimg'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_mimg', $ficon_value );
	   
	    // Check if element is properly sent
        if( !isset( $_REQUEST['menu-item-megamenu'][$menu_item_db_id] ) ) {
           $_REQUEST['menu-item-megamenu'][$menu_item_db_id] = '';
        }
        $megamenu_value = $_REQUEST['menu-item-megamenu'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_menu_item_megamenu', $megamenu_value );
    
	    // Check if element is properly sent
        if( !isset( $_REQUEST['menu-item-boxmenu'][$menu_item_db_id] ) ) {
           $_REQUEST['menu-item-boxmenu'][$menu_item_db_id] = '';
        }
        $boxmenu = $_REQUEST['menu-item-boxmenu'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_menu_item_boxmenu', $boxmenu );
    
	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function soup_scm_edit_walker($walker,$menu_id) {
	
	    return 'Soup_Walker_Nav_Menu_Edit';
	    
	}

}

// instantiate plugin's class
$GLOBALS['soup_mega_menu'] = new Soup_Mega_Menu();

require SOUP_DIR . '/inc/megamenu/soup-edit-walker.php';
require SOUP_DIR . '/inc/megamenu/nav-walker.php'; 