<?php 
$title = "LankanMatka";
ob_start();
session_start();

include('includes/header.php'); 

include('includes/constants.php'); 


if(isset($_SESSION["emploggedin"])){

  if($_SESSION["emploggedin"] === false)
  {
    header("location: login.php");
    exit;
  }
}
include ('includes/footer.php');
?>