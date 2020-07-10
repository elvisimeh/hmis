<?php
	session_start();
    $_SESSION['username'] = NULL;
    unset($_SESSION['staffname']);
    unset($_SESSION['bcode']);
    unset($_SESSION['ccode']);
    unset($_SESSION['dept']);
    unset($_SESSION['role']);
    unset($_SESSION['userid']);
    session_destroy();  	
	header("location:../index");
?>