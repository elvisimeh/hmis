<?php
class Database{
    private $host = "localhost";
    private $db_name = "mclinicdb";
    private $username = "mclinic";
    private $port = "5432";
    private $password = "Applied1010.";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("pgsql:host=" . $this->host . "; port=" . $this->port ."; dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
        
}
?>