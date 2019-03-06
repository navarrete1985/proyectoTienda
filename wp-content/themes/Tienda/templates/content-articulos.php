<?php
    $marca = get_post_meta($post -> ID, 'marca', true );
    $modelo = get_post_meta($post -> ID, 'modelo', true );  
    $categoria_filtro = get_post_meta($post -> ID, 'categoria', true );
?>
    <div class="col-sm-4 post-item post-type category-count <?php echo $categoria_filtro; ?>">
        <div class="">
            <div class="tumbnail">
                <?php the_post_thumbnail(); ?>
                <div class="portfolio-caption font-alt bloqueflex-col">
                    <h6 class="portfolio-title"><?php echo $marca; ?></h6>
                    <span class="portfolio-subtitle"><?php echo $modelo; ?></span>
                    <a class="btn btn-sm btn-corner btn-fill btn-dark" href="<?php the_permalink(); ?>"><?php _e("Ver"); ?></a>
                </div>                
            </div>
        <!--    <div class="portfolio-overlay"></div> -->
        </div>
        <a class="portfolio-link" href="project/the-deep-surface/index.html"></a>
    </div>
    
    