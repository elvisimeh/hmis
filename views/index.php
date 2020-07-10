<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
				$staffid = $_SESSION['staffid'];				
				$bcode = $_SESSION['bcode'];
				$ccode = $_SESSION['ccode'];
				$role = $_SESSION['role'];
				$id = $_SESSION['id'];
	if(!isset($id)){
		header("location:../index");
		unset($_SESSION['id'],$_SESSION['bcode'],$_SESSION['ccode'],$_SESSION['staffid']);
		exit;
	}

	require_once("../controller/select.php");

	$obj = new select;

	$userid = $_SESSION['id'];
	$rights = $obj->user_rights($userid);
	$menus = $obj->menu($userid);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>HIMS | Main Interface</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <link rel="icon" href="../assets/images/applied-logo.png" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="../assets/icon/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/chosen.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/timepicker.css">
      
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">
      <link rel="stylesheet" href="../assets/chosen/chosen.css">
      <link rel="stylesheet" href="../assets/css/jquery.auto-complete.css">
      <link rel="stylesheet" href="../assets/css/richtext.min.css">
      <link rel="stylesheet" href="../assets/css/site.css">
      
      
      </head>
      <style>
      .messg{
          background-color : green;
                    
      }
      
      
      </style>
  <body>
	  
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
			<?php include('../includes/header.php');?>
            
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
			<?php 
			 include('../includes/sidebar.php');
			 			 
			 ?>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
							<?php 
							include('../includes/dashboard.php');
							
							?>
							
							<hr>
							<div id ="formdiv"></div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<script type="text/javascript" src="../assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="../assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="../assets/js/modernizr/css-scrollbars.js"></script>
<script type="text/javascript" src="../assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<script type="text/javascript" src="../assets/js/script.js"></script>
<script type="text/javascript" src="../assets/js/sidebar_functions.js"></script>
<script type="text/javascript" src="../assets/js/SmoothScroll.js"></script>
<script src="../assets/js/pcoded.min.js"></script>
<script src="../assets/js/vartical-demo.js"></script>
<script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.auto-complete.js"></script>
<script type="text/javascript" src="../assets/js/timepicker.js"></script>

<script type="text/javascript" src="../assets/js/jquery.richtext.min.js"></script>

<script src="../assets/js/loadForms.js"></script>
<script src="../assets/js/processForms.js"></script>

</body>
</html>