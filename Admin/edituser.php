<?php
$title = "Edit User";
session_start();

include('includes/constants.php'); 

if(isset($_SESSION["emploggedin"])){

	if($_SESSION["emploggedin"] === false)
	{
		header("location: login.php");
		exit;
	}

}

require_once "db.php";

$emp_id=$_GET['emp_id'];
$sql = "SELECT * FROM STAFFREG where id=$emp_id";
$result = $conn->query($sql);
if($result->num_rows !=1){
	die('id is not in database');
}

$data = $result->fetch_assoc();

include('includes/header.php'); 
$update_message = "";
?>

<div class="container-fluid">
	<!-- DataTables Example -->
	<div class="card shadow mb-4">

		<div class="card-body">
			<h2 class="title text-center">Edit User</h2>
			<div class="table-responsive">

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>


<div class="container">
	<div class="row">
		<div class="col md-6 offset-md-3 col-sm-6">
			<form action="" method="POST" >
				<input type="hidden" name="emp_id" value="<?php echo"$emp_id";?>">
				<div class="form-group">
					<label for="name">Username</label>
					<input type="text" class="form-control" name="username" id="username" value="<?= $data['USERNAME']?>">
				</div>

				<div class="form-group">
					<label for="role_id">Role:</label>
					<select class="form-control" name="role_id" <?php echo $disable_status?>>
						<?php

						$sql = "SELECT * FROM STAFFROLE";
						$result = mysqli_query($conn, $sql);

						while($row = mysqli_fetch_assoc($result)) {
							$row_id = $row["ROLEID"];
							$row_role = $row["ROLE_NAME"];  
							$select_status = $data["role_id"] == $row_id?"selected":"";

							echo "<option value='$row_id' $select_status>$row_role</option>";
						}
						?>
					</select> 
				</div>

				<div class="form-group">
					<label for="name">First Name</label>
					<input type="text" class="form-control" name="first_name" id="first_name"value="<?= $data['FIRST_NAME']?>">
				</div>
        <div class="form-group">
					<label for="name">Last Name</label>
					<input type="text" class="form-control" name="last_name" id="last_name"value="<?= $data['LAST_NAME']?>">
				</div>
				<div class="form-group">
					<label for="name">Contact Number</label>
					<input type="text" class="form-control" name="phone_number" id="phone_number"value="<?= $data['PHONE_NUMBER']?>">
				</div>
				<button type="update" value="Update" name="Update" class="btn btn-primary btn-block">Update</button>
				<button type="button" class="btn btn-secondary btn-block" onclick="history.back();"> Back </button>
				
			</form>
		</div>
	</div>
</div>
</thead>
</table>
</div></div></div>
<?php 
if(isset($_POST['Update'])){
    $param_emp_id=$_POST["emp_id"];
    $param_username = $_POST["username"];
    $param_Fname = $_POST["first_name"];
    $param_Lname = $_POST["last_name"];
    $param_contact_number = $_POST["phone_number"];
    $param_role_id = $_POST["role_id"];

    $sql = "UPDATE STAFFREG SET `USERNAME`='$param_username',
                                `FIRST_NAME`='$param_Fname',
                                `LAST_NAME`='$param_Lname',
                                `PHONE_NUMBER`='$param_contact_number',
                                `ROLE_ID`='$param_role_id'
                                WHERE ID=$param_emp_id";     

if(mysqli_query($conn, $sql)){
	$update_message = "<div class='alert alert-success text-center'>Your information is updated successfully</div>";
} else {
	$update_message = "<div class='alert alert-danger text-center'>Error updating record: " . mysqli_error($conn) . "</div>";
}
}

echo $update_message;	

// Close connection
mysqli_close($conn);

?>