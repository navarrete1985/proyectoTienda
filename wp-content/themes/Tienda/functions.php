<?php

/************************   SOPORTES DEL TEMA  ********************************/
    /*---------- Para que aparezca los post-format (Back-end) ------------*/
    add_theme_support('post-formats', array('image','gallery','audio','video','link','quote'));  


    /* -------------------   soporte consola  --------------------------------*/
    function enviar_consola($data) {
        if (is_array($data)) {
            $output = "<script> console.log ('Array pasado:". implode(', ', $data). "'); </script>"; 
        }else {
            $output = "<script> console.log ('Elemento pasado:". $data. "'); </script>"; 
        }    
        echo $output;
    }

    /* -------------------   soporte Imagen Destacada  -----------------------*/
    add_theme_support('post-thumbnails');


/*****************************   SCRIPTS    ***********************************/

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
        
        wp_register_script('minnnnn', get_template_directory_uri() . '/assets/js/ini.js',array('jquery'),null,true);
        wp_enqueue_script('minnnnn');
        
        wp_register_script('mijs', get_template_directory_uri() . '/assets/js/mijs.js',array('jquery'),null,true);
        wp_enqueue_script('mijs');
        
        wp_register_script('embed', get_template_directory_uri() . '/assets/wp-includes/js/wp-embed.minf718.js',array('jquery'),null,true);
        wp_enqueue_script('embed');  
        
        wp_register_script('b8ff', get_template_directory_uri() . '/assets/wp-includes/js/jquery/jqueryb8ff.js',array('jquery'),null,false);
        wp_enqueue_script('b8ff');  
        
    /*    wp_register_script('min330', get_template_directory_uri() . '/assets/wp-includes/js/jquery/jquery-migrate.min330a.js',array('jquery'),null,false);
        wp_enqueue_script('min330');       */  
        
    }
    add_action('wp_enqueue_scripts','my_theme_scripts');


    /* ---------   SCRIPT DE about.php Y contact.php  ------------------------*/
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


    /* ----------------------   SCRIPT PROPIOS  ------------------------------*/
    function myScripts(){
        wp_register_script('sliderQuote', get_template_directory_uri() . '/assets/js/slider-quote.js', array('jquery'), null, false);
        wp_enqueue_script('sliderQuote'); 
        
        wp_register_script('submit', get_template_directory_uri() . '/assets/js/submit.js', array('jquery'), null, true);
        wp_enqueue_script('submit');         
    }
    add_action('wp_enqueue_scripts','myScripts'); 
    
    
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


/*****************************   COMENTARIOS  *********************************/

    // Quitar field URL de comentarios 
    
    function remove_url_field($fields){
        unset($fields['url']);
        return $fields;
    }
    add_filter('comment_form_default_fields','remove_url_field');

    /*    function push_comment_to_bottom($fields){
        $comment=$fields['comment'];
        unset($fields['comment']);
        $fields['comment']=$comment;
        
        $fields['checkpoliticas'] = 
                    '<input id="checkpoliticas" name="checkpoliticas" type="checkbox" />
                     <label id = "labelcheck"for="checkpoliticas">Aceptas nuestras politicas de privacidad y esas cosas  <a href="http://ladireccionquequieras">Politica de privacidad</a></label>';
                    
        return $fields;
    }
    add_filter('comment_form_fields','push_comment_to_bottom');
*/

    // Poner texarea al final
    function push_comment_bottom($fields) {
        $comment = $fields['comment'];
        unset($fields['comment']);
        $fields['comment'] = $comment;
        return $fields;
    } 
    add_filter('comment_form_fields', 'push_comment_bottom'); 

    //Añadir politica de privacidad y checkbox
    function add_checkbox_rgpd($fields) {
            $rgpd = '<input type="checkbox" id="rgpd" name="rgpd" value="check"/>';
            $rgpd = $rgpd . '<label id = "labelcheck" for="rgpd">&nbsp&nbsp He leido y acepto la<a class="texto rgpd" href="';
            $rgpd = $rgpd . get_page_link(get_page_by_title('politica')->ID); 
            $rgpd = $rgpd . '" target="_blank">&nbsp&nbsp politica de privacidad</a>&nbsp&nbsp de Vortex.</label>';
            $fields['rgpd'] = $rgpd;
            return $fields;            
    } 
    add_filter('comment_form_fields','add_checkbox_rgpd'); 

    //guarda el campo como comment meta
    function save_comment_meta_data ($post_id) {
    $rgpd = $_POST['rgpd'];
        if ($rgpd) {
            add_comment_meta($post_id,'rgpd','Aceptada politica de privacidad', true);
        }
    }
    add_action( 'comment_post', 'save_comment_meta_data', 1 );
    
    // Mostramos el valor del metadato en la página de administración de comentarios
    if ( is_admin() ) {
        function show_commeta() {
           echo get_comment_text(), '<br><br><strong>', get_comment_meta(get_comment_ID(), 'rgpd',1), '<strong>';
           }
        add_action('comment_text', 'show_commeta');
    }    
    
/***************** CAMPOS DE USUARIO EN BACK-END    ***************************/
    function extra_profile_fields( $user ) { ?>
    
        <h3>Extra profile information Redes</h3>
        <table class="form-table">
            <tr>
                <th><label for="twitter">Twitter</label></th>
                <td>
                    <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" />
                    <span class="description">Please enter your Twitter username.</span>
                </td>
            </tr>
            <tr>
                <th><label for="facebook">Facebook</label></th>
                <td>
                    <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" />
                    <span class="description">Please enter your Facebook page.</span>
                </td>
            </tr>
            <tr>
                <th><label for="linkedin">Linkedin</label></th>
                <td>
                    <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" />
                    <span class="description">Please enter your Facebook page.</span>
                </td>
            </tr>        
        </table>
        
        <h3>Extra profile Skills</h3>
        <table class="form-table"> 
            <tr>
                <th><label for="networking">Networking</label></th>
                <td>
                    <input type="text" name="networking" id="networking" value="<?php echo esc_attr( get_the_author_meta( 'networking', $user->ID ) ); ?>" class="regular-text" />
                    <span class="description">Introduce % nivel en Networking.</span>
                </td>
            </tr>    
            <tr>
                <th><label for="moda">Moda</label></th>
                <td>
                    <input type="text" name="moda" id="moda" value="<?php echo esc_attr( get_the_author_meta( 'moda', $user->ID ) ); ?>" class="regular-text" />
                    <span class="description">Introduce % en conocimientos de moda.</span>
                </td>
            </tr>   
            <tr>
                <th><label for="innovacion">Innovación y tecnologia</label></th>
                <td>
                    <input type="text" name="innovacion" id="innovacion" value="<?php echo esc_attr( get_the_author_meta( 'innovacion', $user->ID ) ); ?>" class="regular-text" />
                    <span class="description">Introduce % nivel de innovación y técnología.</span>
                </td>
            </tr> 
            <tr>
                <th><label for="marketing">Marketing</label></th>
                <td>
                    <input type="text" name="marketing" id="marketing" value="<?php echo esc_attr( get_the_author_meta( 'marketing', $user->ID ) ); ?>" class="regular-text" />
                    <span class="description">Introduce % nivel de marketing.</span>
                </td>
            </tr>         
        </table> 
        
        <h3>Campos adicionales</h3>
        <table class="form-table"> 
            <tr>
                <th><label for="Pais">Pais:</label></th>
                <td>
                    <input type="text" name="Pais" id="Pais" value="<?php echo esc_attr( get_the_author_meta( 'Pais', $user->ID ) ); ?>" class="regular-text" />
                </td>
            </tr>  
            <tr>
                <th><label for="Telefono">Telefono:</label></th>
                <td>
                    <input type="text" name="Telefono" id="Telefono" value="<?php echo esc_attr( get_the_author_meta( 'Telefono', $user->ID ) ); ?>" class="regular-text" />
                </td>
            </tr>   
            <tr>
                <th><label for="Fecha_nac">Fecha nacimiento:</label></th>
                <td>
                    <input type="text" name="Fecha_nac" id="Fecha_nac" value="<?php echo esc_attr( get_the_author_meta( 'Fecha_nac', $user->ID ) ); ?>" class="regular-text" />
                </td>
            </tr>            
        </table>        
<?php        
    }  
    add_action( 'show_user_profile', 'extra_profile_fields' );
    add_action( 'edit_user_profile', 'extra_profile_fields' );

    function save_custom_profile_fields($user_id) {
        if ( !current_user_can( 'edit_user', $user_id ) ) return false;             /*Si el usuario no tiene permisos se sale de la función */
        update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
        update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
        update_usermeta( $user_id, 'linkedin', $_POST['linkedin'] );  
        update_usermeta( $user_id, 'networking', $_POST['networking'] );
        update_usermeta( $user_id, 'moda', $_POST['moda'] );
        update_usermeta( $user_id, 'innovacion', $_POST['innovacion'] );   
        update_usermeta( $user_id, 'marketing', $_POST['marketing'] );
        update_usermeta( $user_id, 'Pais', $_POST['Pais'] ); 
        update_usermeta( $user_id, 'Telefono', $_POST['Telefono'] ); 
        update_usermeta( $user_id, 'Fecha_nac', $_POST['Fecha_nac'] );          
    }
    add_action( 'personal_options_update', 'save_custom_profile_fields' );
    add_action( 'edit_user_profile_update', 'save_custom_profile_fields' );
    
    
    function get_author_role($author_id) {
        $user_info = get_userdata($author_id);
        return implode(', ',$user_info->roles);
    }  
    
    /*--------   Función para sacar la imagen de autor  ----------------------*/
    function imgAutor($alias) {
        $imgAutor = $alias . '.jpg';
        $urlimgAutor = '/assets/img/usuarios/' . $imgAutor;
        return $urlimgAutor;
    }    
