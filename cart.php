<?php include('./partials/login/server.php'); ?>
<!doctype html>
<html lang="zxx">

<head>
<?php
  include('./partials/head.php')
?>
<title>TMM - Shopping Cart</title>  

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
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<!-- our custom CSS -->
<link rel="stylesheet" href="assets/css/style.css" />
<link rel="stylesheet" href="libs/css/custom.css" />
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
            <h2>Cart List</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- slider Area End-->

<!--================Cart Area =================-->
<section class="cart_area section_padding">
  <div class="container">
    <div class="cart_inner">
      <!-- <div class="table-responsive"> -->
        <table class="table">
          <tbody>
            <?php
              // start session
              // session_start();
              
              // connect to database
              include 'config/database.php';
              
              // include objects
              include_once "objects/product.php";
              include_once "objects/product_image.php";
              
              // get database connection
              $database = new Database();
              $db = $database->getConnection();
              
              // initialize objects
              $product = new Product($db);
              $product_image = new ProductImage($db);
              
              // set page title
              // $page_title="Cart";
              
              // include page header html
              include 'layout_header.php';

              $action = isset($_GET['action']) ? $_GET['action'] : "";
              
              echo "<div class='col-md-12'>";
                if($action=='removed'){
                  echo "<div class='alert alert-info'>";
                    echo "Product was removed from your cart!";
                  echo "</div>";
                }
              
                else if($action=='quantity_updated'){
                  echo "<div class='alert alert-info'>";
                    echo "Product quantity was updated!";
                  echo "</div>";
                }
              echo "</div>";

              if(count($_SESSION['cart'])>0){
              
                // get the product ids
                $ids = array();
                foreach($_SESSION['cart'] as $id=>$value){
                  array_push($ids, $id);
                }
              
              $stmt=$product->readByIds($ids);
          
              $total=0;
              $item_count=0;
          
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                  extract($row);
          
                  $quantity=$_SESSION['cart'][$id]['quantity'];
                  $sub_total=$price*$quantity;
          
                  // =================
                  echo "<div class='cart-row'>";
                  echo "<div class='col-md-8'>";
        
                  echo "<div class='product-name m-b-10px'><h4>{$name}</h4></div>";

                  // update quantity
                  echo "<form class='update-quantity-form'>";
                    echo "<div class='product-id' style='display:none;'>{$id}</div>";
                      echo "<div class='input-group'>";
                      echo "<span class='input-number-decrement'> <i class='ti-minus'></i></span>";
                        echo "<input type='number' name='quantity' value='{$quantity}' class='input-number' min='1' />";
                        echo "<span class='input-number-increment'> <i class='ti-plus'></i></span>";
                            echo "<span class='input-group-btn'>";
                            echo "<tr>";
                              echo "<button class='btn_3' type='submit'>Update</button>";
                            echo "</span>";
                      echo "</div>";
                  echo "</form>";
                
                // echo "<form class='update-quantity-form'>";
                //   echo "<div class='input-group>";
                //       echo "<div class='product_count'>";
                //       echo "<div class='product-id' style='display:none;'>{$id}</div>";
                //         echo "<span class='input-number-decrement'> <i class='ti-minus'></i></span>";
                //         echo "<input class='input-number' type='number' name='quantity' value='{$quantity}' min='1' max='10'>";
                //         echo "<span class='input-number-increment'> <i class='ti-plus'></i></span>";
                //     echo "<tr>";
                //         echo "<button class='btn btn-default update-quantity' type='submit'>Update</button>";
                //       echo "</div>";
                //       echo "</div>";
                // echo "</form>";

                      // delete from cart
                      echo "<a href='remove_from_cart.php?id={$id}' class='btn_3'>";
                        echo "Delete";
                      echo "</a>";
                  echo "</div>";
                    echo "</tr>";
                  

                  echo "<div class='col-md-4'>";
                    echo "<h4>&#36;" . number_format($price, 2, '.', ',') . "</h4>";
                  echo "</div>";
                  echo "</div>";
                  // =================
                
                  $item_count += $quantity;
                  $total+=$sub_total;
                }
              
                echo "<div class='col-md-8'></div>";
                echo "<div class='col-md-4'>";
                  echo "<div class='cart-row'>";
                    echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
                    echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>";
                    echo "<a href='checkout.php' class='btn_3'>";
                      echo "<span class='glyphicon glyphicon-shopping-cart'></span> Proceed to Checkout";
                    echo "</a>";
                  echo "</div>";
                echo "</div>";
              }

              // no products were added to cart
              else{
                echo "<div class='col-md-12'>";
                  echo "<div class='alert alert-danger'>";
                    echo "No products found in your cart!";
                  echo "</div>";
                echo "</div>";
              }
              
              // contents will be here 
              
              // layout footer 
              include 'layout_header.php';
            ?>
          </tbody>
        </table>
        <!-- <div class="checkout_btn_inner float-right">
          <a class="btn_1" href="./product_list.php">Continue Shopping</a>
          <a class="btn_1 checkout_btn_1" href="checkout.php">Checkout</a>
        </div> -->
      <!-- </div> -->
    </div>
  </section>
  <!--================End Cart Area =================-->
  
<footer>
<?php
  include('./partials/footer.php');
?>
</footer>

<!-- JS here -->
<?php
  include('./partials/js.php');
?>
</body>

</html>
