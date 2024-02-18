<?php
session_start();
include 'db.php';

// Check if booking details are stored in session
if (isset($_SESSION["booking_details"])) {
    $name = $_SESSION["booking_details"]["name"];
} else {
    // Redirect user back to booking form if session data is not found
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=AR+One+Sans&display=swap">
    <link rel="stylesheet" href="styles/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom styles for this template -->
    <style>
        body {
            padding-top: 5rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">LankanMatka</a>
</nav>

<main role="main" class="container">
    <div class="jumbotron">
        <?php
        // Check if session variables containing form data are set
        if(isset($_SESSION['booking_details'])) {
            // Retrieve form data from session variables
            $bookingData = $_SESSION['booking_details'];

            // Display form data on the page
            echo "<h1 class='display-4'>Welcome onboard, " . $bookingData['name'] . "!</h1>";
            echo "<h2>Booking Details:</h2>";
            echo "<p>Name: " . $bookingData['name'] . "</p>";
            echo "<p>Email: " . $bookingData['email'] . "</p>";
            echo "<p>Phone: " . $bookingData['phone'] . "</p>";
            echo "<p>Number of Persons: " . $bookingData['numberOfPersons'] . "</p>";
            echo "<p>Arrival Date: " . $bookingData['arrivalDate'] . "</p>";
            echo "<p>Departure Date: " . $bookingData['departureDate'] . "</p>";

            // Unset the session variable to clear the form data
            // unset($_SESSION['booking_details']);
        } else {
            echo "<h1 class='display-4'>Welcome onboard!</h1>";
            echo "<p>No booking data available.</p>";
        }
        ?>
        <p class="lead">Thank you for choosing our travel package. We're excited to have you on board.</p>
        <hr class="my-4">
        <center><p>If you are already registered, please <a href="login.php" data-toggle="modal" data-target="#loginModal">login</a>. Otherwise, <a href="#contact-modal" data-toggle="modal">register</a> with us.</p></center>
    </div>
</main>


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

<!-- Registration Modal -->
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
            if (data.success === false) {
                // Check if the error message indicates existing username
                if (data.message === 'Username already exists!') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Username already exists!',
                        text: data.message
                    });
                } else if (data.message === 'Email already exists!') {
                    // Check if the error message indicates existing email
                    Swal.fire({
                        icon: 'error',
                        title: 'Email already exists!',
                        text: data.message
                    });
                } else {
                    // Other error occurred, show generic error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'An error occurred!'
                    });
                }
            } else {
                // Registration successful, trigger success sweet alert
                Swal.fire({
                    title: "Registered",
                    text: "You have successfully Registered",
                    icon: "success"
                });
                $("#contactForm")[0].reset();
            }
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

<script>
    <?php if(!empty($error)): ?>
    $(document).ready(function() {
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
    });
    <?php endif; ?>
</script>

<script>
    $(document).ready(function(){
        $('#createAccountBtn').click(function(){
            $('#loginModal').modal('hide');
        });
    });
</script>

<!-- Bootstrap JS and dependencies -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="scripts/script.js"></script>

</body>
</html>
