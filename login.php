<?php include('./partials/login/server.php'); ?>
<!doctype html>
<html lang="zxx">

<head>
<title>TMM - Login</title>
<?php
    include('./partials/head.php')
?>
<!-- CSS here -->
<?php 
    include('./partials/css.php')
?>  
</head>

<body>
<!-- Preloader Start -->
<?php 
    include('./partials/preload.php')
?>
<!-- Preloader End -->

<header>
<!-- Header Start -->
<?php
    include('./partials/header.php')
?>
<!-- Header End -->
</header>

<!-- slider Area Start-->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Login</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!--================login_part Area =================-->
<section class="login_part section_padding ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>New to our Shop?</h2>
                        <p>You can register here, just click the button below!</p><br>
                        <a href="register.php" class="btn_3">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Welcome Back ! <br>
                            Sign in Below</h3>
                        
                        <form class="row contact_form" action="login.php" method="post" novalidate="novalidate">
                        
                            <!-- display validation errors -->
                            <?php include('./partials/login/errors.php'); ?>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="username" name="username" value=""
                                    placeholder="Username">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password_1" name="password" value=""
                                    placeholder="Password">
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="login" name="login" class="btn_3">
                                    log in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->

<footer>
<?php
    include('./partials/footer.php')
?>
</footer>

<!-- JS here -->
<?php
    include('./partials/js.php')
?>
</body>

</html>
