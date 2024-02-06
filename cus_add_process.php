<?php 

include 'db.php';

$errors = [];
$data = [];

if (isset($_POST['firstname'])) {
    $fname= $_POST['firstname'];
    $lname= $_POST['lastname'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    
    $sql="insert into customer_reg (first_name, last_name,email, password)			
    values('$fname', '$lname', '$email', '$password')";
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

