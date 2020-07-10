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

$menurows = $selectObj->selects('menu_tbl');
$rows = $selectObj->selects('sbu_tbl');

?>
<div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form id ="menu_form">
			<input type="hidden" name ="id" id ="id" value="<?php echo $id;?>" size="50">
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">
						<font color="#FF0000">Add New Unit</font></h3>
                                    </div>
                                </div>
											
			<font face="Verdana" size="2"><b>
                                
                                
                                
                                <hr width="75%"/>
                                
                            	<div align="center">
                                
                            	<table border="0" width="75%" cellpadding="3" id="table2">
											<tr>
												<td width="141" valign="middle">
												<p align="right">
												<font face="Verdana" size="2">
												<b>
												<font color="#808080">
												SBU </font></b></font></td>
												<td>
	<select name="sbu" id="sbu" class="form-control" required onchange ="getDept(this.value)">
    <option value="Select SBU" selected disabled>Select SBU</option>
    <?php foreach($rows as $urow){ ?>
        <option value="<?php echo $urow['id'] ?>"><?php echo $urow['sbu_name'] ?></option>
    <?php  } ?>
    </select></td>
											</tr>
											<tr>
												<td width="141" valign="middle">
												<p align="right">
												<font face="Verdana" size="2">
												<b>
												<font color="#808080">
												Select Dept </font></b></font></td>
												<td>
	<div id ="deptsuccess">
	<select name="dept" id="dept" class="form-control" required size="1">
    <option value="Select Dept" selected disabled>Select Dept</option>
    </select>
    </div></td>
											</tr>
		<tr>
			<td width="141" valign="middle" height="41">
			<p align="right" style="line-height: 1.8em; margin: 3px 5px">
			<font face="Verdana" size="2">
			<b>
			<font color="#808080">
			Unit Name </font></b></font></td>
			<td height="41"><div id ="sbsuccess">
			<input type="text" name ="unit" id ="unit" class="form-control form-txt-primary" size="50"></div></td>
		</tr>
		<tr>
			<td colspan="2"><div class="row m-t-30">
<div class="row m-t-30">
<div class="col-md-12">
<button type="button" id ="submit" name ="submit" class="btn btn-primary btn-md waves-effect text-center m-b-10" onclick="saveUnit()">Save 
										Unit</button>
                                    </div>
                                </div></td>
											</tr>
										</table></div>
			</div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>