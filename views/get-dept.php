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

$id = $_GET['id'];
$data = "sbu_id = $id";
$tbl = "dept_tbl";
$result = $selectObj->selectRecords($tbl,$data);

?>
<p>
	<select name="dept" id="dept" class="form-control" required>
    <option value="Select Dept" selected disabled>Select Dept</option>
		<?php
                 while($drow = pg_fetch_assoc($result)){
			echo '<option value="'.$drow[id].'">'.$drow[deptname].'</option>';
			}
		?>
	   </select></p>
