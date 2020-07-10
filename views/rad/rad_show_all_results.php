
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

$prn = $_GET['prn'];

$obj = new select;
$w_fields = "rad_result.id,rad_result.prn,rad_result.pdate,rad_result.ptime,all_items_tbl.itemname,oname,sname,fname";
$w_tbl = "rad_result";
$w_joins = "LEFT JOIN patient_data ON rad_result.prn = patient_data.prn LEFT JOIN all_items_tbl ON all_items_tbl.id = rad_result.inv ";
$w_criteria = "WHERE rad_result.prn = '{$prn}' ORDER BY rad_result.id DESC";
$result_lists = $obj->selects_join($w_fields,$w_tbl,$w_joins,$w_criteria);
//var_dump($_SESSION);

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
<strong style="color:white;font-size:1.4em">Result list for <?= "{$result_lists[0]['sname']} {$result_lists[0]['fname']} {$result_lists[0]['oname']}"  ?> </strong>
</div>

<div class="card-body card-block">

<div id="success_messg" class="row messg"></div>

<div class="table-responsive" id="result" style="border:0">
<table class="table table-bordered">
<thead>
    <th>S/N</th>
    <th>PRN</th>
    <th>Investigation Name</th>
    <th>Date</th>
    <th>Time</th>    
</thead>
<tbody>
    <?php $sn = 1; foreach($result_lists as $result_list){
    //if(!empty($waiting_lists)){ ?>
    <tr>
        <td><?= $sn++ ?>.</td>
        <td><button onclick="rad_result_details('<?= $result_list['id'] ?>')" style="cursor:pointer"><?= $result_list['prn'] ?></button></td>
        <td><?= $result_list['itemname']; ?></td>        
        <td><?= $result_list['pdate']; ?></td>
        <td><?= $result_list['ptime']; ?></td>
    </tr>
    <?php } //} ?>
</tbody>
</table>
</div>
<button onclick="view_rad_results()" style="cursor:pointer"><< Back</button>
</div>




<?php //} else { echo "<p>You are not allowed to view this page</p>"; }?> 


</body>
<!--<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>-->
<script src="../assets/js/select2.min.js"></script>
<script src="../assets/js/processForms.js"></script>

<script>



  
</script>
</html>