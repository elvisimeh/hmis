<?php

require_once($_SERVER['DOCUMENT_ROOT']."/hims/config/database.php");

class delete{
    
    private $conn;

              
    public function __construct(){
        $db = new connection;
        $this->conn = $db->openConnection();
    }


	 public function deleteRecords($tbl,$data){
		$query = $this->conn->prepare("DELETE FROM ".$tbl." ".$data);
		$query->execute(); 
	}

	function __destruct(){}
} 
?>