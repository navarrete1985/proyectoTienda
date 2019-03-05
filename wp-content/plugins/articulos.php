<?php
/*

    Plugin Name: articulos
    Plugin URI: www.minelli.es
    Description: Custom post type de venta zapatos y accesorios.
    Version: 1.0
    Author: Grupo 5
    Author URI: www.grupo5.es

*/

/************   Función para registrar el CPT bk_articulos  *******************/

    function reg_post_type_art() {
        $supports = array(
                'title', //titulo del post
                'editor', // contenido del post
                'author', // autor
                'thumbnail', //imagen representativa
            //    'excerpt',
            //    'custom-fields',
                'comments', // comentarios
                'revisions', // revisiones
            //    'post-formats', // formato del post.
            //    'page-attributes',
            //    'custom-fields',
            //    'trackbacks',
            );
            
        $labels = array(
                'name' => _x('Articulos', 'plural'), //  nombre general para el tipo de publicación, generalmente plural (Por defecto = posts/pages)
                'singular_name' => _x('Articulo', 'singular'), //  nombre para un objeto de este tipo de publicación.
                'menu_name' => _x('Articulos', 'admin menu'), // Nombre del menú del Menú de administración
                'name_admin_bar' => _x('Articulos', 'admin bar'), // Nombre para usar en Nuevo en la barra de menús del administrador. 
                'add_new' => _x('Nuevo', 'add new'), // Texto para añadir nuevo.
            
                'add_new_item' => __('Añadir nuevo Articulo'), 
                'new_item' => __('Nuevo Articulo'), 
                'edit_item' => __('Editar Articulo'),   
                'view_item' => __('Ver Articulo'),
                'all_items' => __('Todos los Articulos'),
                'search_items' => __('Buscar Articulo'),// 
                'not_found' => __('Articulo no encontrado.'),
       );
        
        $args = array(
                'supports' => $supports,
                'labels' => $labels,
                'public' => true,                                                // Controla cómo el tipo es visible para los autores (show_in_nav_menus, show_ui) y los lectores (exclude_from_search, publicly_queryable). Predeterminado: falso
                'query_var' => true,                                             //Establece la clave query_var para este tipo de publicación
                'rewrite' => array('slug' => 'minelli_articulos'),
                'has_archive' => true,                                           // Para que podamos usar la plantilla archive-{custom_post_type}.php 
                'hierarchical' => false,                                         //Si el tipo de publicación es jerárquico (por ejemplo, página). Permite que el padre sea especificado
                'menu_position' => 9,                                            // La posición en el orden de menú en que debe aparecer el tipo de publicación. show_in_menu debe ser verdadero .
                'show_in_menu' => true,
                'menu_icon' => 'dashicons-exerpt-view',                          // La url al icono que se usará para este menú o el nombre del icono de la fuente del icono
        );  
        
        register_post_type( 'minelli_articulos', $args );
        
    }
    add_action('init','reg_post_type_art');

/************   Función para implemntar categorias y tags  **********************/
    
   function add_cat_panels() {
        register_taxonomy_for_object_type('category','minelli_articulos');
        register_taxonomy_for_object_type('post_tag','minelli_articulos');
        wp_enqueue_style('atributos_style', get_template_directory_uri() .'/assets/css/styleCPT.css', __FILE__);
/*        wp_enqueue_script('bootstrap.minf718', get_template_directory_uri() . '/assets/wp-content/themes/vortex/assets/bootstrap/js/bootstrap.minf718.js', __FILE__,array('jquery'),null,false);*/
    };
    add_action('init','add_cat_panels');
 

/************  Creación del Metabox  y Custom Post Fields (campos)  **********************/
    
    function crear_metabox() {
        $screens = array('minelli_articulos');
        foreach ($screens as $screen) {
            add_meta_box(
                'articulos_meta',                                                //id del metabox
                __('Detalle del Articulo ','articulos_textdomain'),              //título que aparece en el metabox
                'articulos_meta_box_callback',                                   //función callback para crear los campos dentro del metabox
                $screen,                                                         //Pantalla en la que se pondrá
                'normal'                                                         // posición: normal , side (lateral), advanced
            );
        };    
    }
    add_action('add_meta_boxes', 'crear_metabox');

  
    function articulos_meta_box_callback($post){
        wp_nonce_field('nonce_metabox','articulos_nonce');
   
      /*==============   Meta Marca  y Meta Modelo  ==================================================================*/        
        $value_marca = get_post_meta($post -> ID, 'marca', true);
        $value_modelo = get_post_meta($post -> ID, 'modelo', true);
?> 
        <div id="row-marca">
            <div id="marca_box" class="col-sm-6">
                <label for="marca" class="titulo">Marca </label>
                <select id="marca" name="marca">
                    <option value="0"<?php selected($value_marca,'0'); ?>>Selecciona una marca</option>
                    <option value="Art"<?php selected($value_marca,'Art');?>>Art</option>
            	    <option value="Camper"<?php selected($value_marca,'Camper');?>>Camper</option>
            		<option value="Ecco"<?php selected($value_marca, 'Ecco');?>>Ecco</option>
            		<option value="Jimmy Choo"<?php selected($value_marca, 'Jimmy Choo');?>>Jimmy Choo</option>
            		<option value="Louboutin"<?php selected($value_marca, 'Louboutin');?>>Louboutin</option>
                    <option value="Panama Jack"<?php selected($value_marca,'Panama Jack');?>>Panama Jack</option>
            		<option value="Pedro Miralles"<?php selected($value_marca,'Pedro Miralles');?>>Pedro Miralles</option>
                </select>
            </div>
            <div id="modelo_box" class="col-sm-6">
                <label for="modelo" class="titulo">Modelo</label>
                <input type="text" name="modelo" value="<?php echo $value_modelo; ?>">
            </div>
        </div>
<?php
 
    /*==============   Meta Destinatario, Meta Talla   ===============================================*/        
        $value_destinatario = get_post_meta($post -> ID, 'destinatario', true);
        $value_tipo = get_post_meta($post -> ID, 'tipo', true);        
?> 
        <div id="row-destinatario">
            <div id="destinatario_box">        
                <span class="titulo">Destinatario</span>
                <div>
            		<input type="radio" name="destinatario" value="Mujer" <?php if ($value_destinatario == 'Mujer') {echo 'checked';};?>>Mujer<br>
            		<input type="radio" name="destinatario" value="Hombre" <?php if ($value_destinatario == 'Hombre') {echo 'checked';};?>>Hombre<br>
            		<input type="radio" name="destinatario" value="Niño" <?php if ($value_destinatario == 'Niño') {echo 'checked';};?>>Niño<br>
                </div>
    		</div>
    		
            <div id="tipo_box">        
                <span class="titulo">Tipo Artículo</span>
                <div>
            		<input type="radio" name="tipo" value="Zapatos" <?php if ($value_tipo == 'Zapatos') {echo 'checked';};?>>Zapatos<br>
            		<input type="radio" name="tipo" value="Complementos" <?php if ($value_tipo == 'Complementos') {echo 'checked';};?>>Complementos<br>
                </div>
    		</div>    		
    	</div>	
<?php

    /*==============   Meta Colección  ===============================================================*/        
        $value_coleccion = get_post_meta($post -> ID, 'coleccion', true);  
?>
        <div id="row-coleccion">
            <div id="coleccion_box" class="col-sm-6">
                <label for="coleccion" class="titulo">Colección</label>
                <input type="text" name="coleccion" value="<?php echo $value_coleccion; ?>">
            </div>            
        </div>
<?php

    /*==============   Metas Ocultos   ===============================================================*/        
        $value_categoria = get_post_meta($post -> ID, 'categoria', true);   
?>
        <div id="row-ocultos">
            <input type="hidden" name="categoria" value="<?php echo $value_categoria; ?>">
        </div>
<?php

    }

/***********************  Guardar los datos de los campos   ******************************/
        function save_metabox($post_id) {
            if (! isset( $_POST['articulos_nonce'])) {
                return;
            };
            
            if (! wp_verify_nonce( $_POST['articulos_nonce'], 'nonce_metabox')) {
                return;
            };  
             
             
            if (! current_user_can( 'edit_page', $post_id)) {
                return;
            };

            if (! current_user_can( 'edit_post', $post_id)) {
                return;
            };
            
            $value_marca = sanitize_text_field( $_POST['marca'] ); 
            $value_modelo = sanitize_text_field( $_POST['modelo'] );
            $value_destinatario = sanitize_text_field( $_POST['destinatario'] );  
            $value_tipo = sanitize_text_field( $_POST['tipo'] );  

            update_post_meta( $post_id, 'marca',$value_marca);
            update_post_meta( $post_id, 'modelo', $value_modelo);
            update_post_meta( $post_id, 'destinatario', $value_destinatario);
            update_post_meta( $post_id, 'tipo', $value_tipo);            
            
            switch ($value_destinatario) {
                case 'Mujer':
                    $value_categoria = 'category_15';
                    break;
                case 'Hombre':
                    $value_categoria = 'category_14';
                    break;                    
                case 'Niño':   
                    $value_categoria = 'category_17';
                    break;                    
            }
            switch ($value_tipo) {
                case 'Complementos':
                    $value_categoria = 'category_16';
                    break;                    
            }
            
            update_post_meta( $post_id, 'categoria', $value_categoria);            
        };
        add_action('save_post', 'save_metabox');
        
?>   