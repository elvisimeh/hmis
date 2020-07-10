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
$iname=ucwords(strtolower($_GET['iname']));

$status = "A";
$data = "item_category_id = $catid AND itemname = '$iname'";
$tbl = "all_items_tbl";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$iname." </u> already exit!</font></b></div>";
    exit;
    }

$item_array = ['item_category_id'=>$catid,'item_subcategory_id'=>$scatid,'itemname'=>$iname,'postedby_id'=>$staffid,'status'=>$status];


//insert the array data into database 
if($insertObj->createRecord('all_items_tbl',$item_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$iname."</u> created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create Item</font></b></div>";
    }

?>