<?php include('./partials/login/server.php'); ?>

<!doctype html>
<html lang="zxx">

<head>
    <title>TMM - Products</title>
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
            include('./partials/header.php');
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
                            <h2>product list</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- product list part start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="product_sidebar">
                        <!-- <div class="single_sedebar">
                            <form action="#">
                                <input type="text" name="#" placeholder="Search keyword">
                                <i class="ti-search"></i>
                            </form>
                        </div> -->
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Model Type<i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <p><a href="product_list.php">Automobiles</a></p>
                                    <p><a href="#">Aircrafts</a></p>
                                    <!-- <p><a href="#">Category 3</a></p>
                                    <p><a href="#">Category 4</a></p> -->
                                </div>
                            </div>
                        </div>
                        <!-- <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Type of Model<i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <p><a href="product_list.php">Automobiles</a></p>
                                    <p><a href="#">Aircrafts</a></p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product_list">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="assets/img/categori/r34.png" alt="" class="img-fluid">
                                    <h3> <a href="single-product.php">Nissan Skyline R34 GT-R</a> </h3>
                                    <p>From $155</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="assets/img/categori/r32.png" alt="" class="img-fluid">
                                    <h3> <a href="single-product.php">Nissan Skyline R32 GT-R</a> </h3>
                                    <p>From $155</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="assets/img/categori/r33.png" alt="" class="img-fluid">
                                    <h3> <a href="single-product.php">Nissan Skyline R33 GT-R</a> </h3>
                                    <p>From $140</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="assets/img/categori/k1.png" alt="" class="img-fluid">
                                    <h3> <a href="single-product.php">Nissan Skyline 2000 GT-R</a> </h3>
                                    <p>From $145</p>
                                </div>
                            </div>
                            <!-- <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="assets/img/categori/product1.png" alt="" class="img-fluid">
                                    <h3> <a href="single-product.html">Memory foam filling cotton Slow rebound pillows</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="assets/img/categori/product4.png" alt="" class="img-fluid">
                                    <h3> <a href="single-product.html">Sleeping orthopedic sciatica Back Hip Joint Pain relief</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="assets/img/categori/product5.png" alt="" class="img-fluid">
                                    <h3> <a href="single-product.html">Memory foam filling cotton Slow rebound pillows</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="assets/img/categori/product3.png" alt="" class="img-fluid">
                                    <h3> <a href="single-product.html">Sleeping orthopedic sciatica Back Hip Joint Pain relief</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="assets/img/categori/product2.png" alt="" class="img-fluid">
                                    <h3> <a href="single-product.html">Geometric striped flower home classy decor</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="assets/img/categori/product1.png" alt="" class="img-fluid">
                                    <h3> <a href="single-product.html">Geometric striped flower home classy decor</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div> -->
                        </div>
                        <!-- <div class="load_more_btn text-center">
                            <a href="#" class="btn_3">Load More</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->

    <!-- client review part here -->
    <!-- <section class="client_review">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="client_review_slider owl-carousel">
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="assets/img/client.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="assets/img/client_1.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="assets/img/client_2.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- client review part end -->

    <!-- Shop Method Start-->
    <div class="shop-method-area section-padding30">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-package"></i>
                        <h6>Free Shipping Method</h6>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-unlock"></i>
                        <h6>Secure Payment System</h6>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-reload"></i>
                        <h6>Free Order Returns</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Method End-->

    <!-- subscribe part here -->
    <!-- <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Get promotions & updates!</h2> -->
    <!-- <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p> -->
    <!-- <div class="subscribe_form">
                            <input type="email" placeholder="Enter your mail">
                            <a href="#" class="btn_1">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
    <!-- subscribe part end -->

    <!-- <footer> -->
    <!-- Footer Start-->
    <?php
        include('./partials/footer.php')

        
    ?>
    <!-- Footer End-->
    <!-- </footer> -->

    <!-- JS here -->
    <?php
    include('./partials/js.php')
    ?>

    
        <script>
            $(document).ready(function(){
                //add to cart button listener
                $('.add-to-cart-form').on('submit', function(){

                    //info is in the table / singe product layout
                    var id = $(this).find('.product-id').text();
                    var quantity = $(this).find('.cart-quantity').val();

                    //redirect to add_to_cart.php, with parameter values to process the request
                    window.location.href = "cart.php?id=" + id + "&quantity= " + quantity;
                    return false;
                });
            });        
        </script>
    
</body>

</html>