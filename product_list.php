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
<!-- Custom Shop CSS -->
<link rel="stylesheet" href="libs/css/custom.css" />
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
    include('./partials/header.php');
?>


<!-- Header End -->
</header>
    
<!-- slider Area Start-->
<div class="slider-area">
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
            <div class="col-xl-12">
                <div class="product_sidebar">
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Model Type<i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown">
                                <p><a href="product_list.php">Automobiles</a></p>
                                <p><a href="#">Aircrafts</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-6"> -->
                <!-- <div class="product_list"> -->
                    <!-- <div class="row"> -->
                        <!-- <div class="col-xl-12 col-sm-6"> -->
                            <!-- <div class="single_product_item"> -->
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

                                    // to prevent undefined index notice
                                    $action = isset($_GET['action']) ? $_GET['action'] : "";
                                    
                                    // for pagination purposes
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
                                    $records_per_page = 6; // set records or rows of data per page
                                    $from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query LIMIT clause

                                    
                                    // set page title
                                    // $page_title="Products";
                                    
                                    // page header html
                                    include 'layout_header.php';
                                    

                                    echo "<div class='col-md-12'>";
                                        if($action=='added'){
                                            echo "<div class='alert alert-info'>";
                                                echo "Product was added to your cart!";
                                            echo "</div>";
                                        }
                                    
                                        if($action=='exists'){
                                            echo "<div class='alert alert-info'>";
                                                echo "Product already exists in your cart!";
                                            echo "</div>";
                                        }
                                    echo "</div>";

                                    // read all products in the database
                                    $stmt=$product->read($from_record_num, $records_per_page);
                                    
                                    // count number of retrieved products
                                    $num = $stmt->rowCount();
                                    
                                    
                                                        if($num>0){
                                                            // needed for paging
                                                            $page_url="product_list.php?";
                                                            $total_rows=$product->count();
                                                        
                                                        
                                                            // show products
                                                        echo "<div class='row'>";
                                                            
                                                                include_once "read_products_template.php";
                                                            
                                                        echo "</div>";
                                                        }
                                                        
                                                        // tell the user if there's no products in the database
                                                        else{
                                                            echo "<div class='col-md-12'>";
                                                                echo "<div class='alert alert-danger'>No products found.</div>";
                                                            echo "</div>";
                                                        }
                                    
                                    // contents will be here 
                                    
                                    // layout footer code
                                    include 'layout_footer.php';
                                ?>
                            <!-- </div> -->
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
</section>
    

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