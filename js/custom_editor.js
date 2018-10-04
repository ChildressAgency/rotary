jQuery(document).ready(function($) {
    //create TinyMCE plugin
    tinymce.create('tinymce.plugins.sh_custom_plugin', {
        init : function(ed, url) {
            // Setup the command when the button is pressed
            ed.addCommand('sh_custom_insert_shortcode', function() {
                content = '[button link="#" type="1"]TEXT[/button]';
                tinymce.execCommand('mceInsertContent', false, content);
            });
            //Add Button to Visual Editor Toolbar and launch the above command when it is clicked.
            // image: url + '/user.png' - here you can add your image path
            ed.addButton('sh_custom_button', {
                title : 'Insert shortcode',
                cmd : 'sh_custom_insert_shortcode',
                image: 'http://dev.childressagency.com/rotary/wp-content/uploads/2018/10/if_link_328008.png'
            });
        },
    });
    //Setup the TinyMCE plugin. The first parameter is the button ID and the second parameter must match the first parameter of the above "tinymce.create ()" function.
    tinymce.PluginManager.add('sh_custom_button', tinymce.plugins.sh_custom_plugin);
});