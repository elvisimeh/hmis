<div class="row" style="margin-left:1%">
    <div class="col-md-6">
    <div class="form-group">
    <label for="" class="control-label mb-1" id="gender_suffix_la">Patient Name</label>
    <select name="pat_name" id="pat_name" class="searchable" style="width:100%" required>
        
    </select>
   </div>
</div>

<input type="hidden" name="" id="cat" value="<?php echo $_GET['cat'] ?>">

<div class="col-offset-md-3 col-md-3" style="margin-top:2%; margin-left:2%">
<button class="btn btn-primary" id="immune" style="padding:2% 2% 2% 2%">Continue</button>
</div>

</div>

<div id="load_search_result">


</div>
<!--<script src="../assets/js/fd_check_payment.js"></script>-->
<script>

$('.searchable').select2({
    minimumInputLength: 3,
    placeholder: "Type patient's name",
    ajax: { 
   url: "fd/get_patientname.php",
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

 /*$('#category').change(function(){
    $('#continue').show();
 });*/

 $('#immune').click(function(){
    var patient_name = encodeURI($('#pat_name').text().toLowerCase());
    
    
    var cat = $('#cat').val();
    var prn =$('#pat_name').val();
   if($('#pat_name').text().trim() != ''){
      $('#pat_name').text('');
    $('#load_search_result').load('fd/fd_patient_search_result_immunization?prn='+prn+'&cat='+cat);
 }
 else{
    alert("Search field cannot be empty");
 }
 });
 

 
</script>