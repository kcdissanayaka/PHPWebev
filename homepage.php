<?php
session_start(); // Start the session
require('db.php');

// Check if user is not logged in, display message and exit
if(!isset($_SESSION['isUserLoggedIn']) || $_SESSION['isUserLoggedIn'] !== true){
    echo "<p>User is not logged in. Please log in first.</p>";
    exit();
}

?>

<html lang="en">
   
<head>
   <title>LankanMatka Customer Home Page</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
      
   <style>
      body {
         padding-top: 40px;
         padding-bottom: 40px;
         background-color: #ADABAB;
      }
         
      .container {
         max-width: 1200px;
         margin: 0 auto;
         color: #017572;
      }

      .navbar {
         background-color: #017572;
      }

      .navbar-brand {
         color: white;
      }

      .nav-link {
         color: white;
      }

      .nav-link:hover {
         color: #ADABAB;
      }

      .nav-link.active {
         color: #ADABAB;
         font-weight: bold;
      }

      .card {
         margin: 10px;
      }

      .card-img-top {
         height: 200px;
         object-fit: cover;
      }

      .card-title {
         font-size: 20px;
      }

      .card-text {
         font-size: 16px;
      }

      .card-link {
         color: #017572;
      }

      .card-link:hover {
         color: #ADABAB;
      }

      .table {
         margin: 10px;
      }

      .table th {
         font-size: 18px;
      }

      .table td {
         font-size: 16px;
      }

      .btn {
         margin: 10px;
      }

      .btn-primary {
         background-color: #017572;
         border-color: #017572;
      }

      .btn-primary:hover {
         background-color: #ADABAB;
         border-color: #ADABAB;
      }

      .form-control {
         margin: 10px;
      }

      .form-control:focus {
         border-color: #017572;
      }

      .rating {
         margin: 10px;
      }

      .rating input {
         display: none;
      }

      .rating label {
         float: right;
         display: inline;
         padding: 0;
         margin: 0;
         position: relative;
         width: 1em;
         cursor: pointer;
         color: #ADABAB;
      }

      .rating label:hover,
      .rating label:hover ~ label,
      .rating input:checked ~ label {
         color: #017572;
      }

      .rating label:hover:before,
      .rating label:hover ~ label:before,
      .rating input:checked ~ label:before {
         content: "\2605";
         position: absolute;
         left: 0;
         color: #017572;
      }

      h1, h2, h3, h4, h5, h6 {
         color: #017572;
      }

      .alert {
         margin: 10px;
      }

      .alert-success {
         background-color: #017572;
         border-color: #017572;
      }

      .alert-danger {
         background-color: #ADABAB;
         border-color: #ADABAB;
      }

      .alert a {
         color: white;
      }

      .alert a:hover {
         color: #ADABAB;
      }
   </style>
</head>
	
<body>
   <div class="container">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark">
         <a class="navbar-brand" href="user_home.php">LankanMatka</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" href="user_home.php">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="user_bookings.php">Bookings</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="user_profile.php">Profile</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="user_feedback.php">Feedback</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.php">Logout</a>
               </li>
            </ul>
         </div>
      </nav>
      <!-- Greeting -->
      <div class="row">
         <div class="col-md-12">
         <h1>Welcome Customer</h1>
         <h2><?=$_SESSION['emailId']?></h2>
            <img src="<?php echo $user['profile_pic']; ?>" alt="Profile Picture" class="rounded-circle" width="100" height="100">
         </div>
      </div>
      <!-- Buttons -->
      <div class="row">
         <div class="col-md-12">
            <h2>Choose your action</h2>
            <div class="btn-group" role="group">
               <button class="btn btn-primary" onclick="window.location.href='user_display_packages.php'">Display Travel Packages</button>
               <button class="btn btn-primary" onclick="window.location.href='user_navigate_packages.php'">Navigate Travel Packages</button>
               <button class="btn btn-primary" onclick="window.location.href='user_select_packages.php'">Select Travel Packages</button>
               <button class="btn btn-primary" onclick="window.location.href='user_reserve_packages.php'">Reserve Travel Packages</button>
               <button class="btn btn-primary" onclick="window.location.href='user_display_bookings.php'">Display User's Bookings Report</button>
               <button class="btn btn-primary" onclick="window.location.href='user_navigate_bookings.php'">Navigate User's Bookings</button>
               <button class="btn btn-primary" onclick="window.location.href='user_edit_bookings.php'">Edit Bookings</button>
               <button class="btn btn-primary" onclick="window.location.href='user_navigate_available_packages.php'">Navigate Available Packages</button>
               <button class="btn btn-primary" onclick="window.location.href='user_select_available_packages.php'">Select Available Packages</button>
               <button class="btn btn-primary" onclick="window.location.href='user_reserve_available_packages.php'">Reserve Available Packages</button>
               <button class="btn btn-primary" onclick="window.location.href='user_feedback.php'">Feedback and Rating</button>
            </div>
         </div>
      </div>
      <!-- Footer -->
      <?php include 'footer.php'; ?>      
   </div> 
</body>
</html>