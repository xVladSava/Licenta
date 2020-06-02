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
  $page_title="Cart";
  
  
  // include page header html
  include 'layout_header.php';
  
// echo "<section class='cart_area section_padding'>";
// echo "<div class='container'>";
// echo "<div class='cart_inner'>";
// echo "<div class='table-responsive'>";
// echo "<table class='table'>";
// echo "<thead>";
// echo "<tr>";
// echo "<th scope='col'>Product</th>";
// echo "<th scope='col'>Price</th>";
// echo "<th scope='col'>Quantity</th>";
// echo "<th scope='col'>Total</th>";
// echo "</tr>";
// echo "</thead>";
// echo "<tbody>";
// echo "<tr>";
// echo "<td>";
// echo "<div class='media'>";
// echo "<div class='d-flex'>";

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
      
      echo "<div class='cart-row' style='display: flex; width: 100%'>";
  

      echo "<div class='m-b-10px cart-list-element' style='text-align: center'><h4 style='
      position: relative;
      top: 50%;
      transform: translateY(-50%);
      -webkit-transform: translateY(-50%);'>{$name}</h4></div>";
      
      echo "<div class='cart-list-element'>";
        echo "<h5 style='position: relative;
        top: 50%;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);'>&#36;" . number_format($price, 2, '.', ',') . "</h5>";
      echo "</div>";

        // update quantity
        echo "<form class='update-quantity-form'>";
          echo "<div class='product-id' style='display:none;'>{$id}</div>";
          echo "<div class='input-group'>";
              echo "<input type='number' name='quantity' value='{$quantity}' class='form-control cart-quantity cart-list-element' min='1' style='margin-top: 1rem'/>"; 
                  echo "<span class='input-group-btn cart-list-element'>";
                      echo "<button class='btn_3 btn-default update-quantity' type='submit'>Update</button>";
                  echo "</span>";
                  // delete from cart
                  echo "<a href='remove_from_cart.php?id={$id}' class='btn_3 cart-list-element'>";
                    echo "Delete";
                  echo "</a>";
          echo "</div>";
        echo "</form>";
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

// echo "</div>";
// echo "</div>";
// echo "</td>";
// echo "</tr>";
// echo "</tbody>";
// echo "</table>";
// echo "<div class='checkout_btn_inner float-right'>";
// echo "<a class='btn_1' href='#'>Continue Shopping</a>";
// echo "<a class='btn_1 checkout_btn_1' href='#'>Proceed to checkout</a>";
// echo "</div>";
// echo "</div>";
// echo "</div>";
// echo "</section>";

  // layout footer 
  include 'layout_footer.php';
?>

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
