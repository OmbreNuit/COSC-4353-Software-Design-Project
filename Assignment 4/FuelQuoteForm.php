<?php
session_start();

include 'PriceModel.php';

// Create an instance of the PriceModel class
$priceModel = new PriceModel(); // just a class for now

// Initialize variables to hold form data and default price per gallon
$gallons_requested = "";
$same_address = true; // Set default value for same_address
$delivery_date = "";
$price_per_gallon = 1.47; // Initialize default price per gallon

// Check if the form is submitted
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $gallons_requested = isset($_POST['gallons_requested']) ? floatval($_POST['gallons_requested']) : 0;
    $same_address = isset($_POST['same_address']) ? true : false; // Set same_address based on checkbox
    $delivery_date = isset($_POST['delivery_date']) ? $_POST['delivery_date'] : '';
    
    // Set price per gallon based on in-state or out-of-state
    //would be changed to in-state or out-of-state based on DB data entry
    if ($same_address) {
        $price_per_gallon = $priceModel->getPricePerGallonInState();
    } else {
        $price_per_gallon = $priceModel->getPricePerGallonOutOfState();
    }
}
function generateHtmlOutput($gallons_requested, $same_address, $price_per_gallon, $delivery_date) {
    $htmlOutput = '';

    // Append each HTML element to the output variable
    $htmlOutput .= '<h2>Cost estimate:</h2>';
    $htmlOutput .= '<p>Gallons Requested: ' . floatval($gallons_requested). '</p>';
    $htmlOutput .= '<p>In-State? ' . ($same_address ? 'Yes' : 'No') . '</p>';
    $htmlOutput .= '<p>Price per Gallon: $' . number_format($price_per_gallon, 2) . '</p>';
    $htmlOutput .= '<p>Total Cost: $' . number_format(floatval($gallons_requested) * $price_per_gallon, 2) . '</p>';
    $htmlOutput .= '<p>Delivery Date: ' . htmlspecialchars($delivery_date) . '</p>';

    return $htmlOutput;
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
                <!-- The address would be pulled from the Database (for now it is hard coded) -->
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
        
        <!-- Display the values collected in the form -->
        <?php
        // Generate HTML output using the function
        $htmlOutput = generateHtmlOutput($gallons_requested, $same_address, $price_per_gallon, $delivery_date);

        echo $htmlOutput; // Output the HTML
        ?>
    </div>
</body>
</html>