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
$cat = $_GET['cat'];

if($cat == $private){
$w_fields = "pay_transaction_tbl.itemid,pay_transaction_tbl.id,pay_transaction_tbl.ttime,
pay_transaction_tbl.tdate,all_items_tbl.itemname,users_tbl.names,patient_data.fname,
patient_data.oname,patient_data.sname,pay_transaction_tbl.status";
$w_tbl = "pay_transaction_tbl";
$w_joins = "LEFT JOIN all_items_tbl ON pay_transaction_tbl.itemid = all_items_tbl.id LEFT JOIN account_subledgers
ON all_items_tbl.dept_ledgerno = account_subledgers.subledgerno LEFT JOIN patient_data ON 
pay_transaction_tbl.prn = patient_data.prn LEFT JOIN users_tbl ON 
users_tbl.id = pay_transaction_tbl.orderbyid ";
$w_criteria = "WHERE pay_transaction_tbl.visitno = '{$vsn}' AND account_subledgers.subledgername = '{$lab}'";
$test_details = $obj->selects_join($w_fields,$w_tbl,$w_joins,$w_criteria);
}
else {
    $w_fields = "paylater_transaction_tbl.itemid,paylater_transaction_tbl.id,paylater_transaction_tbl.ttime,
paylater_transaction_tbl.tdate,all_items_tbl.itemname,users_tbl.names,patient_data.fname,
patient_data.oname,patient_data.sname,paylater_transaction_tbl.status AS later_status";
$w_tbl = "paylater_transaction_tbl";
$w_joins = "LEFT JOIN all_items_tbl ON paylater_transaction_tbl.itemid = all_items_tbl.id LEFT JOIN account_subledgers
ON all_items_tbl.dept_ledgerno = account_subledgers.subledgerno LEFT JOIN patient_data ON 
paylater_transaction_tbl.prn = patient_data.prn LEFT JOIN users_tbl ON 
users_tbl.id = paylater_transaction_tbl.postedbyid ";
$w_criteria = "WHERE paylater_transaction_tbl.visitno = '{$vsn}' AND account_subledgers.subledgername = '{$lab}'";
$test_details = $obj->selects_join($w_fields,$w_tbl,$w_joins,$w_criteria);
//var_dump($test_details);
}

$sample_types = $obj->selects("lab_sample_type");
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
<strong style="color:white;font-size:1.4em"><?=  "{$test_details[0]['sname']} {$test_details[0]['fname']} {$test_details[0]['oname']}" ?></strong>
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
    <th>Posted by</th>
    <th>Sample Type</th>
    <th></th>
    </thead>
    <tbody>
    <?php $sn =1; foreach($test_details as $test_detail){ 
    if((isset($test_detail['status']) && $test_detail['status'] == 'P') || (isset($test_detail['later_status']) && $test_detail['later_status'] == 'A')){ ?>
    <tr>
    <td><?= $sn++ ?>.</td>
    <td><?= $test_detail['itemname'] ?></td>
    <td><?= $test_detail['ttime'] ?></td>
    <td><?= $test_detail['tdate'] ?></td>
    <td><?= $test_detail['names'] ?></td>
    <td><select name="" id="<?= $test_detail['id'] ?>" class="form-control">
    <option value="" disable>Select Sample Type</option>
    <?php foreach($sample_types as $sample_type){?>
    <option value="<?= $sample_type['id'] ?>"><?= $sample_type['sample'] ?></option>
    <?php } ?>
    </select><span style="display:none;color:red" id="<?= 'error'.$test_detail['id'] ?>">Select Sample type</span></td>
    <td><i class="fa fa-toggle-on" onClick="lab_accept_sample('<?= $vsn ?>','<?= $test_detail['itemid'] ?>','<?= $test_detail['id'] ?>','<?= $cat ?>')" style="color:#3FDBBC; transform:scale(1.7);cursor:pointer"></i>
    </td>
    </tr>
    <?php } 
else{ ?>
        <tr style="color:gray">
    <td><?= $sn++ ?>.</td>
    <td><?= $test_detail['itemname'] ?></td>
    <td><?= $test_detail['ttime'] ?></td>
    <td><?= $test_detail['tdate'] ?></td>
    <td><?= $test_detail['names'] ?></td>
    <td><select name="" id="<?= $test_detail['id'] ?>" class="form-control" disabled>
    <option value="" disable>Sample Collected</option>
    <?php foreach($sample_types as $sample_type){?>
    <option value="<?= $sample_type['id'] ?>") ?>><?= $sample_type['sample'] ?></option>
    <?php } ?>
    </select></td>
    <td><i class="fa fa-toggle-off" style="color:gray; transform:scale(1.7);"></i>
    </td>
    </tr>
<?php } } ?>
    </tbody>
    </table>

    </div>
    <button onclick="sample_collection()" style="cursor:pointer"><< Sample Collection</button>
    </div>
    </div></div>
    </div></div>
    </div>

</body>
</html>

<script>
var getWaiting;
var getWaiting_result;
clearInterval(getWaiting);
clearInterval(getWaiting_result);
</script>