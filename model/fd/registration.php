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



$cat = $_POST['cat'];
$surname = $_POST['surname'];
$first_name = $_POST['first_name'];
$other_name = $_POST['other_name'];
$gender_suffix = $_POST['gender_suffix'];
$title = $_POST['title'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$marital_status = $_POST['marital_status'];
$religion = $_POST['religion'];
$occupation = $_POST['occupation'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$nok = $_POST['nok'];
$nok_phone = $_POST['nok_phone'];
$address = $_POST['address'];
$pat_cat = $_POST['pat_cat'];
//$reg_type = $_POST['reg_type'];
$service_access = $_POST['service_access'];
$reg_service = $_POST['reg_service'];
$save_order1 = $_POST['save_order'];
$save_orders = explode(",",$save_order1);
$spec = $_POST['spec'];
$doc = $_POST['doc'];

$reg_time = date('H:i:sa');
$reg_date = date('Y-m-d');
$by = $_SESSION['id'];
$bcode = $_SESSION['bcode'];
$ccode = $_SESSION['ccode'];
$get_bcode= "WHERE id = '".$bcode."'";
$vsn = time();
$visitid = $obj->selects('visit_tbl',"WHERE visit_type = 'FIRST VISIT'")[0]['id'];

if(isset($_POST['spec']) && !empty($_POST['spec'])){
$specialty_name = $obj->selects('specialty',"WHERE id=".$spec)[0]['specialty'];

if(strtoupper($specialty_name) == "OBSTETRICIAN"){
    $consultation_typeid = $obj->selects('consult_type_tbl',"WHERE consult_type='ANTE NATAL CONSULT'")[0]['id'];
}
elseif(strtoupper($specialty_name) == "EMERGENCY SERVICE"){
    $consultation_typeid = $obj->selects('consult_type_tbl',"WHERE consult_type='EMERGENCY CONSULT'")[0]['id'];
}
else{
    $consultation_typeid = $obj->selects('consult_type_tbl',"WHERE consult_type='REGULAR CONSULT'")[0]['id'];
}

}

function set_prn($obj,$get_bcode){
$prn1 = 'PRN-'.$obj->selects('branch_tbl',$get_bcode)[0]['branch_code'].(rand(100000,999999));

$get_prn = "WHERE prn = '".$prn1."'";
if(!empty($obj->selects('patient_data',$get_prn))){
    set_prn($obj,$get_bcode);
}
return $prn1;
}

if(isset($_POST['sponsor'])){
    $sponsor = $_POST['sponsor'];
}
else{
    $sponsor = null;
}

if(isset($_POST['plan'])){
    $plan = $_POST['plan'];
}
else{
    $plan = null;
}

if(isset($_POST['enrollee'])){
    $enrollee = $_POST['enrollee'];
}
else{
    $enrollee = null;
}

if(isset($_POST['tpa'])){
    $tpa = $_POST['tpa'];
}
else{
    $tpa = null;
}

if(isset($_POST['employee_name'])){
    $employee_name = $_POST['employee_name'];
}
else{
    $employee_name = null;
}

if(isset($_POST['relation'])){
    $relation = $_POST['relation'];
}
else{
    $relation = null;
}

$prn = set_prn($obj,$get_bcode);



$get_spec = "WHERE id =".$spec;

if(isset($_POST['spec']) && !empty($_POST['spec'])){
$check_spec_for_posting = $obj->selects('specialty',$get_spec);


if(strtolower($check_spec_for_posting[0]['specialty']) == 'obstetrician'){
    
}
elseif(strtolower($check_spec_for_posting[0]['specialty']) == 'emergency service'){

}
else{

}

}




if($cat == 'PRIVATE'){
$ledger_private = "WHERE UPPER (ledgername) = 'PRIVATE PATIENTS INCOME'";
$ledg = $obj->selects('account_ledgers',$ledger_private)[0];
$no = $ledg['ledgerno'];
$paid_status = 'I';
$sponsor = 0;

$serviceid = $obj->selects('all__services_tbl',"WHERE UPPER (servicename) = 'PRIVATE PATIENT REGISTRATION'")[0]['id'];
$tran_details = $obj->private_tariff($bcode,$ccode,$serviceid);
$qty = 1;
$pay_trans_details = ['tdate'=>$reg_date,'ttime'=>$reg_time,'ucost'=>$tran_details['cost'],
'usales'=>$tran_details['agreed_amt'],'qty'=>$qty,'tot_amt'=>$tran_details['agreed_amt'],
'details'=>$tran_details['id'],'itemid'=>$tran_details['id'],'service_catid'=>
$tran_details['service_category_id'],'prn'=>$prn,'categoryid'=>$pat_cat,'sponsorid'=>$sponsor,
'orderbyid'=>$by,'bcode'=>$bcode,'ccode'=>$ccode];

$insert_obj->create('pay_transaction_tbl',$pay_trans_details);

if($service_access == 'on'){
    $get_spec = 'WHERE specialtyid = '.$spec.'AND bcode = '.$bcode;
$spec_details = $obj->selects('specialty_private',$get_spec)[0];
$con_cat_id = $obj->selects('service_category_tbl',"WHERE UPPER(catname) = 'CONSULTATION'")[0];
/** check, ask question as per consultation */
 $pay_trans_details_spec = ['tdate'=>$reg_date,'ttime'=>$reg_time,'ucost'=>$spec_details['first_visit_amt'],
'usales'=>$spec_details['first_visit_amt'],'qty'=>$qty,'tot_amt'=>$spec_details['first_visit_amt'],
'details'=>$spec,'itemid'=>$spec,'service_catid'=>
$con_cat_id['id'],'prn'=>$prn,'categoryid'=>$pat_cat,'sponsorid'=>$sponsor,
'orderbyid'=>$by,'bcode'=>$bcode,'ccode'=>$ccode];

$insert_obj->create('pay_transaction_tbl',$pay_trans_details_spec); 
/** consult_type_id not included */
$data_patient_visit = ['vdate'=>$reg_date,'vtime'=>$reg_time,'visitno'=>$vsn,'prn'=>$prn,'specialtyid'=>$spec,
'doctorid'=>$doc,'postedbyid'=>$by,'pcategoryid'=>$pat_cat,'sponsorid'=>$sponsor,'bcode'=>$bcode,
'visit_typeid'=>$visitid,'consultation_typeid'=>$consultation_typeid];
$insert_obj->create('patient_visit_tbl',$data_patient_visit);

$data_daily_visit = ['vdate'=>$reg_date,'vtime'=>$reg_time,'prn'=>$prn,'visitno'=>$vsn,
'visit_typeid'=>$visitid,'consultation_typeid'=>$consultation_typeid,'specialtyid'=>$spec,
'doctorid'=>$doc,'pay_status'=>'NOT PAID','vital_status'=>'N','sponsorid'=>$sponsor,
'postedbyid'=>$by,'pcategoryid'=>$pat_cat,'bcode'=>$bcode,'status'=>'A'];
$insert_obj->create('daily_visit_tbl',$data_daily_visit);

}

if($reg_service == 'on'){
    foreach ($save_orders as $save_order){
        if(!empty($save_order)){ 
            $amt_cri = "WHERE service_id = ".$save_order." AND bcode = ".$bcode;           
            $trans_amt = $obj->selects('private_tariff',$amt_cri)[0];
            $data_sales = ['tdate'=>$reg_date,'ttime'=>$reg_time,'prn'=>$prn,'itemid'=>$save_order,
        'qty'=>1,'unitsales'=>$trans_amt['agreed_amt'],'unitcost'=>$trans_amt['cost'],'ptypeid'=>$op,
    'pcategoryid'=>$pat_cat,'status'=>'NOT PAID','postedbyid'=>$by,'bcode'=>$bcode];
    $insert_obj->create('daily_sales_order',$data_sales);
        }
    }

}

}
if($cat == 'CORPORATE'){
$ledger_corporate = "WHERE UPPER (ledgername) = 'CORPORATE PATIENTS INCOME'";
$ledg = $obj->selects('account_ledgers',$ledger_corporate)[0];
$no = $ledg['ledgerno'];
$paid_status = 'A';

$serviceid = $obj->selects('all__services_tbl',"WHERE UPPER (servicename) = 'CORPORATE PATIENT REGISTRATION'")[0]['id'];
$tran_details = $obj->corporate_tariff($bcode,$ccode,$serviceid);
$qty = 1;
$pay_trans_details = ['tdate'=>$reg_date,'ttime'=>$reg_time,'ucost'=>$tran_details['cost'],
'usales'=>$tran_details['agreed_amt'],'qty'=>$qty,'tot_amt'=>$tran_details['agreed_amt'],
'details'=>$tran_details['id'],'itemid'=>$tran_details['id'],'service_catid'=>
$tran_details['service_category_id'],'prn'=>$prn,'categoryid'=>$pat_cat,'sponsorid'=>$sponsor,
'orderbyid'=>$by,'bcode'=>$bcode,'ccode'=>$ccode];

$insert_obj->create('paylater_transaction_tbl',$pay_trans_details);

}
if($cat == 'INSURANCE'){
$ledger_insurance = "WHERE UPPER (ledgername) = 'INSURANCE PATIENTS INCOME'";
$ledge = $obj->selects('account_ledgers',$ledger_insurance)[0];
$no = $ledg['ledgerno'];
$paid_status = 'A';

$serviceid = $obj->selects('all__services_tbl',"WHERE UPPER (servicename) = 'INSURANCE PATIENT REGISTRATION'")[0]['id'];
$tran_details = $obj->insurance_tariff($bcode,$ccode,$serviceid);
$qty = 1;
$pay_trans_details = ['tdate'=>$reg_date,'ttime'=>$reg_time,'ucost'=>$tran_details['cost'],
'usales'=>$tran_details['agreed_amt'],'qty'=>$qty,'tot_amt'=>$tran_details['agreed_amt'],
'details'=>$tran_details['id'],'itemid'=>$tran_details['id'],'service_catid'=>
$tran_details['service_category_id'],'prn'=>$prn,'categoryid'=>$pat_cat,'sponsorid'=>$sponsor,
'orderbyid'=>$by,'bcode'=>$bcode,'ccode'=>$ccode];

$insert_obj->create('paylater_transaction_tbl',$pay_trans_details);

}

if($cat == 'FAMILY'){
    $ledger_family = "WHERE UPPER (ledgername) = 'FAMILY PATIENTS INCOME'";
    $ledg = $obj->selects('account_ledgers',$ledger_family)[0];
    $no = $ledg['ledgerno'];
    $paid_status = 'I';

    $serviceid = $obj->selects('all__services_tbl',"WHERE UPPER (servicename) = 'FAMILY PATIENT REGISTRATION'")[0]['id'];
    $tran_details = $obj->private_tariff($bcode,$ccode,$serviceid);
    $qty = 1;
    $pay_trans_details = ['tdate'=>$reg_date,'ttime'=>$reg_time,'ucost'=>$tran_details['cost'],
    'usales'=>$tran_details['agreed_amt'],'qty'=>$qty,'tot_amt'=>$tran_details['agreed_amt'],
    'details'=>$tran_details['id'],'itemid'=>$tran_details['id'],'service_catid'=>
    $tran_details['service_category_id'],'prn'=>$prn,'categoryid'=>$pat_cat,'sponsorid'=>$sponsor,
    'orderbyid'=>$by,'bcode'=>$bcode,'ccode'=>$ccode];

    $insert_obj->create('pay_transaction_tbl',$pay_trans_details);

    }

function set_ledgerno($obj,$no){
    $ledgerno1 = $obj->generate_ledgerno($no)['ledgerno'];
    if(empty($ledgerno1)){
        $ledgerno1 = $no . 00000;
    }    
        //$ledgerno2 = substr($ledgerno1,6,11) + 1;
        $ledgerno2 = $ledgerno1 + 1;
        return $ledgerno2;    
    }

$ledgerno3 = set_ledgerno($obj,$no);

$ledgerno = $ledgerno3;

$tbl = 'patient_data';
//$surname = mysql_escape_string($surname);

$data = ['sname'=>$surname,'fname'=>$first_name,'oname'=>$other_name,'title'=>$title,'gender'=>$gender,
'dob'=>$dob,'marital_status'=>$marital_status,'religion'=>$religion,'occupation'=>$occupation,'email'=>$email,
'phoneno'=>$phone,'nok'=>$nok,'nokphone'=>$nok_phone,'address'=>$address,'regtime'=>$reg_time,'regdate'=>$reg_date,
'reg_by'=>$by,'bcode'=>$bcode,'ccode'=>$ccode,'prn'=>$prn,'paid_status'=>$paid_status,'ledgerno'=>$ledgerno];

$pd_id = $insert_obj->create($tbl,$data);



$stat = 'A';
$data_record = ['prn'=>$prn,'pcategoryid'=>$pat_cat,'sponsorid'=>$sponsor,'plan_typeid'=>$plan,
'enrolleeno'=>$enrollee,'tpa'=>$tpa,'employee_name'=>$employee_name,'relationship'=>$relation,'status'=>$stat];

$insert_obj->create('patient_records',$data_record);

$categories = $obj->selects('patient_category');

foreach ($categories as $category){
    if($category['categoryname'] != $cat){
        $category = $category['id'];
        //$sponsor = null;
        $plan = null;
        $enrollee = null;
        $tpa = null;
        $employee_name = null;
        $relation = null;
        $stat = null;
        $data_record = ['prn'=>$prn,'pcategoryid'=>$category,'sponsorid'=>$sponsor,'plan_typeid'=>$plan,
        'enrolleeno'=>$enrollee,'tpa'=>$tpa,'employee_name'=>$employee_name,'relationship'=>$relation,'status'=>$stat];

        $insert_obj->create('patient_records',$data_record);

    }
}

$fno = $ledg['fno'];
$sno = $ledg['sno'];
$tno = $ledg['tno'];
$lno = $ledg['ledgerno'];

$subledgerno = $ledgerno;

$subledger_name = $surname . ' ' . $first_name . ' ' . $other_name;

$status = 'A';

$data_ledger = ['fno'=>$fno,'sno'=>$sno,'tno'=>$tno,'ledgerno'=>$lno,'subledgerno'=>$subledgerno,
'subledgername'=>$subledger_name,'status'=>$status,'bcode'=>$bcode];

$insert_obj->create('account_subledgers',$data_ledger);

echo $pd_id;


?>