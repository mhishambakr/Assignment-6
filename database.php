<?php
if (isset($_SESSION["username"])){
    
} else{
    header('Location: index.php');
}

class Database{
    public $servername;
    public $dbuser;
    public $dbpassword;
    public $dbname;
    public $conn;
    function __construct($serverName){ 
        echo "Welcome to our site<br>";
    }
    function __destruct(){
        echo "Thank You<br>";
        
    }

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
    
    function insertIntoQuery($url, $short_url,$user){
        $this->query = "INSERT INTO `url`(`url`, `short_url`, `user`) 
        VALUES ('$url','$short_url', '$user')";
        $result=$this->conn->QUERY($this->query);
        echo "Your Link: ".$url."<br>";
        echo "<hr>";
        echo "New URL: ".$short_url."<br>";
    }
    public function checkQuery($url, $short_url, $user){
        
        $this->query = "SELECT `id`, `url`, `short_url` 
        FROM `url` 
        WHERE `url` = '$url'";
        
        $result=$this->conn->QUERY($this->query);

        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) { 
                echo "This already exists<br>";
                echo " Your Link: ".$row["url"]."<br>"."<hr>"."Short Link : ".$row["short_url"]."<br>";
            }
        } else {
            $this->insertIntoQuery($url, $short_url, $user);
        }
        
        $this->getUserData($user);
        
    }
    function getUserData($user){
        $this->query = "SELECT `id`, `url`, `short_url` 
        FROM `url` 
        WHERE `user` = '$user'";
        
        $result=$this->conn->QUERY($this->query);

        if ($result->num_rows > 0) { 
            echo "<b>Your previous links:</b><br>";
            while($row = $result->fetch_assoc()) { 
                
                echo " || ".$row["id"].", ".$row["url"]." || ".$row["short_url"]." || "."<br>";
            }
        }
    }
    function getURL($short_url){
        $this->query = "SELECT `url` 
        FROM `url` 
        WHERE `short_url` = '$short_url'";
        
        $result=$this->conn->QUERY($this->query);

        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) { 
                $old_url = $row["url"];
            } 
        }
        return $old_url;
    }
}


// $newDb = new Database("localhost");
// $newDb->conn();
// $newDb->getData();
// $newDb->myData();
// $newDb->checkQuery('x','z');

// echo '<hr>';
