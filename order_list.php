<?php include('./partials/login/server.php'); ?>
<!doctype html>
<html lang="zxx">

<head>
<title>TMC - Orders List</title>
<?php
  include('./partials/head.php')
?>


<?php 
  include('./partials/css.php')
?>
</head>

<body>


<header>

<?php
  include('./partials/header.php')
?>

</header>
<?php 

if ($_SESSION["username"] == 'admin')
  $query = "SELECT * FROM orders";

if ($result = $db->query($query)) {
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

    $order_id = $row["order_id"];
    $total_price = $row["total_price"];
    $order_date = $row["order_date"];  
    $status = $row["status"]; 

    echo '<div style="overflow-x:auto; margin-top:55px;">
            <table class="table table-responsive-md col-md-12 col-sm-12">
            <thead style="color: white; background-color:brown;">
                <tr>
                <th scope="col">Order</td>
                <th scope="col">Date</td>
                <th scope="col">Status</td>               
                <th scope="col">Total price</td> 
                </tr>
            </thead>
            <tbody>';

    echo '<tr> 
            <th>'.$order_id.'</th>
            <td>'.$order_date.'</td> 
            <td>'.$status.'</td>  
            <th>'.$total_price.' $'.'</th> 
        </tr>';

    echo '</tbody></table>';

    $query2 = "SELECT * FROM order_items WHERE order_id = '$order_id'";
    
    
    
    
    echo '<table class="table table-responsive-md table-hover">
            <thead>
            <tr>
                <th scope="col"> </td>
                <th scope="col" colspan="2">Products</td>
                <th scope="col">Quantity</td>
                <th scope="col">Unit price</td> 
            </tr>
            </thead>
            <tbody>';


    $i = 1;
    if ($result2 = $db->query($query2)) {
        while ($row2 = $result2->fetch_assoc()) {
        $prod_id = $row2['product_id'];
        $pname = "SELECT name FROM products WHERE id = '$prod_id'";
        $run_name = mysqli_query($db, $pname);
        $row_name = mysqli_fetch_array($run_name);

            $prod_name = $row_name["name"];
            $quantity = $row2["quantity"];
            $unit_price = $row2["unit_price"];

            echo '<tr> 
                    <td>'.$i.'</td> 
                     <td colspan="2">'.$prod_name.'</td>
                    <td>'.$quantity.'</td> 
                    <td>'.$unit_price.' $</td>
                </tr>';
            $i++;

        }
    $result2->free();
    }
    echo '</div>';

    echo "
      <form action='#' method='post'>
      <div style='padding-right: 5px;'>
      <button name='delete-order' class='btn btn-danger col-md-1' style='margin-top: 5px; margin-bottom: 10px; float:right;'>
      <input type='hidden' name='order_id' value='$order_id'>
      Delete
      </button>
      <button name='accept-order' class='btn btn-primary col-md-1' style='margin-top: 5px; margin-bottom: 10px; float:right; padding'>
      Accept
      </button>
      </div>
      </form>";
}
    

    $result->free();
    } else {
    echo '<div class="alert alert-warning">No orders placed!</div>';
  }        
} 
echo '</tbody></table>';
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