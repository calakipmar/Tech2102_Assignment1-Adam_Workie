<?php
$dsn = 'mysql:host=localhost;dbname=college'; 
$username = 'root';
$db = new PDO ($dsn, $username);
?> 


<!-- <?php
class Database{
    private $host = "localhost";
    private $db_name = "college";
    private $username = "root";
    private $password = "";
    private $conn;

    public function connect(){
        $this -> conn = new mysqli(
                $this->host, 
                $this->username, 
                $this->password, 
                $this->db_name);

        return $this->conn;        
    }
}
?> -->