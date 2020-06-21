<?php
    session_start();

    $username = "";
    $email = "";
    $errors = array();


    //database connection
    $db = mysqli_connect('localhost', 'root', '', 'licenta');

    //if register is clicked
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

        //ensure username is unique
        $sql_username = "SELECT * FROM users WHERE username = '$username'";
        $sql_email = "SELECT * FROM users WHERE email = '$email'";
        $res_username = mysqli_query($db, $sql_username);
        $res_email = mysqli_query($db,$sql_email);
    
        if(mysqli_num_rows($res_username) > 0) {
            array_push($errors, "Username already taken.");
        }
        if (mysqli_num_rows($res_email) > 0) {
            array_push($errors, "Email already exists.");
        }

        //ensure form field are filled properly
        if (empty($username)) {
            array_push($errors, "Username is required"); //add error to errors array   
        }
        if (empty($email)) {
            array_push($errors, "Email is required"); //add error to errors array   
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required"); //add error to errors array   
        }

        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

        //if no errors, save user to db
        if(count($errors) == 0) {
            $password = md5($password_1); //encrypt pass before storing in db
            $sql = "INSERT INTO users (username, email, password)
                        VALUES ('$username', '$email', '$password')";
            mysqli_query($db, $sql);
           
        }

        
    }

    //log user in from login page
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];


        //ensure form field are filled properly
        if (empty($username)) {
            array_push($errors, "Username is required"); //add error to errors array   
        }
        if (empty($password)) {
            array_push($errors, "Password is required"); //add error to errors array   
        }

        if (count($errors) == 0) {
            $password = md5($password); //encrypt pass before compafing with db pass
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) == 1) {
                //log user in
                $_SESSION['username'] = $username;
                $row_user = mysqli_fetch_array($result);
                $_SESSION['id'] = $row_user['id'];    
                // $_SESSION['success'] = "You are now logged in!";
                header('location: ../AutoStore/index.php');
            } else {
                array_push($errors, "The username / password combination is invalid!");
                
            }
        }
    }



    //Log out
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: ../AutoStore/login.php');
    }
    
    //insert products into orders DB
    if (isset($_POST['place-order'])) { 
            
        $user_id = $_SESSION['id'];
        $total_price = $_POST['total-price'];
        $order_date = date("Y/m/d");
        $status = 'Pending';
    
        $sql = "INSERT INTO orders (user_id, total_price, order_date, status) 
                VALUES ('$user_id', '$total_price', '$order_date', '$status')";

        mysqli_query($db, $sql);

        $prod = $_POST['prod'];
        
        $order_id = 'SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1';
        $run_order = mysqli_query($db, $order_id);

        $row_order = mysqli_fetch_array($run_order);
        $order = $row_order['order_id'];
        
        foreach( $prod as $order_item ) {

            $id = $order_item['id'];
            $qty = $order_item['qty'];
            $price = $order_item['price'];

            $sql = "INSERT INTO order_items (order_id, product_id, quantity, unit_price) 
                VALUES ('$order', '$id', '$qty', '$price')";

            mysqli_query($db, $sql);
        }

        header('location: ../AutoStore/place_order.php');

    }

  
        
?>