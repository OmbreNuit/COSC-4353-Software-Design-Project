<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $gallons_requested = $_POST["gallons_requested"];
    $same_address = isset($_POST["same_address"]) ? "Yes" : "No";
    $delivery_date = $_POST["delivery_date"];
    
    // Perform any necessary calculations or database operations here
    
    // Redirect back to the form page after processing the data
    header("Location: FuelQuoteForm.html");
    exit();
}

