<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if(!isset($_SESSION['id'])){
    echo 'Session Expired';
			exit;
}
include('../controller/delete.php');

$deleteObj = new delete;

$id=$_GET['id'];
$data = "id= $id";
$tbl = "user_rights_tbl";

if($deleteObj->deleteRecords($tbl,$data)){
        echo "<div class='alert alert-success'><b><font color='green'> Right deleted successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to delete right</font></b></div>";
    }

?>