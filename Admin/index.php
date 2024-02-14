<?php 
$title = "LankanMatka";
ob_start();
session_start();

if(isset($_SESSION["emploggedin"])){

  if($_SESSION["emploggedin"] === false)
  {
    header("location: login.php");
    exit;
  }
  else
  {
    if($_SESSION["emproleid"] == ADMIN)
    {
      header("location: index.php");
      exit;
    }
    elseif($_SESSION["emproleid"] == MODERATOR)
    {
      header("location: index.php");
      exit;
    }else
{
  header("location: login.php");
  exit;
}
  }
}

include('includes/header.php'); 

include('includes/constants.php'); 



include ('includes/footer.php');
?>