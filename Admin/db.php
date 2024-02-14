<?php
$servername = "phpsrv-db-1";  /*phpsrv-db-1 ' * mujitha db php24-db-1*/
$username = "lankanmtka";
$password = "1234";
$dbname = "lankanmtka";

// create db connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check db connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

?>


