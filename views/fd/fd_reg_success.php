
<?php   

session_start();

if(!isset($_SESSION['id'])){
    header("location:../../index");
			exit;
}

?>


<p>Patient Registered Successfully!</p>

