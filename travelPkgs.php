<?php 
$title = "Lankan Matka";
include 'header.php'; 
include 'dbkcd.php';

$tourPlanList = array(); // creawted the array to store the data tavle card data receveid from my db.
$allTourPlns = array();
$query = "SELECT * FROM TOUR_PLAN_CARDS";

$result = $conn->query($query);



if ($result) {
    // Check if there are rows returned
    if ($result->num_rows > 0) {
        $tourPlanList = $result->fetch_all(MYSQLI_ASSOC);
    }
}

//$conn->close();
?>

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
                                        //var_dump($row);
                                        echo "<tr> 
                                                
                                                <td><a href='updatesingle.php?id=$row[id]'>$row[id]</a></td>
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
                        
                            
                    <form name = "ManageTourPlan" id="myForm" class="row text-left mx-auto" method="post" action="processTurpkg.php" enctype="multipart/form-data">
                       
                            <div class=" col-md-4 pb-4">
                                <label for="tourPlnTitle" class="form-label">Plan Name</label>
                                <input type="text" class="form-control"  name="tourPlnTitle" id="tourPlnTitle" required>
                            </div>
                            <div class=" col-md-4 pb-4">
                                <label for="plnDays" class="form-label">Number of Days</label>
                                <input type="number" class="form-control" name="plnDays" id="plnDays" required>
                            </div>
                            <div class=" col-md-4 pb-4">
                                <label for="plnprice" class="form-label">Price</label>
                                <input type="number" class="form-control" name="plnprice" id="plnprice" required>
                            </div>
                                                
                            <div class="col-md-12 pb-4">
                                <label for="plnSummary" class="form-label">Tour Plan Summary</label>
                                <textarea class="form-control" name="plnSummary" rows="3" id="plnSummary"  required></textarea>
                            </div>
                            
                                <div class="input-group col-md-12 pb-4">
                                <input type="file" class="form-control" name="image" aria-describedby="submit" aria-label="Upload" id="image" required>
                                
                            </div>
                             <div class="col-md-12 pb-4">
                                <label for="imageText" class="form-label">Image Description</label>
                                <textarea class="form-control" name="imageText" rows="3" id="imageText" required></textarea>
                                
                            </div>

                            <div class=" col-md-4 pb-4">
                                <label for="plnstatus" class="form-label">Status</label>
                                <select class="form-control" id="plnstatus" name="plnstatus" required>
                                            <option value="A">ACTIVE</option>
                                            <option value="I">INACTIVE</option>

                                </select>
                            <div class= "col-mb-12 pb-4" >

                                <button type="submit" name ="submit" class="btn btn-success mt-2 mt-2 mr-2">Create Plan</button>
                                <button type="submit" name ="submit" class="btn btn-warning mt-2 mr-2">Update Plan</button>
                                <button type="submit" name ="submit" class="btn btn-danger mt-2 mr-2">Delete Plan</button>
                                <button type="button" name ="clear" value="Submit"  id ="clear" onclick="resetform()" class="btn btn-primary  mr-2 mt-2">Clear Form</button>
                            </div>
                                
                            
                    </form>
                </div>

                                  
            </div> <!--Services-->
        </section>


<script>
        function resetform(){
            document.getElementById('tourPlnTitle').value='';
            document.getElementById('image').value='';
            document.getElementById('plnDays').value='';
            document.getElementById('plnprice').value='';
            document.getElementById('plnSummary').value='';
            document.getElementById('imageText').value='';
            }
    </script>



<?php include 'footer.php'; ?>

 