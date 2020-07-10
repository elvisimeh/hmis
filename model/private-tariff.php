<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
session_start();
$staffid = $_SESSION['staffid'];				
$bcode = $_SESSION['bcode'];
$ccode = $_SESSION['ccode'];
$role = $_SESSION['role'];
$id = $_SESSION['id'];

if(!isset($_SESSION['id'])){
    echo 'Session Expired';
			exit;
}
include('../controller/select.php');
include('../controller/insert.php');

$selectObj = new select;

$insertObj = new INSERT;

//Retrieve form data. 
$sname=$_GET['sname'];
$amt=$_GET['amt'];
$unit=$_GET['unit'];
$sid=$_GET['sid'];
$status = 'A';
$data = "unit_id = $unit AND bcode = $bcode";
$tbl = "unit_tbl";
$result = $selectObj->selectRecords($tbl,$data);
 while($row = pg_fetch_assoc($result));
 $deptid = $row['dept_id'];


$data1 = "service_id = $sid AND dept_id = '$deptid'";
$tbl1 = "private_tariff";
$check = $selectObj->selectRecords($tbl1,$data1);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$sname." </u> already exit in private tariff!</font></b></div>";
    exit;
    }

$pvt_array = ['dept_id'=>$deptid,'unit_id'=>$unit,'service_id'=>$sid,'agreed_amt'=>$amt,'cost'=>$amt,'bcode'=>$bcode,'status'=>$status];


//insert the array data into database 
if($insertObj->createRecord('private_tariff',$pvt_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$sname."</u> created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create service into private tariff</font></b></div>";
    }

?>