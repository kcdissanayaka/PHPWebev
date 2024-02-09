<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand"  href="../ex7/read.php">LankanMatka</a>
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
                    Profile
                </a>
                </li>
                   
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid mt-5">
        <div class="row">
            <!-- Side Pane -->
            <div class="col-md-3 col-lg-2 p-0">
                <div class="side-pane d-flex flex-column">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="../ex7/index.php">Create User profile</a></li>
                        <li class="list-group-item"><a href="../ex7/read.php">Manage User</a></li>
                    </ul>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10">
                <div class="container">


                