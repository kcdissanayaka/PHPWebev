<?php
$servername = "php24-db-1"; /*"phpsrv-db-1"; Kasun DB */
$username = "LankanMatka";
$password = "1234";
$dbname = "LankanMatka";

// create db connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check db connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

?>