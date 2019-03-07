<?php

    global $wp;
    $current_slug = add_query_arg(array(), $wp->request);  
    get_header();
?>
<!-- Header-->
    <header class="header">
        <div class="container">
            <div class="inner-header">
                <a class="inner-brand" href="index.html">
						<!--<img class="brand-dark" src="<?php// echo bloginfo('template_directory') . '/img/uploads/2017/05/main-logo.png';?>" style="max-height: 60px;" />-->
						<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/assets/img/minelli.png';?>" style="max-height: 35px;" />
						<img class="brand-light" src="<?php echo bloginfo('template_directory') . '/assets/img/minelli_B.png';?>" style="max-height: 35px;" />
				</a>
            </div>

<?php
				get_template_part('templates/nav','front');
				the_post();
        		$post_id = $post->ID;
?>
        </div>
    </header>
    <!-- Header end-->

    <div class="wrapper">
        <!--<section class="module-header full-height parallax bg-light bg-light-30" data-background="<?php //echo bloginfo('template_directory') .'/img/uploads/2017/05/module-21.jpg'?>">-->
        <section class="module-header full-height parallax bg-light bg-light-30" data-background="<?php echo bloginfo('template_directory') .'/assets/img/portada.png'?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="h3 font-alt"><?php echo $current_slug; ?></h1>
                        <h1 class="h4 font-alt"><?php _e("Zapatería Minelli"); ?></h1>
                    </div>
                </div>
            </div>
        </section>

<!--Servcios-->
        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="module-title">
                            <h2 class="font-alt"><?php _e("Servicios"); ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="fw-divider-space" style="margin-top: 40px;"></div>
                        <div class="icon-box text-center icon-exist">
                            <div class="icon-box-icon" style="height: 42px;">
                                <span class="icon icon-basic-clockwise"></span>
                            </div>
                            <div class="icon-box-title">
                                <h5 class="font-alt"><?php _e("Envío en 24H"); ?></h5>
                            </div>
                            <div class="icon-box-content">
                                <p class="justificado"><?php _e("Disponemos de servicio de envío en 24, de modo que podrá disfurar de su compra lo antes posible."); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="fw-divider-space" style="margin-top: 40px;"></div>
                        <div class="icon-box text-center icon-exist">
                            <div class="icon-box-icon" style="height: 42px;">
                                <span class="icon icon-basic-star"></span>
                            </div>
                            <div class="icon-box-title">
                                <h5 class="font-alt"><?php _e("Devolución Gratuíta"); ?></h5>
                            </div>
                            <div class="icon-box-content">
                                <p class="justificado"><?php _e("Si no queda satisfecho podrá realizar la devolución de su artículo de forma totalmente gratuíta."); ?></p>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="fw-divider-space" style="margin-top: 40px;"></div>
                        <div class="icon-box text-center icon-exist">
                            <div class="icon-box-icon" style="height: 42px;">
                                <span class="icon icon-basic-lock"></span>
                            </div>
                            <div class="icon-box-title">
                                <h5 class="font-alt"><?php _e("Pago seguro"); ?></h5>
                            </div>
                            <div class="icon-box-content">
                                <p class="justificado"><?php _e("La realización de los pagos se realiza de forma que sea totalmente segura para todos nuestros clientes."); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="fw-divider-space" style="margin-top: 40px;"></div>
                        <div class="icon-box text-center icon-exist">
                            <div class="icon-box-icon" style="height: 42px;">
                                <span class="icon icon-basic-calendar"></span>
                            </div>
                            <div class="icon-box-title">
                                <h5 class="font-alt"><?php _e("15 Días de devolución"); ?></h5>
                            </div>
                            <div class="icon-box-content">
                                <p class="justificado"><?php _e("El cliente dispondrá de 15 días laborales para el cambio o devolución de cualquier artículo."); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Fin de Row-->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="fw-divider-space" style="margin-top: 40px;"></div>
                    </div>
                </div>

            </div>
        </section>
<!--Fin de servicios-->

<!--Vídeo poromocional-->
        <section class="module parallax bg-dark bg-dark-30" data-jarallax-video="https://www.youtube.com/watch?v=qFH9ai02JyU" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/module-5.jpg';?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="counter font-alt">
                            <div class="counter-number">
                                <div class="counter-timer" data-from="0" data-to="250">0</div>
                            </div>
                            <div class="counter-title"><?php _e("Clientes felices"); ?></div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="counter font-alt">
                            <div class="counter-number">
                                <div class="counter-timer" data-from="0" data-to="132">0</div>
                            </div>
                            <div class="counter-title"><?php _e("Usuarios del sitio"); ?></div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="counter font-alt">
                            <div class="counter-number">
                                <div class="counter-timer" data-from="0" data-to="34">0</div>
                            </div>
                            <div class="counter-title"><?php _e("Premios ganados"); ?></div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="counter font-alt">
                            <div class="counter-number">
                                <div class="counter-timer" data-from="0" data-to="340">0</div>
                            </div>
                            <div class="counter-title"><?php _e("Descargas totales"); ?></div>
                        </div>
                    </div>
                </div>
                <!--Fin Row-->
            </div>
            <!--Fin Container-->
        </section>
<!--Fin del vídeo promocional-->

<!-- Portfolio-->
        <section class="module portfolio-section">
            <div class="container">
                <!-- Portfolio filter-->
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="filters font-alt" id="filters">
                            <li>
                                <a class="current filter" href="#" data-filter="*"><?php _e("Novedades"); ?><sup><small>.10</small></sup></a>
                            </li>
                            <li>
                                <a class="filter" href="#" data-filter=".category_14"><?php _e("Hombre"); ?><sup><small>.5</small></sup></a>
                            </li>
                            <li>
                                <a class="filter" href="#" data-filter=".category_15"><?php _e("Mujer"); ?><sup><small>.6</small></sup></a>
                            </li>
                            <li>
                                <a class="filter" href="#" data-filter=".category_16"><?php _e("Complementos"); ?><sup><small>.4</small></sup></a>
                            </li>
                            <li>
                                <a class="filter" href="#" data-filter=".category_17"><?php _e("Niños"); ?><sup><small>.3</small></sup></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Portfolio filter end-->

    <!-- CPT -->
                <div class="row">
    				<div class="col-sm-12">
    					<div class="row blog-masonry">                    
<?php
                            $args = array(
                                    'posts_per_page' => 20,
                                    'post_type' => 'minelli_articulos',
                                );
                                
                            $articulos = new WP_Query($args);
                            if ($articulos -> have_posts()):
                                while ($articulos -> have_posts()):
                                    $articulos -> the_post();
                                    get_template_part('templates/content','articulos');
                                endwhile; 
                            endif;
                            wp_reset_postdata();                        
?>  
                        </div>
                    </div>
                </div>
    <!-- CPT end-->
            </div>
        </section>
<!-- Portfolio end-->

<!-- Nuestras marcas-->
        <section class="module module-divider-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="module-title">
                            <h2 class="font-alt"><?php _e("Nuestras marcas más populares"); ?></h2>
                        </div>
                    </div>  
                </div>  <!--Fin de row-->
            </div>  <!--Fn de container-->
            
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="clients-grid">
                            <div class="client-item">
                                <img src="<?php echo bloginfo('template_directory') . '/assets/img/logos/Louboutin_logo.png';?>">
                            </div>

                            <div class="client-item">
                                <img src="<?php echo bloginfo('template_directory') . '/assets/img/logos/jimmy_logo.png';?>">
                            </div>

                            <div class="client-item">
                                <img src="<?php echo bloginfo('template_directory') . '/assets/img/logos/pedro_logo.png';?>">
                            </div>

                            <div class="client-item">
                                <img src="<?php echo bloginfo('template_directory') . '/assets/img/logos/panama_logo.png';?>">
                            </div>

                            <div class="client-item">
                                <img src="<?php echo bloginfo('template_directory') . '/assets/img/logos/ecco_logo.png';?>">
                            </div>

                            <div class="client-item">
                                <img src="<?php echo bloginfo('template_directory') . '/assets/img/logos/art_logo.jpg';?>">
                            </div>
                        </div>
                    </div>
                </div>   <!--Fin de row-->
            </div>  <!--Fn de container-->
        </section>
<!-- Fin Nuestras marcas-->

<!-- Sección para los últimos post -->
        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="module-title">
                            <h2 class="font-alt"><?php _e("No te pierdas las últimas novedades"); ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <!-- Empieza el loop -->
<?php 
    		        $args = array(
    		        	'posts_per_page' => 3 //Mostrará 3 post por página
    		        ); 
    		        $custom_query = new WP_Query($args);
    		        if ( $custom_query->have_posts() ): while ($custom_query->have_posts()): $custom_query->the_post(); 
    
    		        // ¿Tenemos imagen destacada
    		        if(has_post_thumbnail() ) {
                        $postImg = get_the_post_thumbnail_url();
                    } 
                    $postImg;
?>

                        <div class="col-sm-4 col-md-4 col-lg-4 post-item">
                            <article id="post-15" class="post-15 post type-post status-publish format-standard has-post-thumbnail hentry category-design category-sport tag-corporate tag-lifestyle tag-music tag-news tag-travel">
                                <div class="post-preview">
                                    <a href="<?php the_permalink(); ?>">
										<img width="1024" height="576" src="<?php echo $postImg; ?>" sizes="(max-width: 1024px) 100vw, 1024px" />
									</a>
                                </div>

                                <div class="post-header">
                                    <h2 class="post-title font-alt">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h2>
                                    <ul class="post-meta font-alt">
                                        <li>
                                            <span><?php echo get_the_date('d M y'); ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-content justificado ">
                                    <p>
                                        <?php the_excerpt(); ?>
                                    </p>
                                </div>
                                <div class="post-more">
                                    <a class="font-alt" href="<?php the_permalink(); ?>">Leer Más &rarr;</a>
                                </div>
                            </article>
                        </div>
            <?php // El loop finaliza y la query se resetea aquí para que toda la zona dinámica entre en el loop
        		endwhile; endif;
        		wp_reset_query();
   			?>
<!--Termina el loop-->
                </div>  <!--Fin row-->
            </div> <!--Fin container-->
        </section>

<!--Comentaios u opiniones de los clientes-->        
        <div class="wrapper">
            <section class="module parallax bg-light bg-light-60" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/module-3.jpg';?>">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <div class="tms-slides owl-carousel">
                                <div class="tms-item">
                                    <div class="tms-icons">
                                        <span style="font-size: 32px;" class="icon icon-basic-message-multiple"></span>
                                    </div>
                                    <div class="tms-content">
                                        <blockquote>
                                            <p><?php _e("Estoy encantado. He realizado varios pedidos y sólo tuve que devolver uno, pero fue facilísimo y muy rápido. ¡¡¡Un equipo estupendo!!!"); ?></p>
                                        </blockquote>
                                    </div>
                                    <div class="tms-author">
                                        <span class="font-alt">David González</span>
                                    </div>
                                </div>

                                <div class="tms-item">
                                    <div class="tms-icons">
                                        <span style="font-size: 32px;" class="icon icon-basic-message-multiple"></span>
                                    </div>
                                    <div class="tms-content">
                                        <blockquote>
                                            <p><?php _e("Comprar está muy bien, es rápido en el envío y si no aciertas o no te gustan se devuelve rápida y cómodamente. La recomiendo."); ?></p>
                                        </blockquote>
                                    </div>
                                    <div class="tms-author">
                                        <span class="font-alt">Rosa Marañon</span>
                                    </div>
                                </div>

                                <div class="tms-item">
                                    <div class="tms-icons">
                                        <span style="font-size: 32px;" class="icon icon-basic-message-multiple"></span>
                                    </div>
                                    <div class="tms-content">
                                        <blockquote>
                                            <p><?php _e("Me gusta por la variedad y la calidad de sus productos y eso hace que las personas se sientan más cómodas con lo que lucen."); ?></p>
                                        </blockquote>
                                    </div>
                                    <div class="tms-author">
                                        <span class="font-alt">Beatriz Olmedo</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <!--Fin de row-->
                </div>
            </section>
        </div>
<!--Fin comentarios u opiniones de los clientes-->

        <!--Fotos de instagran (realmente va con el footer)-->
        <!--Fin fotos de instagram-->

        <!-- Fin Sección últimos post -->
<?php
    get_footer();
?>