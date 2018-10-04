<?php

	add_action('wp_footer', 'show_template');
	function show_template() {
		global $template;
		print_r($template);
	}

	function jquery_cdn(){
	  if(!is_admin()){
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null, true);
		wp_enqueue_script('jquery');
	  }
	}
	add_action('wp_enqueue_scripts', 'jquery_cdn');
	function rotary_scripts(){
	  wp_register_script(
		'bootstrap-script', 
		'//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', 
		array('jquery'), 
		'', 
		true
	  );
	  wp_register_script(
		'rotary-script', 
		'/wp-content/themes/rotary/js/rotary-script.js', 
		array('jquery'), 
		'', 
		true
	  );
	  
	  wp_enqueue_script('bootstrap-script');
	  //wp_enqueue_script('rotary-script');
	}
	add_action('wp_enqueue_scripts', 'rotary_scripts', 100);
	
	function rotary_styles(){
	  wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
	  wp_register_style('rotary', get_template_directory_uri() . '/style.css');
	  
	  wp_enqueue_style('bootstrap-css');
	  wp_enqueue_style('rotary');
	}
	add_action('wp_enqueue_scripts', 'rotary_styles');

	if(function_exists('acf_add_options_page')){
	  acf_add_options_page(array(
	    'page_title' => 'Global Site Settings',
	    'menu_title' => 'Global Settings',
	    'menu_slug' => 'global-settings',
	    'capability' => 'edit_posts',
	    'redirect' => false
	  ));
	}

	// load fonts
	function load_fonts() {
		wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700', false );
	}
	add_action( 'wp_enqueue_scripts', 'load_fonts' );

	// load font awesome
	function load_font_awesome(){
		wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.3.1/css/all.css');
	}
	add_action('wp_enqueue_scripts','load_font_awesome');

	// Register Navigation Menus
	register_nav_menus( array(
		'header_menu' => 'Header Menu',
		'main_menu' => 'Main Menu',
		'footer_menu' => 'Footer Menu'
	) );


	// Custom Nav Walker
	class Custom_Nav_Walker extends Walker_Nav_Menu {

	    function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
	        global $post;
	        $pageID = $post->ID; // id of current page
			$title = $item->title; // title of menu item
			$objectID = $item->object_id; // page id of menu item
			$permalink = $item->url; // link of menu item
			$hasChildren = in_array( 'has-children', $item->classes ); // whether the menu item has children
			$parent = $item->menu_item_parent; // the parent of the current menu item

			// if the current menu item has a parent, then it is a dropdown item
			if( $parent ){
				$output .= "<a class=\"dropdown-item\" href=\"" . $permalink . "\">";
				$output .= $title;
				$output .= "</a>";
			} else {
				$output .= "<li class=\"nav-item";

				// if this item has children, then it is a dropdown menu
				if( $hasChildren )
					$output .= " dropdown";

				// if this item goes to this page, then highlight it
				if( $objectID == $pageID )
					$output .= " active";

				// close the tag
				$output .= "\">";


				// if this item is a dropdown menu, it needs some extra info
				if( $hasChildren ){
					$output .= "<a href=\"#\" class=\"nav-link dropdown-toggle\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\">";
				}
				else{
					$output .= "<a href=\"" . $permalink . "\" class=\"nav-link\">";
				}

				// item title and close the tag
				$output .= $title;
				$output .= "</a>";
			}
		}

		// same as the default function, except the class is 'dropdown-menu' instead of 'sub-menu'
		function start_lvl( &$output, $depth = 0, $args = array() ){
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			        $t = '';
			        $n = '';
			    } else {
			        $t = "\t";
			        $n = "\n";
			    }
			    $indent = str_repeat( $t, $depth );
			 
			    // Default class.
			    $classes = array( 'dropdown-menu' );
			 
			    /**
			     * Filters the CSS class(es) applied to a menu list element.
			     *
			     * @since 4.8.0
			     *
			     * @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
			     * @param stdClass $args    An object of `wp_nav_menu()` arguments.
			     * @param int      $depth   Depth of menu item. Used for padding.
			     */
			    $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
			    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			 
			    $output .= "{$n}{$indent}<ul$class_names>{$n}";
		}
	}

	// if a nav item has children, add the 'has-children' class to it
	function add_has_children_to_nav_items( $items )
	{
	    $parents = wp_list_pluck( $items, 'menu_item_parent');

	    foreach ( $items as $item )
	        in_array( $item->ID, $parents ) && $item->classes[] = 'has-children';

	    return $items;
	}
	add_filter( 'wp_nav_menu_objects', 'add_has_children_to_nav_items' );



	/*
	 * This custom shortcode creates a bootstrap button.
	 *
	 * The type can be one of: (1, 2), which will determine
	 * primary/secondary.
	 */
	function button_function( $atts, $content = null ) {
	   extract(shortcode_atts(array(
	      'link' => '#',
	      'type' => '1'
	   ), $atts));

		$return_string = '<a href="';

		// link
		if( $link )
			$return_string .= $link;
		else
			$return_string .= '#';

		// primary or secondary
		if( $type && $type == '2')
			$return_string .= '" class="btn btn-secondary">';
		else
			$return_string .= '" class="btn btn-primary">';

		// button text
		if( $content )
			$return_string .= $content;
		else
			$return_string .= 'Button';

		$return_string .= '</a>';

		return $return_string;
	}

	/*
     * 'button' is how the shortcode is called
     * e.g. [button]
     */
	function register_shortcodes(){
	   add_shortcode('button', 'button_function');
	}
	add_action( 'init', 'register_shortcodes');

	/*
	 *Initialize process for registering your custom TinyMCE buttons hook
	 */
	add_action('init', 'sh_custom_shortcode_button_init_callback');
	/*
	 * Initialize process for registering your custom TinyMCE buttons callback
	 */
	function sh_custom_shortcode_button_init_callback() {
	 
	    //If the user can not see the TinyMCE please stop early
	    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true') {
	        return;
	    }
	 
	    //Add a callback request to register the tinymce plugin hook
	    add_filter("mce_external_plugins", "sh_custom_register_tinymce_plugin_callback");
	    //Add a callback request to add the button to the TinyMCE toolbar hook
	    add_filter('mce_buttons', 'sh_custom_add_tinymce_button_callback');
	}

	/*
	 * This callback is process our TinyMCE Editor plug-in.
	 */
	function sh_custom_register_tinymce_plugin_callback($plugin_array) {
	    $url = get_template_directory_uri() . '/js/custom_editor.js';
	    //set custom js url path
	    $plugin_array['sh_custom_button'] = $url;
	    //return
	    return $plugin_array;
	}
	 
	/*
	 * This callback adds our button to the TinyMCE Editor toolbar
	 */
	function sh_custom_add_tinymce_button_callback($buttons) {
	    //Set the custom button identifier to the $buttons array
	    $buttons[] = "sh_custom_button";
	    //return $buttons
	    return $buttons;
	}
?>