<?php
    require 'config.php';
    if(!empty($_SESSION["id"])){
        header("location: welcome.php");
    }
    if(isset($_POST["submit"])){
        $username = $_POST['username'];
        $email = $_POST['emailid'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];
        $duplicate = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username' OR email = '$email'");
        if(mysqli_num_rows($duplicate) > 0){
            echo "<script>alert('username or emailid already exist..');</script>";
        }
        else{
            if($password_1 == $password_2){
                $query = "INSERT INTO users VALUES('','$username','$password_1','$email')";
                mysqli_query($conn,$query);
                echo "<script>alert('Registration successfull.. ');</script>";
            }
            else{
                echo "<script>alert('password not match with confirm password');</script>";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class='header'>
            <h2>Registration</h2>
        </div>
        <form action="" method='POST' autocomplete="off">
        <!-- <?php include('errors.php') ?> -->
        User_Name : <input type="text" name="username" placeholder="Enter a username" required/><br>
        Email_Id : <input type="email" name="emailid" placeholder="Enter a Email" required/><br>
        Password :<input type="password" name="password_1" required><br>
        Confirm Password :<input type="password" name="password_2" required><br>
        <button type="submit" name="submit">Register</button>
        <p>Already a user? <a href="login.php">Login</a></p>    
    </form>
    </div>
    </body>
</html>