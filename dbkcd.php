<?php
$servername = "phpsrv-db-1";
$username   = "lankanmtka";
$password   = "Abc@112211";
$dbname     = "lankanmtka";

//created a database connection
$conn = new mysqli($servername,$username,$password,$dbname);

// Verify the DB Connection
if($conn->connect_error){
    die("connection Failed:". $conn->connect_error);
} else {
    //echo "success";
}

?>