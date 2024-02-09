<?php
$title = "Delete Data";
include 'layout/header.php';
include 'db.php';

$a = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM studentsinfo WHERE id= '$a'");
$row= mysqli_fetch_array($result);
?>
<h2> Delete your information below: </h2>
<form name= "form1" method="post" action="">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="First name" name="fname" disabled value="<?php echo $row['first_name']; ?>">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Last name" name="lname" disabled value="<?php echo $row['last_name']; ?>" >
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="City" name="city" disabled value="<?php echo $row['city']; ?>">
    </div>

    <div class="col">
      <input type="text" class="form-control" placeholder="Group ID" name="groupid" disabled value="<?php echo $row['groupId']; ?>">    
    </div>

  </div>
  <br>
  <div class="row">
    <div class="col">
      <button type="submit" class="btn btn-danger" name="delete">Delete</button>
      <button type="submit" class="btn btn-primary" name="back"><a href="index.php" style="color: white;">Back</a></button>
    </div>
  </div>
</form>

<?php 

if (isset($_POST['delete'])){
    $query = mysqli_query($conn,"DELETE FROM studentsinfo where id='$a'");
    if($query){
        echo "<div class='alert alert-success'>Record deleted successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting record: " . mysqli_error($conn) . "</div>";
    }
}

$conn->close();
include 'layout/footer.php';
?>