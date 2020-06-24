<?php include('./partials/login/server.php'); ?>
<!doctype html>
<html lang="zxx">

<head>
<title>TMC - Register</title>
<?php
    include('./partials/head.php')
?>


<?php 
    include('./partials/css.php')
?>  
</head>

<body>

<?php 
    include('./partials/preload.php')
?>


<header>

<?php
        include('./partials/header.php')
    ?>

</header>


<div class="slider-area" style="margin-bottom: 5rem;">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Register</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="login_part section_padding ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>Already have an account?</h2>
                        <p>Click the button below to log in!</p><br>
                        <a href="login.php" class="btn_3">Login</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Welcome! <br>
                            Please use the form below to register now!</h3>
                        <form class="row contact_form" action="register.php" method="post" novalidate="novalidate">
                        

                        <?php include('./partials/login/errors.php'); ?>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" name="username" value="<?php echo $username; ?>"
                                    placeholder="Username">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>"
                                    placeholder="Your E-mail">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password_1" value=""
                                    placeholder="Password">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password_2" value=""
                                    placeholder="Confirm Password">
                            </div>
                            <div class="col-md-12 form-group">
                                <!-- <div class="creat_account d-flex align-items-center">
                                    <input type="checkbox" id="f-option" name="selector">
                                    <label for="f-option">Remember me</label>
                                </div> -->
                                <button type="submit" value="submit" name="register" class="btn_3">
                                    Register
                                </button>
                                <!-- <a class="lost_pass" href="#">forget password?</a> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<footer>
<?php
    include('./partials/footer.php')
?>
</footer>


<?php
    include('./partials/js.php')
?>
</body>

</html>
