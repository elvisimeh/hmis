
<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/hims/controller/select.php';
include ($path);

$obj = new select;


?>

<div class="col-md-4" id="get_spec">
<div class="form-group">
<label for="" class="control-label mb-1">Service Name</label>
    <select name="doctor_spec" id="select_reg_service" class="searchable_order" style="width:100%;" required>
    

    </select>
    </div></div>


<div class="col-md-4">
<div class="form-group" id="load_spec_fee">


</div>
</div>

<div class="col-md-4">

</div>


<div class="col-md-12">
<div id="load_reg_services">


</div>
</div>


<script>


$('.searchable_order').select2({
    minimumInputLength: 2,
    placeholder: "Type service name",
    ajax: { 
   url: "fd/get_reg_services.php",
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

 var services = [];
 
  
     

 $('#select_reg_service').change(function(){  
        // for(i=0; i<services.length-1; i++){
         //if(services[i] == $('#select_reg_service').val()){
         if(services != null && services.includes($('#select_reg_service').val())){
             alert('Service already ordered!');
         }
         else{
    services.push($('#select_reg_service').val());
    $("#save_order").val(services);
    $('#load_reg_services').load('fd/fd_list_reg_order?serv='+services,function(){

    var total_amt = 0;
    $(".serv_amt").each(function(){
       total_amt += Number($(this).text());
 });
$('#total_amt').text(total_amt);

});
         }
 });

 
 $('#load_reg_services').load('fd/fd_list_reg_order?serv='+$("#save_order").val(),function(){

var total_amt = 0;
$(".serv_amt").each(function(){
   total_amt += Number($(this).text());
});
$('#total_amt').text(total_amt);

});


function delete_order(id) {
    
    let del = services.indexOf(id.toString());
    
    delete services[del];
    $("#save_order").val(services);

    $('#load_reg_services').load('fd/fd_list_reg_order?serv='+$("#save_order").val(),function(){

var total_amt = 0;
$(".serv_amt").each(function(){
   total_amt += Number($(this).text());
});
$('#total_amt').text(total_amt);

});

}

 

</script>