<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="loginhome.css">
</head>
</html>

<body>
    <img src="loginhomelogo.jpg" alt="Logo" class="logo"> 
    <header>
        <h1>Welcome to Fuel Quote Master</h1>
        <nav>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="registration.php">Register</a></li>
                <li><a href="FuelQuoteForm.html">Quote</a></li>
                <li><a href="ClientProfileManagement.php">New Client</a></li>
            </ul>
        </nav>
    </header>
    <?php
    session_start();
    if (isset($_SESSION['user'])) {
        echo "<p>Welcome back, " . htmlspecialchars($_SESSION['user']) . "!</p>";
    } else {
        header('Location: homepage.php');
        exit();
    }
    ?>
</body>
</html>

