<?php
session_start();

// Simulated user data - this should come from a database in a real scenario
$valid_username = 'client1';
$valid_password = 'password123';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validations
    if (empty($username) || empty($password)) {
        die('Username and password are required.');
    }

    // Authenticate the user (this should check against a database in a real scenario)
    if ($username === $valid_username && $password === $valid_password) {
        // Set session variables
        $_SESSION['user'] = $username;
        // Redirect to a new page upon successful login
        header('Location: success.php');
        exit();
    } else {
        die('Invalid username or password.');
    }
}

