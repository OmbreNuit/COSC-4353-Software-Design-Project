<?php
// Import the necessary PHPUnit classes
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Assignment 3/login.php';

// Define the test class
class loginTest extends PHPUnit\Framework\TestCase {
    
    // Test case for successful login
    public function testSuccessfulLogin() {
        // Simulate a POST request with valid credentials
        $_POST['username'] = 'Max';
        $_POST['password'] = '123';

        ob_start();

        include 'login.php';

        $output = ob_get_clean();

        $this->assertStringContainsString('Location: loginhome.php', $output);
    }

    // Test case for unsuccessful login
    public function testUnsuccessfulLogin() {
        // Simulate a POST request with invalid credentials
        $_POST['username'] = 'InvalidUser';
        $_POST['password'] = 'InvalidPassword';

        ob_start();

        include 'login.php';

        $output = ob_get_clean();

        $this->assertStringContainsString('Invalid username or password.', $output);
    }

    // Test case for missing username or password
    public function testMissingUsernameOrPassword() {
        // Simulate a POST request with missing username
        $_POST['password'] = 'Password';

        ob_start();

        include 'login.php';

        $output = ob_get_clean();

        $this->assertStringContainsString('Username and password are required.', $output);
    }
}

?>
