

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if(!isset($_SESSION['id'])){
    header("location:../../index");
			exit;
}

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/tool.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/const/constants.php');

$obj = new select;
$tools = new TOOLS;
$titles = $obj->selects('title');
$pat_cats = $obj->selects('patient_category');
$reg_types = $obj->selects('registration_type_tbl');
$occupations = $obj->selects('occupation_tbl');
$religions = $obj->selects('religion_tbl');
//var_dump($_SESSION);
$userid = $_SESSION['id'];
$rights = $obj->user_rights($userid);
$vaccines = $obj->selects('all__services_tbl',"WHERE service_category_id =".$immunization_id);
//var_dump($vaccines);
//var_dump($titles); 
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

input[type="radio"]{
    transform : scale(1.1);
    cursor : pointer;
}


</style>

<body>


<?php $current_right='OPD Services'; if($tools->check_rights($rights,$current_right)){ ?>
    
 

<div class="content mt-3">
<div class="animated fadeIn">
<div class="row">
<div class="col-xs-12 col-sm-12">
<div class="card">
<div class="card-header bg-c-blue" style="text-align:center">
<strong style="color:white;font-size:1.4em">Package Creation</strong>
</div>

<div class="card-body card-block">

<div id="success_messg" class="row messg"></div>

<!--<form action="../../controller/fd/register_patient.php" method="post" id="register">-->

<div class="row" style="margin-top:2%">
    <div class="col-md-3">
    <label for="">
    <input type="radio" name="package_action" id="" checked>New Package Creation
    </label>
    </div>

<div class="col-md-9">
<label for="">
<input type="radio" name="package_action" id="">Edit Existing Package
</label>
</div>

    </div>

    
    <form action="">
    <div class="row" style="">
    <div class="col-md-6">
    <div class="form-group">
    
    <label for="">Package Name</label>
    <input type="text" name="package_name" id="" class="form-control">
    </div></div>
    <div class="col-md-6">
    <div class="form-group">
    <div style="margin-top:2em">
    <button type="submit" class="form-control btn btn-primary" style="width:30%;">Add Package</button>
    </div>
    </div></div>
    </div>
    </form>
    
    
    



<?php } else { echo "<p>You are not allowed to view this page</p>"; }?> 


</body>
<!--<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>-->
<script src="../assets/js/select2.min.js"></script>

<script>


$('#category').change(function(){
    if($('#category :selected').val() == 'WALKIN'){
    $('#opd_patient').load('fd/walkin-opd');
    }
   else{
    $('#opd_patient').load('fd/fd_search_pat_opd.php?cat='+$('#category').val(),
    function(){

    //alert('hello');
    });
   }
});






  