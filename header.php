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
                        <li class="hideOnMobile"><a href=""><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
							<input type="text" name="fname" class="form-control" id="firstname" required>
						</div>
						<div class="form-group">
							<label for="lastname">Last Name</label>
							<input type="text" name="lname" class="form-control" id="lastname" required>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" class="form-control" id="email" required>
						</div>
                        <div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control" id="username" required>
						</div>	
                        <div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" id="password" required>
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

<script>
$(document).ready(function () {
  $("#contactForm").submit(function (event) {
    event.preventDefault();

    var formData = {
      firstname: $("#firstname").val(),
      lastname: $("#lastname").val(),
      email: $("#email").val(),
      username: $("#username").val(),
      password: $("#password").val(),
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
	