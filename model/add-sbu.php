<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
$sbu=ucwords(strtolower($_GET['sbu']));
$status = "A";
$data = "sbu_name = '$sbu'";
$tbl = "sbu_tbl";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$sbu." </u> already exit!</font></b></div>";
    exit;
    }

$sbu_array = ['sbu_name'=>$sbu,'status'=>$status];


//insert the array data into database 
if($insertObj->createRecord('sbu_tbl',$sbu_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$sbu."</u> created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create SBU</font></b></div>";
    }

?>