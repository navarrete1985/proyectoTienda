<?php


function my_theme_scripts(){
    //
    wp_register_script('jquery', get_template_directory_uri() . '/assets/wp-content/plugins/contact-form-7/includes/js/jquery.form.mind03d.js',null,null,false);
    wp_enqueue_script('jquery');
    
    wp_register_script('scripts4906', get_template_directory_uri() . '/assets/wp-content/plugins/contact-form-7/includes/js/scripts4906.js',array('jquery'),null,false);
    wp_enqueue_script('scripts4906');
    
    
    wp_register_script('cf7-scriptsf718', get_template_directory_uri() . '/assets/wp-content/themes/vortex/includes/additional-sources/static/js/cf7-scriptsf718.js',array('jquery'),null,false);
    wp_enqueue_script('cf7-scriptsf718');
    
    wp_register_script('bootstrap.minf718', get_template_directory_uri() . '/assets/wp-content/themes/vortex/assets/bootstrap/js/bootstrap.minf718.js',array('jquery'),null,false);
    wp_enqueue_script('bootstrap.minf718');
    
    wp_register_script('minf718', get_template_directory_uri() . '/assets/wp-content/themes/vortex/assets/js/plugins.minf718.js',array('jquery'),null,false);
    wp_enqueue_script('minf718');
    
    wp_register_script('custom.minf718', get_template_directory_uri() . '/assets/wp-content/themes/vortex/assets/js/custom.minf718.js',array('jquery'),null,false);
    wp_enqueue_script('custom.minf718');
    
    
    wp_register_script('infinitescroll', get_template_directory_uri() . '/assets/wp-content/themes/vortex/framework/extensions/portfolio/static/js/infinitescroll.minf718.js',array('jquery'),null,false);
    wp_enqueue_script('infinitescroll');
    
    wp_register_script('filterinfscrf718', get_template_directory_uri() . '/assets/wp-content/themes/vortex/framework/extensions/portfolio/static/js/filterinfscrf718.js',array('jquery'),null,false);
    wp_enqueue_script('filterinfscrf718');

    wp_register_script('extra-scriptsf718', get_template_directory_uri() . '/assets/wp-content/themes/vortex/includes/additional-sources/static/js/extra-scriptsf718.js',array('jquery'),null,false);
    wp_enqueue_script('extra-scriptsf718');
    
    wp_register_script('wp-embed.minf718', get_template_directory_uri() . '/assets/wp-includes/js/wp-embed.minf718.js',array('jquery'),null,false);
    wp_enqueue_script('wp-embed.minf718');
    
}

 
    
add_action('wp_enqueue_scripts','my_theme_scripts');


/* -------------------   SCRIPT DE about.php Y contact.php  ------------------------------------*/

    function scriptAbout() {
        wp_register_script('shortcode1', get_template_directory_uri() . '/assets/wp-content/plugins/unyson/framework/extensions/shortcodes/shortcodes/section/static/js/coref718.js?ver=4.7.12', array('jquery'), null, true);
        wp_enqueue_script('shortcode1'); 

        wp_register_script('shortcode2', get_template_directory_uri() . '/assets/wp-content/plugins/unyson/framework/extensions/shortcodes/shortcodes/section/static/js/transitionf718.js?ver=4.7.12', array('jquery'), null, true);
        wp_enqueue_script('shortcode2'); 
        
        wp_register_script('shortcode3', get_template_directory_uri() . '/assets/wp-content/plugins/unyson/framework/extensions/shortcodes/shortcodes/section/static/js/backgroundf718.js?ver=4.7.12', array('jquery'), null, true);
        wp_enqueue_script('shortcode3');   
        
        wp_register_script('shortcode4', get_template_directory_uri() . '/assets/wp-content/plugins/unyson/framework/extensions/shortcodes/shortcodes/section/static/js/background.initf718.js?ver=4.7.12', array('jquery'), null, true);
        wp_enqueue_script('shortcode4'); 
        
        wp_register_script('shortcode5', get_template_directory_uri() . '/assets/wp-content/plugins/unyson/framework/extensions/shortcodes/shortcodes/testimonials/static/js/jquery.carouFredSel-6.2.1-packedf718.js?ver=4.7.12', array('jquery'), null, true);
        wp_enqueue_script('shortcode5');          
    }

    add_action('wp_enqueue_scripts','scriptAbout');

// Soporte para la imágen destacada

add_theme_support('post-thumbnails');

//Función para los tags

function get_tag_id($tag) {
    global $wpdb;
    $link_id = $wpdb->get_var($wpdb->prepare("SELECT term_id FROM $wpdb->terms WHERE name =  %s", $tag));
    return $link_id;
}

// Creación del área para los widgets

function crea_area_widgets() {
    $sidebarArgs = array(
        'name' => 'Sidebar Widget',
        'id' => 'sidebar',
        'description' => 'Sidebar Widgets Area',
        'before_widget' => '<div class="widget %2$s">',  //%2$s -> Hace que se mantenga la clase de widgets
        'after_widget' => '</div>'
    );
}


/* -------------------   soporte consola  ------------------------------------*/
    function enviar_consola($data) {
        if (is_array($data)) {
            $output = "<script> console.log ('Array pasado:". implode(', ', $data). "'); </script>"; 
        }else {
            $output = "<script> console.log ('Elemento pasado:". $data. "'); </script>"; 
        }    
        echo $output;
    }   






