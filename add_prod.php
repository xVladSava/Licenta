<?php include('./partials/login/server.php'); ?>
<!doctype html>
<html lang="zxx">

<head>
<title>TMC - Administrator</title>
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
  include('./partials/preload.php')
?>

<header>
<!-- Header Start -->
<?php
  include('./partials/header.php')
?>
<!-- Header End -->
</header>

<?php
    // start session
    // session_start();

    // connect to database
    include 'config/database.php';

    // include objects
    include_once "objects/product.php";
    include_once "objects/product_image.php";
?>

<!-- slider Area Start-->
<div class="slider-area ">
  <!-- Mobile Menu -->
  <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="hero-cap text-center">
                      <h3>Administrator - Product Addition</h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- slider Area End-->

<div class="grid_10">
    <div class="box round first">
        <div class="block" style="margin-top: 40px;" align="center">
            <form name="form1" action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td style="margin-top: 5px;">Product Name: </td>
                        <td><input type="text" style="margin-top: 5px;" name="pname"></td>
                    </tr>
                    <tr>
                        <td style="margin-top: 5px;">Product Price: </td>
                        <td><input type="text" style="margin-top: 5px;" name="pprice"></td>
                    </tr>
                    <tr>
                        <td style="margin-top: 5px;">Product Description: </td>
                        <td><input type="text" style="margin-top: 5px;" name="pdescription"></td>
                    </tr>
                    <tr>
                        <td style="margin-top: 5px;">Product Image 1: </td>
                        <td><input type="file" style="margin-top: 5px;" name="pimage1"></td>
                    </tr>
                    <tr>
                        <td style="margin-top: 5px;">Product Image 2: </td>
                        <td><input type="file" style="margin-top: 5px;" name="pimage2"></td>
                    </tr>
                    <tr>
                        <td style="margin-top: 5px;">Product Image 3: </td>
                        <td><input type="file" style="margin-top: 5px;" name="pimage3"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input class="btn btn-primary" type="submit" style="margin-top: 50px;" name="submit1" value="Upload"></td>
                    </tr>
                </table>
            </form>
            <?php
            if(isset($_POST['submit1']))
            {
                $v1=rand(1111,9999);
                $v2=rand(1111,9999);

                $v3=$v1.$v2;

                $v3=md5($v3);

                $fnm1=$_FILES['pimage1'] ['name'];
                $fnm2=$_FILES['pimage2'] ['name'];
                $fnm3=$_FILES['pimage3'] ['name'];

                $dst1="./uploads/images/".$v3.$fnm1;
                $dst2="./uploads/images/".$v3.$fnm2;
                $dst3="./uploads/images/".$v3.$fnm3;

                $piname1=$v3.$fnm1;
                $piname2=$v3.$fnm2;
                $piname3=$v3.$fnm3;

                move_uploaded_file($_FILES['pimage1'] ['tmp_name'], $dst1);
                move_uploaded_file($_FILES['pimage2'] ['tmp_name'], $dst2);
                move_uploaded_file($_FILES['pimage3'] ['tmp_name'], $dst3);

                $sql="INSERT INTO products (name, description, price)
                VALUES ('$_POST[pname]', '$_POST[pdescription]', '$_POST[pprice]')";

                mysqli_query($db, $sql);
                
                $last_prod = 'SELECT * FROM products ORDER BY id DESC LIMIT 1';
                $run_prod = mysqli_query($db, $last_prod);
                $row_prod = mysqli_fetch_array($run_prod);
                $prod_id = $row_prod['id'];

                $sqlimage1="INSERT INTO product_images (product_id, name)
                VALUES ('$prod_id', '$piname1')";
                $sqlimage2="INSERT INTO product_images (product_id, name)
                VALUES ('$prod_id', '$piname2')";
                $sqlimage3="INSERT INTO product_images (product_id, name)
                VALUES ('$prod_id', '$piname3')";

                
                mysqli_query($db, $sqlimage1);
                mysqli_query($db, $sqlimage2);
                mysqli_query($db, $sqlimage3);
            }
            ?>
        </div>
    </div>
</div>

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