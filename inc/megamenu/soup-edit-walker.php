<?php

/**
 *  /!\ This is a copy of Walker_Nav_Menu_Edit class in core
 * 
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */

class Soup_Walker_Nav_Menu_Edit extends Walker_Nav_Menu  {

	/**
	 * @see Walker_Nav_Menu::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */

	function start_lvl(&$output, $depth = 0, $args = array()) {	

	}

	

	/**
	 * @see Walker_Nav_Menu::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */

	function end_lvl(&$output, $depth = 0, $args = array() ) {

	}

	

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param object $args
	 */

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

	    global $_wp_nav_menu_max_depth;

	   

	    $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

	

	    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

	

	    ob_start();

	    $item_id = esc_attr( $item->ID );

	    $removed_args = array(

	        'action',

	        'customlink-tab',

	        'edit-menu-item',

	        'menu-item',

	        'page-tab',

	        '_wpnonce',

	    );

	

	    $original_title = '';

	    if ( 'taxonomy' == $item->type ) {

	        $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );

	        if ( is_wp_error( $original_title ) )

	            $original_title = false;

	    } elseif ( 'post_type' == $item->type ) {

	        $original_object = get_post( $item->object_id );

	        $original_title = $original_object->post_title;

	    }

	

	    $classes = array(

	        'menu-item menu-item-depth-' . $depth,

	        'menu-item-' . esc_attr( $item->object ),

	        'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),

	    );

	

	    $title = $item->title;

	

	    if ( ! empty( $item->_invalid ) ) {

	        $classes[] = 'menu-item-invalid';

	        /* translators: %s: title of menu item which is invalid */

	        $title = sprintf( esc_html( '%s (Invalid)','soup' ), $item->title );

	    } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {

	        $classes[] = 'pending';

	        /* translators: %s: title of menu item in draft status */

	        $title = sprintf( esc_html('%s (Pending)','soup'), $item->title );

	    }

	

	    $title = empty( $item->label ) ? $title : $item->label;

	

	    ?>

	    <li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo implode(' ', $classes ); ?>">

	        <dl class="menu-item-bar">

	            <dt class="menu-item-handle">

	                <span class="item-title"><?php echo esc_html( $title ); ?></span>

	                <span class="item-controls">

	                    <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>

	                    <span class="item-order hide-if-js">

	                        <a href="<?php

	                            echo wp_nonce_url(

	                                add_query_arg(

	                                    array(

	                                        'action' => 'move-up-menu-item',

	                                        'menu-item' => $item_id,

	                                    ),

	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )

	                                ),

	                                'move-menu_item'

	                            );

	                        ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up','soup'); ?>">&#8593;</abbr></a>

	                        |

	                        <a href="<?php

	                            echo wp_nonce_url(

	                                add_query_arg(

	                                    array(

	                                        'action' => 'move-down-menu-item',

	                                        'menu-item' => $item_id,

	                                    ),

	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )

	                                ),

	                                'move-menu_item'

	                            );

	                        ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down','soup'); ?>">&#8595;</abbr></a>

	                    </span>

	                    <a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>" title="<?php esc_attr_e('Edit Menu Item','soup'); ?>" href="<?php

	                        echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );

	                    ?>"><?php esc_html_e( 'Edit Menu Item','soup' ); ?></a>

	                </span>

	            </dt>

	        </dl>

	

	        <div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">

	            <?php if( 'custom' == $item->type ) : ?>

	                <p class="field-url description description-wide">

	                    <label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">

	                        <?php esc_html_e( 'URL','soup' ); ?><br />

	                        <input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />

	                    </label>

	                </p>

	            <?php endif; ?>

	            <p class="description description-thin">

	                <label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">

	                    <?php esc_html_e( 'Navigation Label' ,'soup'); ?><br />

	                    <input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />

	                </label>

	            </p>
 
	            <p class="field-link-target description">

	                <label for="edit-menu-item-target-<?php echo esc_attr($item_id); ?>">

	                    <input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr($item_id); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->target, '_blank' ); ?> />

	                    <?php esc_html_e( 'Open link in a new window/tab','soup' ); ?>

	                </label>

	            </p>

	            <p class="field-css-classes description description-thin">

	                <label for="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>">

	                    <?php esc_html_e( 'CSS Classes (optional)','soup' ); ?><br />

	                    <input type="text" id="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />

	                </label>

	            </p>

	            <p class="field-xfn description description-thin">

	                <label for="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>">

	                    <?php esc_html_e( 'Link Relationship (XFN)','soup' ); ?><br />

	                    <input type="text" id="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />

	                </label>

	            </p>

	            <p class="field-description description description-wide">

	                <label for="edit-menu-item-description-<?php echo esc_attr($item_id); ?>">

	                    <?php esc_html_e( 'Description','soup' ); ?><br />

	                    <textarea id="edit-menu-item-description-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->description ); ?></textarea>

	                    <span class="description"><?php esc_html_e('The description will be displayed in the menu if the current theme supports it.','soup'); ?></span>

	                </label>

	            </p>        

	            <?php

	            /* New fields insertion starts here */

	            ?>    
 

	            <p class="field-enableboxmenu description description-wide hidn">

	                <label for="edit-menu-item-boxmenu-<?php echo esc_attr($item_id); ?>">

	                    <input type="checkbox" id="edit-menu-item-boxmenu-<?php echo esc_attr($item_id); ?>" value="enabled" name="menu-item-boxmenu[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->boxmenu, 'enabled' ); ?> />

	                    <strong><?php esc_html_e( 'Enable Border Style','soup' ); ?></strong>

	                </label>

	            </p>

	            <p class="field-enablemegamenu description description-wide hidn">

	                <label for="edit-menu-item-megamenu-<?php echo esc_attr($item_id); ?>">

	                    <input type="checkbox" id="edit-menu-item-megamenu-<?php echo esc_attr($item_id); ?>" value="enabled" name="menu-item-megamenu[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->megamenu, 'enabled' ); ?> />

	                    <strong><?php esc_html_e( 'Enable Image','soup' ); ?></strong>

	                </label><br>
	                <span><?php esc_html_e('Image are applicable only for 1 level dropdown menu.','soup'); ?></span>

	            </p>
  

	            <p class="field-mimg description description-wide">
	                <label for="edit-menu-item-mimg-<?php echo esc_attr($item_id); ?>">  
		                <img class="custom_media_image_<?php echo esc_attr($item_id); ?>" id="upimage" src="<?php echo esc_attr( $item->mimg ); ?>" style="margin:0;padding:0;max-width:100px;display:block" />  
	                    <a href="#" id="custom_media_button_<?php echo esc_attr($item_id); ?>" style="margin-top:10px;" class="button button-primary custom_media_button"><?php esc_html_e('Upload', 'soup'); ?></a>
	                    <a href="#" id="custom_media_remove_<?php echo esc_attr($item_id); ?>" style="margin-top:10px;" class="button button-primary custom_media_remove"><?php esc_html_e('Remove', 'soup'); ?></a>
	                    <input type="hidden" id="edit-menu-item-mimg-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-mimg" name="menu-item-mimg[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->mimg ); ?>" />
	                </label> 
	            </p>   

  
	            <?php

	            /* New fields insertion ends here */

	            ?>

	            <div class="menu-item-actions description-wide submitbox">

	                <?php if( 'custom' != $item->type && $original_title !== false ) : ?>

	                    <p class="link-to-original">

	                        <?php printf( esc_html('Original: %s','soup'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>

	                    </p>

	                <?php endif; ?>

	                <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php

	                echo wp_nonce_url(

	                    add_query_arg(

	                        array(

	                            'action' => 'delete-menu-item',

	                            'menu-item' => $item_id,

	                        ),

	                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )

	                    ),

	                    'delete-menu_item_' . $item_id

	                ); ?>"><?php esc_html_e('Remove','soup'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo esc_attr($item_id); ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );

	                    ?>#menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php esc_html_e('Cancel','soup'); ?></a>

	            </div>

	

	            <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item_id); ?>" />

	            <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />

	            <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />

	            <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />

	            <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />

	            <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />

	        </div><!-- .menu-item-settings-->

	        <ul class="menu-item-transport"></ul>

	    <?php

	    

	    $output .= ob_get_clean();



	    }

}

