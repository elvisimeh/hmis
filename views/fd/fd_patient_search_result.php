
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

$obj = new select;
$tools = new TOOLS;
$titles = $obj->selects('title');

$reg_types = $obj->selects('registration_type_tbl');
$occupations = $obj->selects('occupation_tbl');
$religions = $obj->selects('religion_tbl');
$prn = $_GET['prn'];
$category = trim($_GET['cat']);
$pat_cat = $obj->selects('patient_category','WHERE id='.$category);
$pat_con = "WHERE prn = '".$prn."'";
$pat_info = $obj->selects('patient_data',$pat_con);
$prn = $pat_info[0]['prn'];
//$more_info = $obj->selects('patient_records',"WHERE prn='".$prn."' AND pcategoryid=".$category);
$fields = "*";
$tbl = "patient_records";
$joins = "LEFT JOIN patient_data ON patient_records.prn = patient_data.prn LEFT JOIN corporate_client_tbl 
ON patient_records.sponsorid = corporate_client_tbl.id";
$criteria = "WHERE patient_data.prn='".$prn."' AND pcategoryid=".$category;
$more_info = $obj->selects_join($fields,$tbl,$joins,$criteria);

$visit_field = "*";
$visit_con = "WHERE prn = '".$prn."' ORDER BY patient_visit_tbl.id DESC LIMIT 1";
$visit_join = "LEFT JOIN specialty ON patient_visit_tbl.specialtyid = specialty.id";
$last_visits = $obj->selects_join($visit_field,'patient_visit_tbl',$visit_join,$visit_con);


$specialties = $obj->selects('specialty',"WHERE status ='A' ORDER BY specialty ASC ");
//var_dump($more_info);
$userid = $_SESSION['id'];
$rights = $obj->user_rights($userid);

//var_dump($rights);
//var_dump(trim($patient_name)); 
?>


<div class="row">

<div class="col-md-12">
    <div class="table-responsive">

    <table class="table table-bordered">
    <thead class="table-success">
        <th>PRN</th>
        <th>Patient Name</th>
        <th>Phone Number</th>
        <th>Category</th>
    </thead>
    <tbody>
        <tr>
            <td data-toggle="collapse" data-target="#more-details" style="color:blue;cursor:pointer" id="prn"><?php echo $pat_info[0]['prn'] ?></td>
            <td><?php echo $pat_info[0]['sname'].' '.$pat_info[0]['fname'].' '.$pat_info[0]['oname'] ?></td>
            <td><?php echo $pat_info[0]['phoneno'] ?></td>
            <td><?php echo $pat_cat[0]['categoryname'] ?></td>
        </tr>
    </tbody>
    </table>

    <div id="more-details" class="collapse text-primary" style="background-color:#c5e8ed">
    <div class="row">
    <div class="col-md-10">
    <div class="row" style="margin-left:0.1em; padding-top:1%">
    <div class="col-md-2">
    Email : 
    </div>
    <div class="col-md-4">
    <?php echo $more_info[0]['email'] ?> 
    </div>

    <div class="col-md-2">
    Marital status : 
    </div>
    <div class="col-md-4">
    <?php echo $more_info[0]['marital_status'] ?> 
    </div>
    
    </div>
    <div class="row">
<div class="col-md-12">
    <hr style="color:white">
</div>
</div>
    <div class="row" style="margin-left:0.1em">
    <div class="col-md-2">
    DOB : 
    </div>
    <div class="col-md-4">
    <?php echo $more_info[0]['dob'] ?> 
    </div>

    <div class="col-md-2">
    Address : 
    </div>
    <div class="col-md-4">
    <?php echo $more_info[0]['address'] ?> 
    </div>    

</div>

<div class="row">
<div class="col-md-12">
    <hr style="color:white">
</div>
</div>
    <div class="row" style="margin-left:0.1em">
    <div class="col-md-2">
    Next of kin : 
    </div>
    <div class="col-md-4">
    <?php echo $more_info[0]['nok'] ?> 
    </div>

    <div class="col-md-2">
    NOK phone no. : 
    </div>
    <div class="col-md-4">
    <?php echo $more_info[0]['nokphone'] ?> 
    </div>    

</div>

<div class="row">
<div class="col-md-12">
    <hr style="color:white">
</div>
</div>
    <div class="row" style="margin-left:0.1em">
    <div class="col-md-2">
    Sponsor : 
    </div>
    <div class="col-md-4">
    <?php echo $more_info[0]['corporate_name'] ?> 
    </div>

    <div class="col-md-2">
    Next of kin : 
    </div>
    <div class="col-md-4">
    <?php echo $more_info[0]['nok'] ?> 
    </div>    

</div>

<div class="row">
<div class="col-md-12">
    <hr style="color:white">
</div>
</div>
    <div class="row" style="margin-left:0.1em;padding-bottom:1%">
    <div class="col-md-2">
    Last visited : 
    </div>
    <div class="col-md-4">
    <?php echo (!empty($last_visits) ? $last_visits[0]['specialty'] : "" ) ?> 
    </div>

    <div class="col-md-2">
    Last visit date : 
    </div>
    <div class="col-md-4">
    <?php echo (!empty($last_visits) ? $last_visits[0]['vdate'] : "" ) ?> 
    </div>    

</div>
    
    </div>

    <div class="col-md-2" style="background-image:url(../images/uploads/photo/patients_pic/<?php echo $pat_info[0]['pass_path'] ?>);background-size:contain;background-repeat: no-repeat;">   
    <img src="" alt="">
    </div>

    </div>   
    </div></div>

    <div class="row">
        <div class="col-md-6">
    <label for="" class="control-label mb-1">Select Specialty</label>

    <select name="" id="specialty" class="form-control">
        <option value="" selected disabled>Select Specialty</option>
        
        <?php foreach($specialties as $specialty){ ?>
        <option value="<?= $specialty['id'] ?>"><?= $specialty['specialty'] ?></option>

        <?php } ?>
    </select>
        </div>

    <div id="select_doctor" class="col-md-6">

    <label for="" class="control-label mb-1">Consulting Doctor</label>

    <select name="consulting_doc" id="c_doctor" class="form-control">
        <option value="" selected disabled>Select Consulting Doctor</option>
        
    </select>

    </div>

        </div>

        <input type="hidden" name="" id="prn2" value="<?php echo $prn ?>">

        <input type="hidden" name="" id="cat" value="<?= $category ?>">


<div id="check_payment">

</div>

<div id="load_submit_button">

</div>




        <!-- closing div -->
    


</div>


</div>

<script>

$('#specialty').change(function(){    
    var spec = $('#specialty :selected').val();
    $('#select_doctor').load('fd/fd_doctors?spec='+spec);
});

$('#specialty').change(function(){
    var spec = $('#specialty :selected').val();
    var doctor = $('#c_doctor :selected').val();
    var pat_cat = $('#cat').val();
    $('#check_payment').empty();
    var prn = $('#prn2').val();
    if(spec != null){
        $('#check_payment').load('fd/fd_check_payment?prn='+prn+'&spec='+spec+'&cat='+pat_cat);
        
    }
});





</script>