<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #343a40;
            padding-top: 50px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
        }
        .sidebar ul li a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .tourPlan h1 {
        font-size: 24px;
        }

    .card {
        width: 100%;
        margin: 10px 20px;

      }
    
    .card-img-top{
        width: 100%;
        height: auto;
        
      } 
    .card-img-top {
     aspect-ratio: 16 / 9;
    object-fit: cover;
    }

   

    .tourPlan{
    background-image: linear-gradient(to right, rgba(136, 157, 186, 0.758), rgb(232, 227, 227));
    margin-bottom: 100px;
    }

    .tourPlan h1{
    background-color: #92A811;
    text-align: center;
    padding: 10px;
    color:whitesmoke;
    font-family: 'AR One Sans', sans-serif;
  }



    </style>
    
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul>
            <li><a href="homepage.php"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>
            <li><a href="bookingDetails.php"><i class="fas fa-book mr-2"></i>Booking Details</a></li>
            <li><a class="dropdown-item" href="Update_Cus.php?emailId=<?php echo htmlspecialchars($_SESSION["emailId"] ?? ''); ?>">
            <i class="fas fa-user-edit mr-2"></i>Update Profile</a></li>
            <li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a></li>
        </ul>
    </div>

    

    <!-- Content -->
    <div class="content">



     <!-- Logout Modal-->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
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

                            <form action="customerLogout.php" method="POST"> 

                              <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

                            </form>
                          </div>
                        </div>
                      </div>
                    </div>