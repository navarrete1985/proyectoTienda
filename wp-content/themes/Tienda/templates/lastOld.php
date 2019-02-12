<div class="wrapper">
<?php
    if(has_post_thumbnail() ) {
        $postImgDest = get_the_post_thumbnail_url(null,'full');
?>
    	<section class="module-header default-height parallax bg-light bg-light-60 bg-film" data-background="<?php echo $postImgDest;?>">
<?php	        
    }else {
    	$postImgDest = '/assets/img/default.jpg';
?>
        <section class="module-header default-height parallax bg-light bg-light-60 bg-film" data-background="<?php echo bloginfo('template_directory') . $postImgDest;?>">
<?php
    } 
?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="post-title font-alt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <blockquote>
                                <p class="h4">La verdadera prueba de una mujer elegante, es qué hay en sus pies.</p>
                                <footer class="h4">Christian Dior</footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
        </section>
        <!-- Blog-->
        <section class="module" id="sectionB2">
            <div class="container">
                <div class="row">
                    <article id="post-27" class="post-27 post type-post status-publish format-standard has-post-thumbnail hentry category-branding category-design category-printing tag-business tag-lifestyle tag-music tag-news tag-travel">
                        <div class="post-header">
                            <ul class="post-meta font-alt">
                                <li class="bloqueflex-between">
                                    <span class="texto"><?php echo get_the_date('d M Y'); ?></span>
                                    <p class="texto">
                                        <?php echo $post -> comment_count; ?> comentarios</p>
                                </li>
                            </ul>
                        </div>
                        <div class="post-content excerptDest texto">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="post-more">
                            <a class="font-alt" href="<?php the_permalink(); ?>">Leer más &rarr;</a>
                        </div>
                    </article>
                </div>