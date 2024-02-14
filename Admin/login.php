<?php
ob_start();
session_start();
include('includes/header-cdn.php');
include('includes/constants.php');

if(isset($_SESSION["emploggedin"])){

  if($_SESSION["emploggedin"] === false)
  {
    header("location: login.php");
    exit;
  }
}
// Include config file
require_once "admindb.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT * FROM STAFFREG WHERE USERNAME = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $first_name, $last_name, $role, $phone_number, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                               session_start();
                            
                            // Store data in session variables
                             $_SESSION["emploggedin"] = true;
                             $_SESSION["empid"] = $id;
                             $_SESSION["empFirstname"] = $first_name;
                             $_SESSION["emplastname"] = $last_name;
                             $_SESSION["empRole"] = $role;
                             $_SESSION["empPhonenumber"] = $phone_number;
                             $_SESSION["empusername"] = $username;                         

                            header("location: index.php");
                          } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            if(!empty($username_err))
                {
                  $_SESSION['status'] = $username_err;
                }

            if(!empty($password_err))
                {
                  $_SESSION['status'] = isset($_SESSION['status'])? $_SESSION['status'] . $password_err: $password_err;
                }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    else
        {
          if(!empty($username_err))
                {
                  $_SESSION['status'] = $username_err;
                }

            if(!empty($password_err))
                {
                  $_SESSION['status'] = isset($_SESSION['status'])? $_SESSION['status'] . $password_err: $password_err;
                }
        }
    
    // Close connection
    mysqli_close($conn);
}
?>




<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Employee Login</h1>
                <?php

                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                    }
                ?>
              </div>

                <form class="user" action="login.php" method="POST">

                    <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-user" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                    <hr>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
