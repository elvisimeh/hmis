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
$mname=ucwords(strtolower($_GET['mname']));
$data = "menu_name = '$mname'";
$tbl = "menu_tbl";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$mname." </u>Menu name already exit!</font></b></div>";
    exit;
    }

$menu_array = ['menu_name'=>$mname];


//insert the array data into database 
if($insertObj->createRecord('menu_tbl',$menu_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$mname."</u> Menu created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create Menu</font></b></div>";
    }

?>