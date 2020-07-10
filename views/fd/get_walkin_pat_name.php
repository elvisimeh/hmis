<?php

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

$obj = new select;

$search = $_POST['searchTerm'];

$data  = $obj->pat_name_search($search);

$data2 = $obj->selects('walkin_record_tbl',"WHERE CONCAT(first_name,' ',last_name) ILIKE '%".$search."%'");

$data3 = [];
foreach ($data2 as $d2){
    $data[] = array("id"=>$d2['id'],"text"=>$d2['first_name'].' '.$d2['last_name']);
}

echo json_encode($data);
?>