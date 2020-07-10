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
$dept=ucwords(strtolower($_GET['dept']));
$status = "A";

$data = "deptname = '$dept'";
$tbl = "dept_tbl";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$dept." </u> already exit!</font></b></div>";
    exit;
    }
$dept_array = ['deptname'=>$dept,'sbu_id'=>$sbu,'status'=>$status];


//insert the array data into database 
if($insertObj->createRecord('dept_tbl',$dept_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$dept."</u> created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create department</font></b></div>";
    }

?>