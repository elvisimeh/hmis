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

$rows = $selectObj->selects('item_category_tbl');
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
						<font color="#FF0000">Add New Item</font></h3>
                                    </div>
                                </div>
                                <hr/>
                                <div>
                                    <div align="center">
										<table border="0" width="85%" cellpadding="3">
											<tr>
												<td width="213" valign="middle">
												<p align="right">
												<font face="Verdana" size="2">
												<b>
												<font color="#808080">
												Select Category </font></b></font></td>
												<td>
	<select name="catid" id="catid" class="form-control" required onchange ="getItemSubCategory(this.value)">
    <option value="Select Item category" selected disabled>Select Item category</option>
    <?php foreach($rows as $row){ ?>
        <option value="<?php echo $row['id'] ?>"><?php echo $row['catname'] ?></option>
    <?php  } ?>
    </select></td>
											</tr>
											<tr>
												<td width="213" valign="middle">
												<p align="right">
												<font face="Verdana" size="2">
												<b>
												<font color="#808080">
												Select Subcategory </font></b></font></td>
												<td>
	<div id ="scatsuccess">
	<select name="scatid" id="scatid" class="form-control" required size="1">
    <option value="Select Item Subcategory" selected disabled>Select Item Subcategory</option>
    </select></div></td>
											</tr>
											<tr>
												<td width="213" valign="middle">
												<p align="right" style="line-height: 1.8em; margin: 3px 5px">
												<b>
												<font face="Verdana" size="2" color="#808080">
												Item</font></b><font face="Verdana" size="2"><b><font color="#808080"> Name</font></b></font></td>
												<input type="hidden" name ="id" id ="id" value="<?php echo $id;?>" size="50">
												<td>
												<input type="text" name ="iname" id ="iname" class="form-control form-txt-primary" size="50"></td>
											</tr>
											<tr>
												<td width="213">&nbsp;</td>
												<td><div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="button" id ="submit" name ="submit" class="btn btn-primary btn-md waves-effect text-center m-b-10" onclick="saveItem()">
										Save</button>
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