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

<div class="php_part">
<?php

if (isset($_POST["username"])){
    
} else{
    header('Location: index.php');
}

class Database{
    public $servername;
    public $dbuser;
    public $dbpassword;
    public $dbname;
    public $conn;


    function conn(){
        $this->servername = "localhost";
        $this->dbuser = "root";
        $this->dbpassword = ""; 
        $this->dbname = "url_database";
        $this->conn = new mysqli($this->servername,$this->dbuser,$this->dbpassword,$this->dbname); 
        if ($this->conn->connect_error){
            die("Connection failed: ".$conn->connect_error); 
        } else{
            // echo "connected successfully<br>";
        }
    }
    //======================================QUERY======================================

    public $query;   
    public $username;
    public $password;

    function registerUser(){
        $this->username = $_POST["username"];
        $this->password = $_POST["password"];
        
        $this->query = "INSERT INTO `users`(`username`, `password`) 
        VALUES ('$this->username','$this->password')";

        $result=$this->conn->QUERY($this->query);

        echo "Registered.<br>Username: $this->username<br>Password: $this->password<br>";
    }
    function checkUser(){
        $this->username = $_POST["username"];
        $this->password = $_POST["password"];
        
        $this->query = "SELECT `username`, `password` 
        FROM `users` 
        WHERE `username` = '$this->username'";
        
        $result=$this->conn->QUERY($this->query);

        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) { 
                if ($this->password == $row["password"]){
                    $username = $_POST["username"];
                    $password = $_POST["password"];


                    session_start();

                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;

                    echo "Welcome, go to <a href='index.php'>Home</a>";
                } else{
                    echo "Wrong password<br>";
                    echo "<a href='login.php'>Try again</a> or <a href='register.php'>Register</a></br>";
                }

            }
        } else {
            echo "User name doesn't exist<br>";
            echo "<a href='login.php'>Login</a> or <a href='register.php'>Register</a></br>";
        }
    }
}


$newDB = new Database("localhost");
$newDB->conn();
$newDB->checkUser();



?>
</div>