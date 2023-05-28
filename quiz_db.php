<?php
$db_host = 'localhost'; 
$db_name = 'creslms';
$db_user = 'root';
$db_pass = '';
//Create magli object
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
//Error Handler
if($mysqli->connect_error) {
printf("Connect failed: sin", $mysqli->connect_error); 
exit();
}
?>