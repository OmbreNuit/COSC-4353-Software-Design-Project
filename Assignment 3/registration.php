<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, intial-scale=1.0" />
    <title> Client Registration</title>
    <link rel="stylesheet" href="registrationstyle.css" />
  </head>
  <body>
    <img src="registrationlogo.jpg" alt="Logo" class="logo">
    <div class="center">
      <h1>Client Registration</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" required />
          <span></span>
          <label>Create Username</label>
        </div>
        <div class="txt_field">
          <input type="password" required />
          <span></span>
          <label>Create Password</label>
        </div>
        <div class="txt_field">
          <input type="password" required />
          <span></span>
          <label>Confirm Password</label>
        </div>
        <input type="submit" value="Register" />
      </form>
    </div>
  </body>
</html>

