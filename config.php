<?php 
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'nss';
$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
	die('Could not able to connect to databse' .$conn->connect_error);
	// code...
}
?>
