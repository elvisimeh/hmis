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

$a = $_GET['a'];
$data = "menu_id = $a";
$tbl = "submenu_tbl";
$result = $selectObj->selectRecords($tbl,$data);

?>
<p>
	<select name="smenu" id="smenu" class="form-control" required onchange ="addRights(this.value)">
    <option value="Select Submenu" selected disabled>Select Submenu</option>
		<?php
                 while($row = pg_fetch_assoc($result)){
			echo '<option value="'.$row[id].'">'.$row[submenu_name].'</option>';
			}
		?>
	   </select></p>
