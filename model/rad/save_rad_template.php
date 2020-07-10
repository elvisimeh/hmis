<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if(!isset($_SESSION['id'])){
    echo 'Session Expired';
			exit;
}

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/insert.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/delete.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/const/constants.php');



$obj = new select;

$insert_obj = new INSERT;

$delete_obj = new delete;




$template = $_POST['template'];
$inv = $_POST['inv'];
$status = 'A';
$by = $_SESSION['id'];
$stime = date('H:i:sa');
$sdate = date('Y-m-d');
$bcode = $_SESSION['bcode'];

$check_exist = $obj->selects('rad_template_tbl',"WHERE inv = '{$inv}'");



$data_template = ['template'=>$template,'inv'=>$inv,'stime'=>$stime,
'sdate'=>$sdate,'by'=>$by,'status'=>$status,'bcode'=>$bcode];

if(empty($check_exist)){
    $insert_obj->create('rad_template_tbl',$data_template);
}
else{
    $insert_obj->update('rad_template_tbl',$data_template,"WHERE inv = '{$inv}'");
}

?>