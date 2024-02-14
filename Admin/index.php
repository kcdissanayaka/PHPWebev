<?php 
$title = "LankanMatka";
ob_start();
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
  
	header('Location: login.php');
	exit;
}

include('includes/header.php'); 

include('includes/constants.php'); 



include ('includes/footer.php');
?>