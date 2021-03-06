<?php
	/*
		Template Name: about
	*/
	
    global $wp;
    $current_slug = add_query_arg(array(), $wp -> request);
	
    get_header();
?>

<!-- Header-->
<header class="header">
	<div class="container">
		<div class="inner-header">
			<a class="inner-brand" href="index.html">
				<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/assets/img/minelli.png';?>" style="max-height: 35px;" />
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
	<section class="module-header default-height parallax bg-light bg-light-30" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/module-19.jpg';?>">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="h3 font-alt"><?php _e(" Quienes somos"); ?></h1>
					<h1 class="h4 font-alt"><?php _e(" Nuestros valores"); ?></h1>
				</div>
			</div>
		</div>
	</section>
	
	<div class="fw-page-builder-content">
		<section class="module-sm">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="fw-divider-space" style="margin-top: 80px;"></div>
					</div>
				</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="icon-box icon-box-left">
						<div class="icon-box-title">
							<h5 class="font-alt"><?php _e("La empresa"); ?></h5>
						</div>
						<div class="icon-box-content">
							<p class="text-justify">
								<?php _e("Fundada en 1975, Minelli es un referente a nivel nacional, trabajando temporada tras temporada para traer a sus clientes las últimas tendencias en moda de calzado.
										   Por ello, queremos poner a tu servicio toda nuestra experiencia atesorada durante estos años en la industria de las zapaterías online y asesorarte en todo lo que necesites, 
										   a la hora de elegir el calzado perfecto."); 
							   ?>
							 </p>
							<p class="font-alt">
								<!--<a target="_blank" href="#">Who We Are →</a>-->
							</p>
						</div>
					</div>
				<div class="fw-divider-space" style="margin-top: 80px;"></div>
				</div>
				<div class="col-sm-4">
					<div class="icon-box icon-box-left">
						<div class="icon-box-title">
							<h5 class="font-alt"><?php _e("Servicios"); ?></h5>
						</div>
						<div class="icon-box-content">
							<p class="text-justify">
									<?php _e("En Zapaterías Minelli disponemos de un servicio de atención personalizada en tienda, además el cliente dispone de 15 días laborales para cambios y devoluciones, efectuándose estos de forma gratuita incluso para las compras online.
											Todos los envíos tienen la opción de recibirlos en 24H, sin contar los días festivos.
											La realización de los pagos se realiza de forma segura, manteniendo siempre la privacidad de los datos del cliente."); 
							   		?>
								
							</p>
							<p class="font-alt">
								<!--<a target="_blank" href="#">Our Services →</a>-->
							</p>
						</div>
					</div>
					
					<div class="fw-divider-space" style="margin-top: 80px;"></div>
				</div>
				
				<div class="col-sm-4">
				<div class="icon-box icon-box-left">
					<div class="icon-box-title">
						<h5 class="font-alt"><?php _e("Trabaja con nosotros"); ?></h5>
					</div>
					<div class="icon-box-content">
						<p class="text-justify">
							<?php _e("En Minelli renovamos las colecciones con la misma rapidez que las tendencias, cada día crecemos para acercarnos más a nuestros clientes y por ello constantemente surgen nuevas oportunidades profesionales. ¡Anímate a trabajar con nosotros!"); ?>
						</p>
						<p class="font-alt">
							<!--<a target="_blank" href="#">Who We Are →</a>-->
						</p>
					</div>
				</div>
			<div class="fw-divider-space" style="margin-top: 80px;"></div>
			</div>
				
				<!--<div class="col-sm-4">-->
				<!--	<div class="progress-item"><div class="progress-title font-alt">Development</div><div class="progress"><div class="progress-bar progress-bar-solid" style="background-color: #333333;" aria-valuenow="60" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="pb-number-box font-alt"><span class="pb-number"></span>%</span></div></div></div><div class="progress-item"><div class="progress-title font-alt">Branding</div><div class="progress"><div class="progress-bar progress-bar-solid" style="background-color: #333333;" aria-valuenow="80" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="pb-number-box font-alt"><span class="pb-number"></span>%</span></div></div></div><div class="progress-item"><div class="progress-title font-alt">Websites</div><div class="progress"><div class="progress-bar progress-bar-solid" style="background-color: #333333;" aria-valuenow="50" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="pb-number-box font-alt"><span class="pb-number"></span>%</span></div></div></div><div class="progress-item"><div class="progress-title font-alt">Photography</div><div class="progress"><div class="progress-bar progress-bar-solid" style="background-color: #333333;" aria-valuenow="90" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="pb-number-box font-alt"><span class="pb-number"></span>%</span></div></div></div><div class="fw-divider-space" style="margin-top: 80px;"></div></div>-->
				<!--</div>-->
			</div> <!--Fin de container-->
		</section>
		
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
                                            <p>Estoy encantado. He realizado varios pedidos y sólo tuve que devolver uno, pero fue facilísimo y muy rápido. ¡¡¡Un equipo estupendo!!!</p>
                                        </blockquote>
                                    </div>
                                    <div class="tms-author">
                                        <span class="font-alt">David González</span>
                                    </div>
                                </div>

                                <div class="tms-item">
                                    <div class="tms-icons">
                                        <span style="font-size: 32px;" class="icon icon-basic-message-multiple"></span>
                                    </div>
                                    <div class="tms-content">
                                        <blockquote>
                                            <p>Comprar está muy bien, es rápido en el envío y si no aciertas o no te gustan se devuelve rápida y cómodamente. La recomiendo.</p>
                                        </blockquote>
                                    </div>
                                    <div class="tms-author">
                                        <span class="font-alt">Rosa Marañon</span>
                                    </div>
                                </div>

                                <div class="tms-item">
                                    <div class="tms-icons">
                                        <span style="font-size: 32px;" class="icon icon-basic-message-multiple"></span>
                                    </div>
                                    <div class="tms-content">
                                        <blockquote>
                                            <p>Me gusta por la variedad y la calidad de sus productos y eso hace que las personas se sientan más cómodas con lo que lucen.</p>
                                        </blockquote>
                                    </div>
                                    <div class="tms-author">
                                        <span class="font-alt">Beatriz Olmedo</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <!--Fin de row-->
                </div>
            </section>
        </div>
        <!--Fin comentarios u opiniones de los clientes-->
</div>

<?php
    get_footer();
?>
