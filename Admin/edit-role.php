<?php
$title = "Edit Role";
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
  
	header('Location: login.php');
	exit;
}
  
include('includes/constants.php'); 

require_once "admindb.php";

$emp_id=$_GET['emp_id'];
$sql = "SELECT * FROM STAFFROLE where ROLEID=$emp_id";
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
			<h2 class="title text-center">Edit Role</h2>
			<div class="table-responsive">

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>


<div class="container">
	<div class="row">
		<div class="col md-6 offset-md-3 col-sm-6">
			<form action="" method="POST" >
				<input type="hidden" name="emp_id" value="<?php echo"$emp_id";?>">
				<div class="form-group">
					<label for="name">Role Name</label>
					<input type="text" class="form-control" name="ROLE_NAME" id="ROLE_NAME" value="<?= $data['ROLE_NAME']?>">
				</div>
				<button type="update" value="Update" name="Update" class="btn btn-primary btn-block">Update</button>
				<button type="button" class="btn btn-primary btn-block" value="Back"> <a href="role-read.php" style="color:white;"> Back </a></button>
				
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
    $param_rolename = $_POST["ROLE_NAME"];

    $sql = "UPDATE STAFFROLE SET `ROLE_NAME`='$param_rolename'
                                  WHERE ROLEID=$param_emp_id";     

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
