<!-- Posts-->
<?php 
    $args = array(
    	'posts_per_page' => 8 //Mostrará 3 post por página
    ); 
    $custom_query = new WP_Query($args);
    if ( $custom_query->have_posts() ): while ($custom_query->have_posts()): $custom_query->the_post(); 
    
    // ¿Tenemos imagen destacada
    if(has_post_thumbnail() ) {
        $postImg = get_the_post_thumbnail_url();
    } 
        $postImg;
?>
			<div class="col-sm-6 post-item">
				<article id="post-27" class="post-27 post type-post status-publish format-standard has-post-thumbnail hentry category-branding category-design category-printing tag-business tag-lifestyle tag-music tag-news tag-travel">
					<div class="post-preview">
						<a href="<?php the_permalink(); ?>"><img width="1024" height="576" src="<?php echo $postImg; ?>" class="attachment-large size-large wp-post-image" alt="" /></a>
					</div>
					<div class="post-header">
						<h2 class="post-title font-alt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<ul class="post-meta font-alt">
							<li>
								<span><?php echo get_the_date('d M y'); ?></span>
							</li>
						</ul>
					</div>
					<div class="post-content">
						<p class="justificado"><?php the_excerpt(); ?></p>
					</div>
					<div class="post-more">
						<a class="font-alt" href="<?php the_permalink(); ?>">Leer más &rarr;</a>
					</div>
				</article>
			</div>
<?php
	endwhile; endif;
	wp_reset_query();
?>			
<!-- Posts end-->