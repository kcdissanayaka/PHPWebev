<?php 
$title = "Lankan Matka- Admin Manaeg Travel Plans";
include 'header.php'; 
include 'Admin/admindb.php';

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

        </section>
        <!-- Tour Plan -->

        <section id="plan">
            <div class="tourPlan text-center">
                <div class="row">
                    <div class="col">
                        <h1>PREVIEW TOUR PLANS</h1>
                    </div>
                </div>
                <div class="container text-center mt-2">
                    <!--<div class="row tourPlanCards g-3"> -->
                    <div class="row m-0">
                         <?php 
                            foreach ($tourPlanList as $tourPlan) {
                               //var_dump($tourPlan);
                                ?>
                                <!--<div class="col-12 col-md-6 col-lg-4 ">
                                        <div class="card h-100 shadow">
                                            <div class="card"><img class="card-img-top" src="assets/images/trip-plans-card-img/<?php echo $tourPlan['TOUR_PLN_IMAGE']; ?>" alt="<?php echo $tourPlan['TOUR_PLN_TITLE']; ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $tourPlan['TOUR_PLN_TITLE']; ?></h5>
                                                    <p class="card-text"><?php echo $tourPlan['TOUR_PLN_DESCRIPTION']; ?></p>
                                                    <p class="card-text"><?php echo "Price $". $tourPlan['TOUR_PLN_PERSON_PRICE'].".00"; ?></p>
                                                    <a href="href='./edituser.php?emp_id=" class="btn btn-warning" onclick="togglepopup()">Edit Record</a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                    
                                        <div class="col-md-4">
                                            <div class="card mb-4 h-100 shadow">
                                                <img class="card-img-top" src="assets/images/trip-plans-card-img/<?php echo $tourPlan['TOUR_PLN_IMAGE']; ?>" alt="<?php echo $tourPlan['TOUR_PLN_TITLE']; ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $tourPlan['TOUR_PLN_TITLE']; ?></h5>
                                                    <p class="card-text"><?php echo $tourPlan['TOUR_PLN_DESCRIPTION']; ?></p>
                                                                                            
                                                </div>
                                                <div>
                                                <p class="card-text"><?php echo "Price $". $tourPlan['TOUR_PLN_PERSON_PRICE'].".00"; ?></p>  
                                                <button type="button" class="btn btn-warning mb-2" 
                                                onclick="editPlan('<?php echo $tourPlan['TOUR_PLN_ID']; ?>',
                                                '<?php echo $tourPlan['TOUR_PLN_TITLE']; ?>',
                                                '<?php echo $tourPlan['TOUR_PLN_PERSON_PRICE']; ?>',
                                                '<?php echo $tourPlan['TOUR_PLN_DAYS']; ?>',
                                                 '<?php echo $tourPlan['TOUR_PLN_PERSON_PRICE']; ?>', 
                                                 '<?php echo $tourPlan['TOUR_PLN_DESCRIPTION']; ?>',
                                                 '<?php echo $tourPlan['TOUR_PLN_IMAGE']; ?>', 
                                                 '<?php echo $tourPlan['TOUR_PLN_IMG_TEXT']; ?>', 
                                                 '<?php echo $tourPlan['TOUR_PLN_STATUS']; ?>')">Edit Record</button>

                                                <button type="button" class="btn btn-danger mb-2" onclick="deletePlan(this)">Delete Record</button>
                                                </div>
                                            </div>
                                        </div>
                                            
                                    
                                <?php
                            }
                        ?>
                        <!--
                        
                        <div class="col-md-4">
                            <div class="card m-4 shadow" style="width: 18rem;">
                                <div class="card"><img class="card-img-top"
                                        src="assets/images/trip-plans-card-img/dolphin-watching.jpg"
                                        alt="whale-and-dolphin-watching">
                                    <div class="card-body">
                                        <h5 class="card-title">Galle</h5>
                                        <p class="card-text">Not only can you see them, you can also swim with dolphins
                                            in
                                            Sri Lanka,
                                            which is an never to be forgotten!</p>
                                        <a href="#" class="btn btn-warning">Book Now</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>

            
        </section> 

        
    <!-- Services -->
    <!-- From Manage Tour Plans -->
        <section id="operation">
            <div class="service-header">
                <div class="row">
                    <div class="col">
                        <h1>Create Travel Plan</h1>
                    </div>
                </div>
                <div class="col-md-12">
                       <!-- "// add PHP SQL query to retrieve data from the 'studentsinfo' table
                                
                               

                                //Execute the SQL query and store the result
                                   // $result = $conn->query($quer2);
                                    

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
                                   

                            </div> -->
                        
                            
                    <form name = "ManageTourPlan" id="myForm" class="row text-left mx-auto" method="post" action="processTurpkg.php" enctype="multipart/form-data">
                    
                            <div class=" col-md-4 mx-0 pb-4">
                                <label for="tourPlnID" class="form-label">Plan Number</label>
                                <input type="text" class="form-control"  name="tourPlnID" id="tourPlnID">
                            </div>
                            <div class ="row">
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
                            <div class ="row">

                                <div class=" col-md-4 mx-3 pb-4">
                                    <label for="plnstatus" class="form-label">Status</label>
                                    <select class="form-control" id="plnstatus" name="plnstatus" required>
                                                <option value="A">ACTIVE</option>
                                                <option value="I">INACTIVE</option>

                                    </select>
                                </div>
                                <div class= "col-mb-4 mx-4 pb-4" >

                                    <button type="submit" name ="submit" onclick="return checkInvalidCharacter()" class="btn btn-success mt-2 mt-2 mr-2">Create Plan</button>
                                    <button type="submit" name ="submit" class="btn btn-warning mt-2 mr-2">Update Plan</button>
                                    <button type="submit" name ="submit" class="btn btn-danger mt-2 mr-2">Delete Plan</button>
                                    <button type="button" name ="clear" value="Submit"  id ="clear" onclick="resetform()" class="btn btn-primary  mr-2 mt-2">Clear Form</button>
                                </div>
                            </div>
                                
                            
                    </form>
                </div>

                                  
            </div> <!--Services-->
        </section>



<script>
  
    function editPlan(plnid, plntitle, plnprice, plndays, plperson_price, plnsummary, plnimage, plnimageText, plnstatus) {
     
        document.getElementById("tourPlnID").value = plnid;
        document.getElementById("tourPlnTitle").value = plntitle;
        document.getElementById("plnDays").value = plndays;
        document.getElementById("plnprice").value = plnprice;
        document.getElementById("plnSummary").value = plnsummary;
        document.getElementById("imageText").value = plnimageText;
        document.getElementById("plnstatus").value = status;
    }
</script>

<script>
    function checkInvalidCharacter(){
        var plansummary = document.getElementById("plnSummary").value;
        var imgText = document.getElementById("imageText").value;
        var turPlnTitle = document.getElementById("tourPlnTitle").value;
        if (plansummary.includes("'") || imgText.includes("'") || turPlnTitle.includes("'")){

            alert("Invalid Character Found /'");
            return false;
        } else {
            return true;
        } 
         
    }
</script>




<script>
        function resetform(){
            document.getElementById('tourPlnID').value='';
            document.getElementById('tourPlnTitle').value='';
            document.getElementById('image').value='';
            document.getElementById('plnDays').value='';
            document.getElementById('plnprice').value='';
            document.getElementById('plnSummary').value='';
            document.getElementById('imageText').value='';
            }
    </script>



<?php include 'footer.php'; ?>

 