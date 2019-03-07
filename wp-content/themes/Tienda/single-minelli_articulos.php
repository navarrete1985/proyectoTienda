<?php
    get_header();
    the_post();
    
    	$marca = get_post_meta(get_the_ID(),'marca',true);
		$modelo = get_post_meta(get_the_ID(),'modelo',true);
		$destinatario = get_post_meta(get_the_ID(),'destinatario',true);
		$tipo = get_post_meta(get_the_ID(),'tipo',true);
		$coleccion = get_post_meta(get_the_ID(),'coleccion',true);

?>

<!-- header -->
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
<!-- / header -->

<!-- content -->

<!-- shop single-product -->
<section id="shop">
    <div class="container space-top-30">
        <div class="row">

            <!-- product sidebar area -->
            <div class="col-sm-6 col-md-5 product-sidebar">
                <div class="product-sidebar-details">
                    <h4 class="font-alt postcustom-title"><?php the_title()?></h4>
                    <p>	<?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?></p>
                    <div class="product-info">
                        
                        <div class="info">
                            <p><i class="lnr lnr-heart"></i><span><?php _e('Categorias:'); ?><a href="#">  <?php echo the_category(); ?></a></span></p>
                        </div>
                        
                        <div class="info">
                            <p><i class="lnr lnr-star"></i><span>Reviews: <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i></span></p>
                        </div>
                    </div><!-- / product-info -->

                </div><!-- product-details -->

            </div><!-- / col-sm-4 col-md-3 -->
            <!-- / product sidebar area -->

            <!-- product content area -->
            <div class="col-sm-6 col-md-7 product-content-area">
                <div class="product-content-area">
                    <div id="product-slider" class="carousel slide" data-ride="carousel">
                        <!-- wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="images/f-product-slide1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="images/f-product-slide2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="images/f-product-slide3.jpg" alt="">
                            </div>
                        </div>
                        <!-- / wrapper for slides -->

                        <!-- controls -->
                        <a class="left carousel-control" href="#product-slider" role="button" data-slide="prev">
                            <span class="lnr lnr-chevron-left" aria-hidden="true"></span>
                        </a>
                        <a class="right carousel-control" href="#product-slider" role="button" data-slide="next">
                            <span class="lnr lnr-chevron-right" aria-hidden="true"></span>
                        </a>
                        <!-- / controls -->
                    </div><!-- / product-slider -->

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#description" role="tab" data-toggle="tab" aria-expanded="true"><?php _e('Descripción:'); ?></a></li>
                        <li class=""><a href="#info" role="tab" data-toggle="tab" aria-expanded="false"><?php _e('Información:'); ?></a></li>
                    </ul>
                    <!-- / nav-tabs -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane animated fadeIn active" id="description">
                            <p><?php the_content(); ?></p>
                        </div>
                        <!-- / description-tab -->

                        <div role="tabpanel" class="tab-pane animated fadeIn" id="info">
                            <div class="row">
                                <div class="col-sm-6">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th><?php _e('Marca'); ?></th>
                                                <td><?php echo $marca ;?></td>
                                            </tr>
                                            <tr>
                                                <th><?php _e('Modelo'); ?></th>
                                                <td><?php echo $modelo ;?></td>
                                            </tr>
                                            <tr>
                                                <th><?php _e('Destinatario'); ?></th>
                                                <td><?php echo $destinatario ;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-sm-6">
                                    <table>
                                        <tbody>
                                            
                                            <tr>
                                                <th><?php _e('Tipo'); ?></th>
                                                <td><?php echo $tipo ;?></td>
                                            </tr>
                                            <tr>
                                                <th><?php _e('Colección'); ?></th>
                                                <td><?php echo $coleccion ;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- / row -->
                        </div>
                        <!-- / info-tab -->

                    </div>
                    <!-- / tab-content -->
                </div><!-- / product-content-area -->

            </div>
            <!-- / product-content-area -->

        </div><!-- / row -->
        <div id="comments" class="comments-area">
            <?php comments_template(); ?>
            <div id="mensaje">
                <p id="mensaje-rgpd"><?php _e('Debes aceptar la política de privacidad para publicar el comentario'); ?></p>
            </div>
        </div>

    </div><!-- / container -->
</section>
<!-- / shop single-product -->

<!-- / content -->

<!-- footer -->
<?php get_footer(); ?>