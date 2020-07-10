<?php

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/const/constants.php');


$obj = new select;


$cat = $_GET['cat'];


if($cat == $corporate){
    $reg_cat = 'corporate patient registration';
}
elseif($cat == $insurance){
    $reg_cat = 'insurance patient registration';
}
else{
    $reg_cat = 'private patient registration';
}

$reg_field = "*";
$reg_con = "WHERE LOWER(all__services_tbl.servicename) = '".$reg_cat."'";
$reg_join = "LEFT JOIN private_tariff ON private_tariff.service_id = all__services_tbl.id";
$reg_amt = $obj->selects_join($reg_field,'all__services_tbl',$reg_join,$reg_con);


//var_dump($reg_amt);
?>


<?php if($cat == $private){ ?>
<div class="form-group">
<label for="" class="control-label mb-1" id="">Registration Amt.</label>
<input type="text" class="form-control" name="" id="" value="&#8358;<?= !empty($reg_amt) ? $reg_amt[0]["agreed_amt"] : '' ?>" disabled>
<input type="hidden" name="" id="reg_fee" value="<?= !empty($reg_amt) ? $reg_amt[0]["agreed_amt"] : '' ?>">
</div>

<?php } ?>