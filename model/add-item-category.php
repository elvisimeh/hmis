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
$cat=ucwords(strtolower($_GET['cat']));
$status = "A";
$data = "catname = '$cat'";
$tbl = "item_category_tbl";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$cat." </u> already exit!</font></b></div>";
    exit;
    }

$cat_array = ['catname'=>$cat,'status'=>$status];


//insert the array data into database 
if($insertObj->createRecord('item_category_tbl',$cat_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$cat."</u> created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create Item category</font></b></div>";
    }

?>