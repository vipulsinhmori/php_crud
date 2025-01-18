<?php
$host = 'localhost';
$username = 'root';
$password = ''; 
$database = 'admin';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    echo 'Connection failed: ' . mysqli_connect_error(); 
    exit();
}
?>
