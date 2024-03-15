<?php
session_start();

require("dbconnect.php");
// Check if the user session variable exists
if (!isset($_SESSION['user'])) {
        echo "<script>alert('กรุณาลงชื่อเข้าใช้เพื่อใช้งาน');
      window.location.replace('../loginform.php');</script>";
        exit(0);
}
$user = $_SESSION['user'];

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];

        // Move the uploaded file to a directory
        $destination = '../buyer/profile/upload/' . $name;
        move_uploaded_file($tmp_name, $destination);

        // Store the image path in a variable for further processing or database storage
        $image_path = $destination;

        $sql = "UPDATE users SET users_img = '$image_path' WHERE users_id = '$user'";

        $result = mysqli_query($connect, $sql);

        if ($result) {
                echo "<script type='text/javascript'>
                alert('อัปโหลดรูปภาพโปรไฟล์เสร็จสิ้น');
                window.location.replace('userprofile.php');
                </script>";
        } else {
                echo "<script type='text/javascript'>
                alert('อัปโหลดรูปภาพไม่สำเร็จ โปรดลองอีกครั้งในภายหลัง');
                window.location.replace('userprofile.php');
                </script>";
        }
}
?>