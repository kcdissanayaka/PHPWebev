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
        <?php 
        include 'Admin/admindb.php';

        $tourPlanList = array();
        $allTourPlns = array();
        $query = "SELECT * FROM TOUR_PLAN_CARDS";

        $result = $conn->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $tourPlanList = $result->fetch_all(MYSQLI_ASSOC);
            }
        }

        $conn->close();
        ?>

        <section id="plan">
            <div class="tourPlan text-center">
                <div class="row">
                    <div class="col">
                        <h1>CHOOSE YOUR TOUR PLANS</h1>
                    </div>
                </div>
                <div class="container text-center mt-2">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php 
                        foreach ($tourPlanList as $tourPlan) {
                            ?>
                            <div class="col">
                                <div class="card h-100 shadow">
                                    <img class="card-img-top" src="assets/images/trip-plans-card-img/<?php echo $tourPlan['TOUR_PLN_IMAGE']; ?>" alt="<?php echo $tourPlan['TOUR_PLN_TITLE']; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $tourPlan['TOUR_PLN_TITLE']; ?></h5>
                                        <p class="card-text"><?php echo $tourPlan['TOUR_PLN_DESCRIPTION']; ?></p>
                                        <p class="card-text"><?php echo "Price $". $tourPlan['TOUR_PLN_PERSON_PRICE'].".00"; ?></p>  
                                        <button type="button" class="btn btn-warning mb-2 add-to-cart" data-id="<?php echo $tourPlan['TOUR_PLN_ID']; ?>" data-title="<?php echo $tourPlan['TOUR_PLN_TITLE']; ?>" data-price="<?php echo $tourPlan['TOUR_PLN_PERSON_PRICE']; ?>">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section> 

        <section id="cart" class="mt-4">
    <h2>Shopping Cart</h2>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="cart-body">
                <!-- Cart items will be added dynamically here -->
            </tbody>
        </table>
        <div id="total">Total: $0.00</div>
    </div>
</section>

<script>
    let cartItems = [];

    function addToCart(id, title, price) {
        const existingItem = cartItems.find(item => item.id === id);
        if (existingItem) {
            existingItem.quantity++;
        } else {
            cartItems.push({ id, title, price, quantity: 1 });
        }
        renderCart();
    }

    function removeFromCart(id) {
        console.log("Removing item with ID:", id); // Check if the ID is correctly received
        cartItems = cartItems.filter(item => parseInt(item.id) != parseInt(id)); // Remove the item with the specified ID
        console.log("Cart after removal:", cartItems); // Log the cart after removal to check if the item is removed
        renderCart(); // Render the updated cart
    }


    function updateQuantity(id, quantity) {
        const item = cartItems.find(item => item.id === id);
        if (item) {
            item.quantity = parseInt(quantity);
            renderCart();
        }
    }

    function renderCart() {
    // Get the cart body element
    const cartBody = document.getElementById("cart-body");
    
    // Clear the existing content inside the cart body
    cartBody.innerHTML = "";
    
    // Initialize total variable to calculate the total price
    let total = 0;
    
    // Iterate over each item in the cartItems array
    cartItems.forEach(item => {
        // Calculate the total price for the current item
        const itemTotal = item.price * item.quantity;
        
        // Add the item total to the total variable
        total += itemTotal;
        
        // Create a table row (tr) element for the current item
        const row = document.createElement("tr");
        
        // Set the HTML content for the row using template literals
        row.innerHTML = `
            <td>${item.title}</td>
            <td>$${item.price.toFixed(2)}</td>
            <td>
                <input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${item.id}, this.value)">
            </td>
            <td>$${itemTotal.toFixed(2)}</td>
            <td>
                <button class="btn btn-danger" onclick="removeFromCart(${item.id})">Remove</button>
            </td>
        `;
        
        // Append the row to the cart body
        cartBody.appendChild(row);
    });
    
    // Update the total amount element with the calculated total
    document.getElementById("total").innerText = `Total: $${total.toFixed(2)}`;
}


    document.addEventListener("DOMContentLoaded", function() {
        const addToCartButtons = document.querySelectorAll(".add-to-cart");
        addToCartButtons.forEach(button => {
            button.addEventListener("click", function() {
                const id = this.getAttribute("data-id");
                const title = this.getAttribute("data-title");
                const price = parseFloat(this.getAttribute("data-price"));
                addToCart(id, title, price);
            });
        });
    });
</script>







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

