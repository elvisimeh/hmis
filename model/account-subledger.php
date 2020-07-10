<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
session_start();
$staffid = $_SESSION['staffid'];				
$bcode = $_SESSION['bcode'];
$ccode = $_SESSION['ccode'];
$role = $_SESSION['role'];
$id = $_SESSION['id'];

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
$acc1=$_GET['acc1'];
$aclass=$_GET['aclass'];
$ledger=$_GET['ledger'];
$sledger=ucwords(strtolower($_GET['sledger']));

$a = '00001';
$b = 1;
$status = 'A';
$data = "ledgerno = $ledger AND subledgername = '$sledger'";
$tbl = "account_subledgers";
$check = $selectObj->selectRecords($tbl,$data);
   $counter = pg_num_rows($check);
   if($counter > 0){
        echo "<div class='alert alert-danger'><b><font color='red'><u>".$sledger." </u> already exit!</font></b></div>";
    exit;
    }

$data1 = "ledgerno = $ledger ORDER BY subledgerno DESC";
$ch = $selectObj->selectRecords($tbl,$data1);
   $count = pg_num_rows($ch);
   if($count == 0){
    $sledgerno = $ledger.$a;
   }
	else
		{
		$r = pg_fetch_assoc($ch);
		$sledgerno = $r['subledgerno'] + $b;
		}
$accountSubLedger_array = ['fno'=>$acc,'sno'=>$acc1,'tno'=>$aclass,'ledgerno'=>$ledger,'subledgerno'=>$sledgerno,'subledgername'=>$sledger,'status'=>$status,'bcode'=>$bcode];


//insert the array data into database 
if($insertObj->createRecord('account_subledgers',$accountSubLedger_array)){
        echo "<div class='alert alert-success'><b><font color='green'><u>".$sledger."</u> created successfully.</font></b></div>";
    }
 
    else{
        echo "<div class='alert alert-danger'><b><font color='red'>Unable to create account subledger</font></b></div>";
    }

?>