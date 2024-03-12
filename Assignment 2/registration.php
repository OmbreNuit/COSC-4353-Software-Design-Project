<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

    // Validations
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = 'All fields are required.';
        header('Location: registration.php');
        exit();
    }

    if ($password !== $confirm_password) {
        $_SESSION['error'] = 'Passwords do not match.';
        header('Location: registration.php');
        exit();
    }

    // Since we're not implementing a DB, we'll just simulate a registration by saving to a session
    $_SESSION['registered_users'][$username] = [
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT) // Always hash passwords
    ];

    // Redirect to a success page or login page
    header('Location: registration_success.php');
    exit();
}
