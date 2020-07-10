

<?php $stat = urldecode($_GET['stat']); ?>

<?php if($stat > 0){?>
<div class="row">
    
<div style="margin-left:80%">
<button type="button" class="btn btn-primary" id="submit">Send to pay point</button>
</div>
</div>

<?php } elseif($stat == "Pls contact admin to add tariff to this specialty"){?>

    <div class="row">
    
<div style="margin-left:80%">
<button type="button" class="btn btn-danger" id="submit" disabled>Send to pay point</button>
</div>
</div>

<?php } else {?>

    <div class="row">
    
<div style="margin-left:80%">
<button type="button" class="btn btn-primary" id="submit">Send for vital signs</button>
</div>
</div>

<?php }  ?>


<script>
$.getScript('../assets/js/fd_check_payment.js');


</script>