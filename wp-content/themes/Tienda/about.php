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
				<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/main-logo.png';?>" style="max-height: 60px;" />
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
					<h1 class="h3 font-alt">About Us</h1>
					<h1 class="h4 font-alt">We have standards</h1>
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
							<h5 class="font-alt">Quienes somos</h5>
						</div>
						<div class="icon-box-content">
							<p>There have not been any since we have lived here, said my mother. We thought - Mr. Copperfield thought - it was quite a large rookery; but the nests were very old ones, and the birds have deserted them.</p>
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
							<h5 class="font-alt">Nuestros servicios</h5>
						</div>
						<div class="icon-box-content">
							<p>En XXX XX disponemos de un servicio de atención personalizada en tienda, además el cliente dispone de 15 días laborales para cambios y devoluciones, efectuándose estos de forma gratuita incluso para las compras online.
								Todos los envíos tienen la opción de recibirlos en 24H, sin contar los días festivos.
								La realización de los pagos se realiza de forma segura, manteniendo siempre la privacidad de los datos del cliente.
							</p>
							<p class="font-alt">
								<!--<a target="_blank" href="#">Our Services →</a>-->
							</p>
						</div>
					</div>
					
					<div class="fw-divider-space" style="margin-top: 80px;"></div>
				</div>
				<div class="col-sm-4">
					<div class="progress-item"><div class="progress-title font-alt">Development</div><div class="progress"><div class="progress-bar progress-bar-solid" style="background-color: #333333;" aria-valuenow="60" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="pb-number-box font-alt"><span class="pb-number"></span>%</span></div></div></div><div class="progress-item"><div class="progress-title font-alt">Branding</div><div class="progress"><div class="progress-bar progress-bar-solid" style="background-color: #333333;" aria-valuenow="80" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="pb-number-box font-alt"><span class="pb-number"></span>%</span></div></div></div><div class="progress-item"><div class="progress-title font-alt">Websites</div><div class="progress"><div class="progress-bar progress-bar-solid" style="background-color: #333333;" aria-valuenow="50" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="pb-number-box font-alt"><span class="pb-number"></span>%</span></div></div></div><div class="progress-item"><div class="progress-title font-alt">Photography</div><div class="progress"><div class="progress-bar progress-bar-solid" style="background-color: #333333;" aria-valuenow="90" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="pb-number-box font-alt"><span class="pb-number"></span>%</span></div></div></div><div class="fw-divider-space" style="margin-top: 80px;"></div></div>
				</div>
			</div> <!--Fin de container-->
		</section>

<section class="module parallax bg-light bg-light-60" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/module-3.jpg';?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			<div class="tms-slides owl-carousel">
				<div class="tms-item">
					<div class="tms-icons">
						<span style="font-size: 32px;" class="icon icon-basic-message-multiple"></span>
					</div>
					<div class="tms-content">
						<blockquote><p>If you want to know what a man&#039;s like, take a good look at how he treats his inferiors, not his equals.</p></blockquote>
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
						<blockquote><p>To be yourself in a world that is constantly trying to make you something else is the greatest accomplishment.</p></blockquote>
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
						<blockquote><p>Imperfection is beauty, madness is genius and it&#039;s better to be absolutely ridiculous than absolutely boring.</p></blockquote>
					</div>
					<div class="tms-author">
						<span class="font-alt">Marilyn Monroe</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			</div>
		</div>
	</div>
</section>

</div>

<?php
    get_footer();
?>
