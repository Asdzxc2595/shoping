<?php
session_start();
require("dbconnect.php");

$email = $_POST["email"];
$password = $_POST["password"];

$_SESSION['admin'] = '';
$_SESSION['user'] = '';
$_SESSION['store'] = '';

if ($email == "master@bookwhales" && $password == "1234") {
    $_SESSION['admin'] = $email;
    header("location: admin/dashboard.php");
    exit(0);
}

$sql = "SELECT * FROM users WHERE users_email = '$email'";
$result = mysqli_query($connect, $sql);

if ($result->num_rows === 1) {
    $sql = "SELECT * FROM users WHERE users_email = '$email' AND users_password = '$password'";
    $result = mysqli_query($connect, $sql);
    if ($result->num_rows === 1) {
        $row = mysqli_fetch_assoc($result);
        if($row['users_permit'] != 0){
            $_SESSION['user'] = $row['users_id'];
            header("location: buyer/buyer_index.php");
        }else{
            echo "
            <script>
            alert('บัญชีของคุณถูกระงับการใช้งาน');
            window.location.replace('loginform.php');
            </script>";
        }
    } else {
        echo "
        <script>
        alert('รหัสผ่านไม่ถูกต้อง');
        window.location.replace('loginform.php');
        </script>";
    }
} else {
    $sql = "SELECT * FROM stores WHERE stores_email = '$email'";
    $result = mysqli_query($connect, $sql);

    if ($result->num_rows === 1) {
        $sql = "SELECT * FROM stores WHERE stores_email = '$email' AND stores_password = '$password'";
        $result = mysqli_query($connect, $sql);
        if ($result->num_rows === 1) {
            $row = mysqli_fetch_assoc($result);
            if($row['stores_permit'] != 0){
                $_SESSION['store'] = $row['stores_id'];
                $_SESSION['stores_name'] = $row['stores_name'];
                header("location: seller/seller_homepage.php");
            }else{
                echo "
                <script>
                alert('บัญชีของคุณถูกระงับการใช้งาน');
                window.location.replace('loginform.php');
                </script>";
            }
        } else {
            echo "
            <script>
            alert('รหัสผ่านไม่ถูกต้อง');
            window.location.replace('loginform.php');
            </script>";
        }
    } else {
        echo "
        <script>
        alert('ไม่มีบัญชีในระบบ');
        window.location.replace('loginform.php');
        </script>";
    }
}
?>