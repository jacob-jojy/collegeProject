<?php
session_start();
if (isset($_SESSION["hellodocsession"])) {
  header("Location: ../dashboard.php");
  die();
} else {
?>
  <!DOCTYPE html>

  <head>
    <title>Login Form</title>
    <link rel="stylesheet" href="../style/style.css">
  </head>


  <body>

    <div class="login-page">

      <div class="part">
        <div class="head">
          <h1>HELLO DOC</h1>
        </div>
      </div>
      <div class="form">

        <form class="inner" action="authentication.php" method="POST">
          <h1><b>Welcome Back<b></h1><br>
          <label for="fname">Email:</label>
          <input class="infield" type="text" name="un" id="email1" value="" required /><br>
          <span id="error" class="er">
            <p id="err">Please enter a valid email!!</p>
          </span><br>
          <label for="fname">Password:</label>
          <input class="infield" type="password" name="pd" value="" required><br><br>
          <div class="cbox">
            <div><input type="checkbox" checked="checked" name="remember"><label>Remember me</label></div>
            <span class="psw"><a href="forgot.php">Forgot password?</a></span>
          </div>
          <br><input class="btnfield" type="submit" value="LOGIN" name="loginSubmit" required><br><br>
          <p>--------------------------OR--------------------------</p><br>
          <a href="signup.php"> <input class="btnfield" type="button" class="btn_info" name="Sign up" value="SIGN UP"><br><br>
        </form>
        <div> <a href="../emergency.php"> <input class="btnfield" type="button" style="background-color:red" class="btn_info" name="Eservice" value="EMERGENCY SERVICES"></a><br><br></div>
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