<?php
$title = "Edit Customer Data";
session_start();

include 'customerDashboardHeader.php';
require_once "db.php";

// Check if 'emailId' is set in the URL parameters
if(isset($_GET['emailId'])) {
    $email = filter_var($_GET['emailId'], FILTER_SANITIZE_EMAIL);
    if(empty($email)) {
        die('Error: Email ID not provided or invalid.');
    }
} else {
    die('Error: Email ID not provided.');
}

$sql = "SELECT * FROM CUSTOMER_REG WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if the query was successful
if (!$result) {
    die('Error: ' . $conn->error);
}

if ($result->num_rows != 1) {
    die('Email is not in the database');
}

$data = $result->fetch_assoc();

$update_message = "";

if (isset($_POST['Update'])) {
    $param_emp_id = $_POST["emp_id"];
    $param_username = $_POST["username"];
    $param_Fname = $_POST["first_name"];
    $param_Lname = $_POST["last_name"];
    $param_email = $_POST["email"];
    $current_password = $_POST['current_password'];

    // Verify current password if provided
    if ($current_password !== "" && !password_verify($current_password, $data['PASSWORD'])) {
        $update_message = "<div class='alert alert-danger text-center'>Current password is incorrect.</div>";
    } else {
        // Check if new password and confirm password match, only if new password is provided
        if ($_POST['new_password'] !== "" && $_POST['new_password'] !== $_POST['confirm_password']) {
            $update_message = "<div class='alert alert-danger text-center'>New password and confirm password do not match.</div>";
        } else {
            // Hash the new password securely if provided
            $hashed_password = $_POST['new_password'] !== "" ? password_hash($_POST['new_password'], PASSWORD_DEFAULT) : $data['PASSWORD'];

            // Check if username field is empty
            if (empty($param_username)) {
                $update_message = "<div class='alert alert-danger text-center'>Username cannot be empty.</div>";
            } else {
                // Check if username already exists in the database
                $check_username_query = "SELECT * FROM CUSTOMER_REG WHERE USERNAME=? AND ID != ?";
                $stmt_check_username = $conn->prepare($check_username_query);
                $stmt_check_username->bind_param("si", $param_username, $param_emp_id);
                $stmt_check_username->execute();
                $check_username_result = $stmt_check_username->get_result();
                if (!$check_username_result) {
                    die('Error: ' . $conn->error);
                }
                if ($check_username_result->num_rows > 0) {
                    $update_message = "<div class='alert alert-danger text-center'>Username already exists. Please choose a different username.</div>";
                } else {
                    $sql_update = "UPDATE CUSTOMER_REG SET `USERNAME`=?, `FIRST_NAME`=?, `LAST_NAME`=?, `EMAIL`=?, `PASSWORD`=? WHERE ID=?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param("sssssi", $param_username, $param_Fname, $param_Lname, $param_email, $hashed_password, $param_emp_id);

                    if ($stmt_update->execute()) {
                        $update_message = "<div class='alert alert-success text-center'>Your information is updated successfully</div>";
                    } else {
                        $update_message = "<div class='alert alert-danger text-center'>Error updating record: " . $stmt_update->error . "</div>";
                    }
                }
            }
        }
    }
}

include 'customerDashboardHeader.php';
?>

<div class="container-fluid">
    <div class="card shadow mb-4" style="margin-left: -20%;">
        <div class="card-body">
            <h2 class="title text-center">Edit Your Profile Information</h2>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-8"> <!-- Adjusted column size -->
                                            <form action="" method="POST" onsubmit="return validateForm()">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" name="username" id="username" value="<?= $data['USERNAME'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $data['FIRST_NAME'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $data['LAST_NAME'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="<?= $data['EMAIL'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="current_password">Current Password</label>
                                                    <input type="password" class="form-control" name="current_password" id="current_password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="new_password">New Password</label>
                                                    <input type="password" class="form-control" name="new_password" id="new_password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirm_password">Confirm Password</label>
                                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                                </div>
                                                <input type="hidden" name="emp_id" value="<?= $data['ID'] ?>">
                                                <button type="submit" name="Update" class="btn btn-primary btn-block">Update</button>
                                                <button type="button" class="btn btn-secondary btn-block" onclick="history.back();"> Back </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
        function validateForm() {
        var currentPassword = document.getElementById("current_password").value;
        var newPassword = document.getElementById("new_password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        var username = document.getElementById("username").value;
        var phoneNumber = document.getElementById("phone_number").value;

        // Check if new password and confirm password match, only if new password is provided
        if (newPassword !== "" && newPassword !== confirmPassword) {
            alert("New password and confirm password do not match.");
            return false;
        }

        // Validate password length and special characters, if new password is provided
        if (newPassword !== "") {
            if (newPassword.length < 6) {
                alert("Password should be at least 6 characters long.");
                return false;
            }
            if (!/\d/.test(newPassword) || !/[!@#$%^&*(),.?":{}|<>]/.test(newPassword)) {
                alert("Password must contain at least one numerical and one special character.");
                return false;
            }
        }

        // Validate phone number length
        if (phoneNumber.length < 8 || phoneNumber.length > 13) {
            alert("Phone number should be between 8 and 13 digits long.");
            return false;
        }

        // Validate phone number format
        if (!phoneNumber.match(/^[\d()+-]{8,13}$/)) {
            alert("Phone number should contain only numbers, +, -, (, and ).");
            return false;
        }

        // Validation passed
        return true;
    }
</script>

<?php
echo $update_message;

mysqli_close($conn);
?>
