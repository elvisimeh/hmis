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

$c = $_GET['c'];
$data = "service_cat_id = $c";
$tbl = "service_subcategory_tbl";
$result = $selectObj->selectRecords($tbl,$data);
?>
<p>
	<select name="scatid" id="scatid" class="form-control" required>
    <option value="Select Subservice category" selected disabled>Select Subservice category</option>
		<?php
                 while($crow = pg_fetch_assoc($result)){
			echo '<option value="'.$crow[id].'">'.$crow[subcatname].'</option>';
			}
		?>
	   </select></p>
