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

<div class="php_part" id="php_handleform">

<?php
session_start();
if (isset($_SESSION["username"])){
    
} else{
    header('Location: index.php');
}


include 'database.php';

class Link{
    public $url;
    public $shortURL;
    public $user;
    function __construct()
     {
     }
    function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    function getData(){
        $this->url = $_POST['url'];
        $this->shortURL = "localhost/bit/?id=".$this->generateRandomString();
        if (isset($_SESSION["username"])){
            $this->user = $_SESSION["username"];
        }
        $newDb2 = new Database("localhost");
        $newDb2->conn();
        $newDb2->checkQuery($this->url, $this->shortURL, $this->user);
    }
}

$newURL = new Link();
$newURL->getData();


echo '<hr>';

echo '<a href="logout.php">Logout</a>';
?>

</div>