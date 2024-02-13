<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=AR+One+Sans&display=swap">
    <link rel="stylesheet" href="styles/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            background-color: #f8f9fa; /* Light background color */
            padding: 20px;
            min-height: 100vh;
            margin-top: 0; /* Remove margin at the top */
        }
    </style>
    <?php 
    include 'db.php';
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
                <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                    <?php echo isset($_SESSION["empFirstname"])?$_SESSION["empFirstname"]:"Error";?>
                    (<?php echo isset($_SESSION["empusername"])?$_SESSION["empusername"]:"Error";?>)

                </span>
                
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- $_SESSION["empid"] -->
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

    <!-- User create model -->
    

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
                        <li class="list-group-item"><a href="index.php" data-toggle="modal" data-target="#contact-modal">Create User profile</a></li>
                        <li class="list-group-item"><a href="read.php">Manage User</a></li>
                    </ul>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10">
                <div class="container">

                

