<?php
$servername = "php24-db-1";
$username = "app1";
$password = "password";
$dbname = "app1";

// create db connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check db connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
} 

?>


