<?php
    /*
        Template Name: customLogin
    */
    
    get_header();
?>

<!-- Header-->
	<header class="header cab-search">
		<div class="container">
			<div class="inner-header">
				<a class="inner-brand " href="#">
					<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/main-logo.png'; ?>" style="max-height: 60px;" />
					<img class="brand-light" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/additional-logo.png'; ?>" style="max-height: 60px;" />					
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
		<section id="header-login" class="module-header  imgResponsive module-header default-height parallax bg-dark bg-dark-30 bg-film">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="h4 font-alt">Login</h1>
					</div>
				</div>
			</div>
		</section>
<!-- End header -->	
		
		<section class="module">
			<div class="container">		
                <div class="row">
            <!-- login form 1 -->
            <div class="col-sm-6">
                <div id="login-form">
                    <h3 class="log-title">LOGIN</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" placeholder="USERNAME" required data-error="*Please fill out this field">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="password" placeholder="PASSWORD" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <!-- log-line -->
                    <div class="log-line">
                        <div class="pull-left">
                            <div class="checkbox checkbox-primary space-bottom">
                                <label class="hide"><input type="checkbox"></label>
                                <input id="checkbox1" type="checkbox">
                                <label for="checkbox1"><span><strong>Remember Me</strong></span></label>
                            </div>
                        </div>
                        <div class="pull-right">
                            <a href="my-account.html" class="btn btn-md btn-round btn-fill btn-brand">Log In</a>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div><!-- / log-line -->
                    <a href="#x" class="forgot-password">Forgot your Password?</a>
                </div>
            </div><!-- / col-sm-6 -->
            <!-- / login form 1 -->

            <!-- register form 1 -->
            <div class="col-sm-6">
                <div id="register-form">
                    <h3 class="log-title">REGISTER</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="register-email" placeholder="EMAIL" required data-error="*Please fill out this field">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="register-username" placeholder="USERNAME" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="register-password" placeholder="PASSWORD" required data-error="*Please fill out this field">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="register-cpassword" placeholder="CONFIRM PASSWORD" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <!-- log-line -->
                    <div class="log-line reg-form-1 no-margin">
                        <div class="pull-left">
                            <div class="checkbox checkbox-primary space-bottom">
                                <label class="hide"><input type="checkbox"></label>
                                <input id="checkbox2" type="checkbox">
                                <label for="checkbox2"><span><a href="#x">Terms & Conditions</a></span></label>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" id="reg-submit" class="btn btn-md btn-round btn-fill btn-brand">Register</button>
                            <div id="register-msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div><!-- / log-line -->
                </div>
            </div><!-- / col-sm-6 -->
            <!-- / register form 1 -->
        </div><!-- / row -->
        <!-- / form 1 -->
            </div><!-- / container -->
        </section>
    </div>

<!-- / content -->


<!-- footer -->
<?php get_footer(); ?>