<?php
    /*
        Template Name: contact
    */

    get_header();
?>

    <!-- Preloader-->
    <div class="page-loader">
        <div class="loader">Loading...</div>
    </div>
    <!-- Preloader end-->

    <!-- Header-->
    <header class="header">
        <div class="container">
            <div class="inner-header">
                <a class="inner-brand" href="../index.html">
						<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/main-logo.png';?>" style="max-height: 60px;" /><img class="brand-light" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/additional-logo.png';?>" style="max-height: 60px;" />					</a>
            </div>
            <div class="header-nav-toogle">
                <a class="show-menu-btn" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
            <?php
		get_template_part('templates/nav','front');
?>
        </div>
    </header>
    <!-- Header end-->

    <div class="wrapper">
        <section class="module-header default-height parallax bg-light bg-light-30" data-background="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/img-14.jpg';?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="h3 font-alt">Contact Us</h1>
                        <h1 class="h4 font-alt">Let&#039;s keep in touch</h1></div>
                </div>
            </div>
        </section>
        <div class="fw-page-builder-content">
            <section class="module">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="module-title">
                                <h2 class="font-alt">Get in Touch</h2>
                                <p class="font-serif">We will get back to you as soon as possible</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div role="form" class="wpcf7" id="wpcf7-f275-p269-o1" lang="en-US" dir="ltr">
                                <div class="screen-reader-response"></div>
                                <form action="http://vortex-wp.2the.me/contact/#wpcf7-f275-p269-o1" method="post" class="wpcf7-form" novalidate="novalidate">
                                    <div style="display: none;">
                                        <input type="hidden" name="_wpcf7" value="275" />
                                        <input type="hidden" name="_wpcf7_version" value="4.7" />
                                        <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f275-p269-o1" />
                                        <input type="hidden" name="_wpnonce" value="a9c8616586" />
                                    </div>
                                    <p><span class="wpcf7-form-control-wrap user-name"><input type="text" name="user-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Name*" /></span>
                                        <br />
                                        <span class="wpcf7-form-control-wrap email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="E-mail*" /></span>
                                        <br />
                                        <span class="wpcf7-form-control-wrap message"><textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Message*"></textarea></span>
                                        <br />
                                        <input type="submit" value="Submit" class="wpcf7-form-control wpcf7-submit btn-block" />
                                    </p>
                                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                                </form>
                            </div>
                            <div class="fw-divider-space" style="margin-top: 40px;"></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="icon-box icon-box-left icon-exist">
                                <div class="icon-box-icon" style="height: 28px;"><span class="icon icon-basic-paperplane"></span></div>
                                <div class="icon-box-title">
                                    <h5 class="font-alt">Say Hello</h5></div>
                                <div class="icon-box-content">
                                    <p>Email: info@domain.com
                                        <br /> Phone: +1 234 567 89 10</p>
                                </div>
                            </div>
                            <div class="fw-divider-space" style="margin-top: 80px;"></div>
                            <div class="icon-box icon-box-left icon-exist">
                                <div class="icon-box-icon" style="height: 28px;"><span class="icon icon-basic-map"></span></div>
                                <div class="icon-box-title">
                                    <h5 class="font-alt">Where to Meet</h5></div>
                                <div class="icon-box-content">
                                    <p>Vortex Company
                                        <br /> 23 Greate Street, Los Angeles, 12345 LS</p>
                                    <p class="font-alt"><a target="_self" href="#map">Find us on map →</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <section class="maps-container">
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3170.3132253746244!2d-5.9212874842186265!3d37.38242417983292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd126f6ac549c70f%3A0x62027257c46e7941!2sAv.+V%C3%ADa+Apia%2C+10%2C+41016+Sevilla!5e0!3m2!1ses!2ses!4v1548316562802" style="border:0; width: 100%; height: 100%" allowfullscreen></iframe>
                </div>

            </section>
        </div>

        <?php
    get_footer();
?>