<?php
require("dbconnect.php");

$storename= $_POST["storename"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["password"];
$address = $_POST["address"];
$province = $_POST["province"];
$district = $_POST["district"];
$zipcode = $_POST["zipcode"];
$phone = $_POST["phone"];

// $file = 'seller/profile/defaultstores.png';

$sql = "INSERT INTO users (users_firstname, users_lastname, users_email, users_password, users_province, users_district, users_zip, 
        users_address, users_mobile, users_role, users_permit) 
        VALUES ('$firstname','$lastname','$email','$password','$province','$district','$zipcode','$address','$phone','1', 0)";

$result = mysqli_query($connect, $sql);

if ($result) {
    echo "<script type='text/javascript'>
            alert('ลงทะเบียนเสร็จสิ้น');
            window.location.replace('login.php');
        </script>";
} else {
    echo "<script type='text/javascript'>
            alert('เกิดข้อผิดพลาดในระหว่างการดำเนินการลงทะเบียน โปรดลองอีกครั้งในภายหลัง');
            window.location.replace('registerbuyerform.php');
        </script>";
}

?>