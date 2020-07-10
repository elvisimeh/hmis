

<?php


$pat_fields = "patient_category.categoryname,corporate_client_tbl.corporate_name,pass_path";
$pat_tbl = "patient_data";
$pat_joins = "LEFT JOIN patient_category ON patient_data.pcategoryid = patient_category.id LEFT JOIN
             corporate_client_tbl ON patient_data.sponsorid";

$pat_criteria = "WHERE patient_data.prn = '{$prn}'";

$pat_details = $obj->selects_join($pat_fields,$pat_tbl,$pat_joins,$pat_criteria);

?>