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

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$nok = $_POST['nok'];
$nok_phone = $_POST['nok_phone'];
$vaccine = $_POST['vaccine'];

$tdate = date('Y-m-d');
$ttime = date('H:i:sa');
$vsn = time();
$bcode = $_SESSION['bcode'];
$by = $_SESSION['id'];
$get_bcode= "WHERE id = '".$bcode."'";



/*$cat_con = "WHERE id =".$pat_cat;
$pat_cat = $obj->selects('patient_category',$cat_con);*/

function set_wlkno($obj,$get_bcode){
    $wlk1 = 'WLK-'.$obj->selects('branch_tbl',$get_bcode)[0]['branch_code'].(rand(100000,999999));
    
    $get_wlk = "WHERE pat_no = '".$wlk1."'";
    if(!empty($obj->selects('walkin_record_tbl',$get_wlk))){
        set_wlkno($obj,$get_bcode);
    }
    return $wlk1;
    }

    $wlkno = set_wlkno($obj,$get_bcode);

$walkin_immunization_data = ['vdate'=>$tdate,'vtime'=>$ttime,'pat_no'=>$wlkno,'first_name'=>$first_name,
'last_name'=>$last_name,'address'=>$address,'phone_no'=>$phone,'nok'=>$nok,'nok_phone'=>$nok_phone,
'gender'=>$gender,'postedby'=>$by,'bcode'=>$bcode,'dob'=>$dob];

$insert_obj->create('walkin_record_tbl',$walkin_immunization_data);




?>