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

$id = $_GET['id'];


    $w_fields = "*";
$w_tbl = "rad_result";
$w_joins = "LEFT JOIN all_items_tbl ON all_items_tbl.id = rad_result.inv LEFT JOIN patient_data ON
patient_data.prn = rad_result.prn";
$w_criteria = "WHERE rad_result.id = '{$id}' ";
$result_details = $obj->selects_join($w_fields,$w_tbl,$w_joins,$w_criteria);
//var_dump($test_details);

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
<strong style="color:white;font-size:1.4em"><?=  "{$result_details[0]['itemname']} result for {$result_details[0]['sname']} {$result_details[0]['fname']} {$result_details[0]['oname']}" ?></strong>
</div>

<div class="card-body card-block">

<div id="success_messg" class="row messg"></div>

<div class="table-responsive" id="result" style="border:0">

    <?= $result_details[0]['result'] ?>

    </div>
    <button onclick="rad_result_per_prn('<?= $result_details[0]['prn'] ?>')" style="cursor:pointer"><< Back</button>
    <button onclick="generate_pdf_rad('<?= $result_details[0]['id']?>')">View as PDF</button>
    </div>
    </div></div>
    </div></div>
    </div>

</body>
</html>

<script src="../assets/js/jsPDF-1.3.2/dist/jspdf.min.js"></script>
<script src="../assets/js/jsPDF-AutoTable-master/dist/jspdf.plugin.autotable.min.js"></script>



<script>
var rad_getWaiting;
var rad_getWaiting_result;
clearInterval(rad_getWaiting);
clearInterval(rad_getWaiting_result);

function generate_pdf_rad(){
var id = "<?= $id ?>";
   window.open('http://localhost/hims/views/rad/report_to_pdf?id='+id,'_blank');
   //window.print();
 /*   var doc = new jsPDF();

    doc.addHTML($('#result')[0], function () {
        doc.output('dataurlnewwindow');
 });
    */
   
    }
    
    $('table').addClass('table table-striped');
    $('td').css('border','solid 1px black');


</script>