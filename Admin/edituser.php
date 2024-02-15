<?php
$title = "Edit User";
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.php');
    exit;
}

include('includes/constants.php'); 
require_once "admindb.php";

$emp_id = $_GET['emp_id'];
$sql = "SELECT * FROM STAFFREG where id=$emp_id";
$result = $conn->query($sql);
if ($result->num_rows != 1) {
    die('id is not in the database');
}

$data = $result->fetch_assoc();

$update_message = "";

if (isset($_POST['Update'])) {
    $param_emp_id = $_POST["emp_id"];
    $param_username = $_POST["username"];
    $param_Fname = $_POST["first_name"];
    $param_Lname = $_POST["last_name"];
    $param_contact_number = $_POST["phone_number"];
    $param_role_id = $_POST["role_id"];
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
                $check_username_query = "SELECT * FROM STAFFREG WHERE USERNAME='$param_username' AND ID != $param_emp_id";
                $check_username_result = mysqli_query($conn, $check_username_query);
                if (mysqli_num_rows($check_username_result) > 0) {
                    $update_message = "<div class='alert alert-danger text-center'>Username already exists. Please choose a different username.</div>";
                } else {
                    // Validate phone number length
                    if (strlen($param_contact_number) < 8 || strlen($param_contact_number) > 13) {
                        $update_message = "<div class='alert alert-danger text-center'>Phone number should be between 8 and 13 digits long.</div>";
                    } else {
                        // Validate phone number format
                        if (!ctype_digit($param_contact_number)) {
                            $update_message = "<div class='alert alert-danger text-center'>Phone number should contain only numbers.</div>";
                        } else {
                            $sql = "UPDATE STAFFREG SET `USERNAME`='$param_username',
                                                        `FIRST_NAME`='$param_Fname',
                                                        `LAST_NAME`='$param_Lname',
                                                        `PHONE_NUMBER`='$param_contact_number',
                                                        `ROLE_ID`='$param_role_id',
                                                        `PASSWORD`='$hashed_password'
                                                        WHERE ID=$param_emp_id";

                            if (mysqli_query($conn, $sql)) {
                                $update_message = "<div class='alert alert-success text-center'>Your information is updated successfully</div>";
                            } else {
                                $update_message = "<div class='alert alert-danger text-center'>Error updating record: " . mysqli_error($conn) . "</div>";
                            }
                        }
                    }
                }
            }
        }
    }
}

include('includes/header.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h2 class="title text-center">Edit User</h2>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col md-6 offset-md-3 col-sm-6">
                                                <form action="" method="POST" onsubmit="return validateForm()">
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" name="username" id="username" value="<?= $data['USERNAME'] ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="role_id">Role:</label>
                                                        <select class="form-control" name="role_id" <?php echo $disable_status ?>>
                                                            <?php
                                                            $sql = "SELECT * FROM STAFFROLE";
                                                            $result = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $row_id = $row["ROLEID"];
                                                                $row_role = $row["ROLE_NAME"];
                                                                $select_status = $data["role_id"] == $row_id ? "selected" : "";
                                                                echo "<option value='$row_id' $select_status>$row_role</option>";
                                                            }
                                                            ?>
                                                        </select>
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
                                                        <label for="phone_number">Contact Number</label>
                                                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?= $data['PHONE_NUMBER'] ?>">
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
                                                    <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
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
