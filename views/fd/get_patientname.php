<?php

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

$obj = new select;

$search = $_POST['searchTerm'];

$data  = $obj->pat_name_search($search);

echo json_encode($data);
?>