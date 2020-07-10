<?php
	require_once("../config/database.php");
	require_once("../controller/select.php");
	$database = new Database();
	$db = $database->getConnection();
	$selectObj = new select($db);

$userid = $_GET['id'];
$data = "id = $userid";
	$stmt = $selectObj->getUserProfile($data);
	$r = mysqli_fetch_assoc($stmt);
	$sname = $r['staffname'];
	$uname = $r['username'];
	$password = $r['password'];
	$phone = $r['phone'];
	$email = $r['email'];

?>

<div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material">
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">
										<font color="#FF0000">Edit User 
										Profile</font></h3>
                                    </div>
                                </div>
                                <hr/>
                                <div>
                                    <div align="center">
										<table border="0" width="85%" cellpadding="3">
											<tr>
												<td width="113" valign="middle">
												<p align="right" style="line-height: 1.8em; margin: 3px 5px">
												<font face="Verdana" size="2">
												<b>
												<font color="#808080">Staff Name</font></b></font></td>
												<input type="hidden" name ="id" id ="id" value="<?php echo $id;?>" size="50">
												<td>
												<input type="text" name ="sname" id ="sname" class="form-control form-txt-primary" value="<?php echo $sname;?>" size="50"></td>
											</tr>
											<tr>
												<td width="113" valign="middle">
												<p align="right" style="line-height: 1.8em; margin: 3px 5px">
												<font face="Verdana" size="2">
												<b>
												<font color="#808080">User Name</font></b></font></td>
												<td>
								<input type="text" name ="uname" id ="uname" class="form-control form-txt-primary" value="<?php echo $uname;?>" size="50"></td>
											</tr>
											<tr>
												<td width="113" valign="middle">
												<p align="right" style="line-height: 1.8em; margin: 3px 5px">
												<b>
												<font face="Verdana" size="2" color="#808080">
												Password</font></b></td>
												<td><font face="Verdana" size="2"><b>
          			                <input type="text" name ="password" id ="password" class="form-control form-txt-primary" value="<?php echo $password;?>" size="50"></td>
											</tr>
											<tr>
												<td width="113" valign="middle">
												<p align="right" style="line-height: 1.8em; margin: 3px 5px">
												<b>
												<font face="Verdana" size="2" color="#808080">
												Phone No</font></b></td>
												<td><font face="Verdana" size="2"><b>
                                    			 <input type="text" name ="phone" id ="phone" class="form-control form-txt-primary" value="<?php echo $phone;?>" size="50"></td>
											</tr>
											<tr>
												<td width="113" valign="middle">
												<p align="right" style="line-height: 1.8em; margin: 3px 5px">
												<b>
												<font face="Verdana" size="2" color="#808080">
												Email</font></b></td>
												<td><font face="Verdana" size="2"><b>
                                    <input type="text" name ="email" id ="email" class="form-control form-txt-primary" value="<?php echo $email;?>" size="50"></td>
											</tr>
											<tr>
												<td width="113">&nbsp;</td>
												<td><div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-10" onclick="updateProfile()">Update Profile</button>
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