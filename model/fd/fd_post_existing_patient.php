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

$pat_cat = $_POST['cat'];
$prn = $_POST['prn'];
$spec = $_POST['spec'];
$doctor = $_POST['doctor'];

$tdate = date('Y-m-d');
$ttime = date('H:i:sa');
$vsn = time();
$bcode = $_SESSION['bcode'];
$by = $_SESSION['id'];

$get_prn = "WHERE prn = '".$prn."' ORDER BY id DESC LIMIT 1";
$visit_date = $obj->selects('patient_visit_tbl',$get_prn);

$amt_con = "WHERE specialty_private.specialtyid =".$spec;
$consult_amt_private = $obj->selects('specialty_private',$amt_con);

/*$cat_con = "WHERE id =".$pat_cat;
$pat_cat = $obj->selects('patient_category',$cat_con);*/

if($visit_date[0]['vdate'] == $tdate){
    $vital_status = 'Y';
}
else{
    $vital_status = 'N';
}

$get_spec = "WHERE id =".$spec;

$check_spec_for_posting = $obj->selects('specialty',$get_spec);

if(strtolower($check_spec_for_posting[0]['specialty']) == 'obstetrician'){
    
}
elseif(strtolower($check_spec_for_posting[0]['specialty']) == 'emergency service'){

}
else{

}

$pat_visit_data = ['vdate'=>$tdate,'vtime'=>$ttime,'prn'=>$prn,'doctorid'=>$doctor,'specialtyid'=>$spec,
'bcode'=>$bcode,'postedbyid'=>$by,'vital_status'=>$vital_status];

$insert_obj->create('patient_visit_tbl',$pat_visit_data);


$pat_visit_data = ['vdate'=>$tdate,'vtime'=>$ttime,'prn'=>$prn,'doctorid'=>$doctor,'specialtyid'=>$spec,
'bcode'=>$bcode,'postedbyid'=>$by,'vital_status'=>$vital_status];