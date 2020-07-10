
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

$prn = $_GET['prn'];
$inv = $_GET['temp'];
$vsn = $_GET['vsn'];
$id = $_GET['id'];


$patient_details = $obj->selects("patient_data","WHERE prn = '{$prn}'");

//$parameters = $obj->selects("rad_template_tbl","WHERE inv = '{$inv}'");
$check_exist = $obj->selects('rad_template_tbl',"WHERE inv = '{$inv}'");

$test = $obj->selects("all_items_tbl","WHERE id = '{$inv}'");

?>



<div class="container-fluid">

 
<div class="row">

<div class="col-md-12">
<button onclick="rad_result_pending_details('<?=$vsn ?>')" style="cursor:pointer;margin-bottom:2%"><< Back</button>
<h2><?= "{$test[0]['itemname']} result for {$patient_details[0]['sname']} {$patient_details[0]['fname']} {$patient_details[0]['oname']}" ?></h2>
 <form class="" action='' method="post" >

 <?php if(!empty($check_exist)){ ?>
    <textarea id="php_post_text" name="php_post_text" placeholder="" class="form-control " style="display:none;"></textarea>
 
<textarea id ="y" class="form-control content" name="example"><?= $check_exist[0]['template'] ?></textarea>
 <?php } else { ?>

 <textarea id="php_post_text" name="php_post_text" placeholder="" class="form-control " style="display:none;"></textarea>
 
<textarea id ="y" class="form-control content" name="example"></textarea>
 <?php } ?>
<br/>
<input type="button"  value="SUBMIT" class="btn btn-info " name="save_text" onclick="submit_rad_result()">

 </form>
 </div>
 </div>
 


 <script>
    $(document).ready(function(){
     $('.content').richText();

     $('.btn').html('Ok');
    });

    function submit_rad_result(){
        var result = $('.content').val();
        var id = "<?= $id ?>";

        $.post('../model/rad/post_result.php',{
            result : result,
            id : id,
        });
        alert('mm');
    }
    
</script>		
