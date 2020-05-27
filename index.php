<?php include('./partials/login/server.php'); ?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<title>The Miniature Collection</title>
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
<!-- Preloader Start -->

<header>
<!-- Header Start -->
<?php
    include('./partials/header.php')
?>
<!-- Header End -->
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

    <!-- slider Area Start -->
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
                                <!-- <span data-animation="fadeInRight" data-delay=".4s">60% Discount</span> -->
                                <h1 data-animation="fadeInRight" data-delay=".6s">The Miniature <br> Collection</h1>
                                <!-- <p data-animation="fadeInRight" data-delay=".8s">Best Miniature Models for 2020!</p> -->
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                    <a href="product_list.php" class="btn hero-btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- Our Products Start -->
    <section class="latest-product-area padding-bottom">
        <div class="container">
            <div class="row product-btn d-flex justify-content-end align-items-end">
                <!-- Section Tittle -->
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="section-tittle mb-30">
                        <h2>Some of Our Products</h2>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-7">
                    <div class="properties__button f-right">
                    </div>
                </div>
            </div>
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-product mb-60">
                                <div class="product-img">
                                    <img src="assets/img/categori/r32.png" alt="">
                                    <div class="new-product">
                                        <span>New</span>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <h4><a href="single-product.php">Nissan Skyline R32 GT-R</a></h4>
                                    <div class="price">
                                        <ul>
                                            <li>$125.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-product mb-60">
                                <div class="product-img">
                                    <img src="assets/img/categori/k1.png" alt="">
                                </div>
                                <div class="product-caption">
                                    <h4><a href="#">Nissan Skyline 2000 GT-R</a></h4>
                                    <div class="price">
                                        <ul>
                                            <li>$140.00</li>
                                            <li class="discount">$150.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-product mb-60">
                                <div class="product-img">
                                    <img src="assets/img/categori/r34.png" alt="">
                                    <div class="new-product">
                                        <span>New</span>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <h4><a href="#">Nissan Skyline R34 GT-R</a></h4>
                                    <div class="price">
                                        <ul>
                                            <li>$145.00</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
</main>

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
