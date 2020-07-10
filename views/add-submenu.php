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

$rows = $selectObj->selects('menu_tbl');
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
						<font color="#FF0000">Add new Submenu</font></h3>
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
	<select name="menu" id="menu" class="form-control" required>
    <option value="Select Menu" selected disabled>Select Menu</option>
    <?php foreach($rows as $row){ ?>
        <option value="<?php echo $row['id'] ?>"><?php echo $row['menu_name'] ?></option>
    <?php  } ?>
    </select></td>
											</tr>
		<tr>
			<td width="141" valign="middle">
			<p align="right" style="line-height: 1.8em; margin: 3px 5px">
			<font face="Verdana" size="2">
			<b>
			<font color="#808080">
			Submenu Name</font></b></font></td>
			<input type="hidden" name ="id" id ="id" value="<?php echo $id;?>" size="50">
			<td>
			<input type="text" name ="smname" id ="smname" class="form-control form-txt-primary" size="50"></td>
		</tr>
		<tr>
			<td width="141">
			<p align="right">
			<font face="Verdana" size="2">
			<b>
			<font color="#808080">
			Function Name </font></b></font></td>
			<td>
			<input type="text" name ="fname" id ="fname" class="form-control form-txt-primary" size="50"></td>
											</tr>
		<tr>
			<td width="141">&nbsp;</td>
			<td><div class="row m-t-30">
<div class="col-md-12">
<button type="button" id ="submit" name ="submit" class="btn btn-primary btn-md waves-effect text-center m-b-10" onclick="saveSubMenu()">Save 
										Submenu</button>
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