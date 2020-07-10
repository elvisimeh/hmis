<?php
$host = "localhost";
$dbuser = "mclinic";
$pass = "Applied1010.";
$dbname = "mclinicdb";
$port = 5432;

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser password=$pass");
        
?>
