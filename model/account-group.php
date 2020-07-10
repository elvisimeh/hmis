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
$acc=$_GET['acc'];
$agroup=ucwords(strtolower($_GET['agroup']));
$a = 1;

$data = "subgroupname = '$agroup'";
$tbl = "account_subgroup";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$agroup." </u> already exit!</font></b></div>";
    exit;
    }

$data1 = "fno = $acc ORDER BY sno DESC";
$ch = $selectObj->selectRecords($tbl,$data1);
   $count = pg_num_rows($ch);
   if($count == 0){
    $sno = $acc.$a;
   }
	else
		{
		$r = pg_fetch_assoc($ch);
		$sno = $r['sno'] + $a;
		}
$account_array = ['subgroupname'=>$agroup,'fno'=>$acc,'sno'=>$sno];


//insert the array data into database 
if($insertObj->createRecord('account_subgroup',$account_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$agroup."</u> created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create account group</font></b></div>";
    }

?>