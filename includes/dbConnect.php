<?php

// $hostname = 'localhost';
// $dbuser = 'coinmmeo_cso';
// $dbpassword ='drunkman';
// $dbname = 'coinmmeo_coinever';

$hostname = 'localhost';
$dbuser = 'root';
$dbpassword ='';
$dbname = 'general';

$conn = new mysqli($hostname, $dbuser, $dbpassword, $dbname);

if($conn->connect_error){
    die('Database error: ' . $conn->error);
}

?>