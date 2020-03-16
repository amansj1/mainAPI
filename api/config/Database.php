<?php
class Database{
  
    // masukin database settingnya kaya d env kalo di laravel
    private $host = "localhost";
    private $db_name = "cpns";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // bikin koneksi database
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
