
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


$specialties = $obj->selects('specialty');
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

    <div id="more-details" class="collapse bg-primary">
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
    </div>

    <div class="row">
        <div class="col-md-6">
    <label for="" class="control-label mb-1">Service Name</label>

    <select name="opd_service" id="opd_service" class="searchable_opd form-control">

    </select>
        </div>
<input type="hidden" name="" id="save_order">
    

        </div>

        <div class="row" id="vaccine_payment" style="margin-left:1%;margin-top:2%">
        
        </div>

        <input type="hidden" name="" id="prn2" value="<?php echo $prn ?>">

        <input type="hidden" name="" id="cat" value="<?= $category ?>">


<div id="check_payment">

</div>

<div id="load_services">

</div>

<div  class="col-md-3">
    <label for="" class="control-label mb-1">&nbsp;</label>     
    <button class="btn btn-primary form-control" id="send_order">Post</button>

    </div>




        <!-- closing div -->
    


</div>


</div>

<script>

$('.searchable_opd').select2({
    minimumInputLength: 1,
    placeholder: "Select Service",
    ajax: { 
   url: "fd/get_opd.php",
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


 $('#opd_service').change(function(){  
        // for(i=0; i<services.length-1; i++){
         //if(services[i] == $('#select_reg_service').val()){
         if(services != null && services.includes($('#opd_service').val())){
             alert('Service already ordered!');
         }
         else{
    services.push($('#opd_service').val());
    $("#save_order").val(services);
    $('#load_services').load('fd/fd_list_reg_order?serv='+services,function(){

    var total_amt = 0;
    $(".serv_amt").each(function(){
       total_amt += Number($(this).text());
 });
$('#total_amt').text(total_amt);

});
         }
 });

 
 $('#load_services').load('fd/fd_list_reg_order?serv='+$("#save_order").val(),function(){

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

    $('#load_services').load('fd/fd_list_reg_order?serv='+$("#save_order").val(),function(){

var total_amt = 0;
$(".serv_amt").each(function(){
   total_amt += Number($(this).text());
});
$('#total_amt').text(total_amt);

});

}



$("#send_order").click(function(){
    const prn = $('#prn2').val();
    const cat = $('#cat').val();
    const save_order = $('#save_order').val();

    $.post('../model/fd/post_opd_order.php', {
        prn : prn,
        cat : cat,
        save_order : save_order,

    },
    function(){
        $('#workspace').empty();        
        $('#tsuccess').html('<p style="color:green">Services Posted Successfully!</p>');

        setTimeout(function () { 
         $('#tsuccess').html(''); 
        }, 4000);

    });
});



</script>