<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(!isset($_SESSION['id'])){
    header("location:../../index");
			exit;
}

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/const/constants.php');

$obj = new select;

$titles = $obj->selects('title');

$vaccines = $obj->selects('all__services_tbl',"WHERE service_category_id =".$immunization_id);

?>


<div class="row" id="lk" style="background-color:lightsalmon;">
<div class="col-md-4" style="padding-left:4%">
<input type="radio" class="mk" name="pat_type" value="new" checked>
<label for="">New Walk-in patient</label>
</div>

<div col-md-4>
<input type="radio" class="mk" name="pat_type" value="existing">
<label for="">Existing Walk-in patient</label>
</div>
</div>


<div id="load-info" style="margin-left:2%">

<?php include('walkin-immunization-new.php') ?>

</div>

<script>

$('.mk').change(function(){

var pat_type = $('input[name="pat_type"]:checked').val();
//alert(pat_type);
if(pat_type == "existing"){
    $('#load-info').load('fd/walkin-immunization-existing');
}
else{
    $('#load-info').load('fd/walkin-immunization-new');
}
});

/*function new_immunization(){
    alert('kk');
}*/

$( "#new_immunization" ).submit(function( event ) {
      event.preventDefault();          
    console.log( $( this ).serialize() );
    var post_url = $('#new_immunization').attr('action');
    var form_data = $( this ).serialize();
    $.ajax({
      type: "POST",
      url: post_url,
      data: form_data,
      //dataType: 'html',
      success: function(data){
        
        //$('#success_messg').html('<p style="text-align:center">Sent Successfull!</p>');
        $('#new_immunization').trigger('reset');
        /*setTimeout(function () { 
         $('#success_messg').hide(); 
        }, 2000);
        */ 
       //        
      
    }
    });
          
  });

  $('.searchable_vaccine').select2({
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

</script>