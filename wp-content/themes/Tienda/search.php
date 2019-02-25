<?php
	/*
		Template Name: search
	*/

	get_header();
	
    $busqueda = $wp_the_query -> post_count;
    $palabra = $_GET['s'];
    switch ($busqueda) {
        case 0:
            $label = 'No hay ningún post relacionado para <strong>'. $palabra . '</strong>';
            break;
        case 1:
            $label = 'Se ha encontrado un post relacionado para <strong>' . $palabra . '</strong>';
            break;
        default:
            $label = 'Se han encontrado ' . $busqueda . ' posts relacionados para <strong>' . $palabra . '</strong>';
            break;
    }	
?>

	<header class="header">
		<div class="container">
			<div class="inner-header">
				<a class="inner-brand" href="../index.html">
					<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/main-logo.png';?>" style="max-height: 60px;"/>
					<img class="brand-light" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/additional-logo.png';?>" style="max-height: 60px;" />
				</a>
			</div>
	<?php
			get_template_part('templates/nav','front');
	?>
		</div>
	</header>
	
	<div class="wrapper">
		<section class="module-header  header-search">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="h3 font-alt">Resultados:</h1>
						<h1 class="h4 font-alt"><?php echo $label; ?></h1>
					</div>
				</div>
			</div>
		</section>
<!-- Blog-->
		<section class="module">
			<div class="container">
				<div class="row">
<!-- Content-->
					<div class="col-sm-9">
<!-- Posts-->

						<article id="post-11" class="post-11 post type-post status-publish format-standard has-post-thumbnail hentry category-design category-sport tag-lifestyle tag-music tag-news tag-responsive tag-travel">
<?php       
						    if (have_posts()):  
						   	    get_template_part('templates/content','list'); 
							endif; 
?> 
						</article>

						<article id="post-9" class="post-9 post type-post status-publish format-standard has-post-thumbnail hentry category-design category-sport tag-lifestyle tag-music tag-news tag-responsive tag-travel">
						
									<div class="post-preview">
									<a href="../../specimen-book/index.html"><img width="825" height="825" src="../../wp-content/uploads/2017/05/blog-6.jpg" class="attachment-large size-large wp-post-image" alt="" srcset="http://vortex-wp.2the.me/wp-content/uploads/2017/05/blog-6.jpg 825w, http://vortex-wp.2the.me/wp-content/uploads/2017/05/blog-6-150x150.jpg 150w, http://vortex-wp.2the.me/wp-content/uploads/2017/05/blog-6-300x300.jpg 300w, http://vortex-wp.2the.me/wp-content/uploads/2017/05/blog-6-768x768.jpg 768w, http://vortex-wp.2the.me/wp-content/uploads/2017/05/blog-6-640x640.jpg 640w" sizes="(max-width: 825px) 100vw, 825px" /></a>
								</div>
							
							<div class="post-header">
								<h2 class="post-title font-alt"><a href="../../specimen-book/index.html">Specimen Book</a></h2>
								<ul class="post-meta font-alt">
									<li><span>May 11, 2017</span></li>
									<li><a href="../../category/design/index.html" rel="category tag">Design</a>, <a href="../../category/sport/index.html" rel="category tag">Sport</a></li>
									<li><a href="../../specimen-book/index.html#comments">3 Comments</a></li>
								</ul>
							</div>
						
							<div class="post-content">
								<p>Depending listening delivered off new she procuring satisfied sex existence. Person plenty answer to exeter it if. Law use assistance especially resolution.</p>
							</div>
						
							<div class="post-more">
								<a class="font-alt" href="../../specimen-book/index.html">Read More &rarr;</a>
							</div>
						</article>
						
											
						<article id="post-7" class="post-7 post type-post status-publish format-standard has-post-thumbnail hentry category-design category-sport tag-lifestyle tag-music tag-news tag-responsive tag-travel">
						
									<div class="post-preview">
									<a href="../../life-spent-living-across-the-country/index.html"><img width="825" height="825" src="../../wp-content/uploads/2017/05/blog-2.jpg" class="attachment-large size-large wp-post-image" alt="" srcset="http://vortex-wp.2the.me/wp-content/uploads/2017/05/blog-2.jpg 825w, http://vortex-wp.2the.me/wp-content/uploads/2017/05/blog-2-150x150.jpg 150w, http://vortex-wp.2the.me/wp-content/uploads/2017/05/blog-2-300x300.jpg 300w, http://vortex-wp.2the.me/wp-content/uploads/2017/05/blog-2-768x768.jpg 768w, http://vortex-wp.2the.me/wp-content/uploads/2017/05/blog-2-640x640.jpg 640w" sizes="(max-width: 825px) 100vw, 825px" /></a>
								</div>
							
							<div class="post-header">
								<h2 class="post-title font-alt"><a href="../../life-spent-living-across-the-country/index.html">Life Spent Living Across the Country</a></h2>
								<ul class="post-meta font-alt">
									<li><span>May 11, 2017</span></li>
									<li><a href="../../category/design/index.html" rel="category tag">Design</a>, <a href="../../category/sport/index.html" rel="category tag">Sport</a></li>
									<li><a href="../../life-spent-living-across-the-country/index.html#comments">3 Comments</a></li>
								</ul>
							</div>
						
							<div class="post-content">
								<p>Depending listening delivered off new she procuring satisfied sex existence. Person plenty answer to exeter it if. Law use assistance especially resolution.</p>
							</div>
						
							<div class="post-more">
								<a class="font-alt" href="../../life-spent-living-across-the-country/index.html">Read More &rarr;</a>
							</div>
						</article>
						
											
						<article id="post-5" class="post-5 post type-post status-publish format-standard has-post-thumbnail hentry category-design category-sport tag-lifestyle tag-music tag-news tag-responsive tag-travel">
						
									<div class="post-preview">
									<a href="../../when-you-are-alone/index.html"><img width="1024" height="576" src="../../wp-content/uploads/2017/05/blog-1-1024x576.jpg" class="attachment-large size-large wp-post-image" alt="" srcset="http://vortex-wp.2the.me/wp-content/uploads/2017/05/blog-1-1024x576.jpg 1024w, http://vortex-wp.2the.me/wp-content/uploads/2017/05/blog-1-300x169.jpg 300w, http://vortex-wp.2the.me/wp-content/uploads/2017/05/blog-1-768x432.jpg 768w, http://vortex-wp.2the.me/wp-content/uploads/2017/05/blog-1.jpg 1400w" sizes="(max-width: 1024px) 100vw, 1024px" /></a>
								</div>
							
							<div class="post-header">
								<h2 class="post-title font-alt"><a href="../../when-you-are-alone/index.html">When You Are Alone</a></h2>
								<ul class="post-meta font-alt">
									<li><span>May 11, 2017</span></li>
									<li><a href="../../category/design/index.html" rel="category tag">Design</a>, <a href="../../category/sport/index.html" rel="category tag">Sport</a></li>
									<li><a href="../../when-you-are-alone/index.html#comments">3 Comments</a></li>
								</ul>
							</div>
						
							<div class="post-content">
								<p>Marianne or husbands if at stronger ye. Considered is as middletons uncommonly. Promotion perfectly ye consisted so. His chatty dining for effect ladies active.</p>
							</div>
						
							<div class="post-more">
								<a class="font-alt" href="../../when-you-are-alone/index.html">Read More &rarr;</a>
							</div>
						</article>
<!-- Posts end-->
					</div>
<!-- Content end-->
<!-- Sidebar-->
					<div class="col-sm-3">
						<?php get_sidebar(); ?>
					</div>
<!-- Sidebar end-->
				</div>
		</section>
	<!-- Blog end-->
	</div>

<?php get_footer(); ?>
