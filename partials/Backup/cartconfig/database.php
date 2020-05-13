<?php
// used to get mysql database
class Database{
    
    
    //specify your own database credentials
    private $host = "localhost";
    private $db_name = "shop_cart";
    private $username = "root";
    private $password = "";
    public $conn;
    
    //get db connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . "; db_name=" .$this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        
        return $this->conn;
    }
}
?>