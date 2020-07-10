<?php

include('../controller/select.php');

$obj = new select;

$name = urldecode($_GET['term']);

$criteria = "WHERE (sname ILIKE '%$name%' AND mortality_status = 'I') OR 
(fname ILIKE '%$name%' AND mortality_status = 'I') OR (oname ILIKE '%$name%' AND mortality_status = 'I')";
$sugg = $obj->sname_suggest($criteria);

echo json_encode($sugg);
?>


