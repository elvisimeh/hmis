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
$urole=ucwords(strtolower($_GET['urole']));
$data = "rolename = '$urole'";
$tbl = "role_tbl";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$urole." </u>Role already exit!</font></b></div>";
    exit;
    }

$role_array = ['rolename'=>$urole];


//insert the array data into database 
if($insertObj->createRecord('role_tbl',$role_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$urole."</u> Role created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create Role</font></b></div>";
    }

?>