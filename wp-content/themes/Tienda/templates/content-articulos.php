<?php
    $marca = get_post_meta($post -> ID, 'marca', true );
    $modelo = get_post_meta($post -> ID, 'modelo', true );    
?>
    <div class="col-sm-4 post-item">
        <div class="">
            <div class="tumbnai">
                <?php the_post_thumbnail(); ?>
            </div>
        <!--    <div class="portfolio-overlay"></div> -->
            <div class="portfolio-caption font-alt">
                <h6 class="portfolio-title"><?php echo $marca; ?></h6>
                <span class="portfolio-subtitle"><?php echo $modelo; ?></span>
            </div>
        </div>
        <a class="portfolio-link" href="project/the-deep-surface/index.html"></a>
    </div>
    
    