<?php
session_start();

// Initialize variables to hold form data
$gallons_requested = "";
$same_address = "";
$delivery_date = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $gallons_requested = isset($_POST['gallons_requested']) ? floatval($_POST['gallons_requested']) : 0;
    $same_address = isset($_POST['same_address']) ? $_POST['same_address'] : false;
    $delivery_date = isset($_POST['delivery_date']) ? $_POST['delivery_date'] : '';
    // Mock data (they are hard coded for now)
    // Set price per gallon based on in-state or out-of-state
    if ($same_address) {
        // In-state price per gallon
        $price_per_gallon = 1.47;
    } else {
        // Out-of-state price per gallon
        $price_per_gallon = 2.67;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Quote Form</title>
    <link rel="stylesheet" href="FuelQuoteFormStyle.css">
</head>

<body>
    <img src="fuelquoteformlogo.jpg" alt="Logo" class="logo">
    <div class="container">
        <h1>Fuel Quote Form</h1>
        <form method="post">
            <div>
                <label>Gallons Requested:</label>
                <input type="text" name="gallons_requested" value="<?php echo htmlspecialchars($gallons_requested); ?>" required>
            </div>
            <div>
                <!-- The adress would be pulled for the Database (for now it is hard coded) -->
                <label>Same address as listed?</label>
                <p> 123 Richmond Rd, Apt 1234
                    <br> Sugar Land, Tx 77007
                </p>
                <input type="checkbox" name="same_address" <?php if ($same_address) echo 'checked'; ?>>
            </div>
            <div>
                <label>Delivery Date:</label>
                <input type="date" name="delivery_date" value="<?php echo htmlspecialchars($delivery_date); ?>" required>
            </div>
            <button type="submit">Submit</button>
        </form>
        
        <!-- Display the values collected in the form (some are hard coded for now) -->
        <h2>Cost estimate:</h2>
        <p>Gallons Requested: <?php echo htmlspecialchars($gallons_requested); ?> </p>
        <p>In-State? <?php echo $same_address ? 'Yes' : 'No'; ?></p>
        <p>Price per Gallon: $<?php echo number_format($price_per_gallon, 2); ?></p>
        <p>Total Cost: $<?php echo number_format($gallons_requested * $price_per_gallon, 2); ?></p>
        <p>Delivery Date: <?php echo htmlspecialchars($delivery_date); ?></p>
    </div>
</body>
</html>