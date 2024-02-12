<?php
// session_start();

include('includes/header.php'); 

// Include config file
require_once "db.php";
?>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-body">
            <h2 class="title text-center">All Users</h2>
      <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>

            <tr>
              <th> ID </th>
              <th> USERNAME </th>
              <th> FIRST NAME </th>
              <th> LAST NAME </th>
              <th> ROLE </th>
              <th> PHONE NUMBER </th>
              <th> Actions </th>
            </tr>
          </thead>
          <tbody>

            <?php
            
            $sql = "SELECT s.ID, s.USERNAME, s.FIRST_NAME, s.LAST_NAME, r.ROLE_NAME, s.PHONE_NUMBER 
                    FROM STAFFREG s
                    INNER JOIN STAFFROLE r ON s.ROLE_ID = r.ROLEID";
            $result = mysqli_query($conn, $sql);


            while($row = mysqli_fetch_assoc($result)) 
            {
              echo "<tr>";
              echo "<td>" . $row["ID"] . "</td>";
              echo "<td>" . $row["USERNAME"] . "</td>";
              echo "<td>" . $row["FIRST_NAME"] . "</td>";
              echo "<td>" . $row["LAST_NAME"] . "</td>";
              echo "<td>" . $row["ROLE_NAME"] . "</td>";
              echo "<td>" . $row["PHONE_NUMBER"] . "</td>";

              echo "<td>";
              echo '<form action="" method="post">';
              echo '<input type="hidden" name="edit_id" value="">';
              echo "<div class='btn-group'>";
              echo "<a class='btn btn-success' href='./edituser.php?emp_id=" .$row["ID"] . "'>Edit</a>";
              echo "<a class='btn btn-danger'href='./deleteuser.php?emp_id=" .$row["ID"] . "'>Delete</a>";
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