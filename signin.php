<?php
    require 'config.php';
if(isset($_POST['submit'])){

    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM register WHERE mobile = '$uname'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row["id"];
            header("location:index.html");
            //echo "<script>alert('login  done..');</script>";    
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
    <title>Document</title>
    <link rel="stylesheet" href="signincss.css">
</head>
<body>
    <div class="Nevigationbar">        
        <h3>About</h3>
        <h3>Cart</h3>
        <h3><a href = "createaccount.php">Login / Signup</a></h3>
        
        <div class="searchbar">
            <button id="searchbutton">Search</button>
            <input class='searchtext'type="text" placeholder="search.." >
        </div>
        <h1>Amrut Medical Store</h1>
    </div>
    <p>Customer Login</p>
    <div class="signin">
        
        <div class="fom">
        <form action="" method="POST">
            <table>
                <tr class='logintext'>
                    <td><label for='uname'>User Id</label></td>
                    <td><input type="text"  name='uname'  placeholder="mobile no."/></td>
                </tr>
                <tr class='logintext'>
                    <td><label for='password'>Password</label></td>
                    <td><input type="password"  name='password' /></td>
                </tr>

            </table>
            <button type="submit" name='submit' >LogIn</button>
            <h3>OR</h3>
            <button type="submit" name='submit' ><a href="createaccount.php">Create an Account</a></button>
            <br/>
            <br/>
            <br/>
        </form>
    </div>
    </div>
</body>
</html>