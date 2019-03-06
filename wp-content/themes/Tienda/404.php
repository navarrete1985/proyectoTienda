<?php
	get_header();
?>
<!-- Header-->
		<header class="header">
			<div class="container">
				<div class="inner-header">
					<a class="inner-brand" href="http://vortex-wp.2the.me">
						<img class="brand-dark" src="http://vortex-wp.2the.me/wp-content/uploads/2017/05/main-logo.png" style="max-height: 60px;" /><img class="brand-light" src="http://vortex-wp.2the.me/wp-content/uploads/2017/05/additional-logo.png" style="max-height: 60px;" />
					</a>
				</div>

				<div class="inner-navigation">
					<?php get_template_part('templates/nav','front'); ?>
				</div>
			</div>
		</header>
		<!-- Header end-->

		<div class="wrapper">
			<section class="module-header">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="h3 font-alt"><?php _e('Página no encontrada'); ?></h1>
						</div>
					</div>
				</div>
			</section>
			
			<section class="module">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							<div class="module-title">
								<h2 class="font-alt"><?php _e('Página no encontrada'); ?></h2>
								<p class="font-serif">
									<?php _e('Parece que no se encontró nada en esta ubicación. ¿Quieres intentar una búsqueda?'); ?>
								</p>
							</div>
						</div>
					</div>
				</div>	
					
				<div class="container">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2 bloqueflexR">
							<div class="module-title">
								<?php get_search_form(); ?> 
							</div>
						</div>
					</div>
				</div>
				
				<div class="container">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2 bloqueflex">
							<div class="module-title">
								<a href="javascript:history.back()" class="btn-general"><-- <?php _e('VOLVER'); ?></a>
							</div>
						</div>
					</div>					
				</div>
			</section>

<?php get_footer(); ?>