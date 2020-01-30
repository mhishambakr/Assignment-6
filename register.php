<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>Welcome to our website</h1>
</body>
</html>


<?php
session_start();
if (isset($_SESSION["username"])){
    header('Location: index.php');
}



?>

<form action="handle_register.php" method="POST">  
    <div>
        <label for="username">Username:</label>
        <input type="username" name="username" id="username" placeholder="Please Enter your Username"><br>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Please Enter your Password" pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" title="must include small, capital letters and a minimum of 8 characters"><br>
    </div>
        <input type="submit" id='submit_button' name="Register">
</form>

