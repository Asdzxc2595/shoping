<?php
session_start();

require("dbconnect.php");

// Check if the user session variable exists
if (!isset($_SESSION['user'])) {
    echo "<script>alert('กรุณาลงชื่อเข้าใช้เพื่อใช้งาน');
    window.location.replace('../loginform.php');</script>";
    exit(0);
}

session_start();

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["password"];
$address = $_POST["address"];
$province = $_POST["province"];
$district = $_POST["district"];
$zipcode = $_POST["zipcode"];
$phone = $_POST["phone"];

$user = $_SESSION['user'];

$sql = "UPDATE users SET users_firstname = '$firstname', users_lastname = '$lastname', users_email = '$email', users_password = '$password', 
    users_province = '$province', users_district = '$district', users_zip = '$zipcode', users_address = '$address', users_mobile = '$phone' WHERE users_id = '$user'";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo "<script type='text/javascript'>
        alert('แก้ไขข้อมูลบัญชีเสร็จสิ้น');
        window.location.replace('userprofile.php');
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('เกิดข้อผิดพลาดในระหว่างการดำเนินการแก้ไขข้อมูลบัญชี โปรดลองอีกครั้งในภายหลัง');
        window.location.replace('userprofile.php');
        </script>";
    }
?>