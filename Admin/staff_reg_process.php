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

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql="insert into STAFFREG (FIRST_NAME, LAST_NAME, ROLE_ID, PHONE_NUMBER, USERNAME, PASSWORD)			
    values('$fname', '$lname', '$role', '$phonenumber','$username','$hashed_password')";
    if($conn -> query($sql) === TRUE) {
        $data['message'] = 'Success!';
    }
    else{
        $data['success'] = false;
    }
    $conn->close();
    echo json_encode($data);

}

?>

