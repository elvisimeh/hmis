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
	$data = "allocate_status = 'NO' OR allocate_status = 'YES'";
	$resultset = $selectObj->getStudentNotInClass($data);

?>
<p align="center"><font color="#FF6A83" face="Verdana" size="4"><b>List of Student</b></font><b><font face="Verdana" size="4" color="#FF6A83"> 
Registered</font></b></p>
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
														<font color="#52A1FC">Studname</font></th>
														<th>
														<font color="#52A1FC">Stud No.</font></th>
														<th class="hidden-480">
														<font color="#52A1FC">School</font></th>
														<th>
															<font color="#52A1FC">Gender
															</font>
														</th>
														<th class="hidden-480">
														<font color="#52A1FC">Class</font></th>

														<th class="hidden-480">
														<font color="#52A1FC">Phone No</font></th>

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
														<?php echo $c;?></font></td>

														<td>
															<font face="Times New Roman" size="2">
														<?php echo $row ['studname']; ?>
															</font>
														</td>
														<td>
														<font face="Times New Roman" size="2"><?php echo $row ['studno']; ?></font></td>
														<td class="hidden-480">
														<font face="Times New Roman" size="2"><?php echo $row ['sch']; ?></font></td>
														<td>
														<font face="Times New Roman" size="2"><?php echo $row ['gender']; ?></font></td>

														<td class="hidden-480">
														<font size="2">
														<?php echo $row ['clas_apply']; ?>

														</font>

														</td>

														<td class="hidden-480">
														<font size="2">
														<?php echo $row ['emergency']; ?>

														</font>

														</td>

													</tr>
												<?php $c = $c +1; }?>
												</tbody>
											</table>
											</div>
										</div>