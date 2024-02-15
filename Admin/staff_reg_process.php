<?php 

include 'admindb.php';

$errors = [];
$data = [];

if (isset($_POST['firstname'])) {
    $fname= $_POST['firstname'];
    $lname= $_POST['lastname'];
    $role= $_POST['role'];
    $phonenumber= $_POST['phonenumber'];
    $username= $_POST['username'];
    $password= $_POST['password'];

    // Check if the username already exists
    $query = "SELECT * FROM STAFFREG WHERE USERNAME='$username'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $data['success'] = false;
        $data['message'] = 'Username already exists.';
    } else {
        // If the username is unique, proceed with insertion
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql="INSERT INTO STAFFREG (FIRST_NAME, LAST_NAME, ROLE_ID, PHONE_NUMBER, USERNAME, PASSWORD)			
        VALUES ('$fname', '$lname', '$role', '$phonenumber','$username','$hashed_password')";
        if($conn->query($sql) === TRUE) {
            $data['success'] = true;
            $data['message'] = 'Success!';
        } else {
            $data['success'] = false;
            $data['message'] = 'Error inserting record: ' . $conn->error;
        }
    }
    $conn->close();
    echo json_encode($data);
}

?>
