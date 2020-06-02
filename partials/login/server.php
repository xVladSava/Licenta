<?php
    session_start();

    $username = "";
    $email = "";
    $errors = array();


    //database connection
    $db = mysqli_connect('localhost', 'root', '', 'login');

    //if register is clicked
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

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

    


?>