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
    <div style="float:right; background-color: #E8D8C4">
    <ul >
        <li style="list-style-type:none;"><a  href="homepage.php">Home Page</a></li>
        <li style="list-style-type:none;"><a  href="FuelQuoteHistory.php">Quote History</a></li>
        <!-- <li style="list-style-type:none;"><a  href="login.php">Login</a></li> -->
        <!-- <li style="list-style-type:none;"><a  href="registration.php">Register</a></li> -->
        <!-- <li style="list-style-type:none;"><a  href="FuelQuoteForm.php">Quote</a></li> -->
        <li style="list-style-type:none;"><a  href="ClientProfileManagement.php">Client Mangement</a></li>
        <li style="list-style-type:none;"><a  href="homepage.php">Sign Out</a></li>
    </ul>
    </div>
    <div class="container">
        <h1>Fuel Quote Form</h1>
        <form method="post">
            <div>
                <label>Gallons Requested:</label>
                <input type="text" name="gallons_requested" value="<?php echo htmlspecialchars($gallons_requested); ?>" required>
            </div>
            <div>
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
        <h2>Cost estimate:</h2>
        <p>Gallons Requested: <?php echo htmlspecialchars($gallons_requested); ?></p>
        <p>Same address as listed? <?php echo $same_address ? 'Yes' : 'No'; ?></p>
        <p>Delivery Date: <?php echo htmlspecialchars($delivery_date); ?></p>
    </div>
</body>
</html>