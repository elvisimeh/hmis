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

$rows = $selectObj->selects('all__services_tbl');
?>

<?php include("../includes/datatbl-style.php");?>
        	<div class="col-lg-9 hms-white-bkg" style="margin-left:5px; margin-top:2px;margin-bottom:10px;">
            <div class="row">
            	<div class="box-body">
            	<div class="table-responsive">
                    <div align="center">
                    <table id="portrait_searchdata" class="table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="background-color:#0066FF; color:#fff">SN</th>
                                <th style="background-color:#0066FF; color:#fff">Services name</th>
                                <th style="background-color:#0066FF; color:#fff">Department</th>
                                <th style="background-color:#0066FF; color:#fff">Unit Cost</th>
                                <th style="background-color:#0066FF; color:#fff">Unit Sales</th>
                                <th style="background-color:#0066FF; color:#fff">Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                        </tfoot>
                        <tbody>
					<?php $c = 1; foreach($rows as $row){ ?>
                        	<tr>
                            <td><?php echo $c;?></td>
                            <td><a href="javascript:void(0)" onclick = "updatePrivateTariff('<?php echo $row['id'];?>')" data-toggle="tooltip" data-placement="top" title="Click to add Price and department"><?php echo $pname = $row['servicename'];?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
				<?php $c = $c + 1;}?>
                        </tbody>
                    </table>
                	</div>
                </div>
                </div>
            </div>
        </div>
<?php include("../includes/datatbl-script.php");?>