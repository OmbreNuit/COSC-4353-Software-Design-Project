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
        <form>
            <div>
                <label>Gallons Requested:</label>
                <input type="text" required>
            </div>
            <div>
                <label>Same address as listed?</label>
                <p> 123 Richmond Rd, Apt 1234
                    <br> Sugar Land, Tx 77007
                </p>
                <input type="checkbox">
            </div>
            <div>
                <label>Delivery Date:</label>
                <input type="date" required>
            </div>
            <button>Submit</button>
        </form>
        <h2>Cost estimate:</h2>
        <p>Cost : $0.00 per gallon</p>
        <p>Total Cost: $0.00</p>
    </div>
</body>
</html>