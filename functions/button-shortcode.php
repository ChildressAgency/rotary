<?php
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