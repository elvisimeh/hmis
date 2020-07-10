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



$result = $_POST['result'];
$id = $_POST['id'];

$by = $_SESSION['id'];
$pdate = date('Y-m-d');
$ptime = date('H:i:sa');

$details = $obj->selects('rad_waiting_list',"WHERE id = '{$id}'");


$data_template = ['result'=>$result,'visitno'=>$details[0]['visitno'],'prn'=>$details[0]['prn'],
                'pat_cat'=>$details[0]['pat_cat'],'inv'=>$details[0]['inv'],'by'=>$by,
                'status'=>'A','ptime'=>$ptime,'pdate'=>$pdate,'pat_type_id'=>$details[0]['pat_type_id']];

    $insert_obj->create('rad_result',$data_template);


?>