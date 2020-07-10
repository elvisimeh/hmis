<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/hims/controller/select.php';
include ($path);

$obj = new select;
$rt =  urldecode($_GET['rt']);
$specialties = $obj->selects('specialty');

?>


<div class="form-group">
    <label for="" class="control-label mb-1">Doctor's Specialty</label>
    <select name="doctor_spec" id="doctor_spec" class="form-control" required>
    <option value="" selected disabled>Select Doctor's Specialty</option>
<?php  foreach($specialties as $specialty){ ?>
 <option value="<?php echo $specialty['id'] ?>"><?php echo $specialty['specialty'] ?></option>
<?php } ?>

    </select>
</div>
