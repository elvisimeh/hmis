
<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/hims/controller/select.php';
include ($path);

$obj = new select;
$rt =  urldecode($_GET['rt']);
$specialties = $obj->selects('specialty');

?>

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


<script>

$('#doctor_spec').change(function(){
    $('#load_doc').load('fd/fd_doctors?spec='+$('#doctor_spec').val());
    $('#load_spec_fee').load('fd/fd_reg_spec_fee?spec='+$('#doctor_spec').val()+'&cat='+$('#pat_cat').val());
});

</script>