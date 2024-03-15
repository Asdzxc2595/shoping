<?php
require("dbconnect.php");

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["password"];
$address = $_POST["address"];
$province = $_POST["province"];
$district = $_POST["district"];
$zipcode = $_POST["zipcode"];
$phone = $_POST["phone"];

$sql = "SELECT * FROM users WHERE users_email = '$email'";
$result = mysqli_query($connect, $sql);

if ($result->num_rows > 0) {
        echo "<script type='text/javascript'>
        alert('อีเมลนี้ได้ถูกลงทะเบียนแล้ว');
        window.location.replace('registerbuyerform.php');
        </script>";
} else {
        $sql = "SELECT * FROM stores WHERE stores_email = '$email'";
        $result = mysqli_query($connect, $sql);
        
        if ($result->num_rows > 0) {
                echo "<script type='text/javascript'>
                alert('อีเมลนี้ได้ถูกลงทะเบียนแล้ว');
                window.location.replace('registerbuyerform.php');
                </script>";
        } else {
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                        $tmp_name = $_FILES['image']['tmp_name'];
                        $name = $_FILES['image']['name'];
        
                        // Move the uploaded file to a directory
                        $destination = 'buyer/profile/upload/' . $name;
                        move_uploaded_file($tmp_name, $destination);
        
                        // Store the image path in a variable for further processing or database storage
                        $image_path = "../" . $destination;
        
                        $sql = "INSERT INTO users (users_firstname, users_lastname, users_email, users_password, users_img, users_province, users_district, users_zip, 
                        users_address, users_mobile, users_role, users_permit) 
                        VALUES ('$firstname','$lastname','$email','$password','$image_path','$province','$district','$zipcode','$address','$phone','1','1')";
        
                        $result = mysqli_query($connect, $sql);
        
                        if ($result) {
                                echo "<script type='text/javascript'>
                                alert('ลงทะเบียนเสร็จสิ้น');
                                window.location.replace('loginform.php');
                                </script>";
                        } else {
                                echo "<script type='text/javascript'>
                                alert('เกิดข้อผิดพลาดในระหว่างการดำเนินการลงทะเบียน โปรดลองอีกครั้งในภายหลัง');
                                window.location.replace('registerbuyerform.php');
                                </script>";
                        }
                }
        }
}
?>