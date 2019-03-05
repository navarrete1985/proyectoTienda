<?php
    get_header();
?>

<!-- Header-->
    <header class="header">
        <div class="container">
            <div class="inner-header">
                <a class="inner-brand" href="../index.html">
					<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/assets/img/minelli.png';?>" style="max-height: 35px;" />
					<img class="brand-light" src="<?php echo bloginfo('template_directory') . '/assets/img/minelli_B.png';?>" style="max-height: 35px;" />
			    </a>
        </div>
<?php
        get_template_part('templates/nav','front');
        the_post();
        $post_id = $post->ID;
        if(has_post_thumbnail() ) {
            $postImg = get_the_post_thumbnail_url();
         } 
        $postImg;
?>
    </header>
<!-- Header end-->

    <div class="wrapper">
        <section class="module-header default-height parallax bg-dark bg-dark-30" data-background="<?php echo $postImg ?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="h3 font-alt"><?php the_title(); ?></h1>
                        <ul class="post-meta font-alt">
                            <li><span><?php echo get_the_date('d M y'); ?></span></li>
                            <li><a href="#"><?php the_author_posts_link(); ?></a></li>
                            <li><?php comments_popup_link('No hay comentarios', 'Un comentario', '% comentarios', 'comments-link', 'Los comentarios están cerrados');?></li>
                            <li><?php echo num_visits($post -> ID); ?></li>
                        </ul>
                        <div>
                            <p class="post-meta font-alt">Categorias:</p>
                            <?php the_category(' &bull; '); ?>                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

<!-- Single post-->
        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
<!-- Post-->
                        <article id="post-15" class="post-15 post type-post status-publish format-standard has-post-thumbnail hentry category-design category-sport tag-corporate tag-lifestyle tag-music tag-news tag-travel">
                            <div class="post-content">
                                <?php the_content(); ?>
                            </div>
                        </article>
<!-- Post end-->
                                
<!-- Comments and comment form-->
                        <div id="comments" class="comments-area">
                            <?php comments_template(); ?>
                            <div id="mensaje">
                                <p id="mensaje-rgpd">Debes aceptar la política de privacidad para publicar el comentario</p>
                            </div>
                        </div>
<!-- Comments and comment form end-->
                    </div>
<!-- Sidebar-->
                    <div class="col-sm-4">
        				<?php get_sidebar(); ?>
        			</div>
<!-- Sidebar end-->
                </div>
            </div>
        </section>
<!-- Single post end-->

<?php get_footer(); ?>