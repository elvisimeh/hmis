<?php

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

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
$w_fields = "pay_transaction_tbl.prn,COUNT(pay_transaction_tbl.prn),fname,oname,
sname,pay_transaction_tbl.visitno,MAX(pay_transaction_tbl.pcategoryid) AS pat_cat";
$w_tbl = "pay_transaction_tbl";
$w_joins = "LEFT JOIN all_items_tbl ON pay_transaction_tbl.itemid = all_items_tbl.id LEFT JOIN account_subledgers
ON all_items_tbl.dept_ledgerno = account_subledgers.subledgerno LEFT JOIN patient_data ON 
pay_transaction_tbl.prn = patient_data.prn";
$w_criteria = "WHERE account_subledgers.subledgername = '{$rad}' AND pay_transaction_tbl.status = 'P' GROUP BY pay_transaction_tbl.visitno,
pay_transaction_tbl.prn,fname,oname,sname";
$waiting_lists = $obj->selects_join($w_fields,$w_tbl,$w_joins,$w_criteria);
//var_dump($_SESSION);
$w_fields_later = "paylater_transaction_tbl.prn,COUNT(paylater_transaction_tbl.prn),fname,oname,sname,paylater_transaction_tbl.visitno,MAX(paylater_transaction_tbl.pcategoryid) AS pat_cat";
$w_tbl_later = "paylater_transaction_tbl";
$w_joins_later = "LEFT JOIN all_items_tbl ON paylater_transaction_tbl.itemid = all_items_tbl.id LEFT JOIN account_subledgers
ON all_items_tbl.dept_ledgerno = account_subledgers.subledgerno LEFT JOIN patient_data ON 
paylater_transaction_tbl.prn = patient_data.prn";
$w_criteria_later = "WHERE account_subledgers.subledgername = '{$rad}' AND paylater_transaction_tbl.status = 'A' GROUP BY paylater_transaction_tbl.visitno,paylater_transaction_tbl.prn,
fname,oname,sname";
$waiting_later_lists = $obj->selects_join($w_fields_later,$w_tbl_later,$w_joins_later,$w_criteria_later);
/** */
$userid = $_SESSION['id'];
$rights = $obj->user_rights($userid);
//var_dump($vaccines);
//var_dump($titles);
$w_fields_check = "COUNT(pay_transaction_tbl.prn)";
$w_tbl_check = "pay_transaction_tbl";
$w_joins_check = "LEFT JOIN all_items_tbl ON pay_transaction_tbl.itemid = all_items_tbl.id LEFT JOIN account_subledgers
ON all_items_tbl.dept_ledgerno = account_subledgers.subledgerno LEFT JOIN patient_data ON 
pay_transaction_tbl.prn = patient_data.prn";
$w_criteria_check = "WHERE account_subledgers.subledgername = '{$rad}' AND pay_transaction_tbl.status = 'P'";
$waiting_lists_check = $obj->selects_join($w_fields_check,$w_tbl_check,$w_joins_check,$w_criteria_check);
/*** */

$w_fields_later_check = "COUNT(paylater_transaction_tbl.prn)";
$w_tbl_later_check = "paylater_transaction_tbl";
$w_joins_later_check = "LEFT JOIN all_items_tbl ON paylater_transaction_tbl.itemid = all_items_tbl.id LEFT JOIN account_subledgers
ON all_items_tbl.dept_ledgerno = account_subledgers.subledgerno LEFT JOIN patient_data ON 
paylater_transaction_tbl.prn = patient_data.prn";
$w_criteria_later_check = "WHERE account_subledgers.subledgername = '{$rad}' AND paylater_transaction_tbl.status = 'A'";
$waiting_lists_later_check = $obj->selects_join($w_fields_later_check,$w_tbl_later_check,$w_joins_later_check,$w_criteria_later_check);

$sse = $waiting_lists_check[0]['count'] + $waiting_lists_later_check[0]['count'];
//var_dump($sse);
if(!empty($_POST['id'])){
    echo $sse;
    exit();
}

?>


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
<input type="hidden" name="" id="sse" value="<?= $sse ?>">

<script src="../assets/js/processForms.js"></script>