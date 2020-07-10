
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
$w_fields_check = "COUNT(id)";
$w_tbl_check = "rad_waiting_list";
$w_joins_check = "";
$w_criteria_check = "WHERE status = 'A'";
$waiting_lists_check = $obj->selects_join($w_fields,$w_tbl,$w_joins,$w_criteria);
$userid = $_SESSION['id'];
$rights = $obj->user_rights($userid);
//var_dump($vaccines);
//var_dump($titles);
//$sse = $waiting_lists_check[0]['count'];
//var_dump($sse); 

$sse = $waiting_lists_check[0]['count'];
//var_dump($sse);
if(!empty($_POST['id'])){
    echo $sse;
    exit();
}

?>

<?php //include('../../include/header.php');?><!-- /header -->


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
        <td><button onclick="result_pending_details('<?=$waiting_list['visitno'] ?>')" style="cursor:pointer" data-vsn=""><?= $waiting_list['prn'] ?></button></td>
        <td><?= "{$waiting_list['sname']} {$waiting_list['fname']} {$waiting_list['oname']}" ?></td>
        <td><?= str_replace('|,','<br/>',str_replace($find,'',$waiting_list['itemname'])); ?></td>
        <td><?= $waiting_list['count'] ?></td>
    </tr>
    <?php } //} ?>
</tbody>
</table>
