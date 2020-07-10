
<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/hims/controller/select.php';
include ($path);

$obj = new select;
$services =  $_GET['serv'];
$servs = explode(",",$services);
//$specialties = $obj->selects('specialty');

if($services != null){
?>

<div>
<table class="table table-hover" style="border:1px">
<thead style="background-color:coral">
<th>S/N</th>
<th>Service Name</th>
<th>Amount</th>
<th></th>
</thead>

<tbody>

<?php $sn=0; foreach($servs as $serv){ 
    if(!empty($serv)){ ?>
<tr>
<td><?php echo ++$sn ?></td>
<td><?php $cri = "WHERE id=".$serv; echo $obj->selects('all__services_tbl',$cri)[0]['servicename']; ?></td>
<td class="serv_amt"><?php $cri2 = "WHERE service_id=".$serv; echo (!empty($obj->selects('private_tariff',$cri2)[0]['agreed_amt'])? $obj->selects('private_tariff',$cri2)[0]['agreed_amt'] : ''); ?></td>
<td><span onclick="delete_order(<?= $serv ?>)" class="fa fa-remove" style="color:#D9534F; font-weight:bold;cursor:pointer;"></span></td>
</tr>

<?php } } ?>

<tr>
<td></td>
<td></td>
<td><strong>Total</strong></td>
<td id="total_amt"></td>
</tr>

</tbody>
</table>


</div>

<?php } ?>