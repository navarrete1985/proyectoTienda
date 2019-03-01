<?php
    /*
        Template Name: private
    */
    $user = wp_get_current_user();
    $name = $user -> user_firstname; 
    $rol = get_author_role($user -> ID);

	$roles = rol_author_sp($rol);
	$rolsp = $roles['rolsp'];
	$capacidad = $roles['capacidad']; 
	
 	get_header();
?>
	<header class="header">
		<div class="container">
			<div class="inner-header">
				<a class="inner-brand" href="#">
					<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/assets/img/minelli_B.png';?>" style="max-height: 35px;" />
					<!--<img class="brand-light" src="<?php //echo bloginfo('template_directory') . '/img/uploads/2017/05/additional-logo.png'; ?>" style="max-height: 60px;" />					-->
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
				<div class="row bloqueflex">
					<div class="banner-border bloqueflex">
						<div class="banner-info bloqueflex-col">
							<h1 class="h3 font-alt">Bienvenido <?php echo $name; ?></h1>
							<h1 class="h4 font-alt">Tu rol es de: <?php echo $rolsp; ?></h1>
							<h1 class="h4 font-alt">Tu rol es de: <?php echo $rol2; ?></h1>
							<p><?php echo $capacidad; ?></p>
							<a class="btn btn-md btn-round btn-fill btn-brand" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

<?php get_footer(); ?>