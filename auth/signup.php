<?php
session_start();
include('../cred/connect.php');
if (isset($_SESSION["hellodocsession"]) == session_id()) {
  header("Location: ../dashboard.php");
  die();
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Register</title>
    <link rel="stylesheet" href="../style/style.css">
  </head>


  <body>
    <div class="login-page reverse">
      <div class="part1">
        <div class="head">
          <h1>HELLO DOC</h1>
        </div>
      </div>

      <div class="form">

        <form class="inner" action="authentication.php" autocomplete="off" method="post">

          <h1><b>REGISTRATION<b></h1><br><br>
          <div id="name"></div>
          <label for="fname">User Name:</label><br>
          <input class="infield" type="text" id="name1" name="uname" /><br>
          <span id="name2" class="er">
            <p id="err">Please enter a valid username!!</p>
          </span><br>
          <div id="email"></div>
          <label for="fname">Email:</label><br>
          <input class="infield" type="text" id="email1" name="emil" value="" /><br>
          <span id="error" class="er">
            <p id="err">Please enter a valid email!!</p>
          </span><br>
          <label for="fname">Mobile:</label><br>
          <input class="infield" type="text" id="phone1" name="mobno" value="" maxlength="10" /><br>
          <span id="ephone" class="er">
            <p id="err">Please enter a valid phone!!</p>
          </span><br>
          <div id="pass"></div>
          <label for="fname">Password:</label><br>
          <input class="infield" type="password" id="pass1" name="psword"><br>
          <span id="error1" class="er">
            <p id="err">Password should be atleast 6 characters!!</p>
          </span><br>
          <div id="cpass"></div>
          <label for="fname">Confirm Password:</label><br>
          <input class="infield" type="password" id="npass" name="cpsword"><br>
          <span id="errorc" class="er">
            <p id="err">Passwords doesn't match!!</p>
          </span><br>
          <input class="btnfield" type="submit" name="SignupSubmit" value="Register"><br><br>
          <span class="psw">Already have an account? <a href="index.php">Login</a></span><br><br>
        </form>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="validator.js"> </script>
  </body>

  </html>
<?php
}
?>