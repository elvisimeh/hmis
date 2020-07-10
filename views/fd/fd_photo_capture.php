<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(!isset($_SESSION['id'])){
    header("location:../../index");
			exit;
}

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/insert.php');

$select_obj = new SELECT;

$insert_object = new INSERT;

$pid = $_GET['pid'];

$cri = 'WHERE id = '.$pid;
$name = $select_obj->selects('patient_data',$cri)[0];

$prn = $name['prn'];

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>PHOTO UPLOAD</title>
    <link rel="stylesheet" href="../cam/style.css">

    
      
</head>
<body style="background:url('../../assets/images/cam_background.png')">



<div class="layout">
<?php echo strtoupper($name['sname']. ' '. $name['fname']. ' '. $name['oname']) ?>
  <!--<div id="newImages"></div>-->
  
  <div class="row">
    <div class="cell">
      <video id="player" autoplay></video>
    </div>
    <div class="cell"></div>
      <canvas id="canvas" width="320px" height="240px" style="background-color:white !important"></canvas>
    </div>
  </div>
  <div class="center">
    <button class="btn btn-primary" id="capture-btn">Capture</button>
  </div>
  <div id="pick-image">
    <label>Video is not supported. Pick an Image instead</label>
    <input type="file" accept="image/*" id="image-picker">
  </div>
</div>

<script src="../cam/script.js"></script>
<script>var prn = "<?php echo $prn; ?>";</script>
</body>
</html>