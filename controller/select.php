<?php
//var_dump(__DIR__);
//var_dump($_SERVER['DOCUMENT_ROOT']);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/hims/config/connection.php';
include ($path);


class select{
    private $conn;
    private $user_tbl = "users_tbl";  
           
           
    public function __construct(){
        $db = new connection;
        $this->conn = $db->openConnection();
    }

  function userLoginValidationPDOVersion($data){
			$sql = "select * FROM " . $this->user_tbl . " WHERE $data";
			$stmt = $this->conn->prepare($sql);
        	$stmt->execute();
	        return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selects($tbl,$criteria='WHERE id IS NOT NULL')
     {
        $query = $this->conn->prepare("SELECT * FROM ".$tbl.' '.$criteria);
       
        $query->execute();                
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function selects_join($fields,$tbl,$joins,$criteria='WHERE id IS NOT NULL')
     {
        $query = $this->conn->prepare("SELECT ".$fields." FROM ".$tbl.' '.$joins.' '.$criteria);
       
        $query->execute();                
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

  public function user_rights($userid)
     {
        $query = $this->conn->prepare("SELECT * FROM user_rights_tbl LEFT JOIN menu_tbl ON 
        menu_tbl.id = user_rights_tbl.menu_id LEFT JOIN submenu_tbl ON 
        submenu_tbl.id = user_rights_tbl.submenu_id WHERE user_rights_tbl.userid = :userid AND
        user_rights_tbl.status = 'A' ORDER BY submenu_tbl.id ASC ");
       
       $query->bindParam("userid", $userid, PDO::PARAM_STR);
        $query->execute();                
        $data = [];
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    
    public function menu($userid)
     {
        $query = $this->conn->prepare("SELECT DISTINCT(menu_id),menu_name,menu_tbl.id FROM user_rights_tbl LEFT JOIN menu_tbl ON 
        menu_tbl.id = user_rights_tbl.menu_id WHERE user_rights_tbl.userid = :userid AND user_rights_tbl.status = 'A' ORDER BY menu_tbl.id DESC ");
       
       $query->bindParam("userid", $userid, PDO::PARAM_STR);
        $query->execute();                
        $data = [];
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function sname_suggest($criteria)
     {

        function patient_t($patient_name)
        {
            return "{$patient_name}";
        }

        $query = $this->conn->prepare("SELECT CONCAT(sname,' ',fname,' ',oname) FROM patient_data ".$criteria);
        //$query->bindParam("search", $search, PDO::PARAM_STR);

        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_FUNC, "patient_t");
        return $data;
     }

	 public function selectRecords($tbl,$data){
	 include "../config/conn.php";
		$query = "SELECT * FROM $tbl WHERE $data";
		$result = pg_query($conn, $query);
		return $result;
	}

	 public function getUserRight($data){
	 include "../config/conn.php";
		$query = "SELECT u.id AS id, us.username AS username, m.menu_name AS menuname,
		sm.submenu_name AS smname FROM user_rights_tbl AS u 
		LEFT JOIN users_tbl AS us ON u.userid = us.id
		LEFT JOIN menu_tbl AS m ON u.menu_id = m.id
		LEFT JOIN submenu_tbl AS sm ON u.submenu_id = sm.id WHERE $data";
		$result = pg_query($conn, $query);
		return $result;
    }
    
    Public function private_tariff($bcode,$ccode,$serviceid)
     {
        $query = $this->conn->prepare("SELECT servicename,dept_id,agreed_amt,cost,all__services_tbl.id,service_category_id 
        FROM all__services_tbl LEFT JOIN private_tariff ON all__services_tbl.id = private_tariff.service_id 
        WHERE all__services_tbl.id = :serviceid AND bcode = :bcode ");
       
       $query->bindParam("bcode", $bcode, PDO::PARAM_STR);
       //$query->bindParam("ccode", $ccode, PDO::PARAM_STR);
       $query->bindParam("serviceid", $serviceid, PDO::PARAM_STR);
       $query->execute();        
        //$query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    Public function generate_ledgerno($no)
     {
        $query = $this->conn->prepare("SELECT ledgerno FROM patient_data WHERE ledgerno ILIKE '$no%' ORDER BY id DESC LIMIT 1");
       
        $query->execute();        
        //$query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    Public function pat_name_search($search){
 
        // select all query
        $query = $this->conn->prepare("SELECT * FROM patient_data WHERE CONCAT(sname,' ',fname,' ',oname) 
        ILIKE '%".$search."%'");
        
        //$query->bindParam("search", $search, PDO::PARAM_STR);
        // prepare query statement
        
        $query->execute();
     
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = array("id"=>$row['prn'], "text"=>$row['sname'].' '.$row['fname'].' '.$row['oname']);
        }
        return $data;
    }

    Public function pat_name_search_lab_result($search){
 
        // select all query
        $query = $this->conn->prepare("SELECT lab_result.prn,sname,oname,fname FROM lab_result LEFT JOIN patient_data ON 
        patient_data.prn = lab_result.prn WHERE CONCAT(sname,' ',fname,' ',oname) 
        ILIKE '%".$search."%' GROUP BY lab_result.prn,sname,oname,fname");
        
        //$query->bindParam("search", $search, PDO::PARAM_STR);
        // prepare query statement
        
        $query->execute();
     
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = array("id"=>$row['prn'], "text"=>$row['sname'].' '.$row['fname'].' '.$row['oname']);
        }
        return $data;
    }

    Public function search_lab_inv($search,$lab){
 
        // select all query
        $query = $this->conn->prepare("SELECT all_items_tbl.itemname,all_items_tbl.id,subledgername 
        FROM all_items_tbl LEFT JOIN account_subledgers ON 
        dept_ledgerno = subledgerno WHERE subledgername = '".$lab."' AND itemname 
        ILIKE '%".$search."%'");
        
        //$query->bindParam("search", $search, PDO::PARAM_STR);
        // prepare query statement
        
        $query->execute();
     
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = array("id"=>$row['id'], "text"=>$row['itemname']);
        }
        return $data;
    }

    Public function pat_name_search_rad_result($search){
 
        // select all query
        $query = $this->conn->prepare("SELECT rad_result.prn,sname,oname,fname FROM rad_result LEFT JOIN patient_data ON 
        patient_data.prn = rad_result.prn WHERE CONCAT(sname,' ',fname,' ',oname) 
        ILIKE '%".$search."%' GROUP BY rad_result.prn,sname,oname,fname");
        
        //$query->bindParam("search", $search, PDO::PARAM_STR);
        // prepare query statement
        
        $query->execute();
     
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = array("id"=>$row['prn'], "text"=>$row['sname'].' '.$row['fname'].' '.$row['oname']);
        }
        return $data;
    }

   /* Public function vaccine_name_search($search){
 
        // select all query
        $query = $this->conn->prepare("SELECT * FROM patient_data WHERE CONCAT(sname,' ',fname,' ',oname) 
        ILIKE '%".$search."%'");
        
        //$query->bindParam("search", $search, PDO::PARAM_STR);
        // prepare query statement
        
        $query->execute();
     
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = array("id"=>$row['prn'], "text"=>$row['sname'].' '.$row['fname'].' '.$row['oname']);
        }
        return $data;
    }
*/
	function __destruct(){
        
    }
} 
?>