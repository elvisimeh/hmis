<?php

include($_SERVER['DOCUMENT_ROOT'].'/hims/controller/select.php');

include($_SERVER['DOCUMENT_ROOT'].'/hims/const/constants.php');




$obj = new select;

$search = $_POST['searchTerm'];

$data2 = $obj->selects('all__services_tbl',"WHERE service_category_id =".$immunization_id." AND 
servicename ILIKE '%".$search."%'");

$data3 = [];
foreach ($data2 as $d2){
    $data[] = array("id"=>$d2['id'],"text"=>$d2['servicename']);
}

echo json_encode($data);
?>