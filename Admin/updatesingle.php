<?php
$title = "Update Data";
include 'layout/header.php';
include 'db.php';

$a = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM studentsinfo WHERE id= '$a'");
$row= mysqli_fetch_array($result);
?>
<h2> Update your information below: </h2>
<form name= "form1" method="post" action="">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="First name" name="fname" required value="<?php echo $row['first_name']; ?>">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Last name" name="lname" required value="<?php echo $row['last_name']; ?>" >
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="City" name="city" required value="<?php echo $row['city']; ?>">
    </div>

    <div class="col">
      <input type="text" class="form-control" placeholder="Group ID" name="groupid" required value="<?php echo $row['groupId']; ?>">    
    </div>

  </div>
  <br>
  <div class="row">
    <div class="col">
      <button type="submit" class="btn btn-primary" name="submit">Update</button>
      <button type="submit" class="btn btn-primary" name="back"><a href="index.php" style="color: white;">Back</a></button>
    </div>
  </div>
</form>

<?php 
if (isset($_POST['submit'])){
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $groupid = $_POST['groupid'];
    $query = mysqli_query($conn,"UPDATE studentsinfo set first_name='$fname', last_name='$lname', groupId='$groupid' where id='$a'");
    if($query){
        echo "<div class='alert alert-success'>Your information is updated successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error updating record: " . mysqli_error($conn) . "</div>";
    }
}

$conn->close();
include 'layout/footer.php';
?>