<?php
include "../controller/select.php";

$selectObj = new select;

if(isset($_POST['commit']))
   	{
   
   		$username = $_POST['username'];
   		$password = $_POST['password'];
   		$data = "username = '$username' AND password = '$password'";	
		$check = $selectObj->userLoginValidationPDOVersion($data);
	     $count = count($check);
	   		if($count > 0){
	   		//echo 'Correct'; exit;
                        $staffid = $check['staffid'];
                    	$role = $check['role'];
                    	$bcode = $check['bcode'];
						$ccode = $check['ccode'];
						$id = $check['id'];
						
						session_start();
						$_SESSION['staffid'] = $staffid;
						$_SESSION['role'] = $role;
						$_SESSION['bcode'] = $bcode;
						$_SESSION['ccode'] = $ccode;
						$_SESSION['id'] = $id;

	header("location:../views/index");	
	exit;
}	   
  else{
	   $msg = "Invalid username and/or password";
  }
}

?>