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
$smname=ucwords(strtolower($_GET['smname']));
$fname = $_GET['fname'];

$data = "submenu_name = '$smname'";
$tbl = "submenu_tbl";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$smname." </u>Submenu name already exit!</font></b></div>";
    exit;
    }
$menu_array = ['submenu_name'=>$smname,'menu_id'=>$menu,'function_name'=>$fname];


//insert the array data into database 
if($insertObj->createRecord('submenu_tbl',$menu_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$smname."</u> Submenu created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create submenu</font></b></div>";
    }

?>