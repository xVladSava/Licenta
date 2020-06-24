<?php include('./partials/login/server.php'); ?>


<!doctype html>
<html lang="zxx">


<head>
<title>TMC - Car Model</title>

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




<?php
  // start session
  // session_start();

  // include classes
  include_once "config/database.php";
  include_once "objects/product.php";
  include_once "objects/product_image.php";

  // get database connection
  $database = new Database();
  $db = $database->getConnection();

  // initialize objects
  $product = new Product($db);
  $product_image = new ProductImage($db);

  // get ID of the product to be edited
  $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

  // set the id as product id property
  $product->id = $id;

  // to read single record product
  $product->readOne();

  // set page title
  $page_title = $product->name;

  // set product id
  $product_image->product_id=$id;

  // read all related product image
  $stmt_product_image = $product_image->readByProductId();

  // count all relatd product image
  $num_product_image = $stmt_product_image->rowCount();
    
    echo "<div class='product_image_area'>";
      echo "<div class='container'>";
        echo "<div class='row justify-content-center'>";
          echo "<div class=col-lg-12>";
            echo "<div class='product_img_slide owl-carousel'>";

            
                // read all related product image
                $stmt_product_image = $product_image->readByProductId();
                $num_product_image = $stmt_product_image->rowCount();

                // if count is more than zero
                if($num_product_image>0){
                  // loop through all product images
                  $x=0;
                  while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
                    // image name and source url
                    $product_image_name = $row['name'];
                    $source="uploads/images/{$product_image_name}";
                    $show_product_img=$x==0 ? "display-block" : "display-none";
                    echo "<a href='{$source}' target='_blank' id='product-img-{$row['id']}' class='img-fluid {$show_product_img}'>";
                        echo "<img src='{$source}' style='width:100%;' />";
                    echo "</a>";
                    $x++;
                  }
                }else{ echo "No images."; }
              

                echo "</div>";
          echo "</div>";

  
          // include page header HTML
          include_once 'layout_header.php';
        
          echo "<div class='col-xl-12 text-center'>";
            echo "<div single_product_text>";

              echo "<br> <p>";

                $page_description = htmlspecialchars_decode(htmlspecialchars_decode($product->description));

                // show to user
                echo $page_description;
              echo "</p>";
 
                // if product was already added in the cart
                echo "<div class='card-area'>";
                if(!isset($_SESSION['username'])) {
                echo "<p> <strong> In order to add products to your cart, you must be logged in! </strong> </p>";
                
                }

                if(isset($_SESSION['username'])) {
                    if(array_key_exists($id, $_SESSION['cart'])){
                        echo "<div class='m-b-10px text-center'> <br> <h4> This product is already in your cart. </h4><br>";
                        echo "<a href='cart.php' class='btn_3' style='width: fit-content;'>";
                            echo "Update Cart";
                        echo "</a> </div>";

                    }


                    else{

                    echo "<form class='add-to-cart-form'>";

                    echo "<div class='product-id' style='display: none;'>$id</div>";  
                                    
                                  echo "<div class='card_area'>";
                                    echo "<div class='product_count_area'> <p> Quantity: </p>";
                                      echo "<div class='product_count d-inline-block'>";
                                        echo "<span class='product_count_item inumber-decrement'> <i class='ti-minus'> </i> </span>";
                                        echo "<input class='product_count_item input-number form-control cart-quantity' type='text' value='1' min='1' max='100'>";
                                        echo "<span class='product_count_item number-increment'> <i class='ti-plus'> </i> </span>";
                                      echo "</div>";
                                      echo "<p>&#36";
                                      echo "<h4>" . number_format($product->price, 2, '.', ',') . "</h4>";
                                      echo "</p>";
                                    echo "</div>";
                                  echo "</div>";


                                    // enable add to cart button
                                  echo "<div class='add_to_cart text-center'> <br>";
                                    echo "<button type='submit' class='btn_3' style='width: fit-content;'>";
                                      echo "Add to cart";
                                    echo "</button>";
                                  echo "</div>";
                                echo "</div>";
                              echo "</div>";
                            echo "</div>";
                          echo "</div>";
                        echo "</div>";
                      echo "</div>";
                
                    echo "</form>";
                  } 
}
 
echo "</div>";

// include page footer HTML
include_once 'layout_footer.php';
?>


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