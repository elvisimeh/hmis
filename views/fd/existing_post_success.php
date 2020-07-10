
<?php   

session_start();

if(!isset($_SESSION['id'])){
    header("location:../../index");
			exit;
}

?>


<p>Existing Patient Posted Successfully!</p>

