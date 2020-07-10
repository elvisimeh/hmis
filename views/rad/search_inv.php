<?php

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/const/constants.php');

$obj = new select;

$search = $_POST['searchTerm'];

$data  = $obj->search_lab_inv($search,$rad);

echo json_encode($data);
?>