<?php 

/*
 * Footer Nav Walker
 *
 * Modified from code found here: 
 * https://dalwadiwp.wordpress.com/2016/09/22/wordpress-li-nav-menu-set-in-2-columns/
 */
class Footer_Nav_Walker extends Walker_Nav_Menu {

    var $current_menu = null;
    var $break_point = null;
     
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
     
        global $wp_query;
         
        if( !isset( $this->current_menu ) )
            $this->current_menu = wp_get_nav_menu_object( $args->menu );
         
        if( !isset( $this->break_point ) )
            $this->break_point = ceil( $this->current_menu->count / 2 ) + 1;
         
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
         
        $class_names = $value = '';
         
        if( $this->break_point == $item->menu_order )
            $output .= $indent . '</li></ul><ul class="col-12 col-sm-6 footer__menu"><li' .  $value  .'>';
        else
            $output .= $indent . '<li' . $value .'>';

        $attributes = ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
         
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'><strong>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</strong></a>';
        $item_output .= $args->after;
         
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}