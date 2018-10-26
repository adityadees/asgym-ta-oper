<?php
$hostnm="localhost";
$usrnm="root";
$pass="";
$dbnm="asgym";

$db=New Mysqli("$hostnm","$usrnm","$pass","$dbnm");
if ($db->connect_error) {
 	die('Sorry ! Connection Not Found:'. $db->connect_error);
 } 
?>