<?php

include 'db.php';

$errors = [];
$data = [];

if (isset($_POST['firstname'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username already exists
    $check_username_query = "SELECT * FROM CUSTOMER_REG WHERE USERNAME='$username'";
    $check_username_result = $conn->query($check_username_query);
    if ($check_username_result->num_rows > 0) {
        // Username already exists, send error response
        $data['success'] = false;
        $data['message'] = 'Username already exists!';
        echo json_encode($data);
        exit(); // Exit script
    }

    // Check if email already exists
    $check_email_query = "SELECT * FROM CUSTOMER_REG WHERE EMAIL='$email'";
    $check_email_result = $conn->query($check_email_query);
    if ($check_email_result->num_rows > 0) {
        // Email already exists, send error response
        $data['success'] = false;
        $data['message'] = 'Email already exists!';
        echo json_encode($data);
        exit(); // Exit script
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO CUSTOMER_REG (FIRST_NAME, LAST_NAME, EMAIL, USERNAME, PASSWORD)			
            VALUES ('$fname', '$lname', '$email', '$username', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        $data['message'] = 'Success!';
    } else {
        $data['success'] = false;
    }
    $conn->close();
    echo json_encode($data); 

}

?>
