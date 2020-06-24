<?php include('./partials/login/server.php'); ?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<title>The Miniature Collection</title>
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

<main>

    <div class="content">
        <?php if (isset($_SESSION[ 'success' ])): ?>
            <div class="error success">
                <h3>
                    <?php 
                        echo$_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
    </div>


    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height">
                <div class="container">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                            <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                <img src="assets/img/hero/hero_man.png" alt="">
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInRight" data-delay=".6s">The Miniature <br> Collection</h1>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                    <a href="product_list.php" class="btn btn-lg btn-primary">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

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
