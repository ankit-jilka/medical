<?php
session_start();
$conn = mysqli_connect('localhost','root','','medical');

if(!$conn){
    dir("Error : cannot connect");
    
}

?>