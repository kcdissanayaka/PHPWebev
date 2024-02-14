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


