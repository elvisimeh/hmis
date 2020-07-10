
<div class="row">

<div class="col-md-6">
<div class="form-group">
<label for="">Walk-in Patient's Name</label>
<select name="pat_name" id="pat_name" class="searchable form-control">

</select>
</div>

</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="">Service Name</label>
<select name="opd_service" id="opd_service" class="searchable_opd form-control">

</select>
</div>
</div>

<div class="col-md-3 col-xs-3">
<div class="form-group">
<label for="">&nbsp;</label>
<input type="submit" class="btn btn-primary form-control" value="Send to pay point" name="" id="">
</div>
</div>

</div>

<script>

$('.searchable_opd').select2({
    minimumInputLength: 1,
    placeholder: "Select Vaccine",
    ajax: { 
   url: "fd/get_vaccines.php",
   type: "post",
   dataType: 'json',
   delay: 250,
   data: function (params) {
    return {
      searchTerm: params.term // search term
    };
   },
   processResults: function (response) {
     return {
        results: response
     };
   },
   cache: true
  }
 });

 $('.searchable').select2({
    minimumInputLength: 3,
    placeholder: "Type patient's name",
    ajax: { 
   url: "fd/get_walkin_pat_name.php",
   type: "post",
   dataType: 'json',
   delay: 250,
   data: function (params) {
    return {
      searchTerm: params.term // search term
    };
   },
   processResults: function (response) {
     return {
        results: response
     };
   },
   cache: true
  }
 });

</script>