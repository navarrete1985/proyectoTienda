<?php
    /*
        Template Name: private
    */
    $user = wp_get_current_user();
    $rol = get_author_role($user -> ID);
    $name = $user -> user_firstname; 

	get_header();
?>
	<header class="header">
		<div class="container">
			<div class="inner-header">
				<a class="inner-brand" href="#">
					<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/main-logo.png'; ?>" style="max-height: 60px;" />
					<img class="brand-light" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/additional-logo.png'; ?>" style="max-height: 60px;" />					
				</a>
			</div>
				
			<div class="inner-navigation">
				<?php get_template_part('templates/nav','front'); ?>
			</div>
		</div>
	</header>


	<div class="wrapper">
		<section class="module-header full-height parallax bg-dark bg-dark-30" data-jarallax-video="https://www.youtube.com/watch?v=_ynSYvG-tL0" data-background="../wp-content/uploads/2017/05/module-16.jpg">
			<div class="container">
				<div class="row bloqueflex bordeB">
					<div id="header-private" class="col-sm-8 bordeR">
						<h1 class="h3 font-alt">Bienvenido <?php echo $name; ?></h1>
						<h1 class="h4 font-alt">Tu rol es de: <?php echo $rol; ?></h1>
					</div>
				</div>
			</div>
		</section>
		
<!-- Portfolio-->
		<section class="module portfolio-section">
			<div class="container">
				<!-- Portfolio filter-->
				<div class="row">
					<div class="col-sm-12">
						<ul class="filters font-alt" id="filters">
							<li>
								<a class="current" href="#" data-filter="*">
									All									<sup><small>.10</small></sup>
								</a>
							</li>
															<li>
									<a href="#" data-filter=".category_14">
										Branding										<sup><small>.4</small></sup>
									</a>
								</li>
															<li>
									<a href="#" data-filter=".category_15">
										Design										<sup><small>.6</small></sup>
									</a>
								</li>
															<li>
									<a href="#" data-filter=".category_16">
										Photo										<sup><small>.4</small></sup>
									</a>
								</li>
															<li>
									<a href="#" data-filter=".category_17">
										Web										<sup><small>.3</small></sup>
									</a>
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
							<div class="portfolio-img-wrap" data-background="../wp-content/uploads/2017/05/img-1-308x640.jpg"></div>
							<div class="portfolio-overlay"></div>
							<div class="portfolio-caption font-alt">
								<h6 class="portfolio-title">The Deep Surface</h6>
								<span class="portfolio-subtitle">Branding</span>
							</div>
						</div><a class="portfolio-link" href="../project/the-deep-surface/index.html"></a>
					</div>
					<!-- Portfolio single end-->

									<!-- Portfolio single page-->
					<div id="post-90" class="category_15 default portfolio-item post-90 fw-portfolio type-fw-portfolio status-publish has-post-thumbnail hentry fw-portfolio-category-design">
						<div class="portfolio-wrapper">
							<div class="portfolio-img-wrap" data-background="../wp-content/uploads/2017/05/img-2.jpg"></div>
							<div class="portfolio-overlay"></div>
							<div class="portfolio-caption font-alt">
								<h6 class="portfolio-title">Fresh Fruits Company</h6>
								<span class="portfolio-subtitle">Design</span>
							</div>
						</div><a class="portfolio-link" href="../project/fresh-fruits-company/index.html"></a>
					</div>
					<!-- Portfolio single end-->

									<!-- Portfolio single page-->
					<div id="post-89" class="category_15 default portfolio-item post-89 fw-portfolio type-fw-portfolio status-publish has-post-thumbnail hentry fw-portfolio-category-design">
						<div class="portfolio-wrapper">
							<div class="portfolio-img-wrap" data-background="../wp-content/uploads/2017/05/img-3.jpg"></div>
							<div class="portfolio-overlay"></div>
							<div class="portfolio-caption font-alt">
								<h6 class="portfolio-title">Micheal Debuis</h6>
								<span class="portfolio-subtitle">Design</span>
							</div>
						</div><a class="portfolio-link" href="../project/micheal-debuis/index.html"></a>
					</div>
					<!-- Portfolio single end-->

									<!-- Portfolio single page-->
					<div id="post-88" class="category_15 default portfolio-item post-88 fw-portfolio type-fw-portfolio status-publish has-post-thumbnail hentry fw-portfolio-category-design">
						<div class="portfolio-wrapper">
							<div class="portfolio-img-wrap" data-background="../wp-content/uploads/2017/05/img-4.jpg"></div>
							<div class="portfolio-overlay"></div>
							<div class="portfolio-caption font-alt">
								<h6 class="portfolio-title">Greedy Emperor</h6>
								<span class="portfolio-subtitle">Design</span>
							</div>
						</div><a class="portfolio-link" href="../project/greedy-emperor/index.html"></a>
					</div>
					<!-- Portfolio single end-->

									<!-- Portfolio single page-->
					<div id="post-87" class="category_15 default portfolio-item post-87 fw-portfolio type-fw-portfolio status-publish has-post-thumbnail hentry fw-portfolio-category-design">
						<div class="portfolio-wrapper">
							<div class="portfolio-img-wrap" data-background="../wp-content/uploads/2017/05/img-5.jpg"></div>
							<div class="portfolio-overlay"></div>
							<div class="portfolio-caption font-alt">
								<h6 class="portfolio-title">Bluetooth Speaker</h6>
								<span class="portfolio-subtitle">Design</span>
							</div>
						</div><a class="portfolio-link" href="../project/bluetooth-speaker/index.html"></a>
					</div>
					<!-- Portfolio single end-->

									<!-- Portfolio single page-->
					<div id="post-86" class="category_14 category_16 category_17 large portfolio-item post-86 fw-portfolio type-fw-portfolio status-publish has-post-thumbnail hentry fw-portfolio-category-branding fw-portfolio-category-photo fw-portfolio-category-web">
						<div class="portfolio-wrapper">
							<div class="portfolio-img-wrap" data-background="../wp-content/uploads/2017/05/img-6-640x640.jpg"></div>
							<div class="portfolio-overlay"></div>
							<div class="portfolio-caption font-alt">
								<h6 class="portfolio-title">Drawing Inspiration</h6>
								<span class="portfolio-subtitle">Branding / Photo / Web</span>
							</div>
						</div><a class="portfolio-link" href="../project/drawing-inspiration/index.html"></a>
					</div>
					<!-- Portfolio single end-->

									<!-- Portfolio single page-->
					<div id="post-85" class="category_15 category_16 category_17 wide portfolio-item post-85 fw-portfolio type-fw-portfolio status-publish has-post-thumbnail hentry fw-portfolio-category-design fw-portfolio-category-photo fw-portfolio-category-web">
						<div class="portfolio-wrapper">
							<div class="portfolio-img-wrap" data-background="../wp-content/uploads/2017/05/img-7-640x308.jpg"></div>
							<div class="portfolio-overlay"></div>
							<div class="portfolio-caption font-alt">
								<h6 class="portfolio-title">Uncomplicated Beauty</h6>
								<span class="portfolio-subtitle">Design / Photo / Web</span>
							</div>
						</div><a class="portfolio-link" href="../project/uncomplicated-beauty/index.html"></a>
					</div>
					<!-- Portfolio single end-->

				
				
			</div>
			<!-- Portfolio end-->

		
		<div id="next-projects" data-num-pages="2"><a href="page/2/index.html" ></a></div>
		<div id="loading-image" class="filter-loader hide" style="display: block; position: static; margin: 0 auto -40px;"></div>

	</div>

</section>
<!-- Portfolio end-->

<?php get_footer(); ?>