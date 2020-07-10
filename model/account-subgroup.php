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
$sub_acc=$_GET['acc1'];
$aclass=ucwords(strtolower($_GET['aclass']));
$a = 1;
$data = "sno = $acc AND cname = '$aclass'";
$tbl = "account_class";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$aclass." </u> already exit!</font></b></div>";
    exit;
    }

$data1 = "sno = $sub_acc ORDER BY tno DESC";
$ch = $selectObj->selectRecords($tbl,$data1);
   $count = pg_num_rows($ch);
   if($count == 0){
    $tno = $sub_acc.$a;
   }
	else
		{
		$r = pg_fetch_assoc($ch);
		$tno = $r['tno'] + $a;
		}
$accountclass_array = ['fno'=>$acc,'sno'=>$sub_acc,'tno'=>$tno,'cname'=>$aclass];


//insert the array data into database 
if($insertObj->createRecord('account_class',$accountclass_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$aclass."</u> created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create account class</font></b></div>";
    }

?>