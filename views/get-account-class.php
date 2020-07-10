<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if(!isset($_SESSION['id'])){
    header("location:../../index");
			exit;
}
include('../controller/select.php');
$selectObj = new select;

$sno = $_GET['sno'];
$data = "sno = $sno";
$tbl = "account_class";
$result = $selectObj->selectRecords($tbl,$data);
?>
<p>
	<select name="aclass" id="aclass" class="form-control" required onchange ="getAccountLedger(this.value)">
    <option value="Select Account Class" selected disabled>Select Account Class</option>
		<?php
                 while($crow = pg_fetch_assoc($result)){
			echo '<option value="'.$crow[tno].'">'.$crow[cname].'</option>';
			}
		?>
	   </select></p>
