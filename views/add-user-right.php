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
$userrows = $selectObj->selects('users_tbl');

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
						<font color="#FF0000">Add User Right</font></h3>
                                    </div>
                                </div>
                                <hr/>
											<table border="0" width="100%" cellspacing="4" cellpadding="0" id="table1">
														<tr>
																	<td width="397" valign="top">
                                    <div align="left">
										<table border="0" width="99%" cellpadding="3" id="table2">
											<tr>
												<td width="141" valign="middle">
												<p align="right">
												<font face="Verdana" size="2">
												<b>
												<font color="#808080">
												Username </font></b></font></td>
												<td>
	<select name="uname" id="uname" class="form-control" required onchange ="getRight(this.value)">
    <option value="Select User" selected disabled>Select User</option>
    <?php foreach($userrows as $urow){ ?>
        <option value="<?php echo $urow['id'] ?>"><?php echo $urow['username'] ?></option>
    <?php  } ?>
    </select></td>
											</tr>
											<tr>
												<td width="141" valign="middle">
												<p align="right">
												<font face="Verdana" size="2">
												<b>
												<font color="#808080">
												Select Menu </font></b></font></td>
												<td>
	<select name="menu" id="menu" class="form-control" required onchange ="getSubmenu(this.value)">
    <option value="Select Menu" selected disabled>Select Menu</option>
    <?php foreach($menurows as $mrow){ ?>
        <option value="<?php echo $mrow['id'] ?>"><?php echo $mrow['menu_name'] ?></option>
    <?php  } ?>
    </select></td>
											</tr>
		<tr>
			<td width="141" valign="middle">
			<p align="right" style="line-height: 1.8em; margin: 3px 5px">
			<font face="Verdana" size="2">
			<b>
			<font color="#808080">
			Select
			Submenu </font></b></font></td>
			<td><div id ="sbsuccess">
			<select name="smenu" id="smenu" class="form-control" required size="1" onchange ="addRights(this.value)">
    <option value="Select submenu" selected disabled>Select Submenu</option>
    </select></div></td>
		</tr>
		<tr>
			<td colspan="2"><div class="row m-t-30">
&nbsp;<div id ="ursuccess"></div></td>
											</tr>
										</table>
									</div>
                                			</td>
				<td valign="top">
				<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table3">
							<tr><div id ="mydiv">
										<td>&nbsp;</td>
							</div></tr>
				</table>
																	</td>
				</tr>
			</table>
			<font face="Verdana" size="2"><b>
                                
                                
                                
                                <hr/>
                                
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>