<?php
$user = 'DATABASE_USER';
$password = 'DATABASE_PASSWORD';
$db = 'DATABASE_NAME';
$host = 'localhost';
$port = 3306;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);
if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
?>
