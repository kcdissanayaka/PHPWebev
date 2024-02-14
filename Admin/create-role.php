<?php 
    $title ="Create Role";
    
    if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
  
        header('Location: login.php');
        exit;
      }
      
    include('includes/header.php');

    
?>

<h2>Create Role</h2><br>
<form name="form1" method="post" action="">
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="fname">Role Name:</label>
                <input type="text" class="form-control" id="RoleName" name="RoleName">
            </div>
        </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

<?php
// Check if the 'submit' button in the form was clicked
if (isset($_POST['submit'])) {
    // Retrieve data from the form and store it in variables
    $rolename = $_POST['RoleName'];     // First name

    // Include the database connection file
    include 'admindb.php';

    // Define an SQL query to insert data into the 'studentsinfo' table
    $sql = "INSERT INTO STAFFROLE (ROLE_NAME)
            VALUES ('$rolename')";

    // Execute the SQL query using the database connection
    if ($conn->query($sql) === TRUE) {
        // If the query was successful, display a success message
        echo "<div class='alert alert-success'>Your information is successfully saved</div>";
    } else {
        // If there was an error in the query, display an error message
        echo "<div class='alert alert-danger'>Error updating record: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

include('includes/footer.php');
?>


