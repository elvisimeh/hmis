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
$catid=ucwords(strtolower($_GET['catid']));

$status = "A";
$data = "item_category_id = $catid AND subcatname = '$scat'";
$tbl = "item_subcategory_tbl";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$scat." </u> already exit!</font></b></div>";
    exit;
    }

$scat_array = ['item_category_id'=>$catid,'subcatname'=>$scat,'status'=>$status];


//insert the array data into database 
if($insertObj->createRecord('item_subcategory_tbl',$scat_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$scat."</u> created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create item category</font></b></div>";
    }

?>