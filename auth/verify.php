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
                    <label for="fname">Enter code:</label>
                    <input class="infield" type="text" name="un" id="email1" value="" required /><br><br>
                    <div class="cbox">
                        <span class="psw"><a href="index.php">Back to Login?</a></span>
                    </div>
                    <br><input class="btnfield" type="submit" value="VERIFY" name="loginSubmit" required><br><br>
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
    $rand = $_SESSION['rand'];
    $un = $_POST['un'];
    if ($un == $rand) {
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Verification success');
            window.location.href='reset.php';
            </script>");
    } else {
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Incorrect otp');
            window.location.href='forgot.php';
            </script>");
    }
}
?>