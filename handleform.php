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
        // echo "Link: ".$this->url."<br>";
        // echo "New URL: ".$this->shortURL."<br>";
    }
}

$newURL = new Link();
$newURL->getData();

?>
<hr>

<?php



// class User{
//     public $user;
//     function getData(){
//         $this->user = $_SESSION["username"];
//         $newDb2 = new Database("localhost");
//         $newDb2->conn();
//         $newDb2->getUser($this->user);
//     }
// }

// $newUser = new User();
// $newUser->getData();
// echo $newUser->user;

// echo '<hr>';

if (isset($_SESSION["username"])){
    echo '<a href="logout.php">Logout</a>';
}
?>
