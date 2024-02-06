<?php 

include 'db.php';

$errors = [];
$data = [];

if (isset($_POST['firstname'])) {
    $fname= $_POST['firstname'];
    $lname= $_POST['lastname'];
    $role= $_POST['role'];
    $phonenumber= $_POST['phonenumber'];
    $password= $_POST['password'];
    
    $sql="insert into staffreg (first_name, last_name,role, phone_number, password)			
    values('$fname', '$lname', '$role', '$phonenumber','$password')";
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

