<?php
session_start();

require("dbconnect.php");

if (!isset($_SESSION['user'])) {
    echo "<script>alert('กรุณาลงชื่อเข้าใช้เพื่อใช้งาน');
  window.location.replace('../loginform.php');</script>";
    exit(0);
}

$itemId = isset($_GET['itemId']) ? $_GET['itemId'] : "";

if ($_POST) {
    for ($i = 0; $i < count($_POST['qty']); $i++) {
        $key = $_POST['arr_key_' . $i];
        $_SESSION['qty'][$key] = $_POST['qty'][$i];
        header('location:buyer_cart.php');
    }
} else {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
        $_SESSION['qty'][] = array();
    }

    if (in_array($itemId, $_SESSION['cart'])) {
        $key = array_search($itemId, $_SESSION['cart']);
        $_SESSION['qty'][$key] = $_SESSION['qty'][$key] + 1;
        header('location:buyer_books.php?a=exists');
    } else {
        array_push($_SESSION['cart'], $itemId);
        $key = array_search($itemId, $_SESSION['cart']);
        $_SESSION['qty'][$key] = 1;
        header('location:buyer_books.php?a=add');
    }
}

?>