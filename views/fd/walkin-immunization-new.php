




<form action="../model/fd/post_new_immunization.php" method="POST" id="new_immunization">
<div class="row">
<div class="col-md-4">
<div class="form-group">
    <label for="" class="control-label mb-1" id="title_la">Title</label>
    <select name="title" id="title" class="form-control" required>
    <option value="" selected disabled>Select Title</option>
    <?php foreach($titles as $title){ ?>
        <option value="<?php echo $title['id'] ?>"><?php echo $title['title'] ?></option>
    <?php  } ?>
    </select>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="">First Name</label>
<input type="text" name="first_name" id="" class="form-control">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="">Last Name</label>
<input type="text" name="last_name" id="" class="form-control">
</div>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="form-group">
<label for="">Gender</label>
<select name="gender" id="" class="form-control">
<option value="" disabled selected>Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="">Date of Birth</label>
<input type="date" name="dob" id="" class="form-control">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="">Phone no.</label>
<input type="number" name="phone" id="" class="form-control">
</div>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="form-group">
<label for="">Address</label>
<input type="text" name="address" id="" class="form-control">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="">Next of Kin</label>
<input type="text" name="nok" id="" class="form-control">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="">Next of Kin Phone no.</label>
<input type="number" name="nok_phone" id="" class="form-control">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="">Vaccine Name</label>
<select name="vaccine" id="vaccine" class="searchable_vaccine form-control">

</select>
</div>
</div>

<div class="col-md-3 col-xs-3">
<div class="form-group">
<label for="">&nbsp;</label>
<input type="submit" class="btn btn-primary form-control" value="Send to pay point" name="" id="">
</div>
</div>

</form>

</div>