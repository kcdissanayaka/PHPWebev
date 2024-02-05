<?php 
    $title ="Registered Users Login Page";
    include 'header.php'; 
?>

<?php
session_start();

function registerUser($username, $password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $_SESSION['users'][$username] = ['username' => $username, 'password' => $hashedPassword];
}

function loginUser($username, $password) {
    if (isset($_SESSION['users'][$username])) {
        $hashedPassword = $_SESSION['users'][$username]['password'];
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['logged_in_user'] = $username;
            return true;
        }
    }
    return false;
}

function isLoggedIn() {
    return isset($_SESSION['logged_in_user']);
}

function getLoggedInUser() {
    return $_SESSION['logged_in_user'] ?? null;
}

function logoutUser() {
    unset($_SESSION['logged_in_user']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        registerUser($username, $password);
    } elseif (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (loginUser($username, $password)) {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    } elseif (isset($_POST['logout'])) {
        logoutUser();
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .welcome-message {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isLoggedIn()): ?>
            <div class="alert alert-success welcome-message" role="alert">
                Welcome, <?php echo getLoggedInUser(); ?>!
                <form method="post">
                    <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                </form>
            </div>
        <?php else: ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Login or Register</h5>
                    <form method="post">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                        <button type="submit" name="register" class="btn btn-success">Register</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php include 'footer.php'; ?>