<?php 
    $title ="Exercise 7: Read Data - Kasun ";
include 'header.php';
include 'dbkcd.php'; ?>

        <section id="plan">
            <div class="tourPlan text-center">
                <div class="row">
                    <div class="col">
                        <h1>EXERCISE 7- Read Data From the Database</h1>
                    </div>
                </div>
                <div class="container text-left">
                    <div class="row tourPlanCards">
                        <div class="col-md-12">
                       <? // SQL query to retrieve data from the 'studentsinfo' table
                                $sql = "SELECT * FROM TOUR_PLAN_CARDS";

                                // Execute the SQL query and store the result
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    echo "<table class='table'>
                                            <thead>
                                                <tr>
                                                    <th>Tour Plan ID</th>
                                                    <th>Tour Plan Title</th>
                                                    <th>Tour Plan Summary</th>
                                                    <th>Number of Days</th>
                                                    <th>Tour Price</th>
                                                    <th>Image Description</th>
                                                    <th>Plan Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>";

                                    while ($row = $result->fetch_assoc()) {
                                        var_dump($row);
                                        echo "<tr> 
                                                <td><a href='updatesingle.php?id=$row[id]'>$row[id]</a></td>
                                                <td>{$row['TOUR_PLN_ID']}</td>
                                                <td>{$row['TOUR_PLN_TITLE']}</td>
                                                <td>{$row['TOUR_PLN_DESCRIPTION']}</td>
                                                <td>{$row['TOUR_PLN_DAYS']}</td>
                                                <td>{$row['TOUR_PLN_PERSON_PRICE']}</td>
                                                <td>{$row['TOUR_PLN_IMG_TEXT']}</td>
                                            </tr>";
                                    }

                                    echo "</tbody></table>";
                                } else {
                                    // Display a message if no results are found
                                    echo "No results";
                                }
                                // close the connection when done
                                $conn->close(); 
                        ?>
                                   

                            </div>
                        </div>
                    </div> <!--newsletter-->
<?php include '../footer.php'; ?>