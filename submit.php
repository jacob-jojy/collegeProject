
<?php
require('stripe-php-master/config.php');
if (isset($_POST['stripeToken'])) {
    \Stripe\Stripe::setVerifySslCerts(false);

    $token = $_POST['stripeToken'];

    $data = \Stripe\Charge::create(array(
        "amount" => "$payAmount",
        "currency" => "inr",
        "description" => "HELLO DOC Payment",
        "source" => $token,
    ));
    include('./cred/connect.php');

    extract($_POST);
    $insertData = "INSERT INTO `appointment`( `patient_name`, `appointment_date`, `doctor_name`) VALUES ( '$patient_name', '$meetingtime','$doctor' )";
    if (mysqli_query($connect, $insertData)) {
        header("Location: dashboard.php");
    }

    echo ("<script LANGUAGE='JavaScript'>
    window.location.href='dashboard.php';
    </script>");
}
?>