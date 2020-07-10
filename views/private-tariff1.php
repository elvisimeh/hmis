<?php
include('../controller/select.php');
$selectObj = new select;
	$sid = $_GET['id'];
	$sname = ucwords(strtoupper($_GET['sname']));	
$tbl = "unit_tbl";
$data = "status = 'A' ORDER BY unitname";
$rows = $selectObj->selectRecords($tbl,$data);
	
?>
<div align="center">
&nbsp;<div align="left">
			<table border="1" width="82%" cellpadding="0" bordercolor="#00BCD4" cellspacing="0" style="margin-left: 10; margin-right: 10; border-collapse:collapse" bgcolor="#FFFFFF">
	<tr>
	<td valign="top">
<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
		<div align="left">
			<table border="0" width="856" cellspacing="7" cellpadding="2" id="table1">
	<tr>
		<td width="359">
		<div>
			<p style="margin:0 10px; ">
			</font></span></font>
			<label for="regtype">
			<font size="2" face="Verdana" color="#999999">
			Service Name</font></label></div>
		</td>
		<td width="137">
		<div>
												 <label for="regtype">
												<p style="margin:0 10px; ">
												<font size="2" face="Verdana" color="#999999">
												Amount&nbsp; 
												</font>
          										</label></font></span></font></div>
		</td>
		<td width="268">
		<div id ="ts">
												 <label for="regtype">
												<p style="margin:0 10px; ">
												<font size="2" face="Verdana" color="#999999">
												Unit&nbsp; 
												</font>
          										</label></font></span></font></div>
		</td>
		<td valign="bottom" width="45">
		<p style="margin-left: 10px; margin-right: 10px">&nbsp;</td>
	</tr>
	<tr>
		<td width="359" valign="top">
		<p style="margin-top: -1px; margin-bottom: -1px">
		<input name="sname" readonly ="true" size="40" id = "sname" class="form-control" maxlength="50" style="font-family: Verdana; font-size: 12pt; color: #999999; width:263; background-color:#FFFFFF; height:25" value="<?php echo $sname;?>"></td>
		<input type ="hidden" name="sid" readonly ="true" size="40" id = "sid" class="form-control" maxlength="50" value="<?php echo $sid;?>"></td>
		<td width="137" valign="top">
		<p style="margin-top: -1px; margin-bottom: -1px">
		<input name="amt" size="40" required id = "amt" class="form-control" maxlength="50" style="font-family: Verdana; font-size: 12pt; color: #333333; width:121; background-color:#FFFFFF; height:22"></td>
		<td width="268" valign="top">
		<p style="margin-top: -1px; margin-bottom: -1px">
    <select name="select" class="form-control" size="1" name ="unit" id ="unit">
        <option value="Select Unit">Select Unit</option>
                 <?php
                   while($row = pg_fetch_assoc($rows)){
				echo '<option value="'.$row[id].'">'.ucwords(strtoupper($row[unitname])).'</option>';
				}
			?>   
   </select></td>
		<td width="45" valign="top">
		<button class="btn btn-primary" onclick ="savePrivateAmt()"><i class="icofont icofont-check-circled"></i></button>
		</td>
	</tr>
</table></div>
      
    </section>
    <div align ="center">
		<p style="margin:0 10px; "></div>
    <!-- Main content -->
    <section class="content">

    </section>
  </div>
	<aside class="control-sidebar control-sidebar-dark">
    <!-- Tab panes -->
    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
</div>
</td>
	</tr>
</table>
</div>
</div>