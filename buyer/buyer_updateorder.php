<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>alert('กรุณาลงชื่อเข้าใช้เพื่อใช้งาน');
  window.location.replace('../loginform.php');</script>";
    exit(0);
}


require("dbconnect.php");

$user = $_SESSION['user'];
$sql = "SELECT * FROM users WHERE users_id ='$user'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

$order_fullname = $row['users_firstname'] . " " .$row['users_lastname'];
$order_address = $row['users_address'] . " " .$row['users_district'] . " " .$row['users_province'] . " " .$row['users_zip'];
$order_phone = $row['users_mobile'];
$order_user = $_SESSION['user'];
$meSql = "INSERT INTO orders (orders_fullname, orders_address, orders_phone, users_id) VALUES ('$order_fullname','$order_address','$order_phone','$order_user')";
$meQuery = mysqli_query($connect, $meSql);

if ($meQuery) {
    $order_id = mysqli_insert_id($connect);
    for ($i = 0; $i < count($_POST['qty']); $i++) {
        $order_detail_quantity = mysqli_real_escape_string($connect, $_POST['qty'][$i]);
        $order_detail_price = mysqli_real_escape_string($connect, $_POST['book_price'][$i]);
        $book_id = mysqli_real_escape_string($connect, $_POST['book_id'][$i]);
        $lineSql = "INSERT INTO orders_detail (detail_quantity, detail_price, detail_total, orders_id, book_id) 
        VALUES ('$order_detail_quantity', '$order_detail_price', '$order_detail_quantity' * '$order_detail_price', '$order_id', '$book_id')";
        mysqli_query($connect, $lineSql);
    }
    mysqli_close($connect);
    unset($_SESSION['cart']);
    unset($_SESSION['qty']);
    header('location:buyer_checkout.php?a=order');
} else {
    mysqli_close($connect);
    header('location:buyer_books.php?a=orderfail');
}
?>