
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
$w_fields = "rad_waiting_list.visitno,rad_waiting_list.prn,fname,oname,sname,
array_agg(concat(all_items_tbl.itemname,'|')) as itemname,COUNT(all_items_tbl.itemname)";
$w_tbl = "rad_waiting_list";
$w_joins = "LEFT JOIN all_items_tbl ON rad_waiting_list.inv = all_items_tbl.id LEFT JOIN patient_data ON 
rad_waiting_list.prn = patient_data.prn";
$w_criteria = "WHERE rad_waiting_list.status = 'A' GROUP BY rad_waiting_list.visitno,rad_waiting_list.prn,fname,oname,sname ";
$waiting_lists = $obj->selects_join($w_fields,$w_tbl,$w_joins,$w_criteria);
//var_dump($_SESSION);
$w_fields_check = "COUNT(pay_transaction_tbl.prn)";
$w_tbl_check = "pay_transaction_tbl";
$w_joins_check = "LEFT JOIN all_items_tbl ON pay_transaction_tbl.itemid = all_items_tbl.id LEFT JOIN account_subledgers
ON all_items_tbl.dept_ledgerno = account_subledgers.subledgerno LEFT JOIN patient_data ON 
pay_transaction_tbl.prn = patient_data.prn";
$w_criteria_check = "WHERE account_subledgers.subledgername = '{$rad}'";
$waiting_lists_check = $obj->selects_join($w_fields,$w_tbl,$w_joins,$w_criteria);
$userid = $_SESSION['id'];
$rights = $obj->user_rights($userid);
//var_dump($vaccines);
//var_dump($titles);
$sse = $waiting_lists_check[0]['count'];
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
<strong style="color:white;font-size:1.4em">Pending Result Waiting List</strong>
</div>

<div class="card-body card-block">

<div id="success_messg" class="row messg"></div>

<div class="table-responsive" id="result" style="border:0">
<table class="table table-bordered">
<thead>
    <th>S/N</th>
    <th>PRN</th>
    <th>Name</th>
    <th>Investigations</th>
    <th>Number of Inv.</th>    
</thead>
<tbody>
    <?php $sn = 1; $find = array('"',"}","{"); foreach($waiting_lists as $waiting_list){
    //if(!empty($waiting_lists)){ ?>
    <tr>
        <td><?= $sn++ ?>.</td>
        <td><button onclick="rad_result_pending_details('<?=$waiting_list['visitno'] ?>')" style="cursor:pointer" data-vsn=""><?= $waiting_list['prn'] ?></button></td>
        <td><?= "{$waiting_list['sname']} {$waiting_list['fname']} {$waiting_list['oname']}" ?></td>
        <td><?= str_replace('|,','<br/>',str_replace($find,'',$waiting_list['itemname'])); ?></td>
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


var sse = "<?php echo $sse ?>";

var rad_getWaiting;
var rad_getWaiting_result;
clearInterval(rad_getWaiting);
clearInterval(rad_getWaiting_result);

    rad_getWaiting_result = setInterval(function(){    
    $.post("rad/sse_pending_results_rad",{
        id : sse
    },function(data){
        if(parseInt(data) != parseInt(sse)){
            jun()
        }
    });
}, 7000);


function jun(){
    $('#result').load('rad/sse_pending_results_rad',
    function(){
        sse = $('#sse').val();
    });
}
    

  
</script>
</html>