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
		<div class="widget-title font-alt">Twitter Feed</div>
		<div class="twitter-feed" data-twitter="345170787868762112" data-number="2"></div>
	</aside>
	
	<aside id="tag_cloud-2" class="widget widget_tag_cloud">
		<div class="widget-title font-alt">Etiquetas</div>
		<div class="tagcloud">
			<a href='../tag/business/index.html' class='tag-link-7 tag-link-position-1' title='4 topics' style='font-size: 7px;'>Business</a>
			<a href='../tag/corporate/index.html' class='tag-link-8 tag-link-position-2' title='4 topics' style='font-size: 7px;'>Corporate</a>
			<a href='../tag/lifestyle/index.html' class='tag-link-9 tag-link-position-3' title='12 topics' style='font-size: 7px;'>Lifestyle</a>
			<a href='../tag/music/index.html' class='tag-link-10 tag-link-position-4' title='12 topics' style='font-size: 7px;'>Music</a>
			<a href='../tag/news/index.html' class='tag-link-11 tag-link-position-5' title='12 topics' style='font-size: 7px;'>News</a>
			<a href='../tag/responsive/index.html' class='tag-link-12 tag-link-position-6' title='4 topics' style='font-size: 7px;'>Responsive</a>
			<a href='../tag/travel/index.html' class='tag-link-13 tag-link-position-7' title='12 topics' style='font-size: 7px;'>Travel</a>
		</div>
	</aside>
</div> 