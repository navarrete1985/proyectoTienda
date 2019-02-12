<article id="post-27" class="post-27 post type-post status-publish format-standard has-post-thumbnail hentry category-branding category-design category-printing tag-business tag-lifestyle tag-music tag-news tag-travel">
    <div class="post-preview">
<?php
    	if (has_post_thumbnail()) {
    		the_post_thumbnail(null,'full');
    	}else {
?>
			<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/assets/img/default.jpg';?>" style="width: 800px height: 640px;"/>
<?php
    	}  
?>
	</div>

    <div class="post-header">
		<h2 class="post-title font-alt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>    	
		<ul class="post-meta font-alt">
	    	<li class="bloqueflex-between">
	        	<span class="texto"><?php echo get_the_date('d M Y'); ?></span>
	            <p class="texto"><?php echo $post -> comment_count; ?> comentarios</p>
	        </li>
	    </ul>
    </div>
	
	<div class="post-content excerptDest2 texto bloqueflex">
		<?php the_excerpt(); ?>
	</div>
	
	<div class="post-more bloqueflex btnMore">
		<a class="font-alt" href="<?php the_permalink(); ?>">Leer más &rarr;</a>
	</div>
</article>
