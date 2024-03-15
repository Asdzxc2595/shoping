<?php
session_start();
ob_start();
require("../dbconnect.php");
$store = $_SESSION['store'];
$stores_img = "../seller/img/" . basename($_FILES["stores_img"]["name"]);
$stores_qr = "../seller/img/" . basename($_FILES["stores_qr"]["name"]);

$email = $_POST["stores_email"];

$sql = "SELECT * FROM stores WHERE stores_email = '$email'";
$result = mysqli_query($connect, $sql);

if ($result->num_rows > 0) {
    echo "<script type='text/javascript'>
        alert('อีเมลนี้ได้ถูกลงทะเบียนแล้ว');
        window.location.replace('form_edit_seller.php');
        </script>";
} else {
    $sql = "SELECT * FROM users WHERE users_email = '$email'";
    $result = mysqli_query($connect, $sql);

    if ($result->num_rows > 0) {
        echo "<script type='text/javascript'>
                alert('อีเมลนี้ได้ถูกลงทะเบียนแล้ว');
                window.location.replace('form_edit_seller.php');
                </script>";
    } else {

        $sql = "select * from stores where stores_id = $store";
        $rs = $connect->query($sql);
        $r = $rs->fetch_object();

        if ($_POST["stores_email"] != '') {
            $stores_email = $_POST["stores_email"];
            ;
        } else {
            $stores_email = $r->stores_email;
        }
        if ($_FILES["stores_img"]["name"] != '') {
            $stores_img = "../seller/img/" . basename($_FILES["stores_img"]["name"]);
        } else {
            $stores_img = $r->stores_img;
        }
        if ($_FILES["stores_qr"]["name"] != '') {
            $stores_qr = "../seller/qrcode/" . basename($_FILES["stores_qr"]["name"]);
        } else {
            $stores_qr = $r->stores_qr;
        }
        if ($_POST["stores_password"] != '') {
            $stores_password = $_POST["stores_password"];
            ;
        } else {
            $stores_password = $r->stores_password;
        }
        if ($_POST["stores_address"] != '') {
            $stores_address = $_POST["stores_address"];
            ;
        } else {
            $stores_address = $r->stores_address;
        }
        if ($_POST["stores_province"] != '') {
            $stores_province = $_POST["stores_province"];
            ;
        } else {
            $stores_province = $r->stores_province;
        }
        if ($_POST["stores_district"] != '') {
            $stores_district = $_POST["stores_district"];
            ;
        } else {
            $stores_district = $r->stores_district;
        }
        if ($_POST["stores_zipcode"] != '') {
            $stores_zipcode = $_POST["stores_zipcode"];
            ;
        } else {
            $stores_zipcode = $r->stores_zipcode;
        }
        if ($_POST["stores_phone"] != '') {
            $stores_phone = $_POST["stores_phone"];
            ;
        } else {
            $stores_phone = $r->stores_phone;
        }
        if ($_POST["store_name"] != '') {
            $stores_name = $_POST["store_name"];
            ;
        } else {
            $stores_name = $r->stores_name;
        }
        if ($_POST["facebook"] != '') {
            $stores_facebook = $_POST["facebook"];
            ;
        } else {
            $stores_facebook = $r->stores_facebook;
        }
        if ($_POST["line"] != '') {
            $stores_line = $_POST["line"];
            ;
        } else {
            $stores_line = $r->stores_line;
        }
        if ($_POST["stores_map"] != '') {
            $stores_map = $_POST["stores_map"];
            ;
        } else {
            $stores_map = $r->stores_map;
        }
        move_uploaded_file($_FILES["stores_img"]["tmp_name"], $stores_img);

        $sql_up = "update stores set stores_img = '$stores_img',
                                 stores_password = '$stores_password',
                                 stores_address = '$stores_address',
                                 stores_province = '$stores_province',
                                 stores_district = '$stores_district',
                                 stores_zipcode = '$stores_zipcode',
                                 stores_phone = '$stores_phone',
                                 stores_facebook = '$stores_facebook',
                                 stores_line = '$stores_line',
                                 stores_name = '$stores_name',
                                 stores_password = '$stores_email',
                                 stores_map = '$stores_map'
                where stores_id = $store";

        $rs_up = $connect->query($sql_up);

        if ($rs_up) {
            ?>
            <script>
                alert("เปลี่ยนข้อมูลสำเร็จ");
                location.href = "seller_homepage.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("ไม่สามารถเปลี่ยนได้ กรุณาตรวจสอบข้อมูล");
                location.href = "form_edit_seller.php?id=<?php echo $r->stores_id ?>";
            </script>
        <?php
        }
    }
}
?>