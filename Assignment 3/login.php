<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, intial-scale=1.0" />
    <title>Client Login</title>
    <link rel="stylesheet" href="loginstyle.css" />
  </head>
  <body>
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
     if ($username === "Max" && $password === "123") {
        // Set session variables
        $_SESSION['user'] = $username;
        // Redirect to a new page upon successful login
        header('Location: loginhome.php');
        exit();
     } else {
        die('Invalid username or password.');
     }  
    }
    ?>


     <img src="loginlogo.jpg" alt="Logo" class="logo">
    
    <div class="center">
      <h1>Client Login</h1>
      <form method="post" action="login.php">
        <div class="txt_field">
          <input type="text" name="username" required />
          <span></span>
          <label>Client Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required />
          <span></span>
          <label>Client Password</label>
        </div>
        <input type="submit" value="Login" />
        <div class="signup_link">New Client? <a href="registration.html">Register here</a></div>
      </form>
      
    </div>
  </body>
</html>