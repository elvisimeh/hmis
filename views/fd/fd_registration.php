
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if(!isset($_SESSION['id'])){
    header("location:../../index");
			exit;
}

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/hims/controller/select.php';
include ($path);


include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/tool.php');

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
$specialties = $obj->selects('specialty');



//var_dump($reg_amt);
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
<!--<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/css/bootstrap.min.css">-->
<link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">

<link rel="stylesheet" type="text/css" href="../assets/icon/font-awesome/css/font-awesome.min.css">

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


table, th, td {
  border: 0.5px solid #ddd;
}


</style>

<body>


<?php $current_right='New Patient Registration'; if($tools->check_rights($rights,$current_right)){ ?>
    
 

<div class="content mt-3">
<div class="animated fadeIn">
<div class="row">
<div class="col-xs-12 col-sm-12">
<div class="card">
<div class="card-header bg-c-blue" style="text-align:center">
<strong style="color:white;font-size:1.4em">New Patient Registration</strong>
</div>

<div class="card-body card-block">


<!--<form action="../../controller/fd/register_patient.php" method="post" id="register">-->

    <div class="row" style="margin-left:1%">
    <div class="col-md-4">
    <div class="form-group">
    <label for="" class="control-label mb-1" id="gender_suffix_la">Gender Suffix</label>
    <select name="gender_suffix" id="gender_suffix" class="form-control" required>
    <option value="" selected disabled>Select Gender Suffix</option>
    <option value="Mr">Mr</option>
    <option value="Mrs">Mrs</option>
    <option value="Master">Master</option>
    <option value="Miss">Miss</option>
    </select>
   </div>
</div>

<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="title_la">Title</label>
    <select name="title" id="title" class="form-control" required>
    <option value="" selected disabled>Select Title</option>
    <?php foreach($titles as $title){ ?>
        <option value="<?php echo $title['id'] ?>"><?php echo $title['title'] ?></option>
    <?php  } ?>
    </select>
</div></div>

<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="gender_la">Gender</label>
    <select name="title" id="gender" class="form-control" required>
    <option value="" selected disabled>Select Gender</option>
    <option value="MALE">MALE</option>
    <option value="FEMALE">FEMALE</option>
    </select>
</div></div>

</div>


<div class="row" style="margin-left:1%">
<div class="col-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="surname_la">Surname</label>
    <input type="text" class="form-control" name="surname" id="surname" required style="margin-top:0px">
</div></div>

<div class="col-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="first_name_la">Firstname</label>
    <input type="text" class="form-control" name="first_name" id="first_name" required style="margin-top:0px">
</div></div>
<div class="col-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="other_name_la">Othername(s)</label>
    <input type="text" class="form-control" name="other_name" id="other_name" style="margin-top:0px">
</div></div>
</div>

<div class="row" style="margin-left:1%">
<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="dob_la">Date of Birth</label>
    <input type="date" class="form-control" name="dob" id="dob" required style="margin-top:0px">
</div></div>

<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="marital_status_la">Marital Status</label>
    <select name="marital_status" id="marital_status" class="form-control" required>
    <option value="" selected disabled>Select Marital Status</option>
    <option value="SINGLE">SINGLE</option>
    <option value="MARRIED">MARRIED</option>
    <option value="DIVORCED">DIVORCED</option>
    </select>
</div></div>
<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="religion_la">Religion</label>
    <select name="religion" id="religion" class="form-control" required>
    <option value="" selected disabled>Select Religion</option>
    <?php foreach($religions as $religion){ ?>
        <option value="<?php echo $religion['id'] ?>"><?php echo $religion['religion'] ?></option>
    <?php  } ?>
    </select>
</div>
</div></div>

<div class="row" style="margin-left:1%">
<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="occupation_la">Occupation</label>
    <select name="occupation" id="occupation" class="form-control" required>
    <option value="" selected disabled>Select Occupation</option>
    <?php foreach($occupations as $occupation){ ?>
        <option value="<?php echo $occupation['id'] ?>"><?php echo $occupation['occupation'] ?></option>
    <?php  } ?>
    </select>
</div></div>

<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="email_la">Email Address</label>
    <input type="email" class="form-control" name="email" id="email" required style="margin-top:0px">
</div></div>
<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="phone_la">Phone No.</label>
    <input type="text" name="phone" id="phone" class="form-control" required style="margin-top:0px">
</div>
</div></div>

<div class="row" style="margin-left:1%">
<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="address_la">Address</label>
    <input type="text" class="form-control" name="address" id="address" required style="margin-top:0px">
</div></div>

<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="nok_la">Next of Kin</label>
    <input type="text" class="form-control" name="nok" id="nok" required style="margin-top:0px">
</div></div>


<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="nok_phone_la">Next of Kin Phone</label>
    <input type="number" name="nok_phone" id="nok_phone" class="form-control" required style="margin-top:0px">
</div></div>

</div>

<div class="row" style="margin-left:1%">
<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="pat_cat_la">Patient Category</label>
    <select name="" class="form-control" id="pat_cat">
    <option value="" selected disabled>Select category</option>
    <?php foreach($pat_cats as $pat_cat){ ?>
        <option value="<?php echo $pat_cat['id'] ?>"><?php echo $pat_cat['categoryname'] ?></option>
    <?php } ?>
    </select>
</div></div>

<div class="col-md-4" id="load_reg_amt">
<div class="form-group">
<!--<label for="" class="control-label mb-1" id="">Registration Amt.</label>
<input type="text" class="form-control" name="" id="amt_reg" value="" disabled>-->
    <!--<label for="" class="control-label mb-1" id="reg_type_la">Registration Type</label>
    <select name="" class="form-control" id="reg_type">
    <option value="" selected disabled>Select type</option>
    <?php //foreach($reg_types as $reg_type){ ?>
        <option value="<?php //echo $reg_type['id'] ?>"><?php //echo $reg_type['reg_type_name'] ?></option>
    <?php // } ?>
    </select> -->
</div></div>

<div class="col-md-4">
</div>


</div>

<div id="load_extra" class="row" style="margin-left:1%">


</div>





<div class="row" style="margin-left:1%">
<!--<p style="margin-left:2%">Service Access&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="" id="service_access" checked style="transform: scale(1.5)"></p>-->
<div class="col-md-4">
<label for="" style="margin-left:2%">
<input type="checkbox" name="" id="service_access" checked style="transform: scale(1.5)">&nbsp;&nbsp;Service Access
</label>
</div>

<div class="col-md-4">
<label for="" style="margin-left:2%">
<input type="checkbox" name="" id="reg_service" style="transform: scale(1.5)">&nbsp;&nbsp;Order Services
</label>
</div>


</div>
<input type="hidden" name="" id="save_order">
<div class="row" id="sa" style="margin-left:1%">


<div class="col-md-4" id="get_spec">
<div class="form-group">
    <label for="" class="control-label mb-1">Doctor's Specialty</label>
    <select name="doctor_spec" id="doctor_spec" class="form-control" required>
    <option value="" selected disabled>Select Doctor's Specialty</option>
    <?php foreach($specialties as $specialty){ ?>
 <option value="<?php echo $specialty['id'] ?>"><?php echo $specialty['specialty'] ?></option>
<?php } ?>
    </select>
</div></div>
<div class="col-md-4">
<div class="form-group" id="load_doc">
    <label for="" class="control-label mb-1">Consulting Doctor</label>
    <select name="consulting_doc" id="c_doctor" class="form-control" required>
    <option value="" selected disabled>Select Consulting Doctor</option>
    </select>
</div></div>
<div class="col-md-4">
<div class="form-group" id="load_spec_fee">


</div>
</div>
</div>




<div class="row" style="margin-top:2%;margin-bottom:2%;margin-left:1%">
<div class="row" style="margin-left:2%">
    <input type="submit" value="Register and Post to Doctor" class="form-control btn btn-primary" name="" id="submit" style="font-size:1.2em;font-weight:bold">
</div></div>

   <!-- </form>--> </div>
</div>
</div>
</div>


<?php } else { echo "<p>You are not allowed to view this page</p>"; }?> 


</body>
<!--<script src="../assets/js/jquery/jquery.min.js"></script>-->

<script src="../assets/js/processForms.js"></script>
<script src="../assets/js/select2.min.js"></script>
</html>