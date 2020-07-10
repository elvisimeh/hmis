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

if(!isset($_POST['val'])){
    exit;
}

$val = $_POST['val'];
$inv = $_POST['inv'];
$eliminate_duplicate = $_POST['eliminate_duplicate'];

//$check_exists = $obj->selects("lab_inv_template_tbl", "WHERE inv = '{$inv}'");
echo $val[1];

    $delete_obj->deleteRecords("lab_inv_template_tbl","WHERE id IN ({$eliminate_duplicate})");


$bcode = $_SESSION['bcode'];
$date = date('Y-m-d');
$time = date('H:i:sa');


$by = $_SESSION['id'];

if(isset($val)){

        $data_template = ['inv'=>$inv,'parameter'=>$val[1],'unit'=>$val[2],
        'normal_range'=>$val[3],'bcode'=>$bcode,'by'=>$by,'sdate'=>$date,'stime'=>$time];

    $insert_obj->create('lab_inv_template_tbl',$data_template);
    
        
}

?>