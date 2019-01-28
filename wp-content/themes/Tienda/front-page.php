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
					<a class="inner-brand" href="index.html">
						<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/main-logo.png';?>" style="max-height: 60px;" />
						<img class="brand-light" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/additional-logo.png';?>" style="max-height: 60px;" />
					</a>
				</div>
		<!--		<div class="header-nav-toogle">
					<a class="show-menu-btn" href="#">
						<span></span>
						<span></span>
						<span></span>
					</a>
				</div>  -->
<?php
				get_template_part('templates/nav','front');
				the_post();
        		$post_id = $post->ID;
?>				
<!--
				<div class="inner-navigation">
					<ul id="menu-additional-menu" class="">
						<li id="menu-item-315" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-315">
							<a href="index.html">Home</a>
						</li>
						<li id="menu-item-313" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-313">
							<a href="about.html">About</a>
						</li>
						<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314">
							<a href="contact.html">Contact</a>
						</li>
					</ul>
				</div>
-->				
			</div>
		</header>
<!-- Header end-->


		<div class="wrapper">
			<section class="module-header full-height parallax bg-light bg-light-30" data-background="<?php echo bloginfo('template_directory') .'/img/uploads/2017/05/module-21.jpg'?>">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="h3 font-alt">James Vortex</h1>
							<h1 class="h4 font-alt">Professional Photographer</h1>
						</div>
					</div>
				</div>
			</section>
<!--Servcios-->

<section class="module">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="module-title">
					<h2 class="font-alt">Servicios</h2>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="fw-divider-space" style="margin-top: 40px;"></div>
				<div class="icon-box text-center icon-exist">
					<div class="icon-box-icon" style="height: 42px;">
						<span class="icon icon-basic-chronometer"></span>
					</div>
					<div class="icon-box-title">
						<h5 class="font-alt">Envío en 24H</h5>
					</div>
					<div class="icon-box-content">
						<p class="justificado">Disponemos de servicio de envío en 24, de modo que podrá disfurar de su compra lo antes posible.</p>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="fw-divider-space" style="margin-top: 40px;"></div>
				<div class="icon-box text-center icon-exist">
					<div class="icon-box-icon" style="height: 42px;">
						<span class="icon icon-basic-gear"></span>
					</div>
					<div class="icon-box-title">
						<h5 class="font-alt">Devolución Gratuíta</h5>
					</div>
					<div class="icon-box-content">
						<p class="justificado">Si no queda satisfecho podrá realizar la devolución de su artículo de forma totalmente gratuíta.</p>
						
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="fw-divider-space" style="margin-top: 40px;"></div>
				<div class="icon-box text-center icon-exist">
					<div class="icon-box-icon" style="height: 42px;">
						<span class="icon icon-basic-laptop"></span>
					</div>
					<div class="icon-box-title">
						<h5 class="font-alt">Pago seguro</h5>
					</div>
					<div class="icon-box-content">
						<p class="justificado">La realización de los pagos se realiza de forma que sea totalmente segura para todos nuestros clientes.</p>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="fw-divider-space" style="margin-top: 40px;"></div>
				<div class="icon-box text-center icon-exist">
					<div class="icon-box-icon" style="height: 42px;">
						<span class="icon icon-basic-bolt"></span>
					</div>
					<div class="icon-box-title">
						<h5 class="font-alt">15 Días de devolución</h5>
					</div>
					<div class="icon-box-content">
						<p class="justificado">El cliente dispondrá de 15 días laborales para el cambio o devolución de cualquier artículo</p>
					</div>
				</div>
			</div>
	</div> <!--Fin de Row-->

<div class="row">
	<div class="col-sm-12">
	<div class="fw-divider-space" style="margin-top: 40px;"></div></div>
</div>

</div></section>

<!--Fin de servicios-->

<!--Vídeo poromocional-->
<section class="module parallax bg-dark bg-dark-30" data-jarallax-video="https://www.youtube.com/watch?v=qFH9ai02JyU" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/module-5.jpg';?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="counter font-alt">
					<div class="counter-number">
						<div class="counter-timer" data-from="0" data-to="250">0</div>
					</div>
					<div class="counter-title">Happy Clients</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="counter font-alt">
					<div class="counter-number">
						<div class="counter-timer" data-from="0" data-to="132">0</div>
					</div>
					<div class="counter-title">Theme Users</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="counter font-alt">
					<div class="counter-number">
						<div class="counter-timer" data-from="0" data-to="34">0</div>
					</div>
					<div class="counter-title">Awards Won</div>
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="counter font-alt">
					<div class="counter-number">
						<div class="counter-timer" data-from="0" data-to="340">0</div>
					</div>
				<div class="counter-title">Total Downloads</div>
				</div>
			</div>
		</div> <!--Fin Row-->
	</div> <!--Fin Container-->
</section>
<!--Fin del vídeo promocional-->
			
<!-- Portfolio-->
			<section class="module portfolio-section">
				<div class="container">
	<!-- Portfolio filter-->
					<div class="row">
						<div class="col-sm-12">
							<ul class="filters font-alt" id="filters">
								<li>
									<a class="current" href="#" data-filter="*">All<sup><small>.10</small></sup></a>
								</li>
								<li>
									<a href="#" data-filter=".category_14">Branding<sup><small>.4</small></sup></a>
								</li>
								<li>
									<a href="#" data-filter=".category_15">Design<sup><small>.6</small></sup></a>
								</li>
								<li>
									<a href="#" data-filter=".category_16">Photo<sup><small>.4</small></sup></a>
								</li>
								<li>
									<a href="#" data-filter=".category_17">Web<sup><small>.3</small></sup></a>
								</li>
							</ul>
						</div>
					</div>
	<!-- Portfolio filter end-->

<!-- Portfolio-->
					<div class="row row-portfolio">
						<div class="grid-sizer"></div>
	<!-- Portfolio single page-->
						<div id="post-91" class="category_14 tall portfolio-item post-91 fw-portfolio type-fw-portfolio status-publish has-post-thumbnail hentry fw-portfolio-category-branding">
							<div class="portfolio-wrapper">
								<div class="portfolio-img-wrap" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/img-1-308x640.jpg';?>"></div>
								<div class="portfolio-overlay"></div>
								<div class="portfolio-caption font-alt">
									<h6 class="portfolio-title">The Deep Surface</h6>
									<span class="portfolio-subtitle">Branding</span>
								</div>
							</div>
							<a class="portfolio-link" href="project/the-deep-surface/index.html"></a>
						</div>
	<!-- Portfolio single end-->

	<!-- Portfolio single page-->
						<div id="post-90" class="category_15 default portfolio-item post-90 fw-portfolio type-fw-portfolio status-publish has-post-thumbnail hentry fw-portfolio-category-design">
							<div class="portfolio-wrapper">
								<div class="portfolio-img-wrap" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/img-2.jpg';?>"></div>
								<div class="portfolio-overlay"></div>
								<div class="portfolio-caption font-alt">
									<h6 class="portfolio-title">Fresh Fruits Company</h6>
									<span class="portfolio-subtitle">Design</span>
								</div>
							</div>
							<a class="portfolio-link" href="project/fresh-fruits-company/index.html"></a>
						</div>
	<!-- Portfolio single end-->

	<!-- Portfolio single page-->
					<div id="post-89" class="category_15 default portfolio-item post-89 fw-portfolio type-fw-portfolio status-publish has-post-thumbnail hentry fw-portfolio-category-design">
						<div class="portfolio-wrapper">
							<div class="portfolio-img-wrap" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/img-3.jpg';?>"></div>
							<div class="portfolio-overlay"></div>
							<div class="portfolio-caption font-alt">
								<h6 class="portfolio-title">Micheal Debuis</h6>
								<span class="portfolio-subtitle">Design</span>
							</div>
						</div>
						<a class="portfolio-link" href="project/micheal-debuis/index.html"></a>
					</div>
	<!-- Portfolio single end-->

	<!-- Portfolio single page-->
					<div id="post-88" class="category_15 default portfolio-item post-88 fw-portfolio type-fw-portfolio status-publish has-post-thumbnail hentry fw-portfolio-category-design">
						<div class="portfolio-wrapper">
							<div class="portfolio-img-wrap" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/img-4.jpg';?>"></div>
							<div class="portfolio-overlay"></div>
							<div class="portfolio-caption font-alt">
								<h6 class="portfolio-title">Greedy Emperor</h6>
								<span class="portfolio-subtitle">Design</span>
							</div>
						</div>
						<a class="portfolio-link" href="project/greedy-emperor/index.html"></a>
					</div>
	<!-- Portfolio single end-->

	<!-- Portfolio single page-->
					<div id="post-87" class="category_15 default portfolio-item post-87 fw-portfolio type-fw-portfolio status-publish has-post-thumbnail hentry fw-portfolio-category-design">
						<div class="portfolio-wrapper">
							<div class="portfolio-img-wrap" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/img-5.jpg';?>"></div>
							<div class="portfolio-overlay"></div>
							<div class="portfolio-caption font-alt">
								<h6 class="portfolio-title">Bluetooth Speaker</h6>
								<span class="portfolio-subtitle">Design</span>
							</div>
						</div>
						<a class="portfolio-link" href="project/bluetooth-speaker/index.html"></a>
					</div>
	<!-- Portfolio single end-->

	<!-- Portfolio single page-->
					<div id="post-86" class="category_14 category_16 category_17 large portfolio-item post-86 fw-portfolio type-fw-portfolio status-publish has-post-thumbnail hentry fw-portfolio-category-branding fw-portfolio-category-photo fw-portfolio-category-web">
						<div class="portfolio-wrapper">
							<div class="portfolio-img-wrap" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/img-6-640x640.jpg';?>"></div>
							<div class="portfolio-overlay"></div>
							<div class="portfolio-caption font-alt">
								<h6 class="portfolio-title">Drawing Inspiration</h6>
								<span class="portfolio-subtitle">Branding / Photo / Web</span>
							</div>
						</div>
						<a class="portfolio-link" href="project/drawing-inspiration/index.html"></a>
					</div>
	<!-- Portfolio single end-->

	<!-- Portfolio single page-->
					<div id="post-85" class="category_15 category_16 category_17 wide portfolio-item post-85 fw-portfolio type-fw-portfolio status-publish has-post-thumbnail hentry fw-portfolio-category-design fw-portfolio-category-photo fw-portfolio-category-web">
						<div class="portfolio-wrapper">
							<div class="portfolio-img-wrap" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/img-7-640x308.jpg';?>"></div>
							<div class="portfolio-overlay"></div>
							<div class="portfolio-caption font-alt">
								<h6 class="portfolio-title">Uncomplicated Beauty</h6>
								<span class="portfolio-subtitle">Design / Photo / Web</span>
							</div>
						</div>
						<a class="portfolio-link" href="project/uncomplicated-beauty/index.html"></a>
					</div>
	<!-- Portfolio single end-->
				</div><!--Fin de row portfolio-->
<!-- Portfolio end-->

				<div id="next-projects" data-num-pages="2">
					<a href="page/2/index.html" ></a>
				</div>
				<div id="loading-image" class="filter-loader hide" style="display: block; position: static; margin: 0 auto -40px;"></div>
			</div>
		</section>
<!-- Portfolio end-->

<!-- Nuestras marcas-->

<section class="module module-divider-top">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="module-title">
					<h2 class="font-alt">Nuestras marcas más populares</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="clients-grid">
					<div class="client-item">
						<img src="<?php echo bloginfo('template_directory') . '/assets/img/logos/Louboutin_logo.png';?>">
					</div>
					
					<div class="client-item">
						<img src="<?php echo bloginfo('template_directory') . '/assets/img/logos/jimmy_logo.png';?>">
					</div>
					
					<div class="client-item">
						<img src="<?php echo bloginfo('template_directory') . '/assets/img/logos/pedro_logo.png';?>">
					</div>
					
					<div class="client-item">
						<img src="<?php echo bloginfo('template_directory') . '/assets/img/logos/panama_logo.png';?>">
					</div>
					
					<div class="client-item">
						<img src="<?php echo bloginfo('template_directory') . '/assets/img/logos/ecco_logo.png';?>">
					</div>
					
					<div class="client-item">
						<img src="<?php echo bloginfo('template_directory') . '/assets/img/logos/art_logo.jpg';?>">
					</div>
			</div>
			</div>
		</div> <!--Fin de row-->
	</div> <!--Fn de container-->
</section>

<!-- Fin Nuestras marcas-->

<!-- Sección para los últimos post -->

<section class="module">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="module-title">
					<h2 class="font-alt">No te pierdas las últimas novedades</h2>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<!-- Empieza el loop -->
			<?php 
		        $args = array(
		        	'posts_per_page' => 3 //Mostrará 3 post por página
		        ); 
		        $custom_query = new WP_Query($args);
		        if ( $custom_query->have_posts() ): while ($custom_query->have_posts()): $custom_query->the_post(); 
		        
		        // ¿Tenemos imagen destacada
		        if(has_post_thumbnail() ) {
                    $postImg = get_the_post_thumbnail_url();
                } 
                    $postImg;
   			 ?>

			<div class="col-sm-4 col-md-4 col-lg-4 post-item">
				<article id="post-15" class="post-15 post type-post status-publish format-standard has-post-thumbnail hentry category-design category-sport tag-corporate tag-lifestyle tag-music tag-news tag-travel">
					<div class="post-preview">
						<a href="<?php the_permalink(); ?>">
							<img width="1024" height="576" src="<?php echo $postImg; ?>" sizes="(max-width: 1024px) 100vw, 1024px" />
						</a>
					</div>

					<div class="post-header">
						<h2 class="post-title font-alt">
							<a href="single.html"><?php the_title(); ?></a>
						</h2>
						<ul class="post-meta font-alt">
							<li>
								<span><?php echo get_the_date('d M y'); ?></span>
							</li>
						</ul>
					</div>
					<div class="post-content justificado">
						<p><?php the_excerpt(); ?></p>
					</div>
					<div class="post-more">
						<a class="font-alt" href="<?php the_permalink(); ?>">Leer Más &rarr;</a>
					</div>
				</article>
			</div>
		    <?php // El loop finaliza y la query se resetea aquí para que toda la zona dinámica entre en el loop
        		endwhile; endif;
        		wp_reset_query();
   			?>
			<!--Termina el loop-->
		</div> <!--Fin row-->
	</div> <!--Fin container-->
	
	<!--Comentaios u opiniones de los clientes-->
</section>
<div class="wrapper">
<section class="module parallax bg-light bg-light-60" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/module-3.jpg';?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="tms-slides owl-carousel">
						<div class="tms-item">
							<div class="tms-icons">
								<span style="font-size: 32px;" class="icon icon-basic-message-multiple"></span>
							</div>
							<div class="tms-content">
								<blockquote>
									<p>If you want to know what a man&#039;s like, take a good look at how he treats his inferiors, not his equals.</p>
								</blockquote>
							</div>
							<div class="tms-author">
								<span class="font-alt">J.K. Rowling</span>
							</div>
						</div>
						
						<div class="tms-item">
							<div class="tms-icons">
								<span style="font-size: 32px;" class="icon icon-basic-message-multiple"></span>
							</div>
							<div class="tms-content">
								<blockquote>
									<p>To be yourself in a world that is constantly trying to make you something else is the greatest accomplishment.</p>
								</blockquote>
							</div>
							<div class="tms-author">
								<span class="font-alt">Ralph Waldo Emerson</span>
							</div>
						</div>
						
						<div class="tms-item">
								<div class="tms-icons">
									<span style="font-size: 32px;" class="icon icon-basic-message-multiple"></span>
								</div>
							<div class="tms-content">
								<blockquote>
									<p>Imperfection is beauty, madness is genius and it&#039;s better to be absolutely ridiculous than absolutely boring.</p>
								</blockquote>
							</div>
							<div class="tms-author">
								<span class="font-alt">Marilyn Monroe</span>
							</div>
						</div>
					</div>
				</div>
			<div class="col-sm-3"></div>
		</div>  <!--Fin de row-->
	</div>
</section>
</div>
	<!--Fin comentarios u opiniones de los clientes-->
	
	<!--Fotos de instagran (realmente va con el footer)-->
	<!--Fin fotos de instagram-->


<!-- Fin Sección últimos post -->


  
<?php
    get_footer();
?>