<?php
    get_header();
?>

    <!-- Preloader-->
    <div class="page-loader">
        <div class="loader">Loading...</div>
    </div>
    <!-- Preloader end-->

    <!-- Header-->
    <header class="header">
        <div class="container">
            <div class="inner-header">
                <a class="inner-brand" href="../index.html">
			<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/main-logo.png';?>" style="max-height: 60px;" /><img class="brand-light" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/additional-logo.png';?>" style="max-height: 60px;" /></a>
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
                                    <li>
                                        <span><?php echo get_the_date('d M y'); ?></span>
                                    </li>

                                    <li><a href="../category/design/index.html" rel="category tag">Design</a> , <a href="../category/sport/index.html" rel="category tag">Sport</a></li>
                                    <li><a href="#comments">3 Comments</a></li>
                                </ul>
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
                                        <?php
                                            the_content();
                                        ?>
                                    </div>
                                    <!--Fin de post-content-->

                                    <div class="post-footer">
                                        <div class="post-tags">
                                            <a href="../tag/corporate/index.html" rel="tag">Corporate</a> <a href="../tag/lifestyle/index.html" rel="tag">Lifestyle</a>
                                            <a href="../tag/music/index.html" rel="tag">Music</a> <a href="../tag/news/index.html" rel="tag">News</a> <a href="../tag/travel/index.html" rel="tag">Travel</a>
                                        </div>
                                    </div>
                                </article>
                                <!-- Post end-->
                                
                                <!-- Comments and comment form-->
                                <div id="comments" class="comments-area">
                                    <h4 class="comments-title font-alt">Comments </h4>
                                    <?= comments_template() ?>
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

<?php
	get_footer();
?>