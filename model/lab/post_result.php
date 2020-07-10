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


if(isset($_POST['entered_values'])){

$entered_values = $_POST['entered_values'];
$inv = $_POST['inv'];
$temp = $_POST['temp'];
$vsn = $_POST['vsn'];
$id = $_POST['id'];
$flag_status = $_POST['flag_status'];

//$check_exists = $obj->selects("lab_inv_template_tbl", "WHERE inv = '{$inv}'");


$bcode = $_SESSION['bcode'];
$date = date('Y-m-d');
$time = date('H:i:sa');
$by = $_SESSION['id'];

$details = $obj->selects("lab_inv_waiting_list","WHERE id = '{$id}'");


$parameters = array_chunk($temp,6);

$sn = 1;
$sn2 = 1;
$sn3 = 1;
$sn4 = 1;
$sn5 = 1;
$result = "<div class='table-responsive' style='border:0'>

<table id='ml' class='table table-striped'>
<thead>
<tr>
<th>Parameter</th>
<th>Result</th>

<th>Normal Range</th>
</tr>
</thead>
<tbody>";

$result_xml = '$xmlstr = <<<XML 
<?xml version=\'1.0\' standalone=\'yes\'?> <results>';

$result_array = "[";

foreach($parameters as $parameter){

    /***xml */
    $para = rtrim($parameter[1],':');
    $result_xml .= "<{$para}><value>{$entered_values[$sn3++]}</value><unit>{$parameter[3]}</unit><flag>{$flag_status[$sn4++]}</flag></{$para}>";

    $result_array .= "{$para}=>{$entered_values[$sn5++]},";

   $result .= "<tr><td>{$parameter[1]}</td>";
   if($flag_status[$sn2++] == '1'){
   $result .= "<td><font>{$entered_values[$sn++]}</font>({$parameter[3]})</td>";
   }
   else{
    $result .= "<td><font style='color:red'>{$entered_values[$sn++]}</font>({$parameter[3]})</td>";
   }
   //$result .= "<td>{$parameter[3]}</td>";
   $result .= "<td>{$parameter[5]}</td></tr>";
}
$result .= "</tbody></table>";

$result_xml .= "</results>";

$result_array .= "]";

$data_template = ['result'=>$result,'visitno'=>$vsn,'posted_date'=>$date,'posted_time'=>$time,
                   'posted_by'=>$by,'bcode'=>$bcode,'inv'=>$inv,'status'=>'A','prn'=>$details[0]['prn'],
                   'pat_type_id'=>$details[0]['pat_type_id'],'barcode_no'=>$details[0]['barcode_no'],
                   'result_xml'=>$result_xml,'result_array'=>$result_array];

    $insert_obj->create('lab_result',$data_template);
}
else {

    
$entered_values = $_POST['custom_entered_values'];
$inv = $_POST['inv'];
$vsn = $_POST['vsn'];
$id = $_POST['id'];

//$check_exists = $obj->selects("lab_inv_template_tbl", "WHERE inv = '{$inv}'");


$bcode = $_SESSION['bcode'];
$date = date('Y-m-d');
$time = date('H:i:sa');
$by = $_SESSION['id'];

$details = $obj->selects("lab_inv_waiting_list","WHERE id = '{$id}'");
    
$result = "<div>{$entered_values}</div>";

$data_template = ['result'=>$result,'visitno'=>$vsn,'posted_date'=>$date,'posted_time'=>$time,
                   'posted_by'=>$by,'bcode'=>$bcode,'inv'=>$inv,'status'=>'A','prn'=>$details[0]['prn'],
                   'pat_type_id'=>$details[0]['pat_type_id'],'barcode_no'=>$details[0]['barcode_no']];

    $insert_obj->create('lab_result',$data_template);

}

    $update_list = ['status'=>'I'];
    $insert_obj->update('lab_inv_waiting_list',$update_list,"WHERE id = '{$id}' ");
/*$by = $_SESSION['id'];

if(isset($val)){

        $data_template = ['inv'=>$inv,'parameter'=>$val[1],'unit'=>$val[2],
        'normal_range'=>$val[3],'bcode'=>$bcode,'by'=>$by,'sdate'=>$date,'stime'=>$time];

    $insert_obj->create('lab_inv_template_tbl',$data_template);
    
        
}
*/
?>