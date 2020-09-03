<?php
 
class Soup_navwalker extends Walker_Nav_Menu {

	public $soup_Mega ='';
	public $soup_Box ='';
	public $soup_Mega_opt ='';
	public $soup_Mega_url =''; 

	public $soup_child_2 ='';

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) { 
		$indent = str_repeat( "\t", $depth );
		$this->soup_Mega_opt = $this->soup_Mega;
		$this->soup_Mega_img_url = $this->soup_Mega_url;
		if( $depth === 0 &&  $this->soup_Mega == "yes" ){
			$output .= "\n$indent <div class=\"dropdown-container soup-mega\"><ul class=\"dropdown-mega\">\n";
		}elseif( $depth === 1 &&  $this->soup_child_2 == 2 ){
			$output .= "\n$indent <ul>\n";
		}else{
			$output .= "\n$indent <div class=\"dropdown-container nrml\"><ul>\n";
		}
	}


    // Displays end of a level. E.g '</ul>'
    // @see Walker::end_lvl()
    public function end_lvl(&$output, $depth=0, $args=array()) {
    	$indent = str_repeat( "\t", $depth );
    	 
		$postfix = "";
		$postfix = "\n <div class=\"dropdown-image\"><img src=\"{$this->soup_Mega_img_url}\" ></div>\n";
		 
		if( $depth === 0 &&  $this->soup_Mega_opt == "yes" ){
			$output .= "\n$indent </ul>{$postfix}</div>\n";
		}elseif( $depth === 1 &&  $this->soup_child_2 == 2 ){
			$output .= "\n$indent </ul>\n";
		}else{
			$output .= "\n$indent </ul></div>\n";
		}
    }

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

	    if($item->megamenu == 'enabled'){
	      $this->soup_Mega = 'yes';
	    }else{
	      $this->soup_Mega = 'no';
	    }

	    if($item->boxmenu == 'enabled'){
	      $this->soup_Box = 'btn btn-outline-primary';
	    }else{
	      $this->soup_Box = '';
	    }

	    if( $item->mimg ){
	      $this->soup_Mega_url = $item->mimg;
	    }else{
	      $this->soup_Mega_url = '';
	    }
 
		/**
		* Dividers, Headers or Disabled
		* =============================
		* Determine whether the item is a Divider, Header, Disabled or regular
		* menu item. To prevent errors we use the strcasecmp() function to so a
		* comparison that is not case sensitive. The strcasecmp() function returns
		* a 0 if the strings are equal.
		*/
		if ( 0 === strcasecmp( $item->attr_title, 'divider' ) && 1 === $depth ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} elseif ( 0 === strcasecmp( $item->title, 'divider' ) && 1 === $depth ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} elseif ( 0 === strcasecmp( $item->attr_title, 'dropdown-header' ) && 1 === $depth ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} elseif ( 0 === strcasecmp( $item->attr_title, 'disabled' ) ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {
			$value = '';
			$class_names = $value;
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			if ( $args->has_children ) {
				$class_names .= ' has-dropdown';
				$this->soup_child_2 = 2;
			}
			
			if ( in_array( 'current-menu-item', $classes, true ) ) {
				$class_names .= ' active';
			}
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . 
			'"' : '';
			$output .= $indent . '<li' . $id . $value . $class_names . '>';
			$atts = array(); 
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
			// If item has_children add atts to a.
			if ( $args->has_children && 0 === $depth ) {
				$atts['href']   		=  $item->url; 
				$atts['class']			= ''; 
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
				if (  0 === $depth ) {
					$atts['class']			= $this->soup_Box; 
				}
			}
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			$item_output = $args->before;
			/*
			 * Glyphicons/Font-Awesome
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) ) {
				$pos = strpos( esc_attr( $item->attr_title ), 'glyphicon' );
				if ( false !== $pos ) {
					$item_output .= '<a' . $attributes . '><span class="glyphicon ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></span>&nbsp;';
				} else {
					$item_output .= '<a' . $attributes . '><i class="fa ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></i>&nbsp;';
				}
			} else {
				$item_output .= '<a' . $attributes . '>';
			}
			if($item->boxmenu == 'enabled'){
				$item_output .= '<span>';
			}
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			if($item->boxmenu == 'enabled'){
				$item_output .= '</span>';
			}
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' </a>' : '</a>';
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		} // End if().
	}

 

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
 
}