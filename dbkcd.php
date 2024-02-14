<?php
$servername = "phpsrv-db-1"; /*"phpsrv-db-1"; Kasun DB */
$username   = "lankanmtka";
$password   = "1234";
$dbname     = "lankanmtka";

//created a database connection
$conn = new mysqli($servername,$username,$password,$dbname);

// Verify the DB Connection
if($conn->connect_error){
    die("connection Failed:". $conn->connect_error);
}

?>