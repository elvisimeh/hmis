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

$prn = $_GET['prn'];
$inv = $_GET['temp'];
$vsn = $_GET['vsn'];
$id = $_GET['id'];

/*$w_fields = "pay_transaction_tbl.itemid,pay_transaction_tbl.id,pay_transaction_tbl.ttime,
pay_transaction_tbl.tdate,all_items_tbl.itemname,users_tbl.names,patient_data.fname,
patient_data.oname,patient_data.sname,pay_transaction_tbl.status";
$w_tbl = "pay_transaction_tbl";
$w_joins = "LEFT JOIN all_items_tbl ON pay_transaction_tbl.itemid = all_items_tbl.id LEFT JOIN account_subledgers
ON all_items_tbl.dept_ledgerno = account_subledgers.subledgerno LEFT JOIN patient_data ON 
pay_transaction_tbl.prn = patient_data.prn LEFT JOIN users_tbl ON 
users_tbl.id = pay_transaction_tbl.orderbyid ";
$w_criteria = "WHERE pay_transaction_tbl.visitno = '{$vsn}'";
$test_details = $obj->selects_join($w_fields,$w_tbl,$w_joins,$w_criteria);
*/

//$details = $obj->selects("lab_inv_waiting_list","WHERE id = '{$id}'");

$patient_details = $obj->selects("patient_data","WHERE prn = '{$prn}'");

$parameters = $obj->selects("lab_inv_template_tbl","WHERE inv = '{$inv}'");

$test = $obj->selects("all_items_tbl","WHERE id = '{$inv}'");
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
<strong style="color:white;font-size:1.4em"><?= "{$test[0]['itemname']} result for {$patient_details[0]['sname']} {$patient_details[0]['fname']} {$patient_details[0]['oname']}" ?></strong>
</div>

<div class="card-body card-block">

<div id="success_messg" class="row messg"></div>

<?php if(!empty($parameters)){ ?>
<div class="table-responsive" id="result" style="border:0">

    <table class="table table-striped">
    <thead>
    <th>S/N</th>
    <th>Parameter</th>
    <th>value</th>
    <th>Unit</th>
    <th>Flag status</th>
    <th>Normal Range</th>
    
    </thead>
    <tbody>
    <?php $sn =1; foreach($parameters as $parameter){ ?>
    
    <tr id="1">
    <td><?= $sn++ ?>.</td>
    <td id='ll'><b><?= $parameter['parameter'] ?>:</b></td>
    <td><textarea name="" id="" cols="10" rows="2" class="form-control"></textarea></td>
    <td><?= $parameter['unit'] ?></td>
    <td><select name="" id="" class="form-control flag-status">
    <option value="1">Within Normal Limit</option>
    <option value="2">Below Normal Limit <span>&#8595;</span> </option>
    <option value="3">Above Normal Limit <span>&#8593;</span></option>
    </select></td>
    <td><?= $parameter['normal_range'] ?></td>
    
    </tr>
    <?php } ?>
       
    </tbody>
    </table>

    </div>
    <button onclick="back_to_pending('<?= $vsn ?>')" style="cursor:pointer"><< Back</button>
    <button onclick="post_result('<?= $vsn ?>','<?= $inv ?>','<?= $id ?>')" style="float:right;background-color:#6AAFFF;border-color:#489DFF;cursor:pointer;color:white;padding:0 2% 0 2%">Post</button>
    
    <?php } else { ?>

        <div class="table-responsive" id="result" style="border:0">
<textarea name="" class="form-control" id="custom_value" cols="30" rows="10"></textarea>
</div>

<button onclick="back_to_pending('<?= $vsn ?>')" style="cursor:pointer"><< Back</button>
    <button onclick="post_custom_result('<?= $vsn ?>','<?= $inv ?>','<?= $id ?>')" style="float:right;background-color:#6AAFFF;border-color:#489DFF;cursor:pointer;color:white;padding:0 2% 0 2%">Post</button>
    
<?php } ?>

    </div>
    </div></div>
    </div></div>
    </div>

</body>
</html>

<script>
var getWaiting;
clearInterval(getWaiting);

/*$('#ll').click(function(){
var temp = [];
var entered_values = [];
$('tr').each(function(){
         
        $(this).find('td').each (function() {
            temp.push($(this).text()+'|'); 
        });
        temp.push('||');
        entered_values.push($(this).find('textarea').val()+'||');
    });
alert(temp);
});*/

function post_result(vsn,inv,id){
    var temp = [];
var entered_values = [];
var flag_status = [];
var y;

$('textarea').each(function(){
         
        // $(this).find('td').each (function() {
             if($(this).val() == '' && $(this).parent().text() != 'Compulsory field!'){
                 $(this).parent().append('<b id="fill" style="color:red">Compulsory field!<b>');
                 
                 y = 0;
                 setTimeout(() => {
                     $('#fill').remove();
                     
                 }, 3000);
             }
             if($(this).parent().text() == 'Compulsory field!'){
                y = 0;
             }
        // });
        });
if(y == 0){
    return 0;
}
let conf = confirm("Do you want to post result?");
if(conf){
$('tr').each(function(){
         
        $(this).find('td').each (function() {
            temp.push($(this).text()); 
        });
        
        entered_values.push($(this).find('textarea').val());

        flag_status.push($(this).find('.flag-status option:selected').val());
        
    });
   // console.log(temp);
    $.post('../model/lab/post_result.php', {
        vsn : vsn,
        inv : inv,
        temp : temp,
        entered_values : entered_values,
        id : id,
        flag_status : flag_status,
    }, function(){
        back_to_pending(vsn)
    });
}
}

function post_custom_result(vsn,inv,id){
    var custom_entered_values = $('#custom_value').val();
    if(custom_entered_values != ''){
let conf = confirm("Do you want to post result?");
if(conf){

    $.post('../model/lab/post_result.php', {
        vsn : vsn,
        inv : inv,        
        custom_entered_values : custom_entered_values,
        id : id,        
    }, function(){
        back_to_pending(vsn)
    });
}
}
else {
    $('#result').append('<b id="fill" style="color:red">Compulsory field!<b>');
    setTimeout(() => {
                     $('#fill').remove();
                     
                 }, 3000);
}
}

$('.flag-status').change(function(){
    $('.flag-status option:selected').each(function(){
        if($(this).val() == "2" || $(this).val() == "3" ){
            $(this).parent().css("color", "red");
            $(this).parent().css("border-color", "red");
        }
        else{
            $(this).parent().css("color","#495057");
            $(this).parent().css("border-color", "#cccccc");
        }
    });
});

</script>