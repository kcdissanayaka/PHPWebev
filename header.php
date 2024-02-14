<?php
session_start();
include 'db.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=AR+One+Sans&display=swap">
    <link rel="stylesheet" href="styles/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <body>
        
    <div class="container">
        
        <div class="row">
            <div class="col">
                <header class="header">
                    <a href="" class="logo"><img src="assets/images/logo/logo.png" alt="LankanMatka"></a>
                    <nav class="navbar navbar-expand-md">
                        <ul class="sidebar">
                        <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#booking">Book</a></li>
                        <li><a href="#plan">Packages</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="TravelPkgs.php">Gallery</a></li>
                        <li><a href="#footer">Contact Us</a></li>
                        <li><a href=""><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                        </ul>
                        <ul>
                        <li class="hideOnMobile"><a href="index.php">Home</a></li>
                        <li class="hideOnMobile"><a href="#booking">Book</a></li>
                        <li class="hideOnMobile"><a href="#plan">Packages</a></li>
                        <li class="hideOnMobile"><a href="#services">Services</a></li>
                        <li class="hideOnMobile"><a href="#gallery">Gallery</a></li>
                        <li class="hideOnMobile"><a href="#footer">Contact Us</a></li>
                        <li class="hideOnMobile"><a href="login.php" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                        <li class="hideOnMobile"><a href="cus_reg.php" data-toggle="modal" data-target="#contact-modal">Register</a></li>
                        <li onclick="showSidebar()" class="menu-button"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
                        </ul>
                    </nav>

                    <script>
                        function showSidebar() {
                            const sidebar = document.querySelector('.sidebar');
                            sidebar.style.display = 'flex';
                        }
                    
                        function hideSidebar() {
                            const sidebar = document.querySelector('.sidebar');
                            sidebar.style.display = 'none';
                        }
                        
                    </script>
                </header>
            </div>
        </div>
        <section id="home">
            <div class="section text-center">
                <div class="row">
                    <div class="textOnVideo col">
                        <h1>ADVENTURE AWAITS YOU</h1>
                        <h3>Explore new places with us, with lifelong memories</h3>
                    </div>
                    <div class="video-container col embed-responsive embed-responsive-16by9">
                        <video autoplay muted loop class="video-bg embed-responsive-item">
                            <source src="assets/video/ambuluwawa.mp4">
                        </video>
                        <a href="#booking" class="btn btn-warning btn-header-book mx-auto">Book Now</a>
                    </div>
                </div>
            </div>
                    </section>

                        
    <div id="contact">
	<div id="contact-modal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
                	<h3>Customer Registration</h3>
					<a href="" class="close" data-dismiss="modal">×</a>
				</div>
				<form id="contactForm" name="contact" role="form">
					<div class="modal-body">				
						<div class="form-group">
							<label for="firstname">First Name</label>
							<input type="text" name="fname" class="form-control" id="firstname" placeholder="Enter your first name" required>
						</div>
						<div class="form-group">
							<label for="lastname">Last Name</label>
							<input type="text" name="lname" class="form-control" id="lastname" placeholder="Enter your last name" required>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" class="form-control" id="email" placeholder="Enter your email address" required>
						</div>
                        <div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control" id="username" placeholder="Choose a username" required>
						</div>	
                        <div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Enter a password" required>
						</div>				
					</div>
					<div class="modal-footer">					
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-success" id="submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


    <script>
$(document).ready(function () {
  $("#contactForm").submit(function (event) {
    event.preventDefault();

    // Form validation
    var firstName = $("#firstname").val().trim();
    var lastName = $("#lastname").val().trim();
    var email = $("#email").val().trim();
    var username = $("#username").val().trim();
    var password = $("#password").val().trim();

    // Check if fields are not empty
    if (firstName === '' || lastName === '' || email === '' || username === '' || password === '') {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'All fields are required!'
      });
      return false;
    }

    // Validate email format
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      Swal.fire({
        icon: 'error',
        title: 'Invalid Email',
        text: 'Please enter a valid email address'
      });
      return false;
    }

    // Check if firstname is at least 5 characters
    if (firstName.length < 5) {
      Swal.fire({
        icon: 'error',
        title: 'Invalid First Name',
        text: 'First name must be at least 5 characters long'
      });
      return false;
    }

    // Check if password includes a special character
    var specialCharPattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    if (!specialCharPattern.test(password)) {
      Swal.fire({
        icon: 'error',
        title: 'Weak Password',
        text: 'Password must include a special character'
      });
      return false;
    }

    // Perform AJAX form submission if all validations pass
    var formData = {
      firstname: firstName,
      lastname: lastName,
      email: email,
      username: username,
      password: password
    };

    $.ajax({
      type: "POST",
      url: "cus_add_process.php",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      Swal.fire({
        title: "Registered",
        text: "You have successfully Registered",
        icon: "success"
      });
      $("#contactForm")[0].reset();
    });

  });
});
</script>

	

<?php
// Ensure the emailid key exists in $_POST
if(isset($_POST['login']) && isset($_POST['emailid']) && isset($_POST['password'])){
    $email = trim($_POST['emailid']); // Trim to remove whitespace
    $password = $_POST['password'];

    // Check if database connection exists
    if ($conn) {
        $query = "SELECT * FROM CUSTOMER_REG WHERE EMAIL = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if($user){
            // Verify the password
            if(password_verify($password, $user['PASSWORD'])){
                // Password is correct
                session_start();
                $_SESSION['isUserLoggedIn'] = true;
                $_SESSION['emailId'] = $email;
                echo "<script>window.location.href='homepage.php?user_loggedin';</script>";
                exit();
            } else {
                // Incorrect password
                $error = "Incorrect Email or Password !";
            }
        } else {
            // User not found
            $error = "User not found !";
        }
    } else {
        // Database connection issue
        $error = "Database connection error.";
    }
}
?>


 <!-- User Login Modal -->
 <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Customer Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if(isset($error)){ ?>
                <script>
                    Swal.fire({
                        title: 'Error',
                        text: '<?php echo $error; ?>',
                        icon: 'error',
                        showCancelButton: true,
                        confirmButtonText: 'Login Again',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#loginModal').modal('show');
                        }
                    });
                </script>
                <?php } ?>

                <form method="post" class="text-center">
                    <div class="form-group text-center">
                        <div style="margin-bottom: 20px;">
                            <i class="fas fa-user-circle" style="font-size: 100px; color: #007bff;"></i>
                        </div>
                        <input type="email" name="emailid" placeholder="Email" class="form-control mb-2 mx-auto" style="max-width: 250px;" required>
                    </div>
                    <div class="form-group text-center">
                        <input type="password" name="password" placeholder="Password" class="form-control mb-2 mx-auto" style="max-width: 250px;" required>
                    </div>
                    <div class="row justify-content-center">
                        <a href="cus_reg.php" id="createAccountBtn" data-toggle="modal" data-target="#contact-modal" class="btn btn-primary mr-2">Create Account</a>
                        <input type="submit" value="Login" name="login" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        $('#createAccountBtn').click(function(){
            $('#loginModal').modal('hide');
        });
    });
</script>







