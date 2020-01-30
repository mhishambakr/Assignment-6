<form action="handle_login.php" method="POST">  
        <label for="username">Username:</label>
        <input type="username" name="username" id="username" placeholder="Please Enter your Username"><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Please Enter your Password" pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" title="must include small, capital letters and a minimum of 8 characters"><br>
        <input type="submit" name="login">
</form>


<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
  }
  
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}