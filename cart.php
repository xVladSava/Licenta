<?php include('./partials/login/server.php'); ?>
<!doctype html>
<html lang="zxx">

<head>
<?php
include('./partials/head.php')
?>
<title>TMC - Shopping Cart</title>  

<?php 
include('./partials/css.php')
?> 
<link rel="stylesheet" href="libs/css/custom.css" />
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

<div class="slider-area" style="margin-bottom: 3rem;">
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

echo "<style='margin-top:150px'>";

// include page header html
include 'layout_header.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";

echo "<div class='col-md-12' style='margin-top: 50px'>";
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
    
    echo "<div class='cart-row' style='display: flex; width: 100%'>";


    echo "<div class='m-b-10px cart-list-element col-md-4' style='text-align: center'><h4 style='
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
      echo "<form class='update-quantity-form col-md-6'>";
        echo "<div class='product-id' style='display:none;'>{$id}</div>";
        echo "<div class='input-group'>";
            echo "<input type='number' name='quantity' value='{$quantity}' class='form-control cart-quantity cart-list-element' min='1' style='margin-top: 1rem;
            margin: auto 0.5rem;/>"; 
                echo "<span class='cart-list-element'>";
                    echo "<button class='btn_3 update-quantity' style='margin:2px' type='submit'>Update</button>";
                echo "</span>";
                // delete from cart
                echo "<a href='remove_from_cart.php?id={$id}' class='btn_3' style='margin:2px'>";
                  echo "Delete";
                echo "</a>";                  
        echo "</div>";
      echo "</form>";
    echo "</div>";

    $item_count += $quantity;
    $total+=$sub_total;
  }

  // echo "<div class='col-md-8'></div>";
  echo "<div class='col-md-12'>";
    echo "<div class='cart-row'>";
      echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
      echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4> <br>";       
      echo "<a href='checkout.php' class='btn_3' style='display: flex; width: fit-content;'>";
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

// layout footer 
include 'layout_footer.php';
?>


<footer>
<?php
include('./partials/footer.php');
?>
</footer>

<?php
include('./partials/js.php');
?>
</body>

</html>
