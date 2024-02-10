<?php 
    $title ="Exercise 4: Control flow and loops";
    include 'header.php'; 
    include 'db.php';
?>


<section id="plan">
    <div class="tourPlan">
        <div class="row">
            <div class="col text-center">
                <h1>Staff Registration</h1>
    </div>
        </div>

<br>
    
<div class="row justify-content-center">
    <div class="col-md-4">
    <form id="staffreg">
    <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" class="form-control" name="firstname" id="fname" required>
    </div>
    <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" class="form-control" name="lastname" id="lname" required>
    </div>
    <div class="form-group">
    <label for="role">Role:</label>
    <select class="form-control" name="role" id="role" required>
        <?php 
        $query = mysqli_query($conn, 'SELECT * FROM STAFFROLE');
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <option value="<?php echo $row['ROLEID']; ?>"><?php echo $row['ROLE_NAME']; ?></option>
                <?php
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        ?>
    </select>
</div>


    

<div class="form-group">
    <label for="phonenumber">Phone Number:</label>
    <input type="number" class="form-control" name="phonenumber" id="phonenumber" required>
</div>

<div class="form-group">
    <label for="password">username:</label>
    <input type="text" class="form-control" name="username" id="username" required>
</div>

<div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password" id="pw" required>
</div>

<div class="text-right">
    <button type="submit" class="btn btn-primary" name="submit" id="register">Register</button>
</div>

        </form>

</div>
</div>

<br>
<?php include 'footer.php'; ?>

<script>
$(document).ready(function () {
  $("#staffreg").submit(function (event) {
    event.preventDefault();

    var formData = {
      firstname: $("#fname").val(),
      lastname: $("#lname").val(),
      role: $("#role").val(),
      phonenumber: $("#phonenumber").val(),
      username: $("#username").val(),
      password: $("#pw").val(),
    };

    $.ajax({
      type: "POST",
      url: "staff_reg_process.php",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
        Swal.fire({
        title: "Added",
        text: "Your record has been addded.",
        icon: "success"
        });  

        $("#staffreg")[0].reset();
    });

  });
});
</script>
