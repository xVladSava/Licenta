<?php include('./partials/login/server.php'); ?>
<!doctype html>
<html lang="zxx">

<head>
<title>TMM - Checkout</title>
<?php
  include('./partials/head.php')
?>

<!-- CSS here -->
<?php 
  include('./partials/css.php')
?>
</head>

<body>

<?php 
  // include('./partials/preload.php')
?>

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
                      <h2>Checkout</h2>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- slider Area End-->

<!--================Checkout Area =================-->
<section class="checkout_area section_padding">
  <div class="container">
    <!-- <div class="returning_customer">
      <div class="check_title">
        <h2>
          Returning Customer?
          <a href="#">Click here to login</a>
        </h2>
      </div> -->
    <div class="billing_details">
      <div class="row">
        <div class="col-lg-8">
          <h3>Shipping Details</h3>
          <form class="row contact_form" action="#" method="post" novalidate="novalidate">
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="first" name="name" />
              <span class="placeholder" data-placeholder="First name"></span>
            </div>
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="last" name="name" />
              <span class="placeholder" data-placeholder="Last name"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="company" name="company" placeholder="Company name" />
            </div>
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="number" name="number" />
              <span class="placeholder" data-placeholder="Phone number"></span>
            </div>
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="email" name="compemailany" />
              <span class="placeholder" data-placeholder="Email Address"></span>
            </div>
            <div class="col-md-12 form-group p_star">
              <select class="country_select">
                <option value="1">Romania</option>
                <option value="2">Germany</option>
                <option value="3">Austria</option>
                <option value="4">Sweden</option>
              </select>
            </div>
            <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="add1" name="add1" />
              <span class="placeholder" data-placeholder="Address line 01"></span>
            </div>
            <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="add2" name="add2" />
              <span class="placeholder" data-placeholder="Address line 02"></span>
            </div>
            <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="city" name="city" />
              <span class="placeholder" data-placeholder="Town/City"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" />
            </div>
          </form>
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
                
                // set page title
                // $page_title="Checkout";
                
                // include page header html
                include 'layout_header.php';
                
                echo "<form method='post' action='#'>";
                
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
              
                      //echo "<div class='product-id' style='display:none;'>{$id}</div>";
                      //echo "<div class='product-name'>{$name}</div>";
              
                      // =================
                      echo "<div class='cart-row'>";
                        echo "<div class='col-md-8'>";
                          
                          echo "<div class='product-name m-b-10px'><h4>{$name}</h4></div>";
                          echo $quantity>1 ? "<div>{$quantity} items</div>" : "<div>{$quantity} item</div>";
          
                        echo "</div>";
            
                        echo "<div class='col-md-4'>";
                          echo "<h4>&#36;" . number_format($price, 2, '.', ',') . "</h4>";
                        echo "</div>";
                      echo "</div>";
                      // =================
              
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
                    

                    // echo "<div class='col-md-8'></div>";
                    echo "<div class='col-md-12 text-align-center'>";
                      echo "<div class='cart-row'>";
                      if($item_count>1){
                        echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
                      }else{
                        echo "<h4 class='m-b-10px'>Total ({$item_count} item)</h4>";
                      }
                        echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>";
                        echo "<button name='place-order' class='btn btn-lg btn-success m-b-10px'>";
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
<!--================End Checkout Area =================-->


  <footer>
    <!-- Footer Start-->
    <?php
      include('./partials/footer.php')
    ?>
    <!-- Footer End-->
</footer>
	<!-- JS here -->
	<?php
    include('./partials/js.php')
  ?>    
</body>

</html>