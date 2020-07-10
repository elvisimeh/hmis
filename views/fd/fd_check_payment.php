<?php

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/tool.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/const/constants.php');

$obj = new select;
$tools = new TOOLS;

$spec = $_GET['spec'] ;

$prn = $_GET['prn'];

$cat = $_GET['cat'];

//$consult_field = "*";
$consult_con = "WHERE consultation_payment_tbl.specialtyid =".$spec."AND consultation_payment_tbl.prn ='".$prn."'";
$consult_payment_private = $obj->selects('consultation_payment_tbl',$consult_con);
//$consult_join_private = "LEFT JOIN specialty_private ON 
//specialty_private.id = consultation_payment_tbl.specialtyid";

$amt_con = "WHERE specialty_private.specialtyid =".$spec;
$consult_amt_private = $obj->selects('specialty_private',$amt_con);
//$consult_payment_private = $obj->selects_join($consult_field,'consultation_payment_tbl',$consult_join_private,$consult_con);


?>


<?php 

if($cat == $corporate){ ?>

<p>Corporate Paylater</p>
<input type="hidden" name="" id="stat" value="0">



<?php } elseif($cat == $insurance){?>
<p>Paylater</p>
<input type="hidden" name="" id="stat" value="0">
    

<?php } else {?>
    <?php if(empty($consult_payment_private)){?>

        <div class="row">
        <div class="col-md-12 text-danger">
            This is the first visit to this specialty, first visit consultation amount
            <h3 id="amt"><?= (!empty($consult_amt_private[0]['first_visit_amt']) ? 
            $consult_amt_private[0]['first_visit_amt'] : "Pls contact admin to add tariff to this specialty")  ?></h3>
        </div>

        </div>

    <?php }
elseif($consult_payment_private[0]['expirydate'] < date('Y-m-d')){ ?>

<div class="row">
        <div class="col-md-12 text-danger">
            Revisit consultation payment is due for this specialty, last payment was made on <?= $consult_amt_private[0]['tdate'] ?>
            <h3 id="amt"><?= (!empty($consult_amt_private[0]['revisit_amt']) ? 
            $consult_amt_private[0]['revisit_amt'] : "Pls contact admin to add tariff to this specialty") ?></h3>
        </div>

        </div>

<?php } else{ ?>

    <div class="row">
        <div class="col-md-12 text-success">
            Consultation payment not due.
        </div>

        </div>

<?php }} ?>