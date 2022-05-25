<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'miniproject');
if (isset($_SESSION["hellodocsession"])) {
    header("Location: ../dashboard.php");
    die();
} else {
?>
    <!DOCTYPE html>

    <head>
        <title>Forgot Password Form</title>
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

                <form class="inner" action="#" method="POST">
                    <label for="fname">Email:</label>
                    <input class="infield" type="email" name="un" id="email1" value="" required /><br>
                    <span id="error" class="er">
                        <p id="err">Please enter a valid email!!</p>
                    </span><br>
                    <div class="cbox">
                        <span class="psw"><a href="index.php">Back to Login?</a></span>
                    </div>
                    <br><input class="btnfield" type="submit" value="Sent code" name="loginSubmit"><br><br>
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
if (isset($_POST['loginSubmit'])) {
    $email = $_SESSION['email'] = $_POST['un'];
    $query = "SELECT * FROM `tbl_user` WHERE email = '$email'";
    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res)!=0) {
        $rand = $_SESSION['rand'] = rand(100000, 900000);
        $subject = "Reset Password";
        $body = "Hi, Your One Time Password (OTP) to reset your password is: $rand";
        $headers = "From: jacobjojy@mca.ajce.in";

        if (mail($email, $subject, $body, $headers)) {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Verification code has sent to your registered email');
            window.location.href='verify.php';
            </script>");
        } else {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Verification code sending failed');
            window.location.href='forgot.php';
            </script>");
        }
    } else {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('User does not exist');
        window.location.href='forgot.php';
        </script>");
    }
}
?>