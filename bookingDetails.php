<?php 
session_start();
include 'customerDashboardHeader.php'; ?>

<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Fill Your Details
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Here is the detials of your booking form, please fill the rest of the details accordingly to get your booking done.</strong> 
        <?php
       
       if(isset($_SESSION['booking_details'])) {
           // Retrieve form data from session variables
           $bookingData = $_SESSION['booking_details'];
           // Display form data on the page
           echo '<div class="col-md-3 booking-form text-left">';
           echo '<form action="" method="POST" onsubmit="return validateForm()">';
           echo '<div class="form-group">';
           echo '<label for="name">Name</label>';
           echo '<input type="text" class="form-control" id="name" name="name" placeholder="your name here" value="' . (isset($bookingData['name']) ? $bookingData['name'] : '') . '">';
           echo '</div>';
           echo '<div class="form-group">';
           echo '<label for="email">Email Address</label>';
           echo '<input type="email" class="form-control" id="email" name="email" placeholder="your email here" value="' . (isset($bookingData['email']) ? $bookingData['email'] : '') . '">';
           echo '</div>';
           echo '<div class="form-group">';
           echo '<label for="phone">Phone Number</label>';
           echo '<input type="tel" class="form-control" id="phone" name="phone" placeholder="your phone number" value="' . (isset($bookingData['phone']) ? $bookingData['phone'] : '') . '">';
           echo '</div>';
           echo '<div class="form-group">';
           echo '<label for="numberOfPersons">Number Of Persons</label>';
           echo '<input type="number" class="form-control" id="numberOfPersons" name="numberOfPersons" placeholder="4" value="' . (isset($bookingData['numberOfPersons']) ? $bookingData['numberOfPersons'] : '') . '">';
           echo '</div>';
           echo '<div class="form-group">';
           echo '<label for="arrivalDate">Arrival Date</label>';
           echo '<input type="date" class="form-control" id="arrivalDate" name="arrivalDate" value="' . (isset($bookingData['arrivalDate']) ? $bookingData['arrivalDate'] : '') . '">';
           echo '</div>';
           echo '<div class="form-group">';
           echo '<label for="departureDate">Departure Date</label>';
           echo '<input type="date" class="form-control" id="departureDate" name="departureDate" value="' . (isset($bookingData['departureDate']) ? $bookingData['departureDate'] : '') . '">';
           echo '</div>';
           echo '<button type="submit" class="btn btn-info" name="submit">Submit</button>';
           echo '</form>';
           echo '</div>';

       } else {
           echo "<h1 class='display-4'>Welcome onboard!</h1>";
           echo "<p>No booking data available.</p>";
       }
   ?>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Choose Your Package
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
      <?php 
//$title = "Lankan Matka- Admin Manaeg Travel Plans";

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

$conn->close();
?>

        </section>
        <!-- Tour Plan -->

        <section id="plan">
            <div class="tourPlan text-center">
                <div class="row">
                    <div class="col">
                        <h1>CHOOSE YOUR TOUR PLANS</h1>
                    </div>
                </div>
                <div class="container text-center mt-2">
                    <!--<div class="row tourPlanCards g-3"> -->
                    <div class="row m-0 mx-0">
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
                                                 '<?php echo $tourPlan['TOUR_PLN_STATUS']; ?>')">Add to Card</button>
                                               
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

    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Complete Your Payment
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>



<?php include 'customerDashboardFooter.php'; ?>

