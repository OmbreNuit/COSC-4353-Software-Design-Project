<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $full_name = sanitize_input($_POST["full_name"]);
    $address_1 = sanitize_input($_POST["address_1"]);
    $address_2 = sanitize_input($_POST["address_2"]); 
    $city = sanitize_input($_POST["city"]);
    $state = sanitize_input($_POST["state"]);
    $zipcode = sanitize_input($_POST["zipcode"]);

    // Process the data here. 

    echo "Received the following data:<br>";
    echo "Full Name: $full_name<br>";
    echo "Address 1: $address_1<br>";
    echo "Address 2: $address_2<br>";
    echo "City: $city<br>";
    echo "State: $state<br>";
    echo "Zipcode: $zipcode<br>";
   
    // return; // Uncomment if needed
}

// Function to sanitize form input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Client Profile Management</title>
    <link rel="stylesheet" href="ClientProfileManagement.css" />
  </head>
  
<body>
    <img src="logo.png" alt="Logo" class="logo">
    <div class="center">
    <h1>Client Profile Management</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" maxlength="50" required>
        </div>
        <div>
            <label for="address_1">Address 1:</label>
            <input type="text" id="address_1" name="address_1" maxlength="100" required>
        </div>
        <div>
            <label for="address_2">Address 2:</label>
            <input type="text" id="address_2" name="address_2" maxlength="100">
        </div>
        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" maxlength="100" required>
        </div>
        <div>
            <label for="state">State:</label>
            <select id="state" name="state" required>
                <option value="">Select State</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
            </select>
        </div>
        <div>
            <label for="zipcode">Zipcode:</label>
            <input type="text" id="zipcode" name="zipcode" minlength="5" maxlength="9" required>
        </div>
        <input type="submit" value="Submit" />
    </form>
    </div>
</body>
</html>
