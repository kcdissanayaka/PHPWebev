<?php 
$title = "Lankan Matka";
include 'header.php'; 
include 'dbkcd.php';

$tourPlanList = array(); // creawted the array to store the data tavle card data receveid from my db.
$allTourPlns = array();
$query = "SELECT * FROM TOUR_PLAN_CARDS WHERE TOUR_PLN_STATUS ='A'";
$quer2 = "SELECT * FROM TOUR_PLAN_CARDS";

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
                    <div class="row tourPlanCards mx-auto">
                         <?php 
                            foreach ($tourPlanList as $tourPlan) {
                              // var_dump($tourPlan);
                                ?>
                                <div class="col-md-4">
                                        <div class="card m-4 shadow" style="width: 18rem;">
                                            <div class="card"><img class="card-img-top" src="assets/images/trip-plans-card-img/<?php echo $tourPlan['TOUR_PLN_IMAGE']; ?>" alt="<?php echo $tourPlan['TOUR_PLN_TITLE']; ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $tourPlan['TOUR_PLN_TITLE']; ?></h5>
                                                    <p class="card-text"><?php echo $tourPlan['TOUR_PLN_DESCRIPTION']; ?></p>
                                                    <p class="card-text"><?php echo "Price $". $tourPlan['TOUR_PLN_PERSON_PRICE'].".00"; ?></p>
                                                    <!--<a href="#" class="btn btn-warning" onclick="togglepopup()">Edit Record</a>-->
                                                    <button type="submit" name ="eidtRec" class="btn btn-warning mt-2 mr-2">Edit Record</button>
                                                </div>
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
                                        src="assets/images/trip-plans-card-img/Arch-Bridge-Train.jpg"
                                        alt="Ella Nine Arch Bridge">
                                    <div class="card-body">
                                        <h5 class="card-title">Ella</h5>
                                        <p class="card-text">Laid-back Ella draws travellers to Sri Lankas
                                            highlands with its mountain forests, tea plantations, relatively
                                            climate.</p>
                                        <a href="#" class="btn btn-warning">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card m-4 shadow" style="width: 18rem;">
                                <div class="card"><img class="card-img-top"
                                        src="assets/images/trip-plans-card-img/yala-resting-leopard.jpg"
                                        alt="Yala National Safari Park">
                                    <div class="card-body">
                                        <h5 class="card-title">Yala</h5>
                                        <p class="card-text"> Yala is best known for its variety of wildlife and is
                                            important
                                            of Sri Lankan elephants, Sri Lankan leopards.</p>
                                        <a href="#" class="btn btn-warning">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row tourPlanCards">
                        <div class="col-md-4">
                            <div class="card m-4 shadow" style="width: 18rem;">
                                <div class="card"><img class="card-img-top"
                                        src="assets/images/trip-plans-card-img/hikkaduwa-marine.jpg"
                                        alt="Hikkaduwa Marine Adventures">
                                    <div class="card-body">
                                        <h5 class="card-title">Hikkaduwa</h5>
                                        <p class="card-text">Hikkaduwa is a world famous beach holiday destination, for
                                            its
                                            scenic beaches,
                                            coral reef sanctuary, surfing and nightlife.</p>
                                        <a href="#" class="btn btn-warning">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card m-4 shadow" style="width: 18rem;">
                                <div class="card"><img class="card-img-top"
                                        src="assets/images/trip-plans-card-img/udawalawa.jpg" alt="Udawalawa">
                                    <div class="card-body">
                                        <h5 class="card-title">Udawalawa</h5>
                                        <p class="card-text">Udawalawe is famous its herd around 250 elephants,
                                            that are quite easy spot grazing on surrounding grasslands.</p>
                                        <a href="#" class="btn btn-warning">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            </div>
                        </div>-->
                        </section> 

        
    <!-- Services -->
    <!-- From Manage Tour Plans -->
        <section id="operation">
            <div class="service-header">
                <div class="row">
                    <div class="col">
                        <h1>Crate Travel Plan</h1>
                    </div>
                </div>
                <div class="col-md-12">
                       <? // SQL query to retrieve data from the 'studentsinfo' table
                                
                               

                                //Execute the SQL query and store the result
                                    $result2 = $conn->query($quer2);
                                    

                                if ($result2->num_rows > 0) {
                                    $allTourPlns =$result2->fetch_all(MYSQLI_ASSOC);
                                    var_dump ($result2);
                                    echo "<table class='table'>
                                            <thead>
                                                <tr>
                                                    <th>Plan ID</th>
                                                    <th>Plan Title</th>
                                                    <th>Plan Days</th>
                                                    <th>Plan Summary</th>
                                                    <th>Plan Price</th>
                                                    <th>Plan Image Text</th>
                                                    <th>Plan Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>";

                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr> 
                                              
                                                <td>{$row['TOUR_PLN_ID']}</td>
                                                <td>{$row['TOUR_PLN_TITLE']}</td>
                                                <td>{$row['TOUR_PLN_DAYS']}</td>
                                                <td>{$row['TOUR_PLN_DESCRIPTION']}</td>
                                                <td>{$row['TOUR_PLN_PERSON_PRICE']}</td>
                                                <td>{$row['OUR_PLN_IMG_TEXT']}</td>
                                                <td>{$row['TOUR_PLN_STATUS']}</td>
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

 