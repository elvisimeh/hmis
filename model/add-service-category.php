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
$scat=ucwords(strtolower($_GET['scat']));
$status = "A";
$data = "catname = '$scat'";
$tbl = "service_category_tbl";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$scat." </u> already exit!</font></b></div>";
    exit;
    }

$cat_array = ['catname'=>$scat,'status'=>$status];


//insert the array data into database 
if($insertObj->createRecord('service_category_tbl',$cat_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$scat."</u> created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create Service category</font></b></div>";
    }

?>