<div class="sidebar">
	<aside id="search-2" class="widget widget_search">
		<form role="search" method="get" class="search-form" action="http://vortex-wp.2the.me/">
			<input type="search"
				   class="search-field form-control"
				   placeholder="Search..."
				   value=""
				   name="s" />
			<button class="search-button" type="submit">
				<span class="fa fa-search"></span>
			</button>
		</form>
	</aside>
	
	<aside id="twitter-feed-2" class="widget twitter-feed-widget">
		<!-- Sección para las redes sociales de la tienda (Borrar si no las ponemos)  -->
		<div class="widget-title font-alt">Widgets</div>
		<div class="twitter-feed" data-twitter="345170787868762112" data-number="2">
		</div>
	</aside>
	
	<!-- Hay que implementar el post destacado, ese es el loop general, tan solo para hacernos una idea y que no se nos olvide -->
	<aside id="recent-posts-custom-2" class="widget widget_recent_entries_custom">
		<div class="widget-title font-alt">Post destacado</div>
		<ul>
			<?php 
			    $args = array(
			    	'posts_per_page' => 1,
			    ); 
			    $custom_query = new WP_Query($args);
			    if ( $custom_query->have_posts() ): while ($custom_query->have_posts()): $custom_query->the_post(); 

			    if(has_post_thumbnail() ) {
			        $postImg = get_the_post_thumbnail_url();
			    } 
			        $postImg;
			?>
				<li class="clearfix">
					<div class="wi imgResponsive" style="background-image: url(<?php echo $postImg; ?>)">
						<a href="../mini-california-sushi-cones/index.html">
							<img width="100%" height="100%" src="<?php echo bloginfo('template_directory') . '/assets/img/dimensionadores/150x150.png';?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" sizes="(max-width: 100%) 100%, 100%"/>
						</a>
					</div>
					<div class="wb">
						<h6 class="font-alt">
							<a href="../mini-california-sushi-cones/index.html"><?php the_title(); ?></a>
						</h6>
						<span class="post-date"> <?php echo get_the_date('d M y'); ?> </span>
					</div>
				</li>
			<?php
				endwhile; endif;
				wp_reset_query();
			?>	
		</ul>
	</aside>
	
	<aside id="categories-3" class="widget widget_categories">
		<div class="widget-title font-alt">Categorías</div>
		<ul>
			<li class="cat-item cat-item-3">
				<a href="../category/branding/index.html" title="We know what we’re good at, and we stick to it">Branding</a>
			</li>
			<li class="cat-item cat-item-4">
				<a href="../category/design/index.html" title="We know what we’re good at, and we stick to it">Design</a>
			</li>
			<li class="cat-item cat-item-5">
				<a href="../category/printing/index.html" title="We know what we’re good at, and we stick to it">Printing</a>
			</li>
			<li class="cat-item cat-item-6">
				<a href="../category/sport/index.html" title="We know what we’re good at, and we stick to it">Sport</a>
			</li>
		</ul>
	</aside>
	
	<aside id="recent-posts-custom-2" class="widget widget_recent_entries_custom">
		<div class="widget-title font-alt">Últimos posts</div>
		<ul>
			<?php 
			    $args = array(
			    	'posts_per_page' => 3,
			    ); 
			    $custom_query = new WP_Query($args);
			    if ( $custom_query->have_posts() ): while ($custom_query->have_posts()): $custom_query->the_post(); 

			    if(has_post_thumbnail() ) {
			        $postImg = get_the_post_thumbnail_url();
			    } 
			        $postImg;
			?>
				<li class="clearfix">
					<div class="wi">
						<a href="../mini-california-sushi-cones/index.html">
							<img width="150" height="150" src="<?php echo $postImg ?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" sizes="(max-width: 150px) 100vw, 150px" />
						</a>
					</div>
					<div class="wb">
						<h6 class="font-alt">
							<a href="../mini-california-sushi-cones/index.html"><?php the_title(); ?></a>
						</h6>
						<span class="post-date"> <?php echo get_the_date('d M y'); ?> </span>
					</div>
				</li>
			<?php
				endwhile; endif;
				wp_reset_query();
			?>	
		</ul>
	</aside>

	<aside id="recent-projects-2" class="widget widget_recent_works">
		<div class="widget-title font-alt">Últimos productos</div>
		<ul>
			<li><a href="../project/the-deep-surface/index.html"><img width="150" height="150" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/img-1-150x150.jpg';?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" /></a></li>
			<li><a href="../project/fresh-fruits-company/index.html"><img width="150" height="150" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/img-2-150x150.jpg';?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" sizes="(max-width: 150px) 100vw, 150px" /></a></li>
			<li><a href="../project/micheal-debuis/index.html"><img width="150" height="150" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/img-3-150x150.jpg';?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" sizes="(max-width: 150px) 100vw, 150px" /></a></li>
			<li><a href="../project/greedy-emperor/index.html"><img width="150" height="150" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/img-4-150x150.jpg';?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" sizes="(max-width: 150px) 100vw, 150px" /></a></li>
			<li><a href="../project/bluetooth-speaker/index.html"><img width="150" height="150" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/img-5-150x150.jpg';?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" sizes="(max-width: 150px) 100vw, 150px" /></a></li>
			<li><a href="../project/drawing-inspiration/index.html"><img width="150" height="150" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/img-6-150x150.jpg';?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" sizes="(max-width: 150px) 100vw, 150px" /></a></li>
		</ul>
	</aside>
	
	<aside id="twitter-feed-2" class="widget twitter-feed-widget">
		<!-- Sección para las redes sociales de la tienda (Borrar si no las ponemos)  -->
		<div class="widget-title font-alt">Descubre nuestro lado más social</div>
		<div class="twitter-feed" data-twitter="345170787868762112" data-number="2">
		</div>
	</aside>
	
	<aside id="tag_cloud-2" class="widget widget_tag_cloud">
		<div class="widget-title font-alt">Etiquetas</div>
		<div class="tagcloud">
			<?php 
				the_tags( ' ', ' ', ' ');
			?>
		</div>
	</aside>
</div> 