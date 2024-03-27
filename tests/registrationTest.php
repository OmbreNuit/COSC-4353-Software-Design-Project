<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Adjust the path as needed
require_once __DIR__ . '/../Assignment 3/registration.php';

class registrationTest extends PHPUnit\Framework\TestCase {
    
    // Test case for valid registration
    public function testValidRegistration() {
        $_POST['username'] = 'newuser';
        $_POST['password'] = 'password123';
        $_POST['confirm_password'] = 'password123';
        session_start();
        include 'registration.php';
        $this->assertArrayHasKey('registered_users', $_SESSION);
    }

    // Test case for empty fields
    public function testEmptyFields() {
        $_POST['username'] = '';
        $_POST['password'] = '';
        $_POST['confirm_password'] = '';
        session_start();
        include 'registration.php';
        $this->assertArrayNotHasKey('registered_users', $_SESSION);
        // Ensure an error message is set in the session
        $this->assertArrayHasKey('error', $_SESSION);
        $this->assertEquals('All fields are required.', $_SESSION['error']);
    }

    // Test case for mismatched passwords
    public function testMismatchedPasswords() {
        $_POST['username'] = 'newuser';
        $_POST['password'] = 'password123';
        $_POST['confirm_password'] = 'password456';
        session_start();
        include 'registration.php';
        $this->assertArrayNotHasKey('registered_users', $_SESSION);
        // Ensure an error message is set in the session
        $this->assertArrayHasKey('error', $_SESSION);
        $this->assertEquals('Passwords do not match.', $_SESSION['error']);
    }

    // Test case for duplicate username
    public function testDuplicateUsername() {
        // Simulate a duplicate username by adding it to the session data
        $_SESSION['registered_users']['existinguser'] = [
            'username' => 'existinguser',
            'password' => password_hash('password123', PASSWORD_DEFAULT)
        ];
        $_POST['username'] = 'existinguser';
        $_POST['password'] = 'password123';
        $_POST['confirm_password'] = 'password123';
        session_start();
        include 'registration.php';
        $this->assertArrayNotHasKey('registered_users', $_SESSION);
        // Ensure an error message is set in the session
        $this->assertArrayHasKey('error', $_SESSION);
        $this->assertEquals('Username is already taken.', $_SESSION['error']);
    }
}