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

$fno = $_GET['fno'];
$data = "fno = $fno";
$tbl = "account_subgroup";
$result = $selectObj->selectRecords($tbl,$data);

?>
<p>
	<select name="acc1" id="acc1" class="form-control" required onchange ="getAccountClass(this.value)">
    <option value="Select Sub Account" selected disabled>Select Sub Account</option>
		<?php
                 while($drow = pg_fetch_assoc($result)){
			echo '<option value="'.$drow[sno].'">'.$drow[subgroupname].'</option>';
			}
		?>
	   </select></p>
