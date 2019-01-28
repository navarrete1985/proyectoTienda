<?php
    get_header();
?>

<!-- Preloader
<div class="page-loader">
	<div class="loader">Loading...</div>
</div>
 Preloader end-->

<!-- Header-->
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
<!-- Header end-->
	<div class="wrapper">
		<section class="module-header default-height parallax bg-light bg-light-60 bg-film" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/module-13.jpg';?>">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="h3 font-alt">Blog Masonry</h1>
						<h1 class="h4 font-alt">We have standards</h1>
					</div>
				</div>
			</div>
		</section>
		
<!-- Blog-->
<section class="module">
	<div class="container">
		<div class="row">
	<!-- Content-->
			<div class="col-sm-8">
				<div class="row blog-masonry">
					<!-- Llamada content.php que contiene el loop de los posts -->
					<?php get_template_part('templates/content', get_post_format()); ?>
				</div>
		<!-- Pagination-->
				<div class="row">
					<div class="col-sm-12">
						<ul class="pagination font-alt">
							<li class="active">
								<span>1</span>
							</li>
							<li>
								<a href="page/2/index.html">2</a>
							</li>
							<li class="next">
								<a href="page/2/index.html" ><i class="fa fa-angle-right"></i></a>
							</li>
							<li class="prev"></li>
						</ul>
					</div>
				</div>
		<!-- Pagination end-->
			</div>
	<!-- Content end-->
	<!-- Sidebar-->
			<div class="col-sm-4">
				<?php get_sidebar(); ?>
			</div>
	<!-- Sidebar end-->
		</div>
	</div>
</section>
<!-- Blog end-->

<?php
    get_footer();
?>
