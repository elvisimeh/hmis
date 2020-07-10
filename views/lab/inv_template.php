<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if(!isset($_SESSION['id'])){
    header("location:../../index");
			exit;
}

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/const/constants.php');

$obj = new select;

$id = $_GET['id'];

/* $w_fields = "pay_transaction_tbl.itemid,pay_transaction_tbl.id,pay_transaction_tbl.ttime,
pay_transaction_tbl.tdate,all_items_tbl.itemname,users_tbl.names,patient_data.fname,
patient_data.oname,patient_data.sname,pay_transaction_tbl.status";
$w_tbl = "pay_transaction_tbl";
$w_joins = "LEFT JOIN all_items_tbl ON pay_transaction_tbl.itemid = all_items_tbl.id LEFT JOIN account_subledgers
ON all_items_tbl.dept_ledgerno = account_subledgers.subledgerno LEFT JOIN patient_data ON 
pay_transaction_tbl.prn = patient_data.prn LEFT JOIN users_tbl ON 
users_tbl.id = pay_transaction_tbl.orderbyid ";
$w_criteria = "WHERE pay_transaction_tbl.visitno = '{$vsn}'";
$test_details = $obj->selects_join($w_fields,$w_tbl,$w_joins,$w_criteria);
*/
$test = $obj->selects("all_items_tbl","WHERE id = '{$id}'");

$check_exists = $obj->selects("lab_inv_template_tbl", "WHERE inv = '{$id}' ORDER BY id ASC");

$controls = $obj->selects_join("id","lab_inv_template_tbl","","WHERE inv = '{$id}'");
//var_dump($check_exists);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HMIS</title>

</head>
<link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">

<style>

@media only screen and (max-width: 600px) {
  #custom-right {
    max-height: 70vh;
  }
}

.remove-control::-webkit-inner-spin-button, 
.remove-control::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
input[type=number] {
    -moz-appearance:textfield;
}

input:hover {
    /*border: solid 0.5px #00C0EF;*/
    background-color: #F6F6F6
}

textarea:hover {
    /*border: solid 0.5px #00C0EF;*/
    background-color: #F6F6F6
}

select:hover {
    /*border: solid 0.5px #00C0EF;*/
    background-color: #F6F6F6
}

.ui-autocomplete {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    float: left;
    display: none;
    min-width: 160px;   
    padding: 4px 0;
    margin: 0 0 10px 25px;
    list-style: none;
    background-color: #ffffff;
    border-color: #ccc;
    border-color: rgba(0, 0, 0, 0.2);
    border-style: solid;
    border-width: 1px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    -webkit-background-clip: padding-box;
    -moz-background-clip: padding;
    background-clip: padding-box;
    *border-right-width: 2px;
    *border-bottom-width: 2px;
}

.ui-menu-item > a.ui-corner-all {
    display: block;
    padding: 3px 15px;
    clear: both;
    font-weight: normal;
    line-height: 18px;
    color: #555555;
    white-space: nowrap;
    text-decoration: none;
}

.ui-state-hover, .ui-state-active {
    color: #ffffff;
    text-decoration: none;
    background-color: #0088cc;
    border-radius: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    background-image: none;
}

.select2-selection__rendered{
    background-color: #ffffff !important;
    border : 1px solid #d3d3d3;
    padding : 0px 0px 0px 0px !important
}

#lk{
    padding-right:0 !important; 
    padding-left:0 !important;
}



</style>
<body>
    
<div class="content mt-3">
<div class="animated fadeIn">
<div class="row">
<div class="col-xs-12 col-sm-12">
<div class="card">
<div class="card-header bg-c-blue" style="text-align:center">
<strong style="color:white;font-size:1.4em"><?= $test[0]['itemname'] ?></strong>
</div>

<div class="card-body card-block">

<div id="success_messg" class="" style="display:none;color:green;text:center">Template Saved Successfully!</div>

<?php if(!empty($check_exists)){  
    $controls = $obj->selects_join("id","lab_inv_template_tbl","","WHERE inv = '{$id}'");

    $eliminate_duplicate = [];
    foreach($controls as $control){
        array_push($eliminate_duplicate,"'".$control['id']."'");
    }   $dup = implode(',',$eliminate_duplicate)?>
    
    <div class="table-responsive" id="result" style="border:0;">
<table class="table table-bordered" id="tab">
<thead>
<th >S/N</th>
<th>Parameter</th>
<th>Unit</th>
<th>Normal Value</th>
<th></th>

</thead>
<tbody>
<?php $sn = 0; foreach($check_exists as $check_exist){ $sn++ ?>
<tr id="<?= $sn ?>">
<td id="no" data-no="<?= $sn ?>" ><?= $sn ?>.</td>
<td><div contenteditable="true"><?= $check_exist['parameter'] ?></div></td>
<td><div contenteditable="true"><?= $check_exist['unit'] ?></div></td>
<td><div contenteditable="true"><?= $check_exist['normal_range'] ?></div></td>
<td><i class="fa fa-remove" style="color:red" onclick="del_temp('<?= $sn ?>')">.</i></td>

</tr>
<?php } ?>
<span id="error_messg" style="display:none;color:red">Value cannot be Null</span>

</tbody>
</table>

<?php } else { 
    $eliminate_duplicate = '0';    ?>
     
<div class="table-responsive" id="result" style="border:0;">
<table class="table table-bordered" id="tab">
<thead>
<th >S/N</th>
<th>Parameter</th>
<th>Unit</th>
<th>Normal Value</th>
<th></th>

</thead>
<tbody>
<tr id="1">
<td id="no" data-no="1" >1.</td>
<td><div contenteditable="true"></div></td>
<td><div contenteditable="true"></div></td>
<td><div contenteditable="true"></div></td>
<td><i class="fa fa-remove" style="color:red" onclick="del_temp('1')">.</i></td>

</tr>
<span id="error_messg" style="display:none;color:red">Value cannot be Null</span>

</tbody>
</table>

<?php } ?>

<button id="add" style="cursor:pointer;float:right"><i class="fa fa-plus" style="color:green"></i> Add</button>

<button onclick="submit_template()" style="cursor:pointer;">Submit</button><br/>

<button onclick="var conf=confirm('Are you sure you want to go back?');if(conf){create_lab_template()}" style="cursor:pointer;margin-top:4%"><< Back</button>
    <div id="bench">
    
    </div>

    </div>
    
    </div>
    </div></div>
    </div></div>
    </div>

</body>
</html>

<script src="../assets/js/select2.min.js"></script>
<script src="../assets/js/processForms.js"></script>
<script>
var getWaiting;
clearInterval(getWaiting);


$('.searchable_inv').select2({
    minimumInputLength: 3,
    placeholder: "Type to search for Investigation",
    ajax: { 
   url: "lab/search_inv.php",
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

 $('#sel_inv').change(function(){
    $('#workspace').load('lab/inv_template?id='+$('#sel_inv').val());
 });


 $('#add').click(function(){
    var cal = $('table > tbody > tr:last-child > td:first-child').attr('data-no');
    var calc = Number(cal);
    if(isNaN(calc)){
        calc = 0;
    }
    var count = Number($('table > tbody > tr:last-child > td:first-child').text());
    if(isNaN(count)){
        count = 0;
    }
    $("table").append
    ('<tr id="'+(calc+1)+'"><td id="no"  data-no='+(calc+1)+'>'+(count+1)+'.</td><td><div contenteditable="true"></div></td><td><div contenteditable="true"></div></td><td><div contenteditable="true"></div></td><td><i onclick=del_temp("'+(calc+1)+'") class="fa fa-remove" style="color:red">.</i></td></tr>');
 });

 function del_temp(id){
     $('#'+id).remove();
    // var rcount = $('table tr').length;
     var i = 1;
     $('td:first-child').each(function() {
    $(this).text(i+'.');
    i++;
});
 }

 function submit_template(){
     var x = 0;
     var inv = "<?php echo $id ?>";
     var eliminate_duplicate = "<?php echo $dup ?>";
     //console.log(eliminate_duplicate);
     $('td').each(function(){
        
        if($(this).text()==''){
            //console.log($(this).text());
            $(this).css('border-color','red');
            $('#error_messg').show();
            setTimeout(() => {
                $(this).css('border-color','#e9ecef');
                $('#error_messg').hide();
            }, 3000);
            x = 'empty';
        }

     });

     if(x == 'empty'){
         return 0;
     }
     
     else{
     $('tr').each(function(){
         var val = [];
        $(this).find('td').each (function() {
            val.push($(this).text());  
           // console.log(val);       
 });  
 if (typeof val !== 'undefined') {
       $.post('../model/lab/submit_template.php',{
        val : val,
        inv : inv,
        eliminate_duplicate : eliminate_duplicate,
       }, function(){        
        $('#workspace').load('lab/inv_template?id='+inv, function(){
            setTimeout(() => {
                $('#success_messg').show();
            }, 1000);
        });
        
       });
       
    } 
     });
    }
 }
 
 
</script>