<?php include('./partials/login/server.php'); ?>

<!doctype html>
<html lang="zxx">


<head>
  <title>TMM - 1969 Nissan Skyline 2000 GT-R </title>
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

  <!-- slider Area Start-->
  <div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="hero-cap text-center">
              <h2>Product Details</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- slider Area End-->

  <!--================Single Product Area =================-->
  <div class="product_image_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="product_img_slide owl-carousel">
            <div class="single_product_img">
              <img src="assets/img/product/kenmeri1.png" alt="#" class="img-fluid">
            </div>
            <div class="single_product_img">
              <img src="assets/img/product/kenmeri2.png" alt="#" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="single_product_text text-center">
            <h3>1969 Nissan Skyline 2000 GT-R<br></h3>
            <p>
              The first Skyline GT-R was unleashed to the public in February 1969. Based upon a stretched front four-door sedan,
              the “Hakosuka,” it was powered by the race-derived S20 inline six-cylinder and featured dual overhead camshafts,
              a cross-flow head with four valves per cylinder, and a hemispherical combustion chamber fed by triple dual-throat Mikuni-Solex
              sidedraft carburetors. A sportier two-door coupe would then debut the following year. Though the Hakosuka GT-R was built in
              limited numbers in both coupe and sedan form, it was the final iteration that would be the rarest of them all.

              <br />
              <br />
              Model Scale - 1:24
              <br />
              Materials - Metal, Plastic
            </p>
            <div class="card_area">
              <div class="product_count_area">
                <p>Quantity</p>
                <div class="product_count d-inline-block">
                  <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                  <input class="product_count_item input-number" type="text" value="1" min="0" max="10">
                  <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                </div>
                <p>$125</p>
              </div>
              <div class="add_to_cart">
                <a href="#" class="btn_3" name="add">Add To Cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->


  <!-- subscribe part here -->
  <!-- <section class="subscribe_part section_padding">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="subscribe_part_content">
                      <h2>Get promotions & updates!</h2>
                      <div class="subscribe_form">
                          <input type="email" placeholder="Enter your mail">
                          <a href="#" class="btn_1">Subscribe</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section> -->
  <!-- subscribe part end -->

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