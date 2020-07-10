
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
$w_fields = "pay_transaction_tbl.prn,COUNT(pay_transaction_tbl.prn),fname,oname,sname,pay_transaction_tbl.visitno,MAX(pay_transaction_tbl.pcategoryid) AS pat_cat";
$w_tbl = "pay_transaction_tbl";
$w_joins = "LEFT JOIN all_items_tbl ON pay_transaction_tbl.itemid = all_items_tbl.id LEFT JOIN account_subledgers
ON all_items_tbl.dept_ledgerno = account_subledgers.subledgerno LEFT JOIN patient_data ON 
pay_transaction_tbl.prn = patient_data.prn";
$w_criteria = "WHERE account_subledgers.subledgername = '{$lab}' AND pay_transaction_tbl.status = 'P' GROUP BY pay_transaction_tbl.visitno,pay_transaction_tbl.prn,
fname,oname,sname";
$waiting_lists = $obj->selects_join($w_fields,$w_tbl,$w_joins,$w_criteria);
//var_dump($_SESSION);

$w_fields_later = "paylater_transaction_tbl.prn,COUNT(paylater_transaction_tbl.prn),fname,oname,sname,paylater_transaction_tbl.visitno,MAX(paylater_transaction_tbl.pcategoryid) AS pat_cat";
$w_tbl_later = "paylater_transaction_tbl";
$w_joins_later = "LEFT JOIN all_items_tbl ON paylater_transaction_tbl.itemid = all_items_tbl.id LEFT JOIN account_subledgers
ON all_items_tbl.dept_ledgerno = account_subledgers.subledgerno LEFT JOIN patient_data ON 
paylater_transaction_tbl.prn = patient_data.prn";
$w_criteria_later = "WHERE account_subledgers.subledgername = '{$lab}' AND paylater_transaction_tbl.status = 'A' GROUP BY paylater_transaction_tbl.visitno,paylater_transaction_tbl.prn,
fname,oname,sname";
$waiting_later_lists = $obj->selects_join($w_fields_later,$w_tbl_later,$w_joins_later,$w_criteria_later);

/*** */

$w_fields_check = "COUNT(pay_transaction_tbl.prn)";
$w_tbl_check = "pay_transaction_tbl";
$w_joins_check = "LEFT JOIN all_items_tbl ON pay_transaction_tbl.itemid = all_items_tbl.id LEFT JOIN account_subledgers
ON all_items_tbl.dept_ledgerno = account_subledgers.subledgerno LEFT JOIN patient_data ON 
pay_transaction_tbl.prn = patient_data.prn";
$w_criteria_check = "WHERE account_subledgers.subledgername = '{$lab}' AND pay_transaction_tbl.status = 'P'";
$waiting_lists_check = $obj->selects_join($w_fields_check,$w_tbl_check,$w_joins_check,$w_criteria_check);

$w_fields_later_check = "COUNT(paylater_transaction_tbl.prn)";
$w_tbl_later_check = "paylater_transaction_tbl";
$w_joins_later_check = "LEFT JOIN all_items_tbl ON paylater_transaction_tbl.itemid = all_items_tbl.id LEFT JOIN account_subledgers
ON all_items_tbl.dept_ledgerno = account_subledgers.subledgerno LEFT JOIN patient_data ON 
paylater_transaction_tbl.prn = patient_data.prn";
$w_criteria_later_check = "WHERE account_subledgers.subledgername = '{$lab}' AND paylater_transaction_tbl.status = 'A'";
$waiting_lists_later_check = $obj->selects_join($w_fields_later_check,$w_tbl_later_check,$w_joins_later_check,$w_criteria_later_check);

$userid = $_SESSION['id'];
$rights = $obj->user_rights($userid);
//var_dump($vaccines);
//var_dump($titles);
$sse = $waiting_lists_check[0]['count'] + $waiting_lists_later_check[0]['count'];
//var_dump($sse); 
?>

<?php //include('../../include/header.php');?><!-- /header -->

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


<?php //$current_right='Immunization'; if($tools->check_rights($rights,$current_right)){ ?>
    
 

<div class="content mt-3">
<div class="animated fadeIn">
<div class="row">
<div class="col-xs-12 col-sm-12">
<div class="card">
<div class="card-header bg-c-blue" style="text-align:center">
<strong style="color:white;font-size:1.4em">Sample Collection Waiting List</strong>
</div>

<div class="card-body card-block">

<div id="success_messg" class="row messg"></div>

<div class="table-responsive" id="result" style="border:0">
<table class="table table-bordered">
<thead>
    <th>S/N</th>
    <th>PRN</th>
    <th>Name</th>
    <th>Number of Inv.</th>    
</thead>
<tbody>
    <?php $sn = 1; foreach($waiting_lists as $waiting_list){
    //if(!empty($waiting_lists)){ ?>
    <tr>
        <td><?= $sn++ ?>.</td>
        <td><button onclick="inv_details('<?=$waiting_list['visitno'] ?>','<?=$waiting_list['pat_cat'] ?>')" style="cursor:pointer"><?= $waiting_list['prn'] ?></button></td>
        <td><?= "{$waiting_list['sname']} {$waiting_list['fname']} {$waiting_list['oname']}" ?></td>
        <td><?= $waiting_list['count'] ?></td>
    </tr>
    <?php } //} ?>

    <?php $sn = 1; foreach($waiting_later_lists as $waiting_list){
    //if(!empty($waiting_lists)){ ?>
    <tr>
        <td><?= $sn++ ?>.</td>
        <td><button onclick="inv_details('<?=$waiting_list['visitno'] ?>','<?=$waiting_list['pat_cat'] ?>')" style="cursor:pointer"><?= $waiting_list['prn'] ?></button></td>
        <td><?= "{$waiting_list['sname']} {$waiting_list['fname']} {$waiting_list['oname']}" ?></td>
        <td><?= $waiting_list['count'] ?></td>
    </tr>
    <?php } //} ?>
</tbody>
</table>
</div>
</div>




<?php //} else { echo "<p>You are not allowed to view this page</p>"; }?> 


</body>
<!--<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>-->
<script src="../assets/js/select2.min.js"></script>
<script src="../assets/js/processForms.js"></script>

<script>


$('#category').change(function(){
    if($('#category :selected').val() == 'WALKIN'){
    $('#immunization_patient').load('fd/walkin-immunization');
    }
   else{
    $('#immunization_patient').load('fd/fd_search_pat_immunization.php?cat='+$('#category').val(),
    function(){

    //alert('hello');
    });
   }
});

var sse = "<?php echo $sse ?>";

var getWaiting;
var getWaiting_result;
clearInterval(getWaiting);
clearInterval(getWaiting_result);

    getWaiting = setInterval(function(){    
    $.post("lab/sse_sample_collection",{
        id : sse
    },function(data){
        if(parseInt(data) != parseInt(sse)){
            jun()
        }
    });
}, 7000);


function jun(){
    $('#result').load('lab/sse_sample_collection',
    function(){
        sse = $('#sse').val();
    });
}
    

  
</script>
</html>