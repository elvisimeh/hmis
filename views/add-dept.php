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

$rows = $selectObj->selects('sbu_tbl');
?>
<div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form id ="menu_form">
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">
						<font color="#FF0000">Add new 
						Department</font></h3>
                                    </div>
                                </div>
                                <hr/>
                                <div>
                                    <div align="center">
										<table border="0" width="85%" cellpadding="3">
											<tr>
												<td width="141" valign="middle">
												<p align="right">
												<font face="Verdana" size="2">
												<b>
												<font color="#808080">
												Select Menu </font></b></font></td>
												<td>
	<select name="sbu" id="sbu" class="form-control" required>
    <option value="Select SBU" selected disabled>Select SBU</option>
    <?php foreach($rows as $row){ ?>
        <option value="<?php echo $row['id'] ?>"><?php echo $row['sbu_name'] ?></option>
    <?php  } ?>
    </select></td>
											</tr>
		<tr>
			<td width="141" valign="middle">
			<p align="right" style="line-height: 1.8em; margin: 3px 5px">
			<b>
			<font face="Verdana" size="2" color="#808080">
			Dept</font></b><font face="Verdana" size="2"><b><font color="#808080">
			Name</font></b></font></td>
			<input type="hidden" name ="id" id ="id" value="<?php echo $id;?>" size="50">
			<td>
			<input type="text" name ="dept" id ="dept" class="form-control form-txt-primary" size="50"></td>
		</tr>
		<tr>
			<td width="141">&nbsp;</td>
			<td><div class="row m-t-30">
<div class="col-md-12">
<button type="button" id ="submit" name ="submit" class="btn btn-primary btn-md waves-effect text-center m-b-10" onclick="saveDept()">Save 
										Dept</button>
                                    </div>
                                </div></td>
											</tr>
										</table>
									</div>
                                </div><font face="Verdana" size="2"><b>
                                <div class="input-group">
                                    &nbsp;<span class="md-line"></span></div>
                                
                                
                                <hr/>
                                
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>