<?php
    require 'config.php';
if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password_1'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row["id"];
            header("location:welcome.php");
        }
        else{
            echo "<script>alert('wrong password..');</script>";    
        }
    }
    else{
        echo "<script>alert('user not register..');</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginpage</title>
</head>
<body>
<div class="container">
        <div class='header'>
            <h2>Login</h2>
        </div>
        <form action="" method='POST' autocomplete="off">
        <!-- <?php include('errors.php') ?> -->
        User_Name : <input type="text" name="username" placeholder="Enter a username" required/><br>
        
        Password :<input type="password" name="password_1" required><br>
        
        <button type="submit" name="submit">login</button>
        <p>Not a user? <a href="register.php">Register</a></p>    
    </form>
    </div>
    </body>
</html>