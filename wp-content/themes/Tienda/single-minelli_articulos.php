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
                        <!--<div class="info">-->
                        <!--    <p><i class="lnr lnr-tag"></i><span>Price: $339</span></p>-->
                        <!--</div>-->
                        <div class="info">
                            <p><i class="lnr lnr-heart"></i><span>Categorias: <a href="#">  <?php echo the_category(); ?></a></span></p>
                        </div>
                        <!--<div class="info">-->
                        <!--    <p><i class="lnr lnr-menu"></i><span>SKU: 1456842494</span></p>-->
                        <!--</div>-->
                        <div class="info">
                            <p><i class="lnr lnr-star"></i><span>Reviews: <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i></span></p>
                        </div>
                    </div><!-- / product-info -->

                    <!--<div class="buy-product">-->
                    <!--    <div class="options">-->
                    <!--        <input type="number" step="1" min="0" name="cart" value="1" title="Qty" class="input-text qty text" size="4">-->
                    <!--        <span class="selectors">-->
                    <!--            <select class="selectpicker">-->
                    <!--                <optgroup label="Size:">-->
                    <!--                    <option>140x200</option>-->
                    <!--                    <option>160x200</option>-->
                    <!--                    <option>180x200</option>-->
                    <!--                </optgroup>-->
                    <!--            </select>-->
                    <!--            <select class="selectpicker two">-->
                    <!--                <optgroup label="Color:">-->
                    <!--                    <option>White</option>-->
                    <!--                    <option>Black</option>-->
                    <!--                    <option>Wenge</option>-->
                    <!--                </optgroup>-->
                    <!--            </select>-->
                    <!--        </span>-->
                    <!--    </div>-->
                        <!-- / options -->

                    <!--    <div class="space-25">&nbsp;</div>-->

                    <!--    <a href="shopping-cart.html" class="btn btn-primary-filled btn-rounded"><i class="lnr lnr-cart"></i><span> Add to Cart</span></a>-->
                    <!--    <a href="checkout.html" class="btn btn-success-filled btn-rounded"><i class="lnr lnr-heart"></i><span> Buy Now</span></a>-->
                    <!--</div>-->

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
                        <li class="active"><a href="#description" role="tab" data-toggle="tab" aria-expanded="true">Descripción</a></li>
                        <li class=""><a href="#info" role="tab" data-toggle="tab" aria-expanded="false">Información</a></li>
                        <!--<li class=""><a href="#reviews" role="tab" data-toggle="tab" aria-expanded="false">REVIEWS (2)</a></li>-->
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
                                                <th>Marca</th>
                                                <td><?php echo $marca ;?></td>
                                            </tr>
                                            <tr>
                                                <th>Modelo</th>
                                                <td><?php echo $modelo ;?></td>
                                            </tr>
                                            <tr>
                                                <th>Destinatario</th>
                                                <td><?php echo $destinatario ;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-sm-6">
                                    <table>
                                        <tbody>
                                            
                                            <tr>
                                                <th>Tipo</th>
                                                <td><?php echo $tipo ;?></td>
                                            </tr>
                                            <tr>
                                                <th>Colección</th>
                                                <td><?php echo $coleccion ;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- / row -->
                        </div>
                        <!-- / info-tab -->

                        <!--<div role="tabpanel" class="tab-pane animated fadeIn" id="reviews">-->
                        <!--    <div class="reviews">-->
                        <!--        <div class="review-author pull-left">-->
                        <!--          <img src="images/author1.jpg" alt="">-->
                        <!--        </div>-->
                        <!--        <div class="review-content">-->
                        <!--            <h4 class="review-title no-margin">Amazing product!</h4>-->
                        <!--            <div class="review-stars">-->
                        <!--                <span class="product-rating">-->
                        <!--                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>-->
                        <!--                </span>-->
                        <!--            </div><!-- / review-stars -->
                        <!--            <p>Duis luctus, neque ac ultricies bibendum, risus velit gravida velit, vestibulum laoreet orci magna vel ipsum.</p>-->
                        <!--            <cite> - Johana Doe</cite>-->
                        <!--        </div><!-- / review-content -->

                        <!--        <div class="space-25">&nbsp;</div>-->

                        <!--        <div class="review-author pull-left">-->
                        <!--          <img src="images/author2.jpg" alt="">-->
                        <!--        </div>-->
                        <!--        <div class="review-content">-->
                        <!--            <h4 class="review-title no-margin">Very good product!</h4>-->
                        <!--            <div class="review-stars">-->
                        <!--                <span class="product-rating">-->
                        <!--                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>-->
                        <!--                </span>-->
                        <!--            </div><!-- / review-stars -->
                        <!--            <p>Morbi sodales ornare ex, at consectetur ipsum faucibus at. Ut facilisis orci metus, vitae hendrerit leo vulputate sit amet.</p>-->
                        <!--            <cite> - Jane Doe</cite>-->
                        <!--        </div><!-- / review-content -->

                                <!-- add review -->
                        <!--        <div id="add-review" class="space-top-30">-->
                        <!--            <h4>LEAVE A REVIEW</h4>-->
                        <!--            <div class="row">-->
                        <!--                <div class="col-sm-4 review-form">-->
                        <!--                    <input type="text" class="form-control" placeholder="*NAME" required>-->
                        <!--                </div>-->
                        <!--                <div class="col-sm-4 review-form">-->
                        <!--                    <input type="email" class="form-control" placeholder="*EMAIL" required>-->
                        <!--                </div>-->
                        <!--                <div class="col-sm-4 review-form">-->
                        <!--                    <select class="form-control">-->
                        <!--                        <option>5 STARS</option>-->
                        <!--                        <option>4 STARS</option>-->
                        <!--                        <option>3 STARS</option>-->
                        <!--                        <option>2 STARS</option>-->
                        <!--                        <option>1 STAR</option>-->
                        <!--                    </select>-->
                        <!--                </div>-->
                        <!--                <div class="col-sm-12 review-form">-->
                        <!--                    <textarea rows="7" class="form-control" placeholder="*REVIEW" required></textarea>-->
                        <!--                    <button type="submit" class="btn btn-submit btn-primary-filled btn-rounded">Submit Review</button>-->
                        <!--                </div>-->
                        <!--            </div><!-- / row -->
                        <!--        </div>-->
                                <!-- / add review -->
                        <!--    </div><!-- / reviews -->
                        <!--</div>-->
                        <!-- / reviews-tab -->
                    </div>
                    <!-- / tab-content -->
                </div><!-- / product-content-area -->

            </div>
            <!-- / product-content-area -->

        </div><!-- / row -->
        <div id="comments" class="comments-area">
            <?php comments_template(); ?>
            <div id="mensaje">
                <p id="mensaje-rgpd">Debes aceptar la política de privacidad para publicar el comentario</p>
            </div>
        </div>

        <!--<div id="related-products">-->
        <!--    <h4 class="space-top-30 space-bottom-30 space-left">RELATED PRODUCTS</h4>-->
        <!--    <ul class="row shop list-unstyled" id="grid">-->
                <!-- product -->
        <!--        <li class="col-xs-6 col-md-4 product m-product" data-groups='["bedroom"]'>-->
        <!--            <div class="img-bg-color primary">-->
        <!--                <h5 class="product-price">$249</h5>-->
        <!--                <a href="single-product2.html" class="product-link"></a>-->
                        <!-- / product-link -->
        <!--                <img src="images/f-m-product1.jpg" alt="">-->
                        <!-- / product-image -->

                        <!-- product-hover-tools -->
        <!--                <div class="product-hover-tools">-->
        <!--                    <a href="single-product2.html" class="view-btn" data-toggle="tooltip" title="View Product">-->
        <!--                        <i class="lnr lnr-eye"></i>-->
        <!--                    </a>-->
        <!--                    <a href="shopping-cart.html" class="cart-btn" data-toggle="tooltip" title="Add to Cart">-->
        <!--                        <i class="lnr lnr-cart"></i>-->
        <!--                    </a>-->
        <!--                </div><!-- / product-hover-tools -->

                        <!-- product-details -->
        <!--                <div class="product-details">-->
        <!--                    <h5 class="product-title">PRODUCT TITLE</h5>-->
        <!--                    <p class="product-category">CATEGORY</p>-->
        <!--                </div><!-- / product-details -->
        <!--            </div><!-- / img-bg-color -->
        <!--        </li>-->
                <!-- / product -->

                <!-- product -->
        <!--        <li class="col-xs-6 col-md-4 product m-product" data-groups='["living", "kitchen"]'>-->
        <!--            <div class="img-bg-color primary">-->
        <!--                <h5 class="product-price"><del>$399</del> $199</h5>-->
        <!--                <a href="single-product2.html" class="product-link"></a>-->
                        <!-- / product-link -->
        <!--                <img src="images/f-m-product2.jpg" alt="">-->
                        <!-- / product-image -->

                        <!-- product-hover-tools -->
        <!--                <div class="product-hover-tools">-->
        <!--                    <a href="single-product2.html" class="view-btn" data-toggle="tooltip" title="View Product">-->
        <!--                        <i class="lnr lnr-eye"></i>-->
        <!--                    </a>-->
        <!--                    <a href="shopping-cart.html" class="cart-btn" data-toggle="tooltip" title="Add to Cart">-->
        <!--                        <i class="lnr lnr-cart"></i>-->
        <!--                    </a>-->
        <!--                </div><!-- / product-hover-tools -->

                        <!-- product-details -->
        <!--                <div class="product-details">-->
        <!--                    <h5 class="product-title">PRODUCT TITLE</h5>-->
        <!--                    <p class="product-category">CATEGORY</p>-->
        <!--                </div><!-- / product-details -->
        <!--            </div><!-- / img-bg-color -->
        <!--        </li>-->
                <!-- / product -->

                <!-- product -->
        <!--        <li class="col-xs-6 col-md-4 product m-product" data-groups='["bedroom"]'>-->
        <!--            <div class="img-bg-color primary">-->
        <!--                <h5 class="product-price">$379</h5>-->
        <!--                <a href="single-product2.html" class="product-link"></a>-->
                        <!-- / product-link -->
        <!--                <img src="images/f-m-product3.jpg" alt="">-->
                        <!-- / product-image -->

                        <!-- product-hover-tools -->
        <!--                <div class="product-hover-tools">-->
        <!--                    <a href="single-product2.html" class="view-btn" data-toggle="tooltip" title="View Product">-->
        <!--                        <i class="lnr lnr-eye"></i>-->
        <!--                    </a>-->
        <!--                    <a href="shopping-cart.html" class="cart-btn" data-toggle="tooltip" title="Add to Cart">-->
        <!--                        <i class="lnr lnr-cart"></i>-->
        <!--                    </a>-->
        <!--                </div><!-- / product-hover-tools -->

                        <!-- product-details -->
        <!--                <div class="product-details">-->
        <!--                    <h5 class="product-title">PRODUCT TITLE</h5>-->
        <!--                    <p class="product-category">CATEGORY</p>-->
        <!--                </div><!-- / product-details -->
        <!--            </div><!-- / img-bg-color -->
        <!--        </li>-->
                <!-- / product -->

        <!--    </ul><!-- / row -->
        <!--</div><!-- / related-products -->

    </div><!-- / container -->
</section>
<!-- / shop single-product -->

<!-- / content -->

<!-- footer -->
<?php get_footer(); ?>