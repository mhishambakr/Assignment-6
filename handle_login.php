<?php

// if (isset($_SESSION["username"])){
    
// } else{
//     header('Location: index.php');
// }

$username = $_POST["username"];
$password = $_POST["password"];


session_start();

$_SESSION["username"] = $username;
$_SESSION["password"] = $password;

echo "Welcome, go to <a href='index.php'>Home</a>";



?>
