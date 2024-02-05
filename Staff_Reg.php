<?php 
    $title ="Exercise 4: Control flow and loops";
    include 'header.php'; 
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
        <form action="registration.php" method="post">
    <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" class="form-control" name="firstname" required>
    </div>
    <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" class="form-control" name="lastname" required>
    </div>
    <div class="form-group">
        <label>Role:</label>
        <select class="form-control" name="role" required>
        <option value="admin">Admin</option>
        <option value="moderator">Moderator</option>
        <option value="user">User</option>
        <option value="manager">Manager</option>
        <option value="agent">Travel Agent</option>
        </select>
    </div>

<div class="form-group">
    <label for="phonenumber">Phone Number:</label>
    <input type="text" class="form-control" name="phonenumber" required>
</div>

<div class="form-group">
    <label for="password">Password:</label>
    <input type="text" class="form-control" name="password" required>
</div>

<div class="text-right">
    <button type="submit" class="btn btn-primary">Register</button>
</div>

        </form>

</div>
</div>

<br>

<?php include 'footer.php'; ?>