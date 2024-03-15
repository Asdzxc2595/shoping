<?php
require("dbconnect.php");

        $storename = $_POST["storename"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $address = $_POST["address"];
        $province = $_POST["province"];
        $district = $_POST["district"];
        $zipcode = $_POST["zipcode"];
        $phone = $_POST["phone"]; 
        $facebook = $_POST["facebook"];
        $line = $_POST["line"];
        $map = $_POST["map"];
        $stores_qr= "seller/img/" .basename($_FILES["stores_qr"]["name"]);

$sql = "SELECT * FROM stores WHERE stores_email = '$email'";
$result = mysqli_query($connect, $sql);

if ($result->num_rows > 0) {
        echo "<script type='text/javascript'>
        alert('อีเมลนี้ได้ถูกลงทะเบียนแล้ว');
        window.location.replace('registersellerform.php');
        </script>";
} else {
        $sql = "SELECT * FROM users WHERE users_email = '$email'";
        $result = mysqli_query($connect, $sql);

        if ($result->num_rows > 0) {
                echo "<script type='text/javascript'>
                alert('อีเมลนี้ได้ถูกลงทะเบียนแล้ว');
                window.location.replace('registersellerform.php');
                </script>";
        } else {
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                        $tmp_name = $_FILES['image']['tmp_name'];
                        $name = $_FILES['image']['name'];
                        
                        // Move the uploaded file to a directory
                        $destination = 'seller/profile/upload/' . $name;
                        move_uploaded_file($tmp_name, $destination);
                        
                        move_uploaded_file($_FILES["stores_qr"]["tmp_name"],$stores_qr);
                        // Store the image path in a variable for further processing or database storage
                        $image_path = "../" . $destination;
        
                        $sql = "INSERT INTO stores (stores_name, stores_email, stores_password, stores_img, stores_address, stores_district, stores_province, stores_zipcode, stores_phone, stores_facebook, stores_line, stores_qr, stores_permit, stores_map) 
                        VALUES ('$storename','$email','$password','$image_path','$address','$district','$province','$zipcode','$phone','$facebook','$line', CONCAT('../', '$stores_qr'), '1', '$map')";
        
                        $result = mysqli_query($connect, $sql);
        
                        if ($result) {
                                echo "<script type='text/javascript'>
                                alert('ลงทะเบียนเสร็จสิ้น');
                                window.location.replace('loginform.php');
                                </script>";
                        } else {
                                echo "<script type='text/javascript'>
                                alert('เกิดข้อผิดพลาดในระหว่างการดำเนินการลงทะเบียน โปรดลองอีกครั้งในภายหลัง');
                                window.location.replace('loginform.php');
                                </script>";
                        }
                }
        }
}
?>