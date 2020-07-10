<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if(!isset($_SESSION['id'])){
    header("location:../../index");
			exit;
}

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/const/constants.php');

$obj = new select;

$vsn = $_GET['vsn'];

$w_fields = "rad_waiting_list.prn,all_items_tbl.itemname,users_tbl.names,patient_data.fname,
patient_data.oname,patient_data.sname,rad_waiting_list.status,
accept_time,accept_date,rad_waiting_list.inv,rad_waiting_list.id";
$w_tbl = "rad_waiting_list";
$w_joins = "LEFT JOIN all_items_tbl ON rad_waiting_list.inv = all_items_tbl.id LEFT JOIN patient_data ON 
rad_waiting_list.prn = patient_data.prn LEFT JOIN users_tbl ON 
users_tbl.id = rad_waiting_list.saved_by  ";
$w_criteria = "WHERE rad_waiting_list.visitno = '{$vsn}' ORDER BY rad_waiting_list.id ASC";
$test_details = $obj->selects_join($w_fields,$w_tbl,$w_joins,$w_criteria);


$prn = $test_details[0]['prn'];
/*
$pat_fields = "patient_category.categoryname,corporate_client_tbl.corporate_name,pass_path";
$pat_tbl = "patient_data";
$pat_joins = "LEFT JOIN patient_category ON patient_data.pcategoryid = patient_category.id LEFT JOIN
             corporate_client_tbl ON patient_data.sponsorid"

$pat_details = 
*/
//$sample_types = $obj->selects("lab_sample_type");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HMIS</title>

</head>
<link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">

<style>

@media only screen and (max-width: 600px) {
  #custom-right {
    max-height: 70vh;
  }
}

.remove-control::-webkit-inner-spin-button, 
.remove-control::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
input[type=number] {
    -moz-appearance:textfield;
}

input:hover {
    /*border: solid 0.5px #00C0EF;*/
    background-color: #F6F6F6
}

textarea:hover {
    /*border: solid 0.5px #00C0EF;*/
    background-color: #F6F6F6
}

select:hover {
    /*border: solid 0.5px #00C0EF;*/
    background-color: #F6F6F6
}

.ui-autocomplete {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    float: left;
    display: none;
    min-width: 160px;   
    padding: 4px 0;
    margin: 0 0 10px 25px;
    list-style: none;
    background-color: #ffffff;
    border-color: #ccc;
    border-color: rgba(0, 0, 0, 0.2);
    border-style: solid;
    border-width: 1px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    -webkit-background-clip: padding-box;
    -moz-background-clip: padding;
    background-clip: padding-box;
    *border-right-width: 2px;
    *border-bottom-width: 2px;
}

.ui-menu-item > a.ui-corner-all {
    display: block;
    padding: 3px 15px;
    clear: both;
    font-weight: normal;
    line-height: 18px;
    color: #555555;
    white-space: nowrap;
    text-decoration: none;
}

.ui-state-hover, .ui-state-active {
    color: #ffffff;
    text-decoration: none;
    background-color: #0088cc;
    border-radius: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    background-image: none;
}

.select2-selection__rendered{
    background-color: #ffffff !important;
    border : 1px solid #d3d3d3;
    padding : 0px 0px 0px 0px !important
}

#lk{
    padding-right:0 !important; 
    padding-left:0 !important;
}



</style>
<body>
    
<div class="content mt-3">
<div class="animated fadeIn">
<div class="row">
<div class="col-xs-12 col-sm-12">
<div class="card">
<div class="card-header bg-c-blue" style="text-align:center">
<strong style="color:white;font-size:1.4em"><?= "{$test_details[0]['sname']} {$test_details[0]['fname']} {$test_details[0]['oname']}" ?></strong>
</div>

<div class="card-body card-block">

<div id="success_messg" class="row messg"></div>

<div class="table-responsive" id="result" style="border:0">

    <table class="table table-bordered">
    <thead>
    <th>S/N</th>
    <th>Inv. Name</th>
    <th>Time</th>
    <th>Date</th>
    <th>Accepted by</th>
    
    <th></th>
    </thead>
    <tbody>
    <?php $sn =1; foreach($test_details as $test_detail){ 
    if($test_detail['status'] == 'A'){ ?>
    <tr>
    <td><?= $sn++ ?>.</td>
    <td><?= $test_detail['itemname'] ?></td>
    <td><?= $test_detail['accept_time'] ?></td>
    <td><?= $test_detail['accept_date'] ?></td>
    <td><?= $test_detail['names'] ?></td>
    
    <td><i onclick="post_with_rad_result('<?= $test_detail['prn'] ?>','<?= $test_detail['inv'] ?>','<?= $vsn ?>','<?= $test_detail['id'] ?>')" 
    class="fa fa-envelope-open" style="color:green;cursor:pointer;transform:scale(1.7)"></i>
    </td>
    </tr>
    <?php } 
else{ ?>
        <tr style="color:gray">
    <td><?= $sn++ ?>.</td>
    <td><?= $test_detail['itemname'] ?></td>
    <td><?= $test_detail['accept_time'] ?></td>
    <td><?= $test_detail['accept_date'] ?></td>
    <td><?= $test_detail['names'] ?></td>
    
    <td><i id=""  
    class="fa fa-envelope" style="color:gray; transform:scale(1.7);cursor:no-drop"></i>
    </td>
    </tr>
<?php } } ?>
    </tbody>
    </table>

    </div>
    <button onclick="rad_pending_result()" style="cursor:pointer"><< Pending Results List</button>
    </div>
    </div></div>
    </div></div>
    </div>

</body>
</html>

<script src="../assets/js/processForms.js"></script>
<script>
var rad_getWaiting;
var rad_getWaiting_result;
clearInterval(rad_getWaiting);
clearInterval(rad_getWaiting_result);
</script>