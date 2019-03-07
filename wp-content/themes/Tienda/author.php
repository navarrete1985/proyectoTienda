<?php
    $curauth = (get_query_var('author_name')) ? get_user_by('slug',get_query_var('author_name')) : get_userdata(get_query_var('author'));

	$name = get_query_var('author_name');
	$alias = $curauth->nickname;
	$urlimgAutor = imgAutor($alias);                                            //Función propia para sacar la url y  el nombre del .jpg
	$networking = get_the_author_meta('networking', $curauth->ID);
	$moda = get_the_author_meta('moda', $curauth->ID);
	$innovacion = get_the_author_meta('innovacion', $curauth->ID);
	$marketing = get_the_author_meta('marketing', $curauth->ID);
	
	get_header();
?>
<header class="header">
	<div class="container">
            <div class="inner-header">
                <a class="inner-brand" href="index.html">
						<!--<img class="brand-dark" src="<?php// echo bloginfo('template_directory') . '/img/uploads/2017/05/main-logo.png';?>" style="max-height: 60px;" />-->
						<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/assets/img/minelli.png';?>" style="max-height: 35px;" />
						<img class="brand-light" src="<?php echo bloginfo('template_directory') . '/assets/img/minelli_B.png';?>" style="max-height: 35px;" />
				</a>
            </div>

		<div class="inner-navigation">
			<?php get_template_part('templates/nav','front'); ?>
		</div>
	</div>
</header>
<!-- Header end-->

<div class="wrapper">
	<section id="contentAuthor" class="imgResponsive module-header default-height parallax bg-dark bg-dark-30 bg-film">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="h3 font-alt"><?php _e('Autor:'); ?><?php echo $name; ?></h1>
				</div>
			</div>
		</div>
	</section>

	<div class="fw-page-builder-content">
		<section class="module">
			<div class="row">
				<div class="col-sm-3">
					<div id="nav-margin" class="container bloqueflex-col">
						<img  id="imgAutor" src="<?php echo bloginfo('template_directory') . $urlimgAutor; ?>"> 
		                <p><a href="#personal-info" class="page-scroll"><?php _e('INFORMACIÓN PERSONAL'); ?></a></p>
		                <p><a href="#shipping-info" class="page-scroll"><?php _e('MI HISTORIA'); ?></a></p>
		                <p><a href="#my-orders" class="page-scroll"><?php _e('CONTACTO'); ?></a></p>
		                <p><a href="#my-reviews" class="page-scroll"><?php _e('HABILIDADES'); ?></a></p>
		                <p><a href="#wishlist" class="page-scroll"><?php _e('ULTIMOS POST'); ?></a></p>						
					</div>
				</div>
				
				<div class="col-sm-9">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div id="personal-info" class="account-info-content"> 
									<h4><?php _e('INFORMACIÓN PERSONAL'); ?></h4>	
									<div>
			                            <p><strong><?php _e('Nombre completo:'); ?></strong><span><?php echo $curauth -> display_name;  ?></span></p>
			                            <p><strong><?php _e('Rol autor:'); ?></strong><span><?php echo get_author_role($curauth -> ID);  ?></span></p>
			                            <p><strong><?php _e('Pais:'); ?> </strong><span><?php echo the_author_meta('Pais', $curauth->ID); ?></span></p>
			                            <p><strong><?php _e('Fecha nacimiento:'); ?></strong><span><?php echo the_author_meta('Fecha_nac', $curauth->ID); ?></span></p>
									</div>
								</div>

				                <div id="shipping-info" class="account-info-content">
				                    <h4><?php _e('MI HISTORIA'); ?></h4>
				                    <p><?php echo $curauth -> description; ?></p>
				                </div>
				                
				                <div id="my-orders" class="account-info-content">
				                    <h4><?php _e('CONTACTO'); ?></h4>
				                    <p><strong><?php _e('Email:'); ?></strong><span><?php echo $curauth -> user_email; ?></span></p>
				                    <p><strong><?php _e('Teléfono:'); ?></strong><span><?php echo the_author_meta('Telefono', $curauth->ID); ?></span></p>
				                    <div class="account-info-footer bloqueflex-around">
				                        <a href="http://www.facebook.com/<?php the_author_meta('facebook', $curauth->ID); ?>" target="-blank"><img src="<?php echo bloginfo('template_directory') . '/assets/img/redes/facebook.png';?>"></a>
				                        <a href="http://www.twitter.com/<?php the_author_meta('twitter', $curauth->ID); ?>" target="-blank"><img src="<?php echo bloginfo('template_directory') . '/assets/img/redes/twitter.png';?>"></a>
				                        <a href="http://www.linkedin.com/<?php the_author_meta('linkedin', $curauth->ID); ?>" target="-blank"><img src="<?php echo bloginfo('template_directory') . '/assets/img/redes/linkedin.png';?>"></a>
				                    </div>
				               </div>				                
							</div>

						</div>
					</div>
				</div>	
			</div>
		</section>

		<section id="my-reviews" class="module module-divider-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="module-title">
							<h2 class="font-alt"><?php _e('Habilidades'); ?></h2>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="pie-chart">
							<div class="chart" data-percent="<?php echo $networking; ?>" data-chart-options="{&quot;barColor&quot;:&quot;#333333&quot;}" >
								<div class="chart-text font-alt"><?php echo $networking . '%'; ?></div>
							</div>
							<div class="chart-title">
								<h5 class="font-alt">Networking</h5>
							</div>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="pie-chart">
							<div class="chart" data-percent="<?php echo $moda; ?>" data-chart-options="{&quot;barColor&quot;:&quot;#dd9933&quot;}" >
								<div class="chart-text font-alt"><?php echo $moda . '%'; ?></div>
							</div>
							<div class="chart-title">
								<h5 class="font-alt"><?php _e('Moda'); ?></h5>
							</div>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="pie-chart">
							<div class="chart" data-percent="<?php  echo $innovacion; ?>" data-chart-options="{&quot;barColor&quot;:&quot;#dd3333&quot;}" >
								<div class="chart-text font-alt"><?php  echo $innovacion . '%'; ?></div>
							</div>
							<div class="chart-title">
								<h5 class="font-alt"><?php _e('Innovacion'); ?></h5>
							</div>
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="pie-chart">
							<div class="chart" data-percent="<?php  echo $marketing; ?>" data-chart-options="{&quot;barColor&quot;:&quot;#148F77&quot;}" >
								<div class="chart-text font-alt"><?php  echo $marketing . '%'; ?></div>
							</div>
							<div class="chart-title">
								<h5 class="font-alt">Marketing</h5>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</section>
		
		<section id="wishlist" class="module module-divider-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">				
               			 <div class="account-info-content">
                    		<h4><?php _e('ULTIMOS POST'); ?></h4>
<?php
		                    if (have_posts()): 
		                       get_template_part('templates/content','listS'); 
		                    endif;
?>    
               			 </div>		
					</div>
               	</div>		
			</div>	
		</section>
	</div>	

<?php get_footer(); ?>
