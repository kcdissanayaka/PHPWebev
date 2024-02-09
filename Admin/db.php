<?php
$servername = "php24-db-1"; // Replace with your MySQL server hostname
$username = "root";     // Replace with your MySQL username
$password = "password";     // Replace with your MySQL password
$dbname = "LankanMatka";       // Replace with the name of your MySQL database

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>