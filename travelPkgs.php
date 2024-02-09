<?php 
$title = "Lankan Matka";
include 'header.php'; 
include 'dbkcd.php';

$tourPlanList = array(); // creawted the array to store the data tavle card data receveid from my db.

$query = "SELECT * FROM TourPlanCard WHERE TOUR_PLN_STATUS ='A'";

$result = $conn->query($query);

if ($result) {
    // Check if there are rows returned
    if ($result->num_rows > 0) {
        $tourPlanList = $result->fetch_all(MYSQLI_ASSOC);
    }
}

$conn->close();
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
                    <div class="row tourPlanCards">
                         <?php 
                            foreach ($tourPlanList as $tourPlan) {
                                var_dump($tourPlan);
                                ?>
                                <div class="col-md-4">
                                        <div class="card m-4 shadow" style="width: 18rem;">
                                            <div class="card"><img class="card-img-top" src="assets/images/trip-plans-card-img/<?php echo $tourPlan['TOUR_PLN_IMAGE']; ?>" alt="<?php echo $tourPlan['TOUR_PLN_TITLE']; ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $tourPlan['TOUR_PLN_TITLE']; ?></h5>
                                                    <p class="card-text"><?php echo $tourPlan['TOUR_PLN_DESCRIPTION']; ?></p>
                                                    <a href="#" class="btn btn-warning" onclick="togglepopup()">Book Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                            }
                        ?>
                        <div class="col-md-4">
                            <div class="card m-4 shadow" style="width: 18rem;">
                                <div class="card"><img class="card-img-top"
                                        src="assets/images/trip-plans-card-img/sri-dalada-maligawa.jpg"
                                        alt="Temple of tooth">
                                    <div class="card-body">
                                        <h5 class="card-title">Kandy</h5>
                                        <p class="card-text">The Temple of the Sacred Tooth Relic, or Sri Dalada
                                            Maligawa,
                                            is a Buddhist temple in Kandy,
                                            Sri Lanka</p>
                                        <a href="#" class="btn btn-warning" onclick="togglepopup()">Edit Plan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        </div>
                        </section> 

        
    <!-- Services -->
    <!-- From Manage Tour Plans -->
        <section id="services">
            <div class="service-header">
                <div class="row">
                    <div class="col">
                        <h1>Crate Travel Plan</h1>
                    </div>
                </div>
                
                    <form name = "ManageTourPlan" id="myForm" class="row text-left  m-3" method="post" action="processTurpkg.php" enctype="multipart/form-data">
                       
                            <div class=" col-md-4 pb-4">
                                <label for="tourPlnTitle" class="form-label">Plan Name</label>
                                <input type="text" class="form-control" name="tourPlnTitle" id="tourPlnTitle">
                            </div>
                            <div class=" col-md-4 pb-4">
                                <label for="plnDays" class="form-label">Number of Days</label>
                                <input type="number" class="form-control" name="plnDays" id="plnDays">
                            </div>
                            <div class=" col-md-4 pb-4">
                                <label for="plnprice" class="form-label">Price</label>
                                <input type="number" class="form-control" name="plnprice" id="plnprice">
                            </div>
                                                
                            <div class="col-md-12 pb-4">
                                <label for="plnSummary" class="form-label">Tour Plan Summary</label>
                                <textarea class="form-control" name="plnSummary" rows="3" id="plnSummary"></textarea>
                            </div>
                            
                                <div class="input-group col-md-12 pb-4">
                                <input type="file" class="form-control" name="image" aria-describedby="submit" aria-label="Upload" id="image">
                                
                            </div>
                             <div class="col-md-12 pb-4">
                                <label for="imageText" class="form-label">Image Description</label>
                                <textarea class="form-control" name="imageText" rows="3" id="imageText"></textarea>
                                
                            </div>

                            <div class=" col-md-4 pb-4">
                                <label for="plnstatus" class="form-label">Status</label>
                                <select class="form-control" id="plnstatus" name="plnstatus">
                                            <option value="A">ACTIVE</option>
                                            <option value="I">INACTIVE</option>

                                </select>


                            <div class=" my-4">
                            <button type="submit" name ="submit" class="btn btn-warning">Create Plan</button>

                            <button type="button" value="Submit" name ="clear" id ="clear" onclick="resetform()" class="btn btn-warning">Clear Form</button>
                             
                            </div >

                            

                    </form>

                                  
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

 