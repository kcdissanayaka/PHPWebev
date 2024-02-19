<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment Demo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Stripe Payment Demo</h1>

        <!-- Payment form -->
        <form id="payment-form">
            <div class="mb-3">
                <label for="card-element" class="form-label">Credit or debit card</label>
                <div id="card-element" class="form-control">
                    <!-- A Stripe Element will be inserted here. -->
                </div>
                <!-- Used to display form errors. -->
                <div id="card-errors" class="form-text" role="alert"></div>
            </div>
            <button id="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>

    <script>
        // Create a Stripe instance with your publishable key
        var stripe = Stripe('pk_test_51OfMj0CixSkQ4f8GN0f4sj2fHRonFTAZw2kjWScEkwZMoViP08NpIKlNTStocYgQJOp4san6cMkaLOHY9tA329Ja00sALftRSO');

        // Create an instance of Elements
        var elements = stripe.elements();

        // Create an instance of the card Element.
        var card = elements.create('card');

        // Add an instance of the card Element into the `card-element` div
        card.mount('#card-element');

        // Handle form submission
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Disable the submit button to prevent multiple submissions
            document.getElementById('submit').disabled = true;

            // Create a token from the card information
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there's an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server to complete the payment
                    fetch('/charge', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ token: result.token })
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        // Display a success message to the user
                        console.log(data);
                        alert('Payment successful!');
                    })
                    .catch(function(error) {
                        // Inform the user if there's an error
                        console.error('Error:', error);
                        alert('Payment failed. Please try again.');
                    });
                }
            });
        });
    </script>
</body>
</html>
