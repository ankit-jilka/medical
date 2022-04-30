<?php
    require 'config.php';
    if(!empty($_SESSION["id"])){
        $id = $_SESSION["id"];
        $result = mysqli_query($conn,"SELECT * FROM users WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

    }
    else{
        header('location: signin.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
</head>
<body>
    <h1>Welcome <?php echo $row['username']; ?> </h1>
    <a href='logout.php'>Logout</a>
</body>
</html>