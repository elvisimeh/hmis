<?php  
include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

$obj = new select;

$criteria = "WHERE corporate_type = 'DC' AND status = 'A'";
$companies = $obj->selects('corporate_client_tbl',$criteria);
?>

<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="sponsor_la">Sponsor Name</label>
    <select name="" class="form-control" id="sponsor">
    <option value="" selected disabled>Select Sponsor</option>
    <?php foreach($companies as $company){?>
        <option value="<?php echo $company['id'] ?>"><?php echo $company['corporate_name'] ?></option>
    <?php } ?>
    
    </select>

</div></div>


<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="employee_name_la">Employee Name</label>
    <input type="text" class="form-control" name="employee_name" id="employee_name" style="margin-top:0px">

</div></div>

<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="relation_la">Relationship</label>
    <select name="" class="form-control" id="relation">
    <option value="" selected disabled>Who is Patient to Employee?</option>
    
    </select>

</div></div>
