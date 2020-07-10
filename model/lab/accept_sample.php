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

include($_SERVER['DOCUMENT_ROOT'].'/hims/const/constants.php');



$obj = new select;

$insert_obj = new INSERT;


$sample = $_POST['sample'];
$test = $_POST['test'];
$vsn = $_POST['vsn'];
$id = $_POST['id'];
$cat = $_POST['cat'];

$bcode = $_SESSION['bcode'];

$criteria = "WHERE visitno = '{$vsn}' AND itemid = '{$test}'";

if($cat == $private){
$details = $obj->selects("pay_transaction_tbl",$criteria);
}
else{
$details = $obj->selects("paylater_transaction_tbl",$criteria);
}


$date = date('Y-m-d');
$time = date("H:i:sa");
$by = $_SESSION['id'];
$barcode = time();
$status = 'A';


        $data_accept = ['collection_date'=>$date,'collection_time'=>$time,'inv'=>$details[0]['itemid'],
        'prn'=>$details[0]['prn'],'visitno'=>$vsn,'sample_type'=>$sample,'barcode_no'=>$barcode,
        'collected_by'=>$by,'bcode'=>$bcode,'status'=>$status,'pat_type_id'=>$details[0]['ptypeid']];

    $insert_obj->create('lab_inv_waiting_list',$data_accept);
    
    
    $data = ['status'=>'T'];
    $criteria = "WHERE id = {$id}";

    if($cat == $private){
    $insert_obj->update('pay_transaction_tbl',$data,$criteria);
    }
    else {
        $insert_obj->update('paylater_transaction_tbl',$data,$criteria);
    }


?>