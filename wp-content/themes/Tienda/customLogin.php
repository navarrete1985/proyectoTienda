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
		<section id="header-login" class="module-header module-header default-height parallax bg-dark bg-dark-30 bg-film">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="h3 font-alt">Login y registro</h1>
					</div>
				</div>
			</div>
		</section>
<!-- End header -->	
		
		<section class="module">
			<div class="container">		
<!-- login form -->
                <div class="row bloqueflex">
                    <div class="col-sm-6">
                        <div id="login-form">
                            <h3 class="log-title">LOGIN</h3>
                            <div class="form-group">
<?php
                                $args = array (
                                	'remember' => true,
                                	'redirect' => 'https://proyecto-tienda-navarrete.c9users.io/index.php',
                                	'form_id' => 'loginform',
                                	'id_username' => 'user_login',
                                	'id_password' => 'user_pass',
                                	'id_remember' => 'rememberme',
                                	'id_submit' => 'wp-submit',
                                	'label_username' => '',
                                	'label_password' => '',
                                	'label_remember' => __ ('Recordarme'),
                                	'label_log_in' => __ ('Acceder'),
                                	'value_remember' => true
                                );
                                wp_login_form($args);
?>
                            </div>
                        </div>
                    </div><!-- / col-sm-6 -->
                </div>    
<!-- / login form -->

<!-- register form -->
                <div class="row bloqueflex">
                    <div class="col-sm-6">
                        <div id="register-form">
                            <h3 class="log-title">¿QUIERES REGISTRARTE?</h3>
                            <div class="form-group">
                               <?php wp_register(); ?> 
                            </div>
                        </div>
                    </div><!-- / col-sm-6 -->
<!-- / register form -->
                </div><!-- / row -->
            </div>
        </section>
    </div>

<!-- / content -->


<!-- footer -->
<?php get_footer(); ?>