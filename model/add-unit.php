<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
session_start();
if(!isset($_SESSION['id'])){
    echo 'Session Expired';
			exit;
}
include('../controller/select.php');
include('../controller/insert.php');

$selectObj = new select;

$insertObj = new INSERT;

//Retrieve form data. 
$sbu=$_GET['sbu'];
$dept=$_GET['dept'];
$unit=ucwords(strtolower($_GET['unit']));
$status = "A";

$data = "unitname = '$unit'";
$tbl = "unit_tbl";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$unit." </u> already exit!</font></b></div>";
    exit;
    }
$unit_array = ['unitname'=>$unit,'sbu_id'=>$sbu,'deptid'=>$dept,'status'=>$status];


//insert the array data into database 
if($insertObj->createRecord('unit_tbl',$unit_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$unit."</u> created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create unit</font></b></div>";
    }

?>