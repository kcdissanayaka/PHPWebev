<?php
session_start();

include('includes/constants.php'); 

// UAC
if(isset($_SESSION["emploggedin"])){

  if($_SESSION["emploggedin"] === false)
  {
    header("location: login.php");
    exit;
  }
  else
  {
    if($_SESSION["empRole"] == Admin)
    {
      header("location: index.php");
      exit;
    }
    elseif($_SESSION["empRole"] == Moderator)
    {
      header("location: index-moderator.php");
      exit;
    }
  }


}
else
{
  header("location: login.php");
  exit;
}




?>
<?php 
    $title ="Create Data";
    include 'includes/header.php'; 
?>

<h2>Input Your Information Below:</h2><br>
<form name="form1" method="post" action="">
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="fname">First Name:</label>
                <input type="text" class="form-control" id="fname" placeholder="Enter your first name" name="fname" required>
            </div>
            <div class="col">
                <label for="lname">Last Name:</label>
                <input type="text" class="form-control" id="lname" placeholder="Enter your last name" name="lname" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" placeholder="Enter your city" name="city" required>
            </div>
            <div class="col">
                <label for="groupid">Group ID:</label>
                <select class="form-control" id="groupid" name="groupid">
                    <option value="BBCAP19">BBCAP19</option>
                    <option value="BBCAP20">BBCAP20</option>
                    <option value="BBCAP21">BBCAP21</option>
                    <option value="BBCAP22">BBCAP22</option>
                    <option value="Others">Others</option>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

<?php
// Check if the 'submit' button in the form was clicked
if (isset($_POST['submit'])) {
    // Retrieve data from the form and store it in variables
    $fname = $_POST['fname'];     // First name
    $lname = $_POST['lname'];     // Last name
    $city = $_POST['city'];       // City
    $groupid = $_POST['groupid']; // Group ID

    // Include the database connection file
    include 'db.php';

    // Define an SQL query to insert data into the 'studentsinfo' table
    $sql = "INSERT INTO studentsinfo (first_name, last_name, groupid, city)
            VALUES ('$fname', '$lname', '$groupid','$city')";

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
?>


<?php include 'includes/footer.php'; ?>


