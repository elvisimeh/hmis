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

$a = $_GET['a'];
$data = "u.userid = $a";
$result = $selectObj->getUserRight($data);

?>
<div id ="mydiv">
<table border="0" width="35%" cellspacing="3" id="table5">
<tr>
<td width="50" bgcolor="#CCE4F7">
<p align="center" style="margin-top: 0; margin-bottom: 0">
<b><font size="2" face="Verdana" color="#0000FF">S/N</font></b></td>
<td bgcolor="#CCE4F7">
<p align="center" style="margin-top: 0; margin-bottom: 0"><b>
<font face="Verdana" size="2" color="#0000FF">User 
Rights</font></b></td>
<td bgcolor="#FFFFFF">
<p align="center" style="margin-top: 0; margin-bottom: 0">&nbsp;</td>
</tr>
<?php $c = 1; while($row=pg_fetch_assoc($result)){?>
<tr>
<td width="50" bgcolor="#FFFFFF" bordercolor="#C0C0C0">
<p style="margin-top: 0; margin-bottom: 0">
<font size="1" color="#C0C0C0">&nbsp;<?php echo $c;?></font></td>
<td bgcolor="#FFFFFF" bordercolor="#C0C0C0">

<p style="margin: 0 5px; ">
<font face="Verdana" size="1" color="#C0C0C0">&nbsp;<?php echo $row['smname'];?></font></td>
<td bgcolor="#FFFFFF" bordercolor="#C0C0C0">

&nbsp;
<button type="button" class="close" aria-label="Close" style="width: 17; height: 26" onclick ="delRight('<?php echo $row['id'];?>')">
  <font color="#FF0000" size="4">
  <span aria-hidden="true">&times;</span></font>
</button></td>
</tr>
<?php $c = $c +1; }?>
</table>
</div>