<?php
declare(strict_types=1);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to login page if user is not logged in
        header("Location: login.php");
        exit();
    }

    // Retrieve user ID from session data
    $user_id = $_SESSION['user_id'];

    // Collect form data
    $gallons_requested = $_POST['gallons_requested'];
    $address = $_POST['address'];
    $delivery_date = $_POST['delivery_date'];
    $suggested_price = $_POST['suggested_price'];
    $total_price = $_POST['total_price'];

    try {
        require_once "dbh.inc.php";

        // Prepare SQL statement
        $sql = "INSERT INTO fueldata (user_id, gallons, address, deliverydate, suggestedprice, totalprice) VALUES (?, ?, ?, ?, ?, ?)";

        // Bind parameters and execute query
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $user_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $gallons_requested, PDO::PARAM_STR);
        $stmt->bindParam(3, $address, PDO::PARAM_STR);
        $stmt->bindParam(4, $delivery_date, PDO::PARAM_STR);
        $stmt->bindParam(5, $suggested_price, PDO::PARAM_STR);
        $stmt->bindParam(6, $total_price, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            // Data inserted successfully
            header("Location: ../Assignment4/loginhome.php");
            exit();
        } else {
            // Error inserting data
            $_SESSION['error'] = 'Error inserting fuel data.';
            header("Location: ../Assignment4/fuelquoteform.php?error=1");
            exit();
        }
    } catch (PDOException $e) {
        // Database error
        die("Query failed: " . $e->getMessage());
    }
} else {
    // Redirect to homepage if form is not submitted via POST method
    header("Location: ../Assignment4/homepage.php");
    exit();
}
?>