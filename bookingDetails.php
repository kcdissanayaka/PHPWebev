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
       
      </div>
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