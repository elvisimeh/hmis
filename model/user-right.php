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
$menu=$_GET['menu'];
$smenu=$_GET['smenu'];
$uname = $_GET['uname'];
$status = 'A';

$data = "userid = $uname AND submenu_id = $smenu";
$tbl = "user_rights_tbl";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$smenu." </u>Right already exit for this user!</font></b></div>";
    exit;
    }
$menu_array = ['userid'=>$uname,'menu_id'=>$menu,'submenu_id'=>$smenu, 'status'=>$status];


//insert the array data into database 
if($insertObj->createRecord('user_rights_tbl',$menu_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$smenu."</u> Right Added successfully for user ".$uname. "</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to add right</font></b></div>";
    }

?>