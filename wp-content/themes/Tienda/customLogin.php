<?php
    /*
        Template Name: customLogin
    */
    
    get_header();
?>



<!--
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Minimal Shop Theme">
<meta name="keywords" content="responsive, retina ready, html5, css3, shop, market, onli store, bootstrap theme" />
<meta name="author" content="KingStudio.ro">
-->
<!-- 
<link rel="icon" href="images/favicon.png">
<!-- page title 
<title>MS - Minimal Shop Theme</title>
<!-- bootstrap css -
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- css 
<link href="css/style.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<!-- fonts 
<link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lily+Script+One" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='fonts/FontAwesome.otf' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/linear-icons.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]

</head>

<body>
-->

<!-- header -->
<header>

    <!-- nav -->
    <nav class="navbar navbar-default nav-sec navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
            </div><!-- / navbar-header -->
            <div class="secondary-nav">
                <a href="login-register.html" class="my-account space-right"><i class="fa fa-user"></i></a>
                <a href="shopping-cart.html" class="shopping-cart"><i class="fa fa-shopping-cart"></i> <span class="cart-badge">2</span></a>
            </div>
            <div class="navbar-collapse collapse text-center">
                <ul class="nav navbar-nav">
                    <li><a href="index.html"><span>HOME</span></a></li>
                    <li><a href="about.html"><span>ABOUT</span></a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>BLOG</span> <span class="dropdown-icon"></span></a>
                    <ul class="dropdown-menu animated zoomIn fast">
                        <li><a href="blog.html"><span>BLOG FULLWIDTH</span></a></li>
                        <li><a href="blog-masonry.html"><span>BLOG MASONRY</span></a></li>
                        <li><a href="blog-sidebar.html"><span>BLOG SIDEBAR</span></a></li>
                        <li><a href="single-post-full.html"><span>POST FULLWIDTH</span></a></li>
                        <li><a href="single-post.html"><span>POST SIDEBAR</span></a></li>
                    </ul>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>SHOP</span> <span class="dropdown-icon"></span></a>
                    <ul class="dropdown-menu animated zoomIn fast">
                        <li><a href="shop.html"><span>FULL WIDTH</span></a></li>
                        <li><a href="shop-right.html"><span>RIGHT SIDEBAR</span></a></li>
                        <li><a href="shop-left.html"><span>LEFT SIDEBAR</span></a></li>
                        <li><a href="shop-masonry.html"><span>MASONRY</span></a></li>
                        <li><a href="single-product.html"><span>SINGLE PRODUCT</span></a></li>
                        <li><a href="single-product2.html"><span>SINGLE PRODUCT 2</span></a></li>
                        <li><a href="single-product3.html"><span>SINGLE PRODUCT 3</span></a></li>
                    </ul>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>PAGES</span> <span class="dropdown-icon"></span></a>
                    <ul class="dropdown-menu animated zoomIn fast">
                        <li><a href="faq.html"><span>FAQ</span></a></li>
                        <li><a href="shopping-cart.html"><span>SHOPPING CART</span></a></li>
                        <li class="active"><a href="login-register.html"><span>LOGIN / REGISTER</span></a></li>
                        <li><a href="my-account.html"><span>MY ACCOUNT</span></a></li>
                        <li><a href="checkout.html"><span>CHECKOUT</span></a></li>
                        <li><a href="404.html"><span>404 PAGE</span></a></li>
                        <li><a href="components.html"><span>COMPONENTS</span></a></li>
                    </ul>
                    </li>
                    <li><a href="contact.html"><span>CONTACT</span></a></li>
                </ul>
            </div><!--/ nav-collapse -->
        </div><!-- / container -->
    </nav>
    <!-- / nav -->

    <!-- header-banner -->
    <div id="header-banner">
        <div class="banner-content single-page text-center">
            <div class="banner-border">
                <div class="banner-info">
                    <h1>Login Or Register</h1>
                </div><!-- / banner-info -->
            </div><!-- / banner-border -->
        </div><!-- / banner-content -->
    </div>
    <!-- / header-banner -->
</header>
<!-- / header -->

<!-- content -->

<!-- login-register -->
<section id="login-register">
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
                            <a href="my-account.html" class="btn btn-md btn-primary-filled btn-log btn-rounded">Log In</a>
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
                            <button type="submit" id="reg-submit" class="btn btn-md btn-primary-filled btn-log btn-rounded">Register</button>
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
<!-- / login-register -->

<!-- / content -->


<!-- footer -->
<?php get_footer(); ?>