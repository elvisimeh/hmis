<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HMIS | Private Tariff listing</title>

<link href="../plugins/assets/css/hms-styles.css" rel="stylesheet" type="text/css">
<link href="../plugins/assets/css/bootstrap.min.css" rel="stylesheet" type ="text/css">

<?php include("../include/datatbl-style.php");?>
</head>
    <?php include('../include/create-div-forms.php');?>
<body style="background-color: #8DBDD8">
	<div class="row">       
        

        <div class="col-md-9 col-sm-9 hms-white-bkg" style="margin-left:150px; margin-top:15px;margin-bottom:2px;">
        <div><h4 style="color:#e51502;"><a href ="javascript:history.go(-1);">Close</a></h4></div>
         <h3 style="color:#006600;" align ="center">Intelligent Sales Application</h3> 
				<p align="left"> 
				<font size ="4px" color ="#FF6600" align ="center">Products Price Adjustment Report</font><font color="#FF6600">
				</font>
        </div>
        <div class="col-lg-9 hms-white-bkg" style="margin-left:150px; margin-top:2px;margin-bottom:20px;">
        </div>
        	<div class="col-lg-9 hms-white-bkg" style="margin-left:150px; margin-top:2px;margin-bottom:20px;">
            <div class="row">
            	<div class="box-body">
            	<div class="table-responsive">
                    <div align="center">
                    <table id="portrait_searchdata" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="background-color:#005384; color:#fff">SN</th>
                                <th style="background-color:#005384; color:#fff">DATE</th>
                                <th style="background-color:#005384; color:#fff">PRODUCT NAME</th>
                                <th style="background-color:#005384; color:#fff">PREVIOUS UNIT COST</th>
                                <th style="background-color:#005384; color:#fff">NEW UNIT COST</th>
                                <th style="background-color:#005384; color:#fff">PREVIOUS UNIT SALES</th>
                                <th style="background-color:#005384; color:#fff">NEW UNIT SALES</th>
                                <th style="background-color:#005384; color:#fff">MODIFY BY</th>
                            </tr>
                        </thead>
                        <tfoot>
                        </tfoot>
                        <tbody>
						<?php $c = 1; while($row=mysqli_fetch_assoc($trans)){?>
                        	<tr>
                            <td><?php echo $c;?></td>
                            <td><?php echo $pname = $row['tdate'];?></td>
                            <td><?php echo $pname = $row['pname'];?></td>
                            <td><?php echo $ucost = $row['pcost'];?></td>
                            <td><?php echo $usales = $row['ncost'];?></td>
                            <td><?php echo $usales = $row['psales'];?></td>
                            <td><?php echo $usales = $row['nsales'];?></td>
                            <td><?php echo $usales = $row['sname'];?></td>
                        </tr>
						<?php $c = $c + 1;}?>
                        </tbody>
                    </table>
                	</div>
                </div>
                </div>
            </div>
        </div>
         	
  
         
    </div>
    
   
    <div class="modal fade" id="setupcorporate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              
            </div>
        </div>
    </div>
 <script src="../plugins/assets/sales.js"></script>
     
  <script src="../plugins/assets/hms-js/jquery-1.11.1.min.js"></script>
  <script src="../plugins/assets/hms-js/bootstrap.min.js"></script>
  <script src="../plugins/assets/hms-js/jquery.backstretch.min.js"></script>
<script src="../plugins/assets/hms-js/custom-js.js"></script>


<?php include("../include/datatbl-script.php");?>
 
	
</body>
</html>