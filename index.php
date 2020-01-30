<?php
session_start();
if (isset($_SESSION["username"])){

    echo "<form action='handleform.php' method='POST'>
    <label for='url'>URL:</label>
    <input type='text' id='url' name='url' placeholder = 'Enter URL'size='50'>
    <input type='submit' value='Submit'>
    </form>";
    
    echo "<a href='logout.php'>Logout</a>";

} else {

    echo "<a href='login.php'>Login</a>"."</br>";

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