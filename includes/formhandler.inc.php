<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = 'All fields are required.';
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    if ($password !== $confirm_password) {
        $_SESSION['error'] = 'Passwords do not match.';
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    try {
        require_once "dbh.inc.php";

        // $query = "INSERT INTO users (username, pwd) VALUES ($username, $password);" ;
        $query = "INSERT INTO users (username, pwd) VALUES (?, ?);";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $password]);

        $pdo = null;
        $stmt = null;

        header("Location: ../Assignment4/login.php");
        exit();
    } catch (PDOException $e) {
        die("Query failed: ". $e->getMessage());
    }
} else {
    header("Location: ../Assignment4/registration.php");
    exit();
}