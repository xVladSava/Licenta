<?php
$_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
?>

 
    <!-- container -->
    <div class="container col-xl-12">
        <div class="row">
 
        <div class="col-md-12" style="margin-top: 15px">
            <div class="page-header">
                <h1><?php echo isset($page_title) ? $page_title : ""; ?></h1>
            </div>
        </div>