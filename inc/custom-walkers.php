<?php 

class Walker_Menu_Project extends Walker {


        var $tree_type = 'category';
        var $db_fields = array ('parent' => 'parent', 'id' => 'term_id');
        var $li_tag = 'h3';


        function start_lvl( &$output, $depth = 0, $args = array() ) {
                if ( 'list' != $args['style'] )
                        return;
                $indent = str_repeat("\t", $depth);                
                $output .= "$indent\n\t<ul>\n";                
        }

        function end_lvl( &$output, $depth = 0, $args = array() ) {
                if ( 'list' != $args['style'] )
                        return;
                $indent = str_repeat("\t", $depth);
                $output .= "$indent\t</ul>\n";        
        }

        function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {

                //$li_tag = 'h3';

                /** This filter is documented in wp-includes/category-template.php */
                $cat_name = apply_filters(
                        'list_cats',
                        esc_attr( $category->name ),
                        $category
                );
                // Don't generate an element if the category name is empty.
                if ( ! $cat_name ) {
                        return;
                }
                // Controlla se ci sono submenu e regola il link di conseguenza
                $termchildren_num  = count ( get_term_children( $category->term_id, $category->taxonomy) );

                if ( $termchildren_num > 0 ) {
                        $link = "" ;
                } else {
                        $link = '<a href="' . esc_url( get_term_link( $category ) ) . '" >';                          
                }

                $link .= '<' . $this->li_tag . '>';
                $link .= $cat_name . $chevron . '</h3></a>';

                if ( 'list' == $args['style'] ) {

                        $output .= "\t<li";

                        if ( ! empty( $args['current_category'] ) ) {
                                $_current_category = get_term( $args['current_category'], $category->taxonomy );
                                if ( $category->term_id == $args['current_category'] ) {
                                        // $css_classes[] = 'current-cat';
                                } elseif ( $category->term_id == $_current_category->parent ) {
                                        // $css_classes[] = 'current-cat-parent';
                                         
                                }
                        }

                        
                        $css_classes = ($termchildren_num > 0 ) ? 'has-submenu" >': '">';
                        $output .=  ' class="' . $css_classes;                        
                        $output .= "$link";
                } else {
                        $output .= "\t$link<br />\n";
                }
        }




}  





class Walker_Menu_Mobile extends Walker {


        // var $db_fields = array( 
        //      'parent' => 'parent_id', 
        //      'id' => 'object_id' 
        // );
        var  $tree_type = 'category';
        var $db_fields = array ('parent' => 'parent', 'id' => 'term_id');


        function start_lvl( &$output, $depth = 0, $args = array() ) {
                if ( 'list' != $args['style'] )
                        return;
                $indent = str_repeat("\t", $depth);
                $output .= "$indent\n\t<ul class='left-submenu'>\n";
                $output .= "\t<li class='back'><a href='#'><h3>Back</h3></a></li>\n";
                
        }
        /**
         * Ends the list of after the elements are added.
         *
         * @see Walker::end_lvl()
         *
         * @since 2.1.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int    $depth  Depth of category. Used for tab indentation.
         * @param array  $args   An array of arguments. Will only append content if style argument value is 'list'.
         *                       @wsee wp_list_categories()
         */
        function end_lvl( &$output, $depth = 0, $args = array() ) {
                if ( 'list' != $args['style'] )
                        return;
                $indent = str_repeat("\t", $depth);
                $output .= "$indent\t</ul>\n";        }
        /**
         * Start the element output.
         *
         * @see Walker::start_el()
         *
         * @since 2.1.0
         *
         * @param string $output   Passed by reference. Used to append additional content.
         * @param object $category Category data object.
         * @param int    $depth    Depth of category in reference to parents. Default 0.
         * @param array  $args     An array of arguments. @see wp_list_categories()
         * @param int    $id       ID of the current category.
         */
        function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
                /** This filter is documented in wp-includes/category-template.php */
                $cat_name = apply_filters(
                        'list_cats',
                        esc_attr( $category->name ),
                        $category
                );
                // Don't generate an element if the category name is empty.
                if ( ! $cat_name ) {
                        return;
                }

                // Controlla se ci sono submenu e regola il link di conseguenza
                $termchildren_num  = count ( get_term_children( $category->term_id, $category->taxonomy) );

                $chevron = '';
                if ( $termchildren_num > 0 ) {
                        $link = "<a href='#'" ;
                        $chevron = '<i class="fa fa-chevron-right"></i>';
                } else {
                        $link = '<a href="' . esc_url( get_term_link( $category ) ) . '" ';                          
                }


                // if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
                //         /**
                //          * Filter the category description for display.
                //          *
                //          * @since 1.2.0
                //          *
                //          * @param string $description Category description.
                //          * @param object $category    Category object.
                //          */
                //         $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
                // }


                $link .= "><h3>";
                
                $link .= $cat_name . $chevron . '</h3></a>';


                // if ( ! empty( $args['feed_image'] ) || ! empty( $args['feed'] ) ) {
                //         $link .= ' ';
                //         if ( empty( $args['feed_image'] ) ) {
                //                 $link .= '(';
                //         }
                //         $link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $args['feed_type'] ) ) . '"';
                //         if ( empty( $args['feed'] ) ) {
                //                 $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
                //         } else {
                //                 $alt = ' alt="' . $args['feed'] . '"';
                //                 $name = $args['feed'];
                //                 $link .= empty( $args['title'] ) ? '' : $args['title'];
                //         }
                //         $link .= '>';
                //         if ( empty( $args['feed_image'] ) ) {
                //                 $link .= $name;
                //         } else {
                //                 $link .= "<img src='" . $args['feed_image'] . "'$alt" . ' />';
                //         }
                //         $link .= '</a>';
                //         if ( empty( $args['feed_image'] ) ) {
                //                 $link .= ')';
                //         }
                // }
                // if ( ! empty( $args['show_count'] ) ) {
                //         $link .= ' (' . number_format_i18n( $category->count ) . ')';
                // }
                if ( 'list' == $args['style'] ) {

                        $output .= "\t<li";
                        

                        // $css_classes = array(
                        //         'cat-item',
                        //         'cat-item-' . $category->term_id,
                        // );
                        if ( ! empty( $args['current_category'] ) ) {
                                $_current_category = get_term( $args['current_category'], $category->taxonomy );
                                if ( $category->term_id == $args['current_category'] ) {
                                        // $css_classes[] = 'current-cat';
                                } elseif ( $category->term_id == $_current_category->parent ) {
                                        // $css_classes[] = 'current-cat-parent';
                                         
                                }
                        }

                        /**
                         * Filter the list of CSS classes to include with each category in the list.
                         *
                         * @since 4.2.0
                         *
                         * @see wp_list_categories()
                         *
                         * @param array  $css_classes An array of CSS classes to be applied to each list item.
                         * @param object $category    Category data object.
                         * @param int    $depth       Depth of page, used for padding.
                         * @param array  $args        An array of wp_list_categories() arguments.
                         */
                        // $css_classes = implode( ' ', apply_filters( 'category_css_class', $css_classes, $category, $depth, $args ) );
                        // $output .=  ' class="' . $css_classes . '"';
                        
                        $css_classes = ($termchildren_num > 0 ) ? 'has-submenu" >': '">';

                        $output .=  ' class="' . $css_classes;

                        

                        $output .= "$link";
                } else {
                        $output .= "\t$link<br />\n";
                }
        }
        /**
         * Ends the element output, if needed.
         *
         * @see Walker::end_el()
         *
         * @since 2.1.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $page   Not used.
         * @param int    $depth  Depth of category. Not used.
         * @param array  $args   An array of arguments. Only uses 'list' for whether should append to output. @see wp_list_categories()
         */
        function end_el( &$output, $page, $depth = 0, $args = array() ) {
                if ( 'list' != $args['style'] )
                        return;
                $output .= "</li>\n";
        }




}



class Custom_Walker_Nav_Menu extends Walker {

        var $tree_type = array( 'post_type', 'taxonomy', 'custom' );        
        var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );        

        function start_lvl( &$output, $depth = 0, $args = array() ) {
                $indent = str_repeat("\t", $depth);
                $output .= "\n$indent<ul class=\"sotto-menu\">\n";
        }

        function end_lvl( &$output, $depth = 0, $args = array() ) {
                $indent = str_repeat("\t", $depth);
                $output .= "$indent</ul>\n";
        }

        /**
         * Start the element output.
         *
         * @see Walker::start_el()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item   Menu item data object.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         * @param int    $id     Current item ID.
         */
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {   print_r ($a);
                $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
                $classes = empty( $item->classes ) ? array() : (array) $item->classes;
                $classes[] = 'menu-item-' . $item->ID;

                if (in_array("menu-item-has-children", $classes)) {
                        $elem_has_children = true;
                        $classes[] = 'menu-item-has-bambini';

                }
                /**
                 * Filter the CSS class(es) applied to a menu item's list item element.
                 *
                 * @since 3.0.0
                 * @since 4.1.0 The `$depth` parameter was added.
                 *
                 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
                 * @param object $item    The current menu item.
                 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
                 * @param int    $depth   Depth of menu item. Used for padding.
                 */
                $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );


                // if (in_array("menu-item-has-children", $class_names)) {
                //             $class_names[] = 'menu-item-has-bambini';

                // }
                // $class_names[] = 'menu-item-has-bambini';
                

                $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
                /**
                 * Filter the ID applied to a menu item's list item element.
                 *
                 * @since 3.0.1
                 * @since 4.1.0 The `$depth` parameter was added.
                 *
                 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
                 * @param object $item    The current menu item.
                 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
                 * @param int    $depth   Depth of menu item. Used for padding.
                 */
                $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
                $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
                $output .= $indent . '<li' . $id . $class_names .'>';
                $atts = array();
                $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
                $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
                $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
                $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
                /**
                 * Filter the HTML attributes applied to a menu item's anchor element.
                 *
                 * @since 3.6.0
                 * @since 4.1.0 The `$depth` parameter was added.
                 *
                 * @param array $atts {
                 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
                 *
                 *     @type string $title  Title attribute.
                 *     @type string $target Target attribute.
                 *     @type string $rel    The rel attribute.
                 *     @type string $href   The href attribute.
                 * }
                 * @param object $item  The current menu item.
                 * @param array  $args  An array of {@see wp_nav_menu()} arguments.
                 * @param int    $depth Depth of menu item. Used for padding.
                 */
                $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
                $attributes = '';
                foreach ( $atts as $attr => $value ) {
                        if ( ! empty( $value ) ) {
                                //$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                                if ('href' === $attr) {
                                        // esc_url( $value );
                                        $value = ($elem_has_children) ? '#' : esc_url( $value );
                                } else {
                                        esc_attr( $value );
                                }
                                $attributes .= ' ' . $attr . '="' . $value . '"';
                        }
                }
                $item_output = $args->before;
                $item_output .= '<a'. $attributes .'>';
                /** This filter is documented in wp-includes/post-template.php */
                $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;
                /**
                 * Filter a menu item's starting output.
                 *
                 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
                 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
                 * no filter for modifying the opening and closing `<li>` for a menu item.
                 *
                 * @since 3.0.0
                 *
                 * @param string $item_output The menu item's starting HTML output.
                 * @param object $item        Menu item data object.
                 * @param int    $depth       Depth of menu item. Used for padding.
                 * @param array  $args        An array of {@see wp_nav_menu()} arguments.
                 */
                $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
        /**
         * Ends the element output, if needed.
         *
         * @see Walker::end_el()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item   Page data object. Not used.
         * @param int    $depth  Depth of page. Not Used.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         */
        function end_el( &$output, $item, $depth = 0, $args = array() ) {
                $output .= "</li>\n";
        }

}

// add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
// function special_nav_class($classes, $item){
//         print_r($item);
//         echo("ciao" . $item->title); 

//         print_r('vediamo' . $menu_items_with_children);



//         $classes[] = 'menu-bho';
//                 //         if ( isset( $menu_items_with_children[ $item->ID ] ) )
//                 //                 $classes[] = 'menu-item-has-bambini';
//                 // }
//                 if ( $item->parent > 0 ) {
//                         $classes[] = 'menu-item-has-bambini';
//                 }
//      return $classes;
// }

?>