<?php
    require 'config.php';
    if(!empty($_SESSION["id"])){
        //header("location: createaccount.php");
    }
    if(isset($_POST["submit"])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['emailid'];
        $mobile = $_POST['mobileno'];
        $pwd = $_POST['pwd'];
        $cpwd = $_POST['cpwd'];
        $duplicate = mysqli_query($conn,"SELECT * FROM register WHERE fname = '$fname' OR email = '$email'");
        if(mysqli_num_rows($duplicate) > 0){
            echo "<script>alert('username or emailid already exist..');</script>";
        }
        else{
            if($pwd == $cpwd){
                $query = "INSERT INTO register VALUES('','$fname','$lname','$email','$mobile','$pwd')";
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
    <link rel="stylesheet" href="signincss.css">
</head>
<body>
    <div class="Nevigationbar">
        
        <h3>About</h3>
        <h3>Cart</h3>
        <h3><a href="signin.php">Login / Signup</a></h3>
        
        <div class="searchbar">
            <button id="searchbutton">Search</button>
            <input class='searchtext'type="text" placeholder="search.." >
        </div>
        <h1>Amrut Medical Store</h1>
    </div>
    <p>Create  New  Account</p>
    <div class="signin">
        
        <div class="fom">
        <form action="" method="POST">
            <table>
                <tr class='logintext'>
                    <td><label for='firstname'>First Name</label></td>
                    <td><input type="text"  name='firstname' ></td>
                </tr>
                <tr class='logintext'>
                    <td><label for='lastname'>Last Name</label></td>
                    <td><input type="text"  name='lastname' /></td>
                </tr>
                <tr class='logintext'>
                    <td><label for='emailid'>Email Id</label></td>
                    <td><input type="email"  name='emailid' /></td>
                </tr>
                <tr class='logintext'>
                    <td><label for='mobileno'>Mobile No.</label></td>
                    <td><input type="text"  name='mobileno' /></td>
                </tr>
                <tr class='logintext'>
                    <td><label for='pwd'>Password</label></td>
                    <td><input type="password"  name='pwd' /></td>
                </tr>
                <tr class='logintext'>
                    <td><label for='cpwd'>Confirm Password</label></td>
                    <td><input type="password"  name='cpwd' /></td>
                </tr>
            </table>
            <button type="submit" name='submit' >Register</button>
            
            <br/>
            <br/>
            <br/>
        </form>
    </div>
    </div>
</body>
</html>