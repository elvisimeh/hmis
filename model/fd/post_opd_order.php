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


$save_order1 = $_POST['save_order'];
$save_orders = explode(",",$save_order1);

$pat_cat = $_POST['cat'];
$prn = $_POST['prn'];
$bcode = $_SESSION['bcode'];

if($pat_cat == $private  || $pat_cat == $family){
    $status = 'NOT PAID';
    $tariff_tbl = 'private_tariff';
}
else{
    $status = 'PAY LATER';
    $tariff_tbl = 'corporate_tariff';
}

$reg_date = date('Y-m-d');
$reg_time = date("H:i:sa");
$by = $_SESSION['id'];



foreach ($save_orders as $save_order){
        if(!empty($save_order)){ 
            $amt_cri = "WHERE service_id = ".$save_order." AND bcode = ".$bcode;           
            $trans_amt = $obj->selects($tariff_tbl,$amt_cri)[0];
            $data_sales = ['tdate'=>$reg_date,'ttime'=>$reg_time,'prn'=>$prn,'itemid'=>$save_order,
        'qty'=>1,'unitsales'=>$trans_amt['agreed_amt'],'unitcost'=>$trans_amt['cost'],'ptypeid'=>$op,
    'pcategoryid'=>$pat_cat,'status'=>'NOT PAID','postedbyid'=>$by,'bcode'=>$bcode];
    $insert_obj->create('daily_sales_order',$data_sales);
        }
    }


?>