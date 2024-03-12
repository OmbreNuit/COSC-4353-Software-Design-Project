<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, intial-scale=1.0" />
    <title>Client Profile Management</title>
    <link rel="stylesheet" href="ClientProfileManagement.css" />
  </head>
  
<body>
    <img src="logo.png" alt="Logo" class="logo">
    <div style="float:right; background-color: #CAA6A6;">
    <ul >
        <li style="list-style-type:none;"><a  href="homepage.php">Home Page</a></li>
        <li style="list-style-type:none;"><a  href="FuelQuoteHistory.php">Quote History</a></li>
        <!-- <li style="list-style-type:none;"><a  href="login.php">Login</a></li> -->
        <!-- <li style="list-style-type:none;"><a  href="registration.php">Register</a></li> -->
        <li style="list-style-type:none;"><a  href="FuelQuoteForm.php">Quote Form</a></li>
        <!-- <li style="list-style-type:none;"><a  href="ClientProfileManagement.php">Client Mangement</a></li> -->
        <li style="list-style-type:none;"><a  href="homepage.php">Sign Out</a></li>
    </ul>
    </div>
    <div class = "center">
    <h1>Client Profile Management</h1>
    <form action="/submit_profile" method="post">
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
