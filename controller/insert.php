<?php
include($_SERVER['DOCUMENT_ROOT']."/hims/config/database.php");
class INSERT
{

    private $conn;

    function __construct()
    {        
        $db = new connection;
        $this->conn = $db->openConnection();
    }

    
    Public function leave_type()
     {
        $query = $this->conn->prepare("SELECT * FROM user_tbl");
       
        $query->execute();        
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

     public function create($tbl,$data)
    {
               
        $query = $this->conn->prepare("INSERT INTO $tbl (" . implode(',',array_keys($data)).") ".
        "VALUES (:" . implode(',:',array_keys($data)). ")");
             
       // $query->bindParam("others", $others, PDO::PARAM_STR);
       foreach ($data as $plac => &$cont) {
        $query->bindParam($plac, $cont, PDO::PARAM_STR);
    }
        
        $query->execute();
        return $this->conn->lastInsertId();
    }

    Public function selects($tbl,$criteria='WHERE id IS NOT NULL')
     {
        $query = $this->conn->prepare("SELECT * FROM ".$tbl.' '.$criteria);
       
        $query->execute();                
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
    
    Public function generate_ledgerno($no)
     {
        $query = $this->conn->prepare("SELECT ledgerno FROM patient_data WHERE ledgerno LIKE '$no%' ORDER BY id DESC LIMIT 1");
       
        $query->execute();        
        //$query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    Public function private_tariff($bcode,$ccode,$serviceid)
     {
        $query = $this->conn->prepare("SELECT servicename,dept_id,agreed_amt,cost,services_tbl.id,service_category_id 
        FROM services_tbl LEFT JOIN private_tariff_tbl ON services_tbl.id = private_tariff_tbl.serviceid 
        WHERE services_tbl.id = :serviceid AND bcode = :bcode AND ccode = :ccode");
       
       $query->bindParam("bcode", $bcode, PDO::PARAM_STR);
       $query->bindParam("ccode", $ccode, PDO::PARAM_STR);
       $query->bindParam("serviceid", $serviceid, PDO::PARAM_STR);
        $query->execute();        
        //$query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    

     public function createRecord($tbl,$data)
    {
               
        $query = $this->conn->prepare("INSERT INTO $tbl (" . implode(',',array_keys($data)).") ".
        "VALUES (:" . implode(',:',array_keys($data)). ")");
             
       // $query->bindParam("others", $others, PDO::PARAM_STR);
       foreach ($data as $plac => &$cont) {
        $query->bindParam($plac, $cont, PDO::PARAM_STR);
    }
        
      if($query->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    public function update_pic($prn,$path)
     {
        
        $query = $this->conn->prepare("UPDATE patient_data SET pass_path = :path WHERE prn = :prn");
       //$query->bindParam("cell", $cell, PDO::PARAM_STR);
        $query->bindParam("prn", $prn, PDO::PARAM_STR);
        $query->bindParam("path", $path, PDO::PARAM_STR);
        
        $query->execute();
     }

     public function update($tbl,$data,$criteria)
          
        {
            $cols = array();
         
            foreach($data as $key=>$val) {
                $cols[] = "$key = '$val'";
            }
            $query = $this->conn->prepare("UPDATE $tbl SET " . implode(', ', $cols) . " $criteria");
         
            $query->execute();
        }
    

     function __destruct()
    {
        $this->conn = null;
    }

}
?>    