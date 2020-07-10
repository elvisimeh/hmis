
<?php

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/tool.php');

$obj = new select;
$tools = new TOOLS;

$spec = $_GET['spec'] ;

$doc_field = "*";
$doctor_con = "WHERE doctor_tbl.specialtyid =".$spec."AND staff_records.status = 'Active' ORDER BY staff_records.staffname ASC";
//$doctors = $obj->selects('doctor_tbl',$doctor_con);
$doctor_join = "LEFT JOIN staff_records ON doctor_tbl.staffid = staff_records.id";

$doctors = $obj->selects_join($doc_field,'doctor_tbl',$doctor_join,$doctor_con);

?>

<label for="" class="control-label mb-1">Consulting Doctor</label>
<select name="consulting_doc" id="c_doctor" class="form-control">
    <option value="" selected disabled>Select Consulting Doctor</option>

    <?php foreach($doctors as $doctor){ ?>
        <option value="<?= $doctor['id'] ?>"><?= $doctor['title'].' '.$doctor['staffname'] ?></option>

    <?php } ?>

</select>




<script>

$('#c_doctor').change(function(){        
        var stat = encodeURI($('#amt').text());
        var doctor = $('#c_doctor').val();
        var spec = $('#specialty').val();
        if(doctor != null && spec != null){
            $('#load_submit_button').load('fd/fd_existing_submit?stat='+stat);
           // $.getScript('../assets/js/fd_check_payment.js');
        }
        else{
            $('#load_submit_button').empty();
        }
    });
    
    $('#specialty').change(function(){ 
        $('#c_doctor').val('');           
        var stat = encodeURI($('#amt').text());
        var doctor = $('#c_doctor').val();
        var spec = $('#specialty').val();
        
        if(doctor != null && spec != null){
            $('#load_submit_button').load('fd/fd_existing_submit?stat='+stat);
            //$.getScript('../assets/js/fd_check_payment.js');
        }
        else{
            $('#load_submit_button').empty();
        }
       
    });


</script>