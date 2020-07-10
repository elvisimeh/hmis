<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$staffid = $_SESSION['staffid'];
if(!isset($_SESSION['id'])){
    echo 'Session Expired';
			exit;
}
include('../controller/select.php');
include('../controller/insert.php');

$selectObj = new select;

$insertObj = new INSERT;

//Retrieve form data. 
$scatid=$_GET['scatid'];
$catid=$_GET['catid'];
$sname=ucwords(strtolower($_GET['sname']));

$status = "A";
$data = "service_category_id = $catid AND servicename = '$sname'";
$tbl = "all__services_tbl";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$sname." </u> already exit!</font></b></div>";
    exit;
    }

$service_array = ['service_category_id'=>$catid,'sub_service_category_id'=>$scatid,'servicename'=>$sname,'postedby_id'=>$staffid,'status'=>$status];


//insert the array data into database 
if($insertObj->createRecord('all__services_tbl',$service_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$sname."</u> created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create Service</font></b></div>";
    }

?>