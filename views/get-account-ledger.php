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

$tno = $_GET['tno'];
$data = "tno = $tno";
$tbl = "account_ledgers";
$result = $selectObj->selectRecords($tbl,$data);
?>
<p>
	<select name="ledger" id="ledger" class="form-control" required style="font-size: 12pt; letter-spacing: 1; font-family: Verdana; color: #808080; font-weight: bold" size="1">
    <option value="Select Account Ledger" selected disabled>Select Account Ledger</option>
		<?php
                 while($crow = pg_fetch_assoc($result)){
			echo '<option value="'.$crow[ledgerno].'">'.$crow[ledgername].'</option>';
			}
		?>
	   </select></p>
