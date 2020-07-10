<?php
include('../config/conn.php');
session_start();
				$staffname= $_SESSION['fname'];
				$dept = $_SESSION['dept'];
				$bcode = $_SESSION['bcode'];
				$ccode = $_SESSION['ccode'];
				$role = $_SESSION['role'];
				$id = $_SESSION['userid'];
				$username= $_SESSION['username'];
			
	if(!isset($staffname)){
		header("location:../index");
		unset($_SESSION['bcode'],$_SESSION['ccode'],$_SESSION['staffname']);
		exit;
	}

	require_once("../config/database.php");
	require_once("../controller/select.php");
	$database = new Database();
	$db = $database->getConnection();
	$selectObj = new select($db);
	$data = "s.status = 'ACTIVE'";
	$resultset = $selectObj->getStaffList($data);

?>
<p align="center"><font color="#FF6A83" face="Verdana" size="4"><b>List of Staff</b></font></p>
<div class="box-body">
									            	<div class="table-responsive">
									                    <table id="portrait_searchdata" class="table table-striped table-bordered table-hover">
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
												
													<tr>
														<th class="center">
															<font color="#52A1FC">#</font><label class="pos-rel"><font color="#52A1FC">
															</font>
																<span class="lbl"></span>
															</label>
														</th>
														<th>
														<font color="#52A1FC">Staff name</font></th>
														<th>
														<font color="#52A1FC">Staff No.</font></th>
														<th class="hidden-480">
														<font color="#52A1FC">Phone No</font></th>
														<th>
															<font color="#52A1FC">Gender
															</font>
														</th>
														<th class="hidden-480">
														<font color="#52A1FC">Department</font></th>

														<th class="hidden-480">
														<font color="#52A1FC">Designation</font></th>

													</tr>
												</thead>

												<tbody>
<?php
$c = 1;
while( $row = mysqli_fetch_assoc($resultset)){
?>
													<tr>
														<td class="center">
														<font face="Times New Roman">
														<p>
														<p>
														<font size="2" color="#000080">
														<?php echo $c;?></font></font></td>

														<td>
															<font face="Times New Roman" size="2" color="#000080">
														<?php echo $row ['staffname']; ?>
															</font>
														</td>
														<td>
														<font face="Times New Roman" size="2" color="#000080"><?php echo $row ['staffno']; ?></font></td>
														<td class="hidden-480">
														<font face="Times New Roman" size="2" color="#000080"><?php echo $row ['phone']; ?></font></td>
														<td>
														<font face="Times New Roman" size="2" color="#000080"><?php echo $row ['gender']; ?></font></td>

														<td class="hidden-480">
														<font size="2" color="#000080">
														<?php echo $row ['stype']; ?>

														</font>

														</td>

														<td class="hidden-480">
														<font size="2" color="#000080">
														<?php echo $row ['des']; ?>

														</font>

														</td>

													</tr>
												<?php $c = $c +1; }?>
												</tbody>
											</table>
											</div>
										</div>