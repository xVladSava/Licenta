<?php include('./partials/login/server.php'); ?>
<!doctype html>
<html lang="zxx">

<head>
<title>TMC - Checkout</title>
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
                      <h2>Checkout</h2>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<section class="checkout_area section_padding">
  <div class="container">
    <div class="billing_details">
      <div class="row">
        <div class="col-lg-8">
          <h3>Shipping Details</h3>
         <form class='row contact_form' method='post' action='#'>
            <div class="col-md-6 form-group">
              <input type="text" class="form-control" id="first" name="fname" placeholder="First name" required/>
            </div>
            <div class="col-md-6 form-group">
              <input type="text" class="form-control" id="last" name="lname" placeholder="Last name" required/>
            </div>
            <div class="col-md-6 form-group">
              <input type="text" class="form-control" id="number" name="pnumber" placeholder="Phone number" required/>
            </div>
            <div class="col-md-12 form-group">
              <select class="country_select" name="country" required>
                <option value="Romania">Romania</option>
                <option value="Germany">Germany</option>
                <option value="Austria">Austria</option>
                <option value="Sweden">Sweden</option>
              </select>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="add1" name="address" placeholder="Address line" required/>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="city" name="city" placeholder="Town/City" required/>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" required/>
            </div>
        </div>
        <div class="col-lg-4">
          <div class="order_box">
            <h2>Your Order</h2>
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
                                
                // include page header html
                include 'layout_header.php';
                
                // echo "";
                
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
              
                      echo "<div class='cart-row'>";
                        echo "<div class='col-md-8'>";
                          
                          echo "<div class='product-name m-b-10px'><h4>{$name}</h4></div>";
                          echo $quantity>1 ? "<div>{$quantity} items</div>" : "<div>{$quantity} item</div>";
          
                        echo "</div>";
            
                        echo "<div class='col-md-4'>";
                          echo "<h4>&#36;" . number_format($price, 2, '.', ',') . "</h4>";
                        echo "</div>";
                      echo "</div>";
              
                      $item_count += $quantity;
                      $total+=$sub_total;

                      

                      $prods[] = array($id, $quantity, $price); 
                                            
                      }
                      
                      $idx = 0;

                        foreach ($prods as $item) {
                          echo "
                            <input type='hidden' name='prod[$idx][id]' value='$item[0]' />
                            <input type='hidden' name='prod[$idx][qty]' value='$item[1]' />
                            <input type='hidden' name='prod[$idx][price]' value='$item[2]' />";

                            $idx++;
                        }
                    
                      echo "<input type='hidden' name='total-price' value='$total'>";

                    echo "<div class='col-md-12 text-align-center'>";
                      echo "<div class='cart-row'>";
                      if($item_count>1){
                        echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
                      }else{
                        echo "<h4 class='m-b-10px'>Total ({$item_count} item)</h4>";
                      }
                        echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>";
                        echo "<button name='place-order' class='btn btn-lg btn-outline-success m-b-10px'>";
                          echo "<span class='glyphicon glyphicon-shopping-cart'></span> Place Order";
                        echo "</button>";
                      echo "</div>";
                    echo "</div>";
                
                  }
                  
                  else{
                    echo "<div class='col-md-12'>";
                      echo "<div class='alert alert-danger'>";
                        echo "No products found in your cart!";
                      echo "</div>";
                    echo "</div>";
                  }
                
                echo "</form>";
                include 'layout_footer.php';
              ?>
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