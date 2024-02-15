<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    $title ="Admin Panel"; ?>
    <title><?php echo $title ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=AR+One+Sans&display=swap">
    <link rel="stylesheet" href="styles/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40; /* Dark background color */
            color: #ffffff; /* Light text color */
            text-align: center;
            padding: 10px 0;
        }
        .side-pane {
            background-color: #037bfc; /* Light background color */
            padding: 20px;
            min-height: 100vh;
            margin-top: 0; /* Remove margin at the top */
            text-align: center;
            color: #ffffff; /* Light text color */
        }
        
    </style>
    <?php 
    include 'admindb.php';
?>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand"  href="index.php">LANKANMATKA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?php echo isset($_SESSION["empFirstname"])?$_SESSION["empFirstname"]:"Error";?>
                    (<?php echo isset($_SESSION["empusername"])?$_SESSION["empusername"]:"Error";?>)
                  </span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="edituser.php?emp_id=<?php echo $_SESSION["empid"]?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Edit Profile  
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a> 
                  </div>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- End of Navigation Bar -->    

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel alert">Are you sure you want to logout?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                            <form action="logout.php" method="POST"> 

                              <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

    <!-- Main Content -->
    <div class="container-fluid mt-5">
        <div class="row">
            <!-- Side Pane -->
            <div class="col-md-3 col-lg-2 p-0">
                <div class="side-pane d-flex flex-column">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="index.php" data-toggle="modal" data-target="#staffreg-modal">Create User profile</a></li>
                        <li class="list-group-item"><a href="read.php">Manage User</a></li>
                        <li class="list-group-item"><a href="create-role.php">Create Role</a></li>
                        <li class="list-group-item"><a href="role-read.php">Manage Role</a></li>
                        <li class="list-group-item"><a href="../travelPkgs.php">Manage Travel Plans</a></li>
                    </ul>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10">
                <div class="container">

                

    <!-- Create User Modal -->
    <div id="contact">
	<div id="staffreg-modal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
                    <h3>Staff Registration</h3>
					<a href="" class="close" data-dismiss="modal">×</a>
				</div>
				<form id="staffreg" name="contact" role="form">
					<div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="fname" class="form-control" placeholder="Enter your first name" id="fname" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phonenumber">Phone Number:</label>
                                    <input type="number" class="form-control" name="phonenumber" placeholder="Enter your phone number" id="phonenumber" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lname" class="form-control" placeholder="Enter your last name" id="lname" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Enter a username" id="username" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Role:</label>
                                    <select class="form-control" name="role" id="role" required>
                                        <?php 
                                        $query = mysqli_query($conn, 'SELECT * FROM STAFFROLE');
                                        if ($query) {
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                ?>
                                                <option value="<?php echo $row['ROLEID']; ?>"><?php echo $row['ROLE_NAME']; ?></option>
                                                <?php
                                            }
                                        } else {
                                            echo "Error: " . mysqli_error($conn);
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" placeholder="Enter a password" class="form-control" id="pw" required>
                                </div>
                            </div>
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
  $("#staffreg").submit(function (event) {
    event.preventDefault();

    var formData = {
      firstname: $("#fname").val(),
      lastname: $("#lname").val(),
      role: $("#role").val(),
      phonenumber: $("#phonenumber").val(),
      username: $("#username").val(),
      password: $("#pw").val(),
    };

    // Validation
    var valid = true;
    if (formData.firstname.length < 5) {
      valid = false;
      showValidationError("First name should be at least 5 characters.");
    }
    if (!/[!@#$%^&*(),.?":{}|<>]/.test(formData.password)) {
      valid = false;
      showValidationError("Password must include a special character.");
    }
    if (!(formData.phonenumber.length >= 9 && formData.phonenumber.length <= 15)) {
      valid = false;
      showValidationError("Phone number should be between 9 and 15 digits long.");
    }

    if (valid) {
      $.ajax({
        type: "POST",
        url: "staff_reg_process.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
        Swal.fire({
          title: "Added",
          text: "Your record has been added.",
          icon: "success",
          position: "center",
          customClass: {
            popup: 'left-align'
          }
        });
        $("#staffreg")[0].reset();
      });
    }
  });

  function showValidationError(message) {
    Swal.fire({
      title: "Error",
      text: message,
      icon: "error",
      position: "center",
      customClass: {
        popup: 'left-align'
      }
    });
  }
});
</script>

<style>
.left-align {
  left: -0.5% !important;
}
</style>



	