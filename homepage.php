<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul>
            <li><a href="#dashboard"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>
            <li><a href="#payment-history"><i class="fas fa-history mr-2"></i>Payment History</a></li>
            <li><a href="#booking-details"><i class="fas fa-book mr-2"></i>Booking Details</a></li>
            <li><a href="#update-profile"><i class="fas fa-user-edit mr-2"></i>Update Profile</a></li>
            <li><a href="index.php"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h1>Welcome to Your Dashboard, <?php echo ""; ?>!</h1>
        <p>This is your dashboard. You can view your payment history, booking details, and update your profile.</p>  
    </div>

    <!-- Bootstrap JS and Font Awesome -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>