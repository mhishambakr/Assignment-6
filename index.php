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

        echo "<form action='handleform.php' method='POST'>
        <div><label for='url'>URL:</label>
        <input type='text' id='url' name='url' placeholder = 'Enter URL'size='50'></div>
        <input type='submit' value='Submit' id='submit_button'>
        <a href='logout.php'>Logout</a>
        </form>";
        
        echo "<a href='logout.php'>Logout</a>";

    } else {

        echo "<div id='link'><a href='login.php'>Login</a> or <a href='register.php'>Register</a></br></div>";

    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $url = test_input($_POST["url"]);
    }
      
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
  }

?>