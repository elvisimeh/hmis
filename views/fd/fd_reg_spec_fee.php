<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/hims/controller/select.php';
include ($path);

include($_SERVER['DOCUMENT_ROOT'].'/hims/const/constants.php');


$obj = new select;


$cat = $_GET['cat'];


$spec = $_GET['spec'];

$spec_con = "WHERE specialtyid = ".$spec;
$spec_fee = $obj->selects('specialty_private',$spec_con);


/*$spec_field = "*";
$spec_con = "WHERE specialty_private.specialtyid = ".$spec;
$reg_join = "LEFT JOIN private_tariff ON private_tariff.service_id = all__services_tbl.id";
$reg_amt = $obj->selects_join($reg_field,'all__services_tbl',$reg_join,$reg_con);
*/

//var_dump($reg_amt);
?>

<?php
if($cat == $private ){ ?>

<div class="form-group">
<label for="" class="control-label mb-1" id="">Specialty consultation Amt.</label>
<input type="text" class="form-control" name="" id="" value="&#8358;<?= !empty($spec_fee) ? $spec_fee[0]["first_visit_amt"] : ''?>" disabled>
<input type="hidden" name="" id="spec_amt" value="<?= !empty($spec_fee) ? $spec_fee[0]["first_visit_amt"] : '' ?>">   
</div>

<?php } ?>