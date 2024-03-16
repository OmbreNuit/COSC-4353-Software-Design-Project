<?php
session_start();

// PHP code starts here
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';

    // Retrieve the form data
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

    // Validations
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

    // Hardcoded credentials for registration
    $hardcoded_username = 'Max';
    $hardcoded_password = '123';

    // Check if the provided username and password match the hardcoded credentials
    if ($username === $hardcoded_username && $password === $hardcoded_password) {
        // Since we're not implementing a DB, we'll just simulate a registration by saving to a session
        $_SESSION['registered_users'][$username] = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT) // Always hash passwords
        ];

        // Redirect to a success page or login page
        header('Location: login.php');
        exit();
    } else {
        $_SESSION['error'] = 'Invalid username or password for registration.';
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Client Registration</title>
    <link rel="stylesheet" href="registrationstyle.css" />
    <style>
        /* Style the eye icons within the password fields */
        .toggle-password {
          cursor: pointer;
          position: absolute;
          right: 10px;
          top: 10px;
        }
        /* Style for error message */
        .error-message {
          color: red;
          font-size: 14px;
          margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <img src="registrationlogo.jpg" alt="Logo" class="logo">
    <div class="center">
      <h1>Client Registration</h1>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <?php if(isset($_SESSION['error'])) { ?>
          <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php } ?>
        <div class="txt_field">
          <input type="text" name="username" required />
          <span></span>
          <label>Create Username</label>
        </div>
        <div class="txt_field">
          <input type="password" id="password" name="password" required oninput="validatePasswords()" />
          <span class="toggle-password" onclick="togglePassword()">👁️</span>
          <label>Create Password</label>
        </div>
        <div class="txt_field">
          <input type="password" id="confirm_password" name="confirm_password" required oninput="validatePasswords()" />
          <span class="toggle-password" onclick="togglePassword()">👁️</span>
          <label>Confirm Password</label>
        </div>
        <input type="submit" value="Register" />
      </form>
    </div>


    <script>
      function togglePassword() {
        var password = document.getElementById('password');
        var confirmPassword = document.getElementById('confirm_password');
        var togglePasswords = document.getElementsByClassName('toggle-password');
        if (password.type === 'password') {
          password.type = 'text';
          confirmPassword.type = 'text';
          for(var i=0; i < togglePasswords.length; i++) {
            togglePasswords[i].textContent = '❌'; // Change to hide icon
          }
        } else {
          password.type = 'password';
          confirmPassword.type = 'password';
          for(var i=0; i < togglePasswords.length; i++) {
            togglePasswords[i].textContent = '👁️'; // Change to show icon
          }
        }
      }

      function validatePasswords() {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm_password').value;
        if (password !== confirmPassword) {
          document.getElementById('error-message').style.display = 'block';
        } else {
          document.getElementById('error-message').style.display = 'none';
        }
      }

      // Add event listeners to password fields
      document.getElementById('password').addEventListener('input', validatePasswords);
      document.getElementById('confirm_password').addEventListener('input', validatePasswords);
    </script>
</body>
</html>
