<?php
	/*
		Template Name: search
	*/

	get_header();
	
    $busqueda = $wp_the_query -> post_count;
    $palabra = $_GET['s'];

    if ($palabra == '') {
    	$label = '';
    }else {
	    switch ($busqueda) {
	        case 0:
	            $label = __('No hay ningún post relacionado para') .'<strong>'. $palabra . '</strong>';
	            break;
	        case 1:
	            $label = __('Se ha encontrado un post relacionado para') . '<strong>' . $palabra . '</strong>';
	            break;
	        default:
	            $label = __('Se han encontrado ') . $busqueda . __(' posts relacionados para') .'<strong>' . $palabra . '</strong>';
	            break;
	    }
    }

?>
	<header class="header cab-search">
		<div class="container">
			<div class="inner-header">
				<a class="inner-brand " href="#">
					<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/assets/img/minelli.png';?>" style="max-height: 35px;" />				
					<img class="brand-light" src="<?php echo bloginfo('template_directory') . '/assets/img/minelli_B.png';?>" style="max-height: 35px;" />				
				</a>
			</div>	

			<div class="inner-navigation">
	<?php
			get_template_part('templates/nav','front');
	?>
			</div>
		</div>
	</header>

	<div class="wrapper">
<!-- header -->		
		<section class="module-header  header-search imgResponsive module-header default-height parallax bg-dark bg-dark-30 bg-film">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="h4 font-alt"><?php echo $label; ?></h1>
					</div>
				</div>
			</div>
		</section>
<!-- End header -->	
<!-- Content -->
		<section class="module">
			<div class="container"> 
				<div class="row">
					<div class="col-sm-12">
<!-- Posts-->
						<article>
						    <div class="titulo bloqueflex">
						        <h2 class="post-title"><?php _e('POST ENCONTRADOS:'); ?></h2>
						    </div> 
<?php       
						    if (have_posts()):  
						   	    get_template_part('templates/content','listS'); 
							endif; 
?> 
						</article>
					</div>	
				</div>	
			</div>	 
<!-- End Posts-->
		</section>
<!-- Search form -->
		<section class="module search-form bloqueflex">
			<div class="container">
				<div class="row">					
					<div class="col-md-12">  
						<article class=" bloqueflex">
							<div class="post-header  formS bloqueflex-col">
								<h2 class="post-title"><?php _e('NUEVA BÚSQUEDA'); ?></h2>
								<?php get_search_form(); ?>
							</div>
						</article>
					</div>
				</div>
			</div>	
		</section>
<!-- End Search form -->		
<!-- Categorias -->
		<section class="module">
			<div class="container">
				<div class="row">					
					<div class="col-md-12">  
						<article class="">
							<div class="titulo bloqueflex">
								<h2 class="post-title"><?php _e('CATEGORIAS'); ?></h2>
							</div>
							<div class="bloqueflex-around">
				                <?php wp_list_categories('title_li'); ?>
				            </div>
						</article>
					</div>
				</div>
			</div>
		</section>
<!-- End Categorias -->
<!-- End Content end-->
	</div>

<?php get_footer(); ?>
