<?php


function my_theme_scripts(){
    //
    wp_register_script('jquery', get_template_directory_uri() . '/wp-content/plugins/contact-form-7/includes/js/jquery.form.mind03d.js',null,null,false);
    wp_enqueue_script('jquery');
    
    wp_register_script('scripts4906', get_template_directory_uri() . '/wp-content/plugins/contact-form-7/includes/js/scripts4906.js',array('jquery'),null,false);
    wp_enqueue_script('scripts4906');
    
    
    wp_register_script('cf7-scriptsf718', get_template_directory_uri() . '/wp-content/themes/vortex/includes/additional-sources/static/js/cf7-scriptsf718.js',array('jquery'),null,false);
    wp_enqueue_script('cf7-scriptsf718');
    
    wp_register_script('bootstrap.minf718', get_template_directory_uri() . '/wp-content/themes/vortex/assets/bootstrap/js/bootstrap.minf718.js',array('jquery'),null,false);
    wp_enqueue_script('bootstrap.minf718');
    
    wp_register_script('minf718', get_template_directory_uri() . '/wp-content/themes/vortex/assets/js/plugins.minf718.js',array('jquery'),null,false);
    wp_enqueue_script('minf718');
    
    wp_register_script('custom.minf718', get_template_directory_uri() . '/wp-content/themes/vortex/assets/js/custom.minf718.js',array('jquery'),null,false);
    wp_enqueue_script('custom.minf718');
    
    
    wp_register_script('infinitescroll', get_template_directory_uri() . '/wp-content/themes/vortex/framework/extensions/portfolio/static/js/infinitescroll.minf718.js',array('jquery'),null,false);
    wp_enqueue_script('infinitescroll');
    
    wp_register_script('filterinfscrf718', get_template_directory_uri() . '/wp-content/themes/vortex/framework/extensions/portfolio/static/js/filterinfscrf718.js',array('jquery'),null,false);
    wp_enqueue_script('filterinfscrf718');

    wp_register_script('extra-scriptsf718', get_template_directory_uri() . '/wp-content/themes/vortex/includes/additional-sources/static/js/extra-scriptsf718.js',array('jquery'),null,false);
    wp_enqueue_script('extra-scriptsf718');
    
    wp_register_script('wp-embed.minf718', get_template_directory_uri() . '/wp-includes/js/wp-embed.minf718.js',array('jquery'),null,false);
    wp_enqueue_script('wp-embed.minf718');
    
}


    
    
    
    
    
    
add_action('wp_enqueue_scripts','my_theme_scripts');













