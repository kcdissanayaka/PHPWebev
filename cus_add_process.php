<?php 

include 'db.php';

$errors = [];
$data = [];

if (isset($_POST['firstname'])) {
    $fname= $_POST['firstname'];
    $lname= $_POST['lastname'];
    $email= $_POST['email'];
    $username= $_POST['username'];
    $password= $_POST['password'];
    
    $sql="insert into CUSTOMER_REG (FIRST_NAME, LAST_NAME,EMAIL,USERNAME, PASSWORD)			
    values('$fname', '$lname', '$email', '$username', '$password')";
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

