<?php
session_start();
include('./cred/connect.php');
if (isset($_POST["Date"])) {
    session_start();
    //fetch the data of selected date
    extract($_POST);
    $doctor_id = $_SESSION['doctor_id'];
    $hospital_id = $_SESSION['hospital_id'];
    $fetchData = "SELECT * from new_appointment where date='$date' and hospital_id='$hospital_id' and doctor_id='$doctor_id'";
    $fetchDataRes = mysqli_query($conn, $fetchData);
}
if (isset($_POST['insertSubmit'])) {
    extract($_POST);
    $user_id =   $_SESSION['userid'];
    $fetchData = $_SESSION['hospital_id'];

    //generate op id
    $length=5;
    $generatedOpId='';
    $validChar='0123456789';
    while(0<$length--){
        $generatedOpId.=$validChar[random_int(0,strlen($validChar)-1)];
    }

    $insertAppo = "INSERT INTO `new_appointment`(`user_id`,`op_id`,`patient_name`, `doctor_id`, `hosptial_id`, `time_slot`, `date`) 
    VALUES ('$user_id','$generatedOpId','$patient_name','$doctor','$fetchData','$example','$datePicker')";
    if (mysqli_query($connect, $insertAppo)) {
        echo "<script>alert('Booked successFully');
        location.href='dashboard.php'; </script>";
    }
}
