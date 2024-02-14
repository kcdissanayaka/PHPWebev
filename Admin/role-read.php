<?php
$title = "All Users";
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
  
	header('Location: login.php');
	exit;
}

include('includes/header.php'); 

// Include config file

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-body">
            <h2 class="title text-center">All Roles</h2>
      <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>

            <tr>
              <th> ID </th>
              <th> ROLE NAME</th>
              <th> Actions </th>
            </tr>
          </thead>
          <tbody>

            <?php
            
            $sql = "SELECT * 
                    FROM STAFFROLE";
            $result = mysqli_query($conn, $sql);


            while($row = mysqli_fetch_assoc($result)) 
            {
              echo "<tr>";
              echo "<td>" . $row["ROLEID"] . "</td>";
              echo "<td>" . $row["ROLE_NAME"] . "</td>";

              echo "<td>";
              echo '<form action="" method="post">';
              echo '<input type="hidden" name="edit_id" value="">';
              echo "<div class='btn-group'>";
              echo "<a class='btn btn-success' href='./edit-role.php?emp_id=" .$row["ROLEID"] . "'>Edit</a>";
              echo "<a class='btn btn-danger'href='./delete-role.php?emp_id=" .$row["ROLEID"] . "'>Delete</a>";
              echo"</div>";

              echo '</form>';
              echo "</td>";

              echo "</tr>";
            }
            ?>

          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?php
// Close connection
mysqli_close($conn);

include('includes/footer.php');
?>